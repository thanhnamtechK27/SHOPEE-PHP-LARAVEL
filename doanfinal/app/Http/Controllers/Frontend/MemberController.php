<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\MemberLoginRequest;
use App\Http\Requests\MemberRegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Validator;
class MemberController extends Controller
{
    // Register:
    public function showregister_fe(){
        $isLoginPage = true;
        $successMessage = session('success'); // Lấy thông báo thành công từ session
        return view ('Frontend.member.register', compact('isLoginPage', 'successMessage'));
    }
    public function register_fe(MemberRegisterRequest $request)
    {
        // Kiểm tra và lấy dữ liệu từ request đã được validate
        $validatedData = $request->validated();
        // mã hóa password:
        $validatedData['password'] = bcrypt($validatedData['password']);
        // Xử lý avatar nếu được tải lên
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = $avatar->getClientOriginalName();
            // dd($avatarName);    
            $avatar->storeAs('upload/user/avatar', $avatarName); // Lưu avatar vào thư mục
            $validatedData['avatar'] = $avatarName; // Lưu tên file avatar vào cơ sở dữ liệu
        } else {
            // Nếu người dùng không chọn avatar, bạn có thể gán giá trị null hoặc giá trị mặc định khác ở đây
            $validatedData['avatar'] = null; // hoặc $validatedData['avatar'] = 'default_avatar.jpg';
        }
        
        // Tạo thành viên mới trong cơ sở dữ liệu
        $member = User::create($validatedData);
        return redirect()->route('login_fe')->with('success', 'Đăng ký thành công! Bạn đã có thể đăng nhập.');
    }


    // Login
    // check nếu là trang login và register thì ẩn slider và left_sidebar đi:
    public function login_fe(){
        $isLoginPage = true;
        return view ('Frontend.member.login_fe', compact('isLoginPage'));
    }
    public function check_login(MemberLoginRequest $request){
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];
        // dd($login['password']);
        $remember = $request->has('remember_me');
        if(Auth::attempt($login, $remember)){
            session(['email' => $request->email]);
            return redirect('/home_fe');
        }else{
            return redirect()->back()->withErrors('Email or password is not correct.');
        }
    }
    // Logout:
    public function logout_fe(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate();
        return redirect('/login_fe');
    }

    // Account:
    
    
    public function update_fe(UpdateProfileRequest $request)
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
