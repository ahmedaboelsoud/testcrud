@extends('template.layout')
@section('css')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> --}}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ route('articles.create') }}">Add</a>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($articles as $index=>$item)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->details }}</td>
                <td><img src="{{ $item->image_path }}" style="width: 100px"  class="img-thumbnail" alt=""></td>
                <td>
                    <form action="{{ route('articles.destroy',$item->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('articles.edit',$item->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-md btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $articles->appends(Request::all())->links() !!}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
@endsection
