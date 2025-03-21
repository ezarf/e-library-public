<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index()
    {
        $title = 'Hall';
        $books = Book::with(['author', 'category'])->paginate(10);

        // return dd($title);

        return view('hall', compact('title', 'books'));
    }

    public function detailBook(Book $book)
    {
        $title = $book->name;
        return dd($book);
        // return view('detail', compact('title', 'book'));
    }

    public function bookByAuthor(Author $author)
    {
        $title = 'Book by ' . $author->name;
        $books = Book::where('author_id', $author->id)->with(['author', 'category'])->paginate(10);
        // return dd($title);

        return view('hall', compact('title', 'books'));
    }

    public function bookByCategory(Category $category)
    {
        $title = 'Book of ' . $category->name;
        $books = Book::where('category_id', $category->id)->with(['author', 'category'])->paginate(10);
        // return dd($title);

        return view('hall', compact('title', 'books'));
    }
}
