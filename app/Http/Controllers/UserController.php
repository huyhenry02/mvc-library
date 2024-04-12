<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    public function indexLogin(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.login');
    }

    public function postLogin(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return view('layouts.main');
        }
        return redirect()->back();
    }

    public function postLogout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('login.index');
    }
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('user.create');
    }

    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['password'] = bcrypt('Password@123');
            $user = new User();
            $user->fill($input);
            $user->save();
            DB::commit();
            return redirect()->route('user.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function edit(User $user): View|Factory|Application
    {
        return view('user.edit', ['user' => $user]);
    }

    public function update(User $user, Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $user->fill($input);
            $user->save();
            DB::commit();
            return redirect()->route('user.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function destroy(User $user): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();
            return redirect()->route('user.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }
}
