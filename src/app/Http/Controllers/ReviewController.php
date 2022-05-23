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

    public function showCreate($id)
    {
        $restaurant  = Restaurant::find($id);

        return view('reviewCreate', [
            'restaurant' => $restaurant,
            'id' => $id,
        ]);
    }

    public function postCreate($id, CreateRequest $request)
    {
        $input = $request->only($this->formItems);
        //セッションに書き込む
        $request->session()->put("form_input", $input);
        return redirect()->route('reviews.confirm', ['id' => $id]);
    }

    public function showConfirm($id, request $request)
    {
        $input = $request->session()->get("form_input");
        if (!$input) {
            return redirect()->route('reviews.create', ['id' => $id]);
        }

        return view("reviewConfirm", [
            'id' => $id,
            'input' => $input
        ]);
    }

    public function postConfirm($id, Request $request)
    {
        //セッションから値を取り出す
		$input = $request->session()->get("form_input");

        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect()->route('reviews.create', ['id' => $id]);
        }

        //再入力ボタン 画面遷移
        if ($request->has("back")) {
            return redirect()->route('reviews.create',['id' => $id])
				->withInput($input);
        }

        //送信処理
        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->name = $input['name'];
        $review->gender = $input['gender'];
        $review->age = $input['age'];
        $review->emailAddress = $input['emailAddress'];
        $review->receiveEmail= $input['receiveEmail'];
        $review->evaluation = $input['evaluation'];
        $review->opinion = $input['opinion'];

        //一対多の関係で保存する
        $restaurant = Restaurant::find($id);
        $restaurant->reviews()->save($review);

        //セッションを空にする
        $request->session()->forget("form_input");

        return redirect()->route('reviews.complete');
    }

    public function showComplete()
    {
        return view('reviewComplete');
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
