<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 2) as $num) {
            $review = new Review();
            $review->user_id = $num;
            $review->restaurant_id = 1;
            $review->name = 'ひろなり' . $num;
            $review->gender = '男';
            $review->age = 20;
            $review->emailAddress = 'hironari@hironari' . $num;
            $review->ReceiveMail = '受け取る';
            $review->evaluation = 5 - $num;
            $review->opinion = 'スパチキが美味しい' .  $num;
            $review->save();
        }
    }
}
