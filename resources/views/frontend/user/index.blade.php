@extends("frontend.layouts.layout")
@section("title","My Profile")
@section("content")
    <div class="container-fluid bg-create account-back scroll-height-mobile mobile-padding">
        <div class="scroll-div">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 mt-5 mb-3 bg-white edit text-center">
                    <div class="row">
                        <div class="col-lg-6 col-10 text-start">
                            <p style="color: #fff" class="acc-black">
                                ACCOUNT PROFILE
                            </p>
                        </div>
                        <div class="col-lg-6 col-2 text-end">
                            <a href="{{ route('user.profile.edit') }}" class="icon-edit">
                                <img class="mt-2 img-edit" src="{{ asset('/assets/images/edit.png')}}"/>
                            </a>
                        </div>
                    </div>
                    <img class="acc-img" style="border-radius: 100%;" src="@if(Auth::user()->profile_image){{ asset( Auth::user()->profile_image )}}@else{{ asset('/assets/images/recipent.png') }}@endif" />
                    <p class="head1">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</p>
                    <p class="head2">{{ Auth::user()->email }}</p>
                    <p class="mb-2 head3">{{ Auth::user()->phone }}</p>
                    <a href="{{ route('user.profile.edit') }}" class="btn btn-primary arial-bold btn-upgrade">
                    Upgrades
                    </a>
                </div>

                <div class="pt-5 newbuttoons">
                    <div class="col-12">
                        <a href="#">
                            <p class="m-0" style="color: black; float: left">
                                <img src="./images/notification.svg"  class="profile-icon" /> 
                                <span style="font-size:18px; font-weight: bold" >NOTIFICATION</span>
                            </p>
                        </a>
                        <a href="#">
                            <p class="m-0" style="color: black; float: left">
                                <img src="./images/privacy-policy.svg" class="profile-icon" /> 
                                <span style="font-size:18px; font-weight: bold">PRIVACY POLICY</span>
                            </p>
                        </a>
                        <a href="#">
                            <p class="m-0" style="color: black; float: left">
                                <img src="./images/terms.svg" class="profile-icon" /> 
                                <span class="small-terms-head" style="font-size:18px; font-weight: bold">TERMS + CONDITIONS</span>
                            </p>
                        </a>
                        <a href="#">
                            <p class="m-0" style="color: black; float: left">
                                <img src="./images/support.svg" class="profile-icon" /> 
                                <span style="font-size:18px; font-weight: bold">SUPPORT/HELP</span>
                            </p>
                        </a>
                        <a href="#">
                            <p class="m-0" style="color: black; float: left">
                                <img src="./images/team.svg" class="profile-icon" /> 
                                <span style="font-size:18px; font-weight: bold">OUR TEAM</span>
                            </p>
                        </a>
                        <a href="#">
                            <p class="m-0" style="color: black; float: left">
                                <img src="./images/solution.svg" class="profile-icon" /> 
                                <span style="font-size:18px; font-weight: bold">OUR SOLUTION</span>
                            </p>
                        </a>
                        <a href="#">
                            <p class="m-0" style="color: black; float: left">
                                <img src="./images/contact.svg" class="profile-icon" /> 
                                <span class="small-terms-head" style="font-size:18px; font-weight: bold">CONTACT US</span>
                            </p>
                        </a> 
                        <a href="#">
                            <p class="m-0" style="color: black; float: left">
                                <img src="./images/about.svg" class="profile-icon" />
                                <span style="font-size:18px; font-weight: bold">ABOUT US</span>
                            </p>
                        </a>
                        <a href="#">
                            <p class="m-0" style="color: black; float: left">
                                <img src="./images/notification.svg" class="profile-icon" /> 
                                <span style="font-size:18px; font-weight: bold; color: red">LOGOUT</span>
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@endsection