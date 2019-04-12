@extends('frontend.layout.main')

@section('seo-title')
<title>Quotes</title>
@endsection

@section('custom-css')
<!-- Custom styles for this page -->

@endsection

@section('content')
<div class="container">
    <h1 class="title col-md-4 offset-4">All Categories</h1>
    <div class="card-body col-md-4 offset-4">
          @if(count($categories) > 0)
                @foreach($categories as $category)
                <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="cat_link"><h3>{{ $category->name }} ({{count($category->quotes)}})</h3></a>
                    
                @endforeach
          @endif
    </div>
</div>
@endsection

@section('custom-js')
<!-- Custom styles for this page -->

@endsection