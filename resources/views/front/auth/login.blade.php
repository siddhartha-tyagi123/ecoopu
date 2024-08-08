@extends('front.layouts.app')
@section('content')
<div class="container">
    <div class="tabsLOginRegister">
        <div class="headingTabs">
            <h6>Login</h6>
            <p>Your are Signing as a Customer!</p>
        </div>
        <div class="tabSet">
            <div class="tabButtons">
                <button class="activeTab" onclick="switchTab('customer', 'login', this)">Customer</button>
                <button onclick="switchTab('shop', 'login', this)">Shop Owner</button>

            </div>
            <form action="{{ route('login.post') }}" method="post">
                @csrf
                <div id="Customer" class="loginDiv">
                    <div class="forming">
                        <label>Email</label>
                        <input type="text" name="email" />
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="forming">
                        <label>Password</label>
                        <input type="password" name="password" />
                    </div>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="forming checkingBox">
                        <label><a href="{{ route('forgot.password.get') }}">Forgot password?</a></label>
                    </div>
                    <button type="submit">Login</button>
                </div>
            </form>
            <div id="Shop" class="loginDiv" style="display:none">
                <form action="{{ route('login.post') }}" method="post">
                    @csrf
                    <div class="forming">
                        <label>Email</label>
                        <input type="text" name="email" />
                    </div>
                    <div class="forming">
                        <label>Password</label>
                        <input type="password" name="password" />
                    </div>
                    <div class="forming">
                        <label><a href="{{ route('forgot.password.get') }}">Forgot password?</a></label>
                    </div>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
        <!--tabs set close-->
    </div>
    <!--tabsLOginRegister close-->
</div>
@endsection