
@extends('frontend.layout.main')

@section('seo-title')
<title>Quotes</title>
@endsection

@section('custom-css')
<!-- Custom styles for this page -->

@endsection

@section('content')
<div class="container">
    <h1 class="title col-md-4 offset-4">Category Quotes</h1>
    <div class="card-body col-md-4 offset-4">
           @if(count($quotes) > 0)
                @foreach($quotes as $value)
               <h3>{{ $value->text }}</h3
               <h2>Words By : {{ $value->author }}</h2>
               <hr>
                @endforeach
          @endif
    </div>
</div>
@endsection

@section('custom-js')
<!-- Custom styles for this page -->

@endsection