<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\About;
use App\Models\Communicate;
use App\Models\Product;
use App\Models\ProductSubImage;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\Color;
use App\Models\Category;
use Cart;
use Auth;
use Session;

class CartController extends Controller
{
    public function addtoCart(Request $request){
        if(@Auth::user()->id ==NULL && Session::get('sale_type_id') ==NULL){
            Session::flash('cardLoginMessage','Please login then Add to Cart Product');
            return redirect()->back();
        }elseif (@Auth::user()->id !=NULL && Session::get('sale_type_id') ==NULL) {
            Session::flash('shoppingTypeMessage','Please select shopping type then Add to Cart Product');
            return redirect()->route('customer.shopping_type');
        }elseif (@Auth::user()->id !=NULL && Session::get('sale_type_id') !=NULL){
            $product = Product::where('id',$request->id)->first();
            if (Session::get('sale_type_id')=='1') {
                $price = $product->current_collective_price;
            }elseif (Session::get('sale_type_id')=='2'){
                $price = $product->current_delivery_price;
            }

            $cart_qty = Cart::content()->where('id',$request->id)->sum('qty');
            $check_qty = $cart_qty+$request->qty;
            if ($check_qty > '5') {
                Session::flash('shoppingQtyMessage','You can buy maxim 5 Quantity');
                return redirect()->back();
            }else{
                Cart::add([
                    'id' => $product->id,
                    'qty' => $request->qty,
                    'price' => $price,
                    'name' => $product->name,
                    'vat' => $product->vat,
                    'weight' => 550,
                    'options' => [
                        'image' => $product->image,
                        'vat' => $product->vat
                    ],
                ]);
                Session::flash('productAddMessage','Product added successfully');
                return redirect()->back();
            }
        }
    }

    public function addtoCartDetails(Request $request){
        if(@Auth::user()->id ==NULL && Session::get('sale_type_id') ==NULL){
            Session::flash('cardLoginMessage','Please login then Add to Cart Product');
            return redirect()->back();
        }elseif (@Auth::user()->id !=NULL && Session::get('sale_type_id') ==NULL) {
            Session::flash('shoppingTypeMessage','Please select shopping type then Add to Cart Product');
            return redirect()->route('customer.shopping_type');
        }elseif (@Auth::user()->id !=NULL && Session::get('sale_type_id') !=NULL){
            $product = Product::where('id',$request->id)->first();
            if (Session::get('sale_type_id')=='1') {
                $price = $product->current_collective_price;
            }elseif (Session::get('sale_type_id')=='2'){
                $price = $product->current_delivery_price;
            }

            $cart_qty = Cart::content()->where('id',$request->id)->sum('qty');
            $check_qty = $cart_qty+$request->qty;
            if ($check_qty > '5') {
                Session::flash('shoppingQtyMessage','You can buy maxim 5 Quantity');
                return redirect()->back();
            }else{
                Cart::add([
                    'id' => $product->id,
                    'qty' => $request->qty,
                    'price' => $price,
                    'name' => $product->name,
                    'weight' => 550,
                    'options' => [
                        'image' => $product->image,
                        'vat' => $product->vat
                    ],
                ]);
                Session::flash('productAddMessage','Product added successfully');
                return redirect()->route('show.cart');
            }
        }
    }

    public function cartBuyNow(Request $request){
        dd('0k');
        $id = $request->id;
        $product = Product::find($id);
        Session::put('id',$id);
        Session::put('email',$id);
        Session::put('email',$id);
        Session::put('email',$id);
    }

    public function showCart(){
    	$data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";
    	return view('frontend.single_pages.shopping-cart',$data);
    }

    public function updateCart(Request $request){
        if ($request->qty > '5') {
            Session::flash('shoppingQtyMessage','You can buy maxim 5 Quantity');
            return redirect()->back();
        }else{
        	Cart::update($request->rowId,$request->qty);
            Session::flash('productUpdateMessage','Product updated successfully');
        	return redirect()->route('show.cart');
        }
    }

    public function paymentUpdateCart(Request $request){
        if ($request->qty > '5') {
            Session::flash('shoppingQtyMessage','You can buy maxim 5 Quantity');
            return redirect()->back();
        }else{
            Cart::update($request->rowId,$request->qty);
            Session::flash('productUpdateMessage','Product updated successfully');
            return redirect()->back();
        }
    }

    public function deleteCart($rowId){
    	Cart::remove($rowId);
        Session::flash('productDeleteMessage','Product deleted successfully');
    	return redirect()->back();
    }
}
