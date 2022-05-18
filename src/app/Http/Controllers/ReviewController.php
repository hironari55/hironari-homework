<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        $totalReview = [];
        foreach ($reviews as $review) {
            $totalReview[] = $review->evaluation;
        }
        dd($reviews);
        return view('index');
    }

    public function form()
    {
        return view('form');
    }

    public function search()
    {
        return view('search');
    }
}
