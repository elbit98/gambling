<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdministrationRequest;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Administration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{

    public function login()
    {

        $user = Auth::user();

        if ($user != null)  {
            if ($user->role == 1) return redirect()->route('admin.users.index');
        }

        return view('admin.login');

    }

    public function handlerLogin(AdminRequest $request)
    {

        $login    = $request->login;
        $password = $request->password;

        $user = Admin::where('login', $login)->first();

        if (is_null($user))  {
            return Redirect::back()->with('errorFlashLogin', 'Не верный логин!');
        } else {

            if (!Hash::check($password, $user->password)) {
                return Redirect::back()->with('errorFlashPassword', 'Не верный пароль!');
            }

            Auth::loginUsingId($user->id, TRUE);

            $user = Auth::user();

            if ($user != null)  {
                if ($user->role == 1) return redirect()->route('admin.users.index');
            }
        }

    }

}
