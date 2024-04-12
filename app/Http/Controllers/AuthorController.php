<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $authors = Author::all();
        return view('author.index', ['authors' => $authors]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('author.create');
    }

    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $author = new Author();
            $author->fill($input);
            $author->save();
            DB::commit();
            return redirect()->route('author.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function edit(Author $author): View|Factory|Application
    {
        return view('author.edit', ['author' => $author]);
    }

    public function update(Author $author, Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $author->fill($input);
            $author->save();
            DB::commit();
            return redirect()->route('author.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }
    public function destroy(Author $author): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $author->delete();
            DB::commit();
            return redirect()->route('author.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }
}
