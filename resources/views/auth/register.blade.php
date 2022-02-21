@extends("frontend.layouts.layout")
@section("title","Register")
@section("content")
<div class="container-fluid payment-back-mob accont-padding-top">
    <div class="scroll-div">
       <div class="row">        
            <div class="col-lg-3"></div>       
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="mt-4 account-head text-center text-white">CREATE AN ACCOUNT</h4>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="text-center">
                                <img src="{{ asset('/media/image/default.png') }}" id="output" class="image-upload mb-2" style="border-radius: 100%" />
                                    @if($errors->has('image'))
                                        <div class="error">{{ $errors->first('image') }}</div>
                                    @endif
                                <a class="mt-5 cl-white upload upload-web px-3">
                                    <label class="icon-upload" for="file">&nbsp;&nbsp;Upload Image</label>
                                    <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;">
                                </a> 
                                    
                                  
                                <script>
                                    var loadFile = function(event) {
                                      var image = document.getElementById('output');
                                      image.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>
             
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                    <div class="row mt-2 row-height">
                        <div class="col-lg-6 mt-2">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text input-back account-label" id="basic-addon2">Full Name</span>
                                </div>
                                <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control text-end" aria-describedby="basic-addon1" required/>  
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
                                <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" class="form-control text-end" aria-describedby="basic-addon1" required/>
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
                                <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control text-end" aria-describedby="basic-addon1" required />
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
                                <input id="phone" name="phone" type="text" value="{{ old('phone') }}" class="form-control text-end" aria-describedby="basic-addon1" required/>
                                @if($errors->has('phone'))
                                    <div class="error">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="col-lg-3"></div> -->
                        <div class="col-lg-12 mt-2">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text input-back account-label" id="basic-addon2">Address</span>
                                </div>
                                <input id="address" name="address" type="text" value="{{ old('address') }}" class="form-control text-end" aria-describedby="basic-addon1" required/>                                
                            </div>
                            @if($errors->has('address'))
                                <div class="error">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                        <!-- <div class="col-lg-3"></div> -->
                        <div class="col-lg-6 mt-2">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text input-back account-label" id="basic-addon2" >Password</span>
                                </div>
                                <input id="password" name="password" type="password" value="{{ old('password') }}" class="form-control text-end" old autocomplete="new-password"  aria-describedby="basic-addon1" required/> 
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
                                <input id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" class="form-control text-end" autocomplete="new-password"  aria-describedby="basic-addon1" required/> 
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