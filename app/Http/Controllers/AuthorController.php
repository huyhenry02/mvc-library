<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('author.index');
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('author.create');
    }

}
