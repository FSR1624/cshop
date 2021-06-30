<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Charge;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', ['products' => $products]);
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('index');
    }
    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('shoppingCart');
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('shoppingCart');
    }
    public function getCart()
    {
        if (!Session::has('cart'))
        {
            return view('shop.shopping_cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view ('shop.shopping_cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart'))
        {
            return view('shop.shopping_cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }
    public function postCheckout(Request $request)
    {
        if (!Session::has('cart'))
        {
            return redirect()->route('shop.shopping_cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_51IJi02JQJSnz96gIKpSrU0VTee0DHFuoEpwXgDCvZeQcz2mwykftnOIAvfhcEWVI382UlhrgLGZhRo0TqwPEc2bh00l6jIFo1y');
        try
        {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "bam",
                "source" => $request->input('stripeToken'),
                "description" => "Testno placanje"
            ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->adress = $request->input('adress');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);
        }
        catch (\Exception $e)
        {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->route('index')->with('success', 'Završili ste kupnju');
    }
}
