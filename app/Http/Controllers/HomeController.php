<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Cart;
use App\Models\Shipping;
use App\Models\myOrder;
use Illuminate\Support\Facades\Auth;
use App\Mail\UserNotificationMail;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = product::limit(3)->get();
        return view('home.fru',['product' => $product ]);
    }
    public function redirect()  {
      $myorder = myOrder::simplePaginate(4);
      $usertype = Auth::user()->usertype;
      if ($usertype == 1) {
          return view('admin.index',['myorder' => $myorder ]);
      }else {
        $product = product::paginate(3);
        return view('home.fru',['product' => $product ]);
    }
  }
  public function show(){
       $product = product::all();
    return view('home.fru',['product' => $product ]);
}
    public function allproduct()
    {
        $product = product::simplePaginate(9);
        return view('home.AllProduct',['product' => $product ]);
    }
    public function partProduct()
    {
        $product = product::paginate(3);
        return view('home.partProduct',['product' => $product ]);
    }
    public function watchesPage()
    {
        $product = Product::where('cat','Watches')->paginate(9);
        return view('products.watches',['product' => $product ]);
    }
    public function bagsPage()
    {
        $product = Product::where('cat','Bags')->paginate(9);
        return view('products.bags',['product' => $product ]);
    }
    public function shoesPage()
    {
        $product = Product::where('cat','Shoes')->paginate(9);
        return view('products.shoes',['product' => $product ]);
    }
    public function accPage()
    {
        $product = Product::where('cat','Accessories')->paginate(9);
        return view('products.acc',['product' => $product ]);
    }


/*
  public function cart()
  {
      $product = product::all();
      return view('home.cart',['product' => $product ]);
  }*/
  public function addToCart(Request $request, $productId)
  {
        if (Auth::id()) {
          $user =auth()->user();
          $product=product::find($productId);
          $existingCartItem = Cart::where('username', $user->name)
              ->where('product_name', $product->product_name)
              ->first();

          if ($existingCartItem) {
              // Product already exists in the cart
              $existingCartItem->quantity += 1;
              $existingCartItem->save();

              return redirect()->route('showcart')->with('success', 'Product quantity updated in the cart');
          }
          $cart = new Cart;
          $cart->username = $user->name;
          $cart->phone = $user->phone;
          $cart->address = $user->address;
          $cart->product_name = $product->product_name;
          $cart->image = $product->image;
          $cart->price = $product->price;
          $cart->quantity = 1;
          $cart->save();

          if (isset($cart->product_name)) {
            echo "Product already exist";
          }

        return redirect()->route('showcart');
        }else{  return redirect('login');
        }
    }
public function showcart(Request $request)
{
    $user =auth()->user();
    $cart = Cart::where('phone',$user->phone)->get();
  //  $shipping = Shipping::where('id', 1)->value('shipping');
    $shipping = Shipping::find(1);
    return view('home.cart',['cart' => $cart, 'shipping'=> $shipping]);
}
public function deletecart($id)
{
    $data =Cart::find($id);
    $data->delete();
    return redirect()->back();
}


public function edit_quantity($id, Request $request)
    {
        // Validate the input
        $request->validate([
            'quantity' => 'required|integer|min:1', // Add any other validation rules you need
        ]);

        // Find the item in the cart
        $cartItem = Cart::findOrFail($id);

        // Update the quantity
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        // Redirect back to the cart page or wherever needed
        return redirect()->back();
    }
    public function edit_shipping( Request $request){
                    // Validate the input
            $request->validate([
              'shipping' => 'numeric', // Add any other validation rules you need
              ]);
              // Find the item in the cart
            $shipping = Shipping::find($request->id);
              if ($shipping) {
              $shipping->shipping  =  $request->input('shipping');
              // Update the quantity
              $shipping->save();
                  return redirect()->back()->with('shipping', $shipping->shipping);
            }else{
              // Redirect back to the cart page or wherever needed
                return redirect()->back();
          }
}
    public function remove_order( Request $request ,$id)
    {
       $cartItems = Cart::all();

       foreach ($cartItems as $cartItem) {
       // Create a new order
        $order = new myOrder();
        // Copy cart item information to order item
          $order->username = $cartItem->username;
          $order->phone = $cartItem->phone;
          $order->address = $cartItem->address;
          $order->product_name = $cartItem->product_name;
          $order->image = $cartItem->image;
          $order->price = $cartItem->price;
          $order->quantity = $cartItem->quantity;
           // Save the order item
           $order->save();
}
           // Find the cart item by ID
          Cart::where('phone', $cartItem->phone)->delete();
          return redirect()->route('myorder');



}
public function myorder(){

  $user =auth()->user();
  $myorder = myOrder::where('phone',$user->phone)->get();
  $data = [
      'name' => $user->name,
      'message' => 'your order is confirmed we will be in touch with you as soon as possible',
  ];
  Mail::to($user->email)->send(new UserNotificationMail($data));
  return view('home.myOrder',['myorder' => $myorder ])->with('message', 'Your product is Ordered successfully');


}


public function single_product($productId){
  //$singlepro=product::find($productId);
//  $product = product::where('id',$productId)->get();
  $product = Product::findOrFail($productId);
  return view('home.single_product',['product' => $product ]);
  //return redirect()->route('show_single_product',['productId' => $productId ]);
}
public function about()
{
    return view('home.about');
}

public function search(request $request)
    {
        $search = $request->input('search');
        $product = product::where('product_name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->orWhere('cat', 'like', "%$search%")
            ->get();

        return view('home.search', compact('product'));
    }
/*
public function show_single_product($productId){
  $product = product::where('id',$productId)->get();
  return view('home.single_product',['product' => $product ]);
}*/
/*
  public function addToCart(Request $request, $productId)
    {
        $product = [
            'id' => $productId,
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
            'quantity' => 1,
        ];

        $cartItems = session('cart', []);

        // Check if the product is already in the cart
        $existingProduct = array_search($productId, array_column($cartItems, 'id'));

        if ($existingProduct !== false) {
            // If the product is already in the cart, increment the quantity
            $cartItems[$existingProduct]['quantity'] += 1;
        } else {
            // If the product is not in the cart, add it
            $cartItems[] = $product;
        }

        session(['cart' => $cartItems]);

        return redirect()->route('home.cart')->with('success', 'Product added to cart');
    }*/
}
