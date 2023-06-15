<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookRecord extends Controller
{
    public function index()
    {
        $data = [];
        $books = Book::latest()->paginate(3);
        $data['books'] = $books;
        return view('index', $data);
    }

    public function addBook()
    {
        return view('addBook');
    }

    public function storeBook(Request $request)
    {
        $request->validate([
            'book_name' => 'required|max:150|unique:books',
            'book_price' => 'required',
            'book_description' => 'max:300',
            'book_image' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('book_image')){
            $imageName = $request->file('book_image')->store('bookImages','public');
        }

        $book = new Book;
        $book->book_name = $request->book_name;
        $book->book_price = $request->book_price;
        $book->book_description = $request->book_description;
        $book->book_image = $imageName;
        $book->save();
        return redirect('/')->withSuccess('Book Record Added Successfully!');
    }

    public function editBook($id)
    {
        $date = [];
        $book = Book::where('id',$id)->first();
        $data['book'] = $book;
        return view('editBook', $data);
    }

    public function updateBook(Request $request, $id)
    {
        $book = Book::where('id',$id)->first();
        $book->book_name = $request->book_name;
        $book->book_price = $request->book_price;
        $book->book_description = $request->book_description;
        $book->save();
        return redirect('/')->withSuccess('Book Record Updated Successfully!');
    }

    public function deleteBook($id)
    {
        $book = Book::where('id',$id)->first();
        $book->delete();
        return redirect('/')->withSuccess('Book Record Deleted Successfully!');
    }
}
