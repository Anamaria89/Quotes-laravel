@extends('frontend.layout.main')

@section('seo-title')
<title>Quotes</title>
@endsection

@section('custom-css')
<!-- Custom styles for this page -->

@endsection

@section('content')
<div class="container">
    <h1 class="title col-md-4 offset-4">All Quotes</h1>
    <div class="card-body col-md-4 offset-4">
          @if(count($quotes) > 0)
                @foreach($quotes as $value)
                    <h3 class=''>{{ $value->text }}</h3>
                    <h4>Words by : {{ $value->author }}</h4> 
                    <div>Category : {{ $value->category->name }}</div> 
                    <a href="{{ route('quotes.edit', ['quote' => $value->id]) }}" ><button class="btn btn-info mt-3 mr-3 mb-3" >Edit</button></a><a href="{{ route("quotes.delete", ["quote" => $value->id]) }}"><button class="btn btn-danger mt-3 mb-3">Delete</button></a>
                    <hr>
                @endforeach
          @endif
    </div>
</div>
@endsection

@section('custom-js')
<!-- Custom styles for this page -->

@endsection