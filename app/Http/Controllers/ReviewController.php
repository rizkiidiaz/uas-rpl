<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function ValidateUserData(Review $review,Request $request) {
        $id = Auth::id();

        Review::destroy($review->id);

        return redirect('/product/' . $request->productId);
    }


    public function DisplayFormView(Review $review, Request $request)

    {
        return view('detailreview', [
            'review' => $review
        ]);
    }

    public function SubmitFormReview(Review $review, Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|min:1',
            'rating' => 'required'
        ]);

        $review->update($validated);
        $review->save();
        return redirect('/product/' . $request->review->product_id);
    }
}
