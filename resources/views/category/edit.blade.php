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
    <form method="post" action="{{ route('categories.update',$category->id) }}" >
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" id="Name" placeholder="Enter Name" name="name" value="{{ $category->name }}">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection