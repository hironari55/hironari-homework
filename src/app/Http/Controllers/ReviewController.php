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
    private $formItems = ["name", "gender", "age", "emailAddress", "receiveEmail","evaluation", "opinion"];
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
        $input = $request->only($this->formItems);

        //セッションに書き込む
        $request->session()->put("form_input", $input);

        /*
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
        */

        return redirect()->route('reviews.confirm', ['id' => $id]);
    }

    public function showConfirm($id, createRequest $request)
    {
        $input = $request->session()->get("form_input");
        if (!$input) {
            return redirect()->action("ReviewController@showReviewCreate");
        }

        return view("form_confirm", ['id' => $id, "input" => $input]);
    }

    public function confirm($id, createRequest $request)
    {
        //セッションから値を取り出す
		$input = $request->session()->get("form_input");

        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect()->action("ReviewController@showReviewCreate");
        }

        //送信処理 　ここを書く


        //セッションを空にする
        $request->session()->forget("form_input");

        return redirect()->action("ReviewController@showComplete");

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
