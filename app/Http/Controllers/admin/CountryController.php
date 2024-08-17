<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;



class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        //check quyen login
        $this->middleware('auth');
    }
    public function checkcountry(){
        $userId = Auth::id();
        $user = User::select('address', 'id_country')->findOrFail($userId);
    // dd($user);
        return view('admin.country.country', ['user' => $user]);
    }
    
   
    public function delete(Request $request){
        $userID = Auth::id();
        $user = User::findOrFail($userID);
        if($user->address !== null){
            $user->id_country = null;
            $user->address = null;
            if($user->save()){
                return redirect()->back()->with('success', __('User deleted successfully.'));
            } else {
                return redirect()->back()->withErrors('Failed to delete user.');
            }
        }

    }
    public function check_createcountry(){
        return view ('admin.country.create_country');   
    }
    
    
   
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_country(Request $request)
    {
        // Lấy người dùng hiện tại và cập nhật cột address
        $user = Auth::user();
        $user->address = $request->country;
        $user->id_country = $request->id_country;
        $user->save();

        return redirect()->back()->with('success', 'Cập nhật thành công!');
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
