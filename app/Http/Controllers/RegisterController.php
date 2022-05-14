<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * @return object
     */
    public function index(): object
    {
        return view('user_template.register');
    }
    /**
     * @param Request $request
     * @return object
     */
    public function formRegister(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'phone' => 'required|max:10',
            'email' => 'required',
            'user_role' => 'required'
        ]);

        $password_duplicate = UserModel::where('password', $request->password)->get();

        if (!empty($password_duplicate[0]->password)) {
            return redirect('/register')->with('status', 'password is duplicate!');
        } else {
            if ($request->hasFile('user_img')) {
                $file = $request->file('user_img');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('uploads/user_upload/'), $filename);
                //
                UserModel::create([
                    'username' => $request->username,
                    'password' => $request->password,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'user_role' => $request->user_role,
                    'user_img' => $filename
                ]);
            }

            return redirect('/index')->with('status', 'register is successfully');
        }
    }
}
