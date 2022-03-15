@extends('template.layout')
@section('content')
    <div class="row">
        <div class="col-lg-11">
            
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('categories') }}"> Back</a>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('articles.update',$article->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" id="Name" placeholder="Enter Name" name="name" value="{{ $article->name }}">
        </div>
        <div class="form-group">
            <label for="Details">Details:</label>
            <textarea rows="6" class="form-control" id="Details" name="details"> {{ $article->details }} </textarea>
        </div>
        <div class="form-group">
            <label for="Name">Name:</label>
            <img src="{{ $article->image_path }}" style="width: 100px"  class="img-thumbnail" alt="">
            <input  value="{{ $article->image }}" name="hidden_image" hidden/>
            <input 
             type="file" 
             name="image" 
             id="inputImage"
             class="form-control @error('image') is-invalid @enderror">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection