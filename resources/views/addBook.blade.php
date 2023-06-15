@extends('layouts.base')
@section('main')
	<div class="container my-5">
		<h2>Add Books</h2><hr>
		<a href="/" class="btn btn-info btn-sm">Back</a><hr>
		<div class="row">
			<div class="col-sm-6">
				<form method="POST" action="/book-store" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<label for="bookname">Book Name</label>
								<input type="text" name="book_name" class="form-control" value="{{old('book_name')}}" autofocus>
								@if ($errors->has('book_name'))
									<p class="text-danger">{{$errors->first('book_name')}}</p>
								@endif
							</div>
							<div class="form-group">
								<label for="bookprice">Book Price</label>
								<input type="text" name="book_price" class="form-control" value="{{old('book_price')}}">
								@if ($errors->has('book_price'))
									<p class="text-danger">{{$errors->first('book_price')}}</p>
								@endif
							</div>
							<div class="form-group">
								<label for="bookdescription">Book Description</label>
								<textarea name="book_description" class="form-control" cols="5" rows="5">{{old('book_description')}}</textarea>
								@if ($errors->has('book_description'))
									<p class="text-danger">{{$errors->first('book_description')}}</p>
								@endif
							</div>
							<div class="form-group">
								<label for="book_image">Book Image</label>
								<input type="file" name="book_image" class="form-control">
								@if ($errors->has('book_image'))
									<p class="text-danger">{{$errors->first('book_image')}}</p>
								@endif
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-info btn-sm my-2">Add Record</button>
							</div>
						</div>
					</div>							
				</form>
			</div>
		</div>
	</div>
@endsection