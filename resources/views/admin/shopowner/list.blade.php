@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Shop Owner List</h1>
                </div>
                <div class="col-sm-6">
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('customer.list') }}" class="form-inline float-sm-right">
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control form-control-navbar" value="{{ $search }}" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of Shop Owners</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($shopowners as $shopowner)
                                    <tr>
                                        <td>{{ $shopowner->name }}</td>
                                        <td>{{ $shopowner->email }}</td>
                                        <td>{{ $shopowner->phone }}</td>
                                        <td>{{ $shopowner->state }}</td>
                                        <td>{{ $shopowner->city }}</td>
                                        <td>{{ $shopowner->country }}</td>
                                        <td>
                                            {{ $shopowner->status == 'Active' ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.shop.owner', $shopowner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('destroy.shop.owner', $shopowner->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No shopowners found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- Pagination Links -->
                            {{ $shopowners->links() }}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
@endsection
