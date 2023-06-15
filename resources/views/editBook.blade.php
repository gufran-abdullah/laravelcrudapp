@extends('layouts.base')
@section('main')
	<div class="container my-5">
		<h2>Update Books</h2><hr>
		<a href="/" class="btn btn-info btn-sm">Back</a><hr>
		<div class="row">
			<div class="col-sm-6">
				<form method="POST" action="/book-update/{{$book->id}}">
					@csrf
					@method('put')
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<label for="bookname">Book Name</label>
								<input type="text" name="book_name" class="form-control" value="{{$book->book_name}}" autofocus>
							</div>
							<div class="form-group">
								<label for="bookprice">Book Price</label>
								<input type="text" name="book_price" class="form-control" value="{{$book->book_price}}">
							</div>
							<div class="form-group">
								<label for="bookdescription">Book Description</label>
								<textarea name="book_description" class="form-control" cols="5" rows="5">{{$book->book_description}}</textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-info btn-sm my-2">Update Record</button>
							</div>
						</div>
					</div>							
				</form>
			</div>
		</div>
	</div>
@endsection