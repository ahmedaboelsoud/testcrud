@extends('template.layout')
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Add New Category</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('category') }}"> Back</a>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Name">categories :</label>
            <select class="form-control" name="category_id">
                @if($categories)
                 @foreach($categories as $key=>$category)
                  <option value="{{ $key }}">{{ $category }}</option>
                 @endforeach 
                @endif 
            </select>
        </div>
        <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" id="Name" placeholder="Enter Name" name="name">
        </div>
        <div class="form-group">
            <label for="Details">Details:</label>
            <textarea  id="Name" class="form-control" name="details"></textarea>
        </div>
        <div class="form-group">
            <label for="Name">Image : </label>
            <input 
             type="file" 
             name="image" 
             id="inputImage"
             class="form-control @error('image') is-invalid @enderror">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection

