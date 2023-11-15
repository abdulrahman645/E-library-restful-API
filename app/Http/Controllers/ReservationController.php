<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct() {
        $this->middleware('auth:api')->except(['index','show']);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        $bookId = $id;
        $book = Book::find($id);
        if (!($book))
        {
            return response()->json([
                "status" => "error",
                "message" => "there is no book with this id"
            ],422);
        }
        $userId = $request->user()->id;
        if ($book->quantity_reservation == 0) {
            return response()->json([
                "meesage" => "the book is unavailable for sell now"
            ]);
        }
        if ($request->user()->balance < $book->price) {
            return response()->json([
                "message" => "you don't have enough point"
            ]);
        }

        $book->quantity_reservation--;
        $book->save();
        $request->user()->balance -= $book->price;
        $request->user()->frozen_balance += $book->price;
        $request->user()->save();
        Reservation::create([
            'book_id' => $bookId,
            'user_id' => $userId,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'reservation done successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
