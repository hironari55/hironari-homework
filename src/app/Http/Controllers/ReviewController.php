<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $macReviews = Restaurant::find(1)->reviews()->get();
        $mosReviews = Restaurant::find(2)->reviews()->get();
        $kentuckyReviews =  Restaurant::find(3)->reviews()->get();

        $macAverageRating = $this->calculateAverageReview($macReviews);
        $mosAverageRating = $this->calculateAverageReview($mosReviews);
        $kentuckyAverageRating = $this->calculateAverageReview($kentuckyReviews);

        return view('index', [
            'macAverageRating' => $macAverageRating,
            'mosAverageRating' => $mosAverageRating,
            'kentuckyAverageRating' => $kentuckyAverageRating,
        ]);
    }

    public function form()
    {
        return view('form');
    }

    public function search()
    {
        return view('search');
    }

    private function calculateAverageReview($eachReviews)
    {
        $totalReview = [];
        foreach ($eachReviews as $eachReview) {
            $totalReview[] = $eachReview->evaluation;
        }
        if (count($eachReviews) === 0) {
            return 0;
        } else {
            return array_sum($totalReview) / count($eachReviews);
        }
    }
}
