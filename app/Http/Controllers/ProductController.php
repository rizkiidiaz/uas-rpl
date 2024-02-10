<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function RequestData()
    {
        $products = Product::all();
        return view('welcome', [
            'products' => $products
        ]);
    }

    public function InputKeyword(Request $request)
    {
        $keyword = $request->q;
        $searchProduct = Product::whereRaw('LOWER(nama_product) LIKE ?', ['%' . strtolower($keyword) . '%'], 'OR', ' LOWER(kategori_product) LIKE ?', ['%' . strtolower($keyword) . '%'])
        ->get();
        return view('welcome', [
            'products' => $searchProduct 
        ]);
    }

    public function DetailProduct(Product $product)
    {
        $user = User::where('id', $product->user_id)->get();
        $reviews = Review::where('product_id', $product->id)->with('user')->orderBy('created_at', 'desc')->get();
        return view('detailproduct', [
            'product' => $product,
            'reviews' => $reviews,
            'user' => $user[0]->nama_depan . " " . $user[0]->nama_belakang,
        ]);
    }

    public function ValidateReviewForm(Request $request)
    {
        $userId = Auth::id();
        $validated = $request->validate([
            'nama_product' => 'required|string|min:1|max:30',
            'stok_product' => 'required|integer',
            'deskripsi_product' => 'required|string|min:5',
            'harga' => 'required|integer',
            'url_gambar' => 'required|string|url:https',
            'kategori_product' => 'required|string|min:1',
            'link_ecommerce' => 'required|string|min:1',
        ]);

        $validated['user_id'] = $userId;

        Product::create($validated);
        return to_route('home');
    }

    public function DisplayAddProductView(Request $request)
    {
        return view('addproduct');
    }

    public function DisplayProductForProductOwner(Request $request) {
        $products = Product::where('user_id', Auth::id())->get();
        return view('product-admin', [
            'products' => $products
        ]);
    }

    public function ClickDeleteButton(Product $product, Request $request) {
        $products = Product::destroy($product->id);
        return to_route('product-owner-page');
    }

    public function SubmitFormUpdateProduct(Product $product, Request $request) {
        Product::where('id', $product->id)->update($request->except('_method', '_token'));
        return to_route('product-owner-page');
    }

    public function DisplayProductView(Product $product, Request $request) {
        return view('editproduct', [
            'product' => $product
        ]);
    }
}
