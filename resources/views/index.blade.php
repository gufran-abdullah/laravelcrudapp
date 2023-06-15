@extends('layouts.base')
@section('main')
    <div class="container my-5">
        <h2>Books Record</h2><hr>
        <a href="/add-book" class="btn btn-info btn-sm">Add Book Record</a><hr>
        @if (session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Sr.#</th>
                    <th>Book Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Book Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$book->book_name}}</td>
                        <td>{{$book->book_price}}</td>
                        <td>{{$book->book_description}}</td>
                        <td><img src="{{Storage::url($book->book_image)}}" alt="{{$book->book_name}} image" style="width:50px;height:50px;border-radius:50%;"></td>
                        <td>
                            <a href="/edit-book/{{$book->id}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="/book-delete/{{$book->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?');">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$books->links('pagination::bootstrap-5')}}
    </div>
    @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                // show the alert
                setTimeout(function() {
                    $(".alert").alert('close');
                }, 2000);
            });
        </script>
    @endsection
@endsection 
