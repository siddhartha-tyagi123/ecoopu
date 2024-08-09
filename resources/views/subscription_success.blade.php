@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success">
                        Subscription purchase successfully!
                    </div>

                    <!-- Back Button -->
                     @if(auth()->user()->role == 2)
                    <a href="{{ route('shop.owner.dashboard') }}" class="btn btn-primary">
                        Back
                    </a>
                    @else
                    <a href="{{ route('customer.dashboard') }}" class="btn btn-primary">
                        Back
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
