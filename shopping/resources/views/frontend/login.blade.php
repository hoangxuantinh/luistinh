@extends('frontend.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/login/main.css') }}">
    
@endsection

@section('content')

<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->


    
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Sign In</h5>
              <form class="form-signin" action="{{ route('post-login') }}">
                @csrf
                <div class="form-label-group">
                  <input type="email" name="emmail" class="form-control" placeholder="Email address" required >
                  <label >Email address</label>
                </div>
  
                <div class="form-label-group">
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                  <label >Password</label>
                </div>
  
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label name="remember" for="customCheck1">Remember password</label>
                  <a href="" class="ml-5">Forgot Password</a>
                </div>
                
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                <hr class="my-4">
              </form>
            </div>
          </div>
        </div>
      </div>

  
    
@endsection