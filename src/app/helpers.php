<?php

public function calculateAverageReview($eachReviews)
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
