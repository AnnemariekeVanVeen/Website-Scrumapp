<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Profile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * UserController constructor with specified middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is.admin')->only('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $user = Auth::user();

        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $profile = new Profile;
        $profile->user_id = Auth::user()->id;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->programming_experience = $request->programming_experience;
        $profile->scrum_experience = $request->scrum_experience;

        $profile->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function show($user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->is_admin = $request->is_admin;
        if (!empty($request->password)):
            $user->password = Hash::make($request->password);
        endif;

        if ($user->save()):
            session()->flash('msg', 'Profile settings were updated successfully');
        else:
            session()->flash('alert', 'Updating profile settings failed');
        endif;

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        if (Auth::user()->is_admin):
            return redirect()->back();
        else:
            return redirect()->route('welcome');
        endif;
    }

    /**
     * Show view with all users.
     *
     * @return View
     */
    public function admin()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }
}
