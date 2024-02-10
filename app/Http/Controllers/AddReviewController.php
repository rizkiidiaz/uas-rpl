<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddReviewController extends Controller
{
    public function ValidateReviewForm(Product $product ,Request $request) {
        $id = Auth::id();

        Review::create([
            'text' => $request->content,
            'stok_product' => 1,
            'rating' => $request->rating,
            'user_id' => $id,
            'product_id' => $product->id,
        ]);

        return redirect('/product/' . $product->id);
    }
}
