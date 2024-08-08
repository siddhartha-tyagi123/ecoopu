@extends('front.layouts.app')
@section('content')
<div class="container">
    <div class="tabsLOginRegister">
        <div class="headingTabs">
            <h6>Register</h6>
            <p>Your are Registering as a Customer!</p>
        </div>
        <div class="tabSet">
            <div class="tabButtons">
                <button class="activeTab" onclick="switchTab('customer','register',this)">Customer</button>
                <button onclick="switchTab('shop','register',this)">Shop Owner</button>
            </div>
            <div id="Customer" class="loginDiv">
                <form action="{{ route('user.registeration') }}" method="post">
                    @csrf
                    <div class="forming">
                        <label>Name</label>
                        <input type="text" name="name"/>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="forming">
                        <label>Email</label>
                        <input type="email" name="email"/>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="forming">
                        <label>Phone</label>
                        <input type="text" name="phone"/>
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="forming">
                        <label>Password</label>
                        <input type="password" name="password" />
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="forming">
                        <label>Confirm Password</label>
                        <input type="password" name="confPassword"/>
                        @error('confPassword')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="role" value='3'>
                    <button type="submit">Register</button>
                </form>
            </div>
            <div id="Shop" class="loginDiv" style="display:none">
                <form action="{{ route('owner.registeration') }}" method="post">
                    @csrf
                    <div class="forming">
                        <label>Shop Name</label>
                        <input type="text" name="name"/>
                    </div>
                    <div class="forming">
                        <label>Email</label>
                        <input type="email" name="email"/>
                        @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="forming">
                        <label>Phone</label>
                        <input type="text" name="phone"/>
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="forming">
                        <label>Password</label>
                        <input type="password" name="password"/>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="forming">
                        <label>Confirm Password</label>
                        <input type="password" name="confPassword"/>
                        @error('confPassword')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- <div class="forming">
                        <label>Address</label>
                        <textarea></textarea>
                    </div> -->
                    <!-- <div class="forming checkingBox">
                        <input type="checkbox"><label>Enter new address</label>
                        <section> -->
                             <div class="forming">
                                <label>Country/Region</label>
                                <select name="country">
                                    <option value="">Select Country</option>
                                    <option value='germany'>Germany</option>
                                    <option value="denmark">Denmark</option>
                                </select>
                                @error('country')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="forming">
                                <label>City</label>
                                <input type="text" name="city"/>
                                @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="forming">
                                <label>State</label>
                                <input type="text" name="state"/>
                                @error('state')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="forming">
                                <label>Zipcode</label>
                                <input type="text" name="zipcode"/>
                                @error('zipcode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="forming">
                                <label>Address Line 1</label>
                                <input type="text" name="address_1"/>
                                @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="forming">
                                <label>Address Line 2</label>
                                <input type="text" name="address_2"/>
                            </div>
                        <!-- </section>
                    </div> -->
                    <h6>Tax Details</h6>
                    <div class="forming checkingBox">
                        <!-- <input type="checkbox"><label>I have GSTIN number</label>
                        <section> -->
                            <div class="forming">
                                <label>TIN</label>
                                <input type="text" name ="tin"/>
                                @error('tin')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <!-- </section>
                    </div> -->
                    <!-- <div class="forming checkingBox">
                        <label><input type="checkbox">I do not have GSTIN number</label>
                    </div> -->
                    <input type="hidden" name="role" value='2'>
                    <button type="submit">Register</button>
                </form> 
            </div>
        </div>
        <!--tabs set close-->
    </div>
    <!--tabsLOginRegister close-->
</div>
@endsection