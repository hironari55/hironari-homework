<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    private $AverageRatings = [];
    private $numberOne = 1;
    private $RestaurantsNames = [];
    public function index()
    {
        /* それぞれのレビューの取得を関数化する */
        $allRestaurants = Restaurant::all();
        $numberOfRestaurants = count($allRestaurants);


        while ($this->numberOne <= $numberOfRestaurants) {
            $eachReviews = Restaurant::find($this->numberOne++)->reviews()->get();
            $this->AverageRatings[] = $this->calculateAverageReview($eachReviews);
        }

        return view('index', [
            'AverageRatings' => $this->AverageRatings,
            'allRestaurants' => $allRestaurants,
        ]);
    }

    public function showReviewCreate($id)
    {
        $restaurant  = Restaurant::find($id);

        return view('reviewCreate', [
            'restaurant' => $restaurant,
            'id' => $id,
        ]);
    }

    public function create(Request $request)
    {

        $review = new Review();
        $review->name = $request->name;
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
