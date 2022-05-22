<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\createRequest;
use Illuminate\Support\Facades\Auth;

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

    public function create($id, createRequest $request)
    {
        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->name = $request->name;
        $review->gender = $request->gender;
        $review->age = $request->age;
        $review->emailAddress = $request->emailAddress;
        $review->receiveEmail= $request->receiveEmail;
        $review->evaluation = $request->evaluation;
        $review->opinion = $request->opinion;

        $restaurant = Restaurant::find($id);
        $restaurant->reviews()->save($review);

        return redirect()->route('reviews.index');
    }

    public function showConfirm()
    {

    }

    public function confirm()
    {
        
    }

    public function showComplete()
    {

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
