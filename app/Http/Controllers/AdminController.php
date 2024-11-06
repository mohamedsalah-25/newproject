<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\ProductGallary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\UserNotificationMail;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
  public function add_product()
  {
    $usertype = Auth::user()->usertype;
    if ($usertype == 1) {
      return view('admin.add_product');
    }else {
        return view('home.fru');
    }
  }
  public function edit_product($id)
  {
    $data =Product::find($id);
    $usertype = Auth::user()->usertype;
    if ($usertype == 1) {
      return view('admin.edit_product',['data' => $data ]);
    }else {
        return view('home.fru');
    }
  }
  public function update_product(Request $request, $id)
   {
       $product = Product::find($id);
       $data = $request->all();

       if ($request->hasFile('image')) {
       $newImageName= uniqid() . '-' . $request->product_name .'.' . $request->image->extension();
        $request->image->move(public_path('images'),$newImageName);
         $data['image'] = $newImageName;
}
       $product->update($data);

       return redirect()->back()->with('message', 'Product Updated successfully');
     }
  public function create(Request $req)
  {
    $req->validate([
      'product_name' =>'required',
      'description' =>'required',
      'price' =>'required',
      'image' => 'required|mimes:jpg,png,jped,|max:5048',
      'cat' =>'required',
      'gallery_images.*' => 'mimes:jpg,png,jpeg|max:5048'
    ]);

    $newImageName= uniqid() . '-' . $req->product_name .'.' . $req->image->extension();
    $req->image->move(public_path('images'),$newImageName);

     $product = product::create([
      'product_name' =>$req->input('product_name'),
      'description' =>$req->input('description'),
      'price' =>$req->input('price'),
      'image' => $newImageName,
      'cat' =>$req->input('cat')
     ]);

     if ($req->hasFile('gallery_images')) {
        foreach ($req->file('gallery_images') as $galleryImage) {
            $galleryImageName = uniqid() . '-' . $galleryImage->getClientOriginalName();
            $galleryImage->move(public_path('images/gallery'), $galleryImageName);

            ProductGallary::create([
                'product_id' => $product->id,
                'image_path' => $galleryImageName
            ]);
        }
    }

  return view('home.single_product',['product' => $product ]);
  // return redirect()->route('products.show', $product->id);

  }

public function showGallary($id)
{
    $product = Product::with('images')->findOrFail($id);
  //  $data = ProductGallary::with('product')->findOrFail($id);
    return view('home.single_product', ['product' => $product ,

  ]);
}
    public function deleteProduct($id)
    {
        $product = product::paginate(3);
        $data =Product::find($id);
        $data->delete();
        //return redirect()->back();
        return view('home.fru',['product' => $product ]);
    }

    public function sendEmail(){

    $user = Auth::user();
    $data = [
        'name' => $user->name,
        'message' => 'your order is confirmed we will be in touch with you as soon as possible',
    ];

    Mail::to($user->email)->send(new UserNotificationMail($data));
}
}
