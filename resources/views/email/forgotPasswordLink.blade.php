@extends('front.layouts.app')
@section('content')
<div class="container">
    <div class="tabsLOginRegister">
        <div class="headingTabs">
            <h6>Forgot Password</h6>
            <p>You can recover your password!</p>
        </div>
        <div class="tabSet">
            <form action="{{ route('reset.password.post') }}" method="post">
                @csrf
              <div id="Customer" class="loginDiv">
                  <div class="forming">
                      <label>Email</label>
                      <input type="email" name="email"/>
                  </div>
                  @error('email')
                     <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="forming">
                      <label>Password</label>
                      <input type="password" name="password"/>
                  </div>
                  @error('password')
                     <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="forming">
                      <label>Confirm Password</label>
                      <input type="password" name="confPassword"/>
                  </div>
                  @error('confPassword')
                     <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <button type="submit">Submit</button>
              </div>
            </form>
        </div>
        <!--tabs set close-->
    </div>
    <!--tabsLOginRegister close-->
</div>
@endsection