<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminPageController extends Controller
{
    /**
     * @return object
     */
    public static function displayUserAll(): object
    {
        return UserModel::all();
    }
    /**
     * @param integer $id
     * @return void
     */
    public function editUser(int $id): object
    {
        $editID = UserModel::find($id);
        return view('admin_template.admin-update-page')->with('editUser', $editID);
    }
    /**
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function updateUser(Request $request, int $id): object
    {
        $update = UserModel::find($id);
        $update->username = $request->username;
        $update->password = $request->password;
        $update->phone = $request->phone;
        $update->email = $request->email;
        $update->user_role = $request->user_role;

        if ($request->hasFile('user_img')) {
            $oddFile = 'uploads/user_upload/' . $update->user_img;
            if (File::exists($oddFile)) {
                File::delete($oddFile);
            }

            $file = $request->file('user_img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/user_upload/'), $filename);
            $update->user_img = $filename;
        }

        $update->update();
        return redirect('/admin-update-page')->with('status', 'update success');
    }
    /**
     * @param integer $id
     * @return void
     */
    public function deleteUser(int $id): object
    {
        ($id !== 0) ? UserModel::destroy($id) : '';
        return redirect('/admin-update-page');
    }
    /**
     * @return object
     */
    public function backPage(): object
    {
        return view('admin_template.admin-page')->with('userData', self::displayUserAll());
    }
    /**
     * @return void
     */
    public function adminLogout()
    {
        session()->forget('admin-info');
        return redirect('/index');
    }
}
