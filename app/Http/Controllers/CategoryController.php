<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        return view('category.index', ['categories' => $categories]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('category.create');
    }

    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $category = new Category();
            $category->fill($input);
            $category->save();
            DB::commit();
            return redirect()->route('category.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function show(Category $category): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('category.show', ['category' => $category]);
    }

    public function edit(Category $category): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $category->fill($input);
            $category->save();
            DB::commit();
            return redirect()->route('category.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function destroy(Category $category): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $category->delete();
            DB::commit();
            return redirect()->route('category.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }
}
