<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookPurchaseForm;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookPurchaseFormController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $bookPurchaseForms = BookPurchaseForm::all();
        return view('book_purchase_form.index', ['bookPurchaseForms' => $bookPurchaseForms]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $books = Book::all();
        return view('book_purchase_form.create', ['books' => $books]);
    }

    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['create_user_id'] = auth()->id();
            $bookBorrowingForm = new BookPurchaseForm();
            $bookBorrowingForm-> fill($input);
            $bookBorrowingForm->save();

            $total_price = 0;

            foreach ($input['books'] as $value){
                $bookBorrowingForm->details()->create([
                    'book_id' => $value['book_id'],
                    'amount' => $value['amount'],
                    'price' => $value['price'],
                ]);

                $book = Book::find($value['book_id']);
                $book->amount -= $value['amount'];
                $book->save();

                $total_price += $value['price'];
            }

            $bookBorrowingForm->total_price = $total_price;
            $bookBorrowingForm->save();

            DB::commit();
            return redirect()->route('purchase-form.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function show(BookPurchaseForm $bookPurchaseForm): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('book_purchase_form.show', ['bookPurchaseForm' => $bookPurchaseForm]);
    }

    public function edit(BookPurchaseForm $purchaseForm): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $books = Book::all();
        $details = $purchaseForm->details()->get();
        return view('book_purchase_form.edit', [
            'purchaseForm' => $purchaseForm,
            'books' => $books,
            'details' => $details
        ]);
    }

    public function update(Request $request, BookPurchaseForm $purchaseForm): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['create_user_id'] = auth()->id();
            $purchaseForm->fill($input);
            $purchaseForm->save();
            DB::commit();
            return redirect()->route('purchase-form.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function destroy(BookPurchaseForm $purchaseForm): RedirectResponse
    {
        DB::beginTransaction();
        try {
            foreach ($purchaseForm->details()->get() as $detail){
                $book = Book::find($detail->book_id);
                $book->amount += $detail->amount;
                $book->save();
            }
            $purchaseForm->delete();
            DB::commit();
            return redirect()->route('purchase-form.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }
}
