<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * User Controller
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("admin.users.index", ['users'=>$users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Shows user edit
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view("admin.users.edit", ['user' => $user]);
    }

    /**
     * Updates user email
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|min:3',
        ]);

        $user->email = $validatedData['email'];
        $user->save();
        return redirect()->route('users.index');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function flipActive(Request $request, User $user)
    {
        if(Auth::user()->id != $user->id) {
            $user->isActive = !$user->isActive;
            $user->save();
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function flipAdmin(Request $request, User $user)
    {
        if(Auth::user()->id != $user->id) {
            $user->isAdmin = !$user->isAdmin;
            $user->save();
        }
        return back();
    }

    /**
     * Destroys given user
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if(Auth::user()->id != $user->id){
            $user->delete();
        }
        return back();
    }
}
