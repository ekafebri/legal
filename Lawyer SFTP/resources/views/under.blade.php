@extends('layouts.app')
@section('title')
Home
@endsection
@section('css')
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- 404 Error Text -->
<div class="text-center">
  <div class="error mx-auto" data-text="500">500</div>
  <p class="lead text-gray-800 mb-5">Our Website is under construction</p>
  <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
  <a href="{{route('home')}}">&larr; Back to Dashboard</a>
</div>

</div>
<!-- /.container-fluid -->
@endsection
@section('footer')
@endsection
@section('modal')
@endsection
@section('js')
@endsection