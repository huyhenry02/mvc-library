<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookBorrowingForm;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookBorrowingFormController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $bookBorrowingForms = BookBorrowingForm::all();
        return view('book_borrowing_form.index', ['bookBorrowingForms' => $bookBorrowingForms]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $books = Book::all();
        return view('book_borrowing_form.create', ['books' => $books]);
    }

    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['create_user_id'] = auth()->id();
            $bookBorrowingForm = new BookBorrowingForm();
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
            return redirect()->route('borrowing-form.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function show(BookBorrowingForm $borrowingForm): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('book_borrowing_form.show', ['bookBorrowingForm' => $borrowingForm]);
    }

    public function edit(BookBorrowingForm $borrowingForm): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $books = Book::all();
        $details = $borrowingForm->details()->get();
        return view('book_borrowing_form.edit', [
            'borrowingForm' => $borrowingForm,
            'books' => $books,
            'details' => $details
        ]);
    }

    public function update(Request $request, BookBorrowingForm $borrowingForm): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['create_user_id'] = auth()->id();
            $borrowingForm->fill($input);
            $borrowingForm->save();

            switch ($input['status']){
                case BookBorrowingForm::STATUS_COMPLETED:
                case BookBorrowingForm::STATUS_REJECTED:
                    foreach ($borrowingForm->details()->get() as $detail){
                        $book = Book::find($detail->book_id);
                        $book->amount += $detail->amount;
                        $book->save();
                    }
                    break;
            }

            DB::commit();
            return redirect()->route('borrowing-form.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function destroy(BookBorrowingForm $borrowingForm): RedirectResponse
    {
        DB::beginTransaction();
        try {
            foreach ($borrowingForm->details()->get() as $detail){
                $book = Book::find($detail->book_id);
                $book->amount += $detail->amount;
                $book->save();
            }
            $borrowingForm->delete();
            DB::commit();
            return redirect()->route('borrowing-form.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }
}
