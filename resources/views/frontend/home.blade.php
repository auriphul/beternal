@extends("frontend.layouts.layout")
@section("title","Welcome")

@section("content")
<div class="container-fluid bg index-back">
    <div class="d-flex pt-5">
        <div class="col text-center">
            <a href="./create-upload-media.html"><img class="play-img" src="/assets/images/play.svg" /></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 offset-lg-5 text-center">
            <a href="./create-upload-media.html" class="btn btn-primary arial-bold btn-get">
                GET STARTED
            </a>
        </div>
    </div>
</div>
@endsection