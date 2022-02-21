<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class dashboardController extends Controller
{
    public function splash(){
        return view('frontend.splash.index');
    }
    public function myAccountPage(){
        return view('frontend.user.index');
    }
    public function myAccountEdit(){
        return view('frontend.user.edit');
    }
    public function myAccountUpdate(Request $request){
        // dd($resuest->all());
        
        if($request->password == null) {
            $request->validate([
                'name' => ['required', 'string','min:3', 'max:255'],
                'last_name' => ['required', 'string','min:3', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore(Auth::user()->id)],
                // 'email' => Rules::unique('users')->ignore(Auth::user()->id),
                'phone' => ['required','digits_between:5,14'],
                'address' => ['required', 'string','min:5', 'max:255'],
                'image' => 'image|mimes:jpeg,png,jpg,svg,bmp',
            ]);
        }else{
            $request->validate([
                'name' => ['required', 'string','min:3', 'max:255'],
                'last_name' => ['required', 'string','min:3', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore(Auth::user()->id)],
                'phone' => ['required','digits_between:5,14'],
                'address' => ['required', 'string','min:5', 'max:255'],
                'image' => 'image|mimes:jpeg,png,jpg,svg,bmp',
                'password' => ['confirmed', Rules\Password::defaults()],
            ]);
        }
        if(request()->file('image')){
            $image = request()->file('image');
            $image_new =time().$image->getClientOriginalName();
            $image->move('media/image/',$image_new);
            $image_new  =   'media/image/'.$image_new;
        }else{
            $image_new  =   Auth::user()->profile_image;
        }
        if(empty($request->password)){

            $user = User::where('id',Auth::user()->id)->update([
                'name'              =>  $request->name,
                'last_name'         =>  $request->last_name,
                'email'             =>  $request->email,
                'phone_number'      =>  $request->phone,
                'address'           =>  $request->address,
                'profile_image'     =>  $image_new,
            ]);
        }else{
            $user = User::where('id',Auth::user()->id)->update([
                'name'              =>  $request->name,
                'last_name'         =>  $request->last_name,
                'email'             =>  $request->email,
                'phone_number'      =>  $request->phone,
                'address'           =>  $request->address,
                'profile_image'     =>  $image_new,
                'password'          =>  Hash::make($request->password),
            ]);
        }
        // dd($resuest->all());

        // Auth::login($user);

        return redirect()->route('user.profile.update');
    }
}
