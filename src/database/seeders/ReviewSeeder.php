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
        $review = new Review();
        $review->user_id = 1;
        $review->restaurant_id = 1;
        $review->name = 'ひろなり';
        $review->gender = '男';
        $review->age = 20;
        $review->emailAddress = 'hironari@hironari';
        $review->ReceiveMail = '受け取る';
        $review->evaluation = 4;
        $review->opinion = 'スパチキが美味しい';
        $review->save();
    }
}
