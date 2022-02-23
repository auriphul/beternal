<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string','min:3', 'max:255'],
            'last_name' => ['required', 'string','min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','digits_between:5,14'],
            'address' => ['required', 'string','min:5', 'max:255'],
            'image' => 'image|mimes:jpeg,png,jpg,svg,bmp',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if(request()->file('image')){
            // dd('is image');
            $image = request()->file('image');
            $image_new =time().$image->getClientOriginalName();
            $image->move('media/image/',$image_new);
            $image_new  =   'media/image/'.$image_new;
        }else{
            // dd('not image');
            $image_new  =   'media/image/default.png';
        }

        $user = User::create([
            'name'              =>  $request->name,
            'last_name'         =>  $request->last_name,
            'email'             =>  $request->email,
            'phone_number'      =>  $request->phone,
            'address'           =>  $request->address,
            'role_id'           =>  2,
            'profile_image'     =>  $image_new,
            'password'          =>  Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('user.profile');
    }
}
