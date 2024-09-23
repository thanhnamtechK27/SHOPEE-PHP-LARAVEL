<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkprofile()
    {
        
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        return view('admin.user.profile', ['user' => $user]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        

        $data = $request->all();
        // hàm xem dữ liệu có gì:
        // dd($request->all());
        $file = $request->avatar;
        $user->id_country = $data['id_country'];
        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
        }
        if ($data['password'] ) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }

        // hàm xem dữ liệu có gì:
        // dd($data);

        if ($user->update($data)) {
            if (!empty($file)) {
                $file->move('upload/user/avatar', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Update profile success.'));
        } else {
            return redirect()->back()->withErrors('Update profile error.');
        }
    }
    public function logout_admin(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate();
        return redirect('/login');
    }

  

}
