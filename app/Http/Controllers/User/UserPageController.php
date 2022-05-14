<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserPageController extends Controller
{
    /**
     * @return void
     */
    public static function userProfile(): object
    {
        return UserModel::find(session('user-info')->id);
    }
    /**
     * @return void
     */
    public function userLogout(): object {
        session()->forget('user-info');
        return redirect('/index');
    }
}
