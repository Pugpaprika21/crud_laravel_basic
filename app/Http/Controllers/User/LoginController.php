<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

enum LoginRole: string
{
    case ADMIN = 'admin';
    case USER = 'user';
}

class LoginController extends Controller
{
    /**
     * @return object
     */
    public function index(): object
    {
        return view('index');
    }
    /**
     * @param Request $request
     * @return object
     */
    public function loginForm(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $loginCheck = UserModel::where('username', '=', $request->username)
            ->where('password', '=', $request->password)
            ->where('user_role', '=', $request->user_role)->first();

        if (!empty($loginCheck)) {

            if ($loginCheck->user_role == LoginRole::ADMIN->value) {

                session(['admin-info' => (object)[
                    'id' => $loginCheck->id,
                    'username' => $loginCheck->username,
                    'password' => $loginCheck->password,
                    'user_role' => $loginCheck->user_role
                ]]);

                return $this->toPage($loginCheck->user_role);
                
            } else if ($loginCheck->user_role == LoginRole::USER->value) {

                session(['user-info' => (object)[
                    'id' => $loginCheck->id,
                    'username' => $loginCheck->username,
                    'password' => $loginCheck->password,
                    'user_role' => $loginCheck->user_role
                ]]);

                return $this->toPage($loginCheck->user_role);
            }
        }
    }
    /**
     * @param string $page
     * @return object
     */
    public function toPage(string $page)
    {
        if ($page == LoginRole::ADMIN->value) {

            return (session('admin-info')->user_role == LoginRole::ADMIN->value)
                    ? view('admin_template.admin-page')->with('userData', AdminPageController::displayUserAll()) 
                    : redirect('/index')->with('role', 'please login');

        } else if ($page == LoginRole::USER->value) {

            return (session('user-info')->user_role == LoginRole::USER->value)
                ? view('user_template.user-page')->with('userProfile', UserPageController::userProfile())
                : redirect('/index')->with('role', 'please login');
        }
    }
}
