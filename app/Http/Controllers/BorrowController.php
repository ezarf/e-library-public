<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function store(Request $request)
    {
        $borrowDate = Carbon::today();
        $dueDate = Carbon::today()->addDays(7);

        Borrow::create([
            "user_id" => $request->user_id,
            "book_id" => $request->book_id,
            "borrow_date" => $borrowDate,
            "due_date" => $dueDate,
            "status" => "pengajuan"
        ]);

        $book = Book::find($request->book_id);
        $book->status = 1;
        $book->save();

        return redirect('/');
    }
}
