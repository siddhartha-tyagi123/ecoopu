@extends('front.layouts.app')
@section('content')
<div>
    <form action="{{ route('verification.send') }}" method='post'>
        <input type="submit" name='resend' value="Resend Mail">
    </form>
</div>
@endsection