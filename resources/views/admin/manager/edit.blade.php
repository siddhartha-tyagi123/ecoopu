@extends('admin.layouts.app');
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Manager</h1>
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
                        <form method="post" action="{{ route('update.manager', $manager->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        value="{{ $manager->name}}" placeholder="Enter name">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        value="{{ $manager->email }}" placeholder="Enter email">
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                                        value="{{ $manager->phone }}" placeholder="Enter phone">
                                </div>
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password">
                                </div>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    <input type="text" name="confPassword" class="form-control" id="exampleInputEmail1" placeholder="Enter password">
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="2"
                                            {{ $manager->role == 2 ? 'selected' : '' }}>Shop Owner</option>
                                        <option value="3"
                                            {{ $manager->role == 3 ? 'selected' : '' }}>Customer</option>
                                        <option value="4" 
                                        {{ $manager->role == 4 ? 'selected' : '' }}>Manager</option>
                                    </select>
                                </div>
                                @error('role')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Active"
                                            {{ $manager->status == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive"
                                            {{ $manager->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>

                                </div>
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