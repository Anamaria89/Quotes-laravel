@extends('frontend.layout.main')

@section('seo-title')
<title>Create quote</title>
@endsection

@section('custom-css')
<!-- Custom styles for this page -->

@endsection

@section('content')
<div class="container">
    <h3 class="col-md-6 offset-md-3 text-center pb-4 pt-3">Add Your Quote!</h3>
    <div class="col-md-6 offset-md-3 pl-0">
        <form action="{{ route('quotes.store') }}" method="post" >
            @csrf
            <div class="form-group">

                <label>Choose a category</label>
                <div class="col-md-4 pl-0">
                    <select name='category_id' class="form-control  c-square c-theme">
                        @if(count($categories) > 0)
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}"> {{$category->name}} </option>
                        @endforeach
                        @endif
                    </select>
                </div>

                @if($errors->has('category_id'))
                <div class='text text-danger'>
                    {{ $errors->first('category_id') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label >Type your quote</label>
                <input type="text" name='text' value='{{ old("text") }}' class="form-control">
                @if($errors->has('text'))
                <div class='text text-danger'>
                    This field is required.
                </div>
                @endif
            </div>
            <div class="form-group col-md-8 pl-0">
                <label >Author</label>
                <input type="author" name='author' value='{{ old("author") }}' class="form-control">
                @if($errors->has('author'))
                <div class='text text-danger'>
                    {{ $errors->first('author') }}
                </div>
                @endif
            </div>
            <div class="form-group ">
                <button type='submit' class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('custom-js')
<!-- Custom styles for this page -->

@endsection
