@extends('admin.layouts.app');
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add User</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('user.registeration') }}" enctype="multipart/form-data">
                            <input type="hidden" name="isAdmin" value="1">
                                @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter phone">
                                </div>
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password">
                                </div>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    <input type="text" name="confPassword" class="form-control" id="exampleInputEmail1" placeholder="Enter password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Role</label>
                                    <select class="form-control" name="role" id="">
                                        <option value="">Select Role</option>
                                        <option value="1">Admin</option>
                                        <option value="4">Manager</option>
                                    </select>
                                </div>
                                @error('role')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </form>
                    </div>
                        <!-- /.card -->
                        <!-- /.card -->
                </div>
                    <!--/.col (right) -->
            </div>
                <!-- /.row -->
        </div>
            <!-- /.container-fluid -->
    </section>
</div>
@endsection