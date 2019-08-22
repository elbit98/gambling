<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\GameHistory;
use App\Models\Link;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserRequest $request)
    {
        User::create(['name' => $request->name, 'phone' => $request->phone]);

        return redirect()->route('admin.users.index')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
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
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        Link::where('user_id', $user->id)->delete();
        GameHistory::where('user_id', $user->id)->delete();

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User has been deleted Successfully');
    }
}
