<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $books = Book::all();
        return view('book.index', ['books' => $books]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('book.create', [
            'categories' => $categories,
            'authors' => $authors,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $book = new Book();
            $book->fill($input);
            $book->save();
            DB::commit();
            return redirect()->route('book.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function show(Book $book): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('book.show', [
            'book' => $book,
        ]);
    }

    public function edit(Book $book): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('book.edit', [
            'book' => $book,
            'categories' => $categories,
            'authors' => $authors,
        ]);
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $book->fill($input);
            $book->save();
            DB::commit();
            return redirect()->route('book.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function destroy(Book $book): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $book->delete();
            DB::commit();
            return redirect()->route('book.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

}
