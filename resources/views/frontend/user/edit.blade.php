@extends("frontend.layouts.layout")
@section("title","My Profile")

@section("content")

<div class="container-fluid payment-back-mob accont-padding-top">
    <div class="scroll-div">
       <div class="row">        
            <div class="col-lg-3"></div>       
                <div class="col-lg-6">
                    <form method="POST" action="{{route('user.profile.update')}}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf

                        @if(Session()->has('update'))
                        <br>
                            <div class="alert alert-info" role="alert" style="font-size: 18px; height: 45px; padding-left:250px;">
                                {{Session::get('update')}}
                            </div>
                        @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="mt-4 account-head text-center text-white">Edit AN ACCOUNT</h4>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="text-center">
                                {{-- <img src="./images/recipent.png" class="image-upload mb-2" />s --}}
                                <img src="@if(Auth::user()->profile_image){{asset( Auth::user()->profile_image) }}@else{{ asset('/assets/media/image/default.png') }}@endif" id="output" value="{{ Auth::user()->image }}" class="image-upload mb-2" style="border-radius: 100%" />
                                <a class="mt-5 cl-white upload upload-web px-3">
                                    <label class="icon-upload" for="file">&nbsp;&nbsp;Upload Image</label>
                                    <input type="file" accept="image/*" name="image" id="file" value="{{ Auth::user()->image }}" onchange="loadFile(event)" style="display: none;">                                  
                                </a>                                     
                                  
                                <script>
                                    var loadFile = function(event) {
                                      var image = document.getElementById('output');
                                      image.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>
                                @if($errors->has('image'))
                                    <div class="error">{{ $errors->first('image') }}</div>
                                @endif  
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                    <div class="row mt-2 row-height">
                        <div class="col-lg-6 mt-2">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text input-back account-label" id="basic-addon2">First Name</span>
                                </div>
                                <input id="name" name="name" type="text" value="{{ old('name') ?? Auth::user()->name }}" class="form-control text-end" aria-describedby="basic-addon1" required/>
                                @if($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text input-back account-label" id="basic-addon2">Last Name</span>
                                </div>
                                <input id="last_name" name="last_name" type="text" value="{{ old('last_name') ?? Auth::user()->last_name }}" class="form-control text-end" aria-describedby="basic-addon1" required/>
                                @if($errors->has('last_name'))
                                    <div class="error">{{ $errors->first('last_name') }}</div>
                                @endif  
                            </div>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text input-back account-label" id="basic-addon2">Email</span>
                                </div>
                                <input id="email" name="email" type="email" value="{{ old('email') ?? Auth::user()->email }}" class="form-control text-end" aria-describedby="basic-addon1" required />
                                @if($errors->has('email'))
                                    <div class="error">{{ $errors->first('email') }}</div>
                                @endif               
                            </div>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text input-back account-label" id="basic-addon2" >Phone Number</span>
                                </div>
                                <input id="phone" name="phone" type="text" value="{{ old('phone_number') ?? Auth::user()->phone_number }}" class="form-control text-end" aria-describedby="basic-addon1" required/>
                                @if($errors->has('phone_number'))
                                    <div class="error">{{ $errors->first('phone_number') }}</div>
                                @endif  
                            </div>
                        </div>
                        <!-- <div class="col-lg-3"></div> -->
                        <div class="col-lg-12 mt-2">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text input-back account-label" id="basic-addon2">Address</span>
                                </div>
                                <input id="address" name="address" type="text" value="{{ old('address') ?? Auth::user()->address }}" class="form-control text-end" aria-describedby="basic-addon1" required/>
                                @if($errors->has('address'))
                                    <div class="error">{{ $errors->first('address') }}</div>
                                @endif  
                            </div>
                        </div>
                        <!-- <div class="col-lg-3"></div> -->
                        <div class="col-lg-6 mt-2">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text input-back account-label" id="basic-addon2" >Password</span>
                                </div>
                                <input id="password" name="password" type="password" value="{{ old('password') }}" class="form-control text-end" old autocomplete="new-password"  aria-describedby="basic-addon1" />
                                @if($errors->has('password'))
                                    <div class="error">{{ $errors->first('password') }}</div>
                                @endif  
                            </div>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text input-back account-label" id="basic-addon2" >Confirm Password</span>
                                </div>
                                <input id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" class="form-control text-end" autocomplete="new-password"  aria-describedby="basic-addon1" /> 
                                @if($errors->has('password_confirmation'))
                                    <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3"></div>
                            <div class="col-lg-6 text-center mb-5">

                                <div  class=" btn btn-contin w-100 bg-primary m-auto" >
                                    <button type="submit" class="btn btn-primary p-1" style="font-size: 12px; color:black; background:none; border:10px; width:100%">
                                        {{ __('CONTINUE') }}
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
            </form>
            <div class="col-lg-3"></div>
        </div>     
    </div>
</div>
@endsection