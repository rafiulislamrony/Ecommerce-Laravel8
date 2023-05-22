<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Carbon\Carbon;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){

    	$product = Product::findOrFail($id);

    	if ($product->discount_price == NULL) {
    		Cart::add([
    			'id' => $id,
    			'name' => $request->product_name,
    			'qty' => $request->quantity,
    			'price' => $product->selling_price,
    			'weight' => 1,
    			'options' => [
    				'image' => $product->product_thambnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);
    		return response()->json(['success' => 'Successfully Added on Your Cart']);
    	}else{
    		Cart::add([
    			'id' => $id,
    			'name' => $request->product_name,
    			'qty' => $request->quantity,
    			'price' => $product->discount_price,
    			'weight' => 1,
    			'options' => [
    				'image' => $product->product_thambnial,
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);
    		return response()->json(['success' => 'Successfully Added on Your Cart']);
    	}

    } // End Mehtod

    // Mini Cart Mehtod
	public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));
    } // end method

    /// remove mini cart
    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove from Cart']);

    } // end mehtod

    public function AddToWishList(Request $request, $product_id)
    {
        if(Auth::check()){
            $exist = WishList::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if(!$exist){
                WishList::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Product Added Wishlist Successfully']);
            }else{
                return response()->json(['error' => 'This Product has Allready on Your Wishlist']);
            }

        }else{
            return response()->json(['error' => 'Login First']);
        }

    } // end mehtod



}
