<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;
use Illuminate\Validation\Validator;
use Illuminate\Validation\Rule;
use App\Models\photo;
use App\Models\order;


class adminController extends Controller
{
    public function index()
    {   
        $userCount= User::count();
        $productCount= product::count();
        $orderCount= order::count();
        return view('admin.index', compact('userCount', 'productCount', 'orderCount'));
    }

    public function viewAllUser()
    {
        $users = User::where('user_role', 0)->paginate(5);

        return view('admin.viewAllUser', ['users' => $users]);
    }

    public function deleteUserByID($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('viewAllUser')->with('success', 'User deleted successfully.');
        } else {

            return redirect()->back()->with('error', 'User not found.');
        }
    }

    public function getUserById($id)
    {
        try {

            $user = User::findOrFail($id);
            return response()->json($user);
        } catch (\Exception $e) {

            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function editUser(Request $request)
    {
        $id= $request->user_id;
        $user = User::find($id);

        $validated = $request->validate([
            'username' => [
                'required',
                'min:8',
                Rule::unique('users')->ignore($user->id)
            ],
            'fullname' => 'required|min:5',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ]
        ]);
        
        $user->fullname = $request->input('fullname');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->user_role = $request->input('user_role');

        $user->save();
        return redirect()->back()->with('success', 'User information updated successfully.');
    }

    public function viewAllProduct()
    {
        
        $products = product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.viewAllProduct', ['products' => $products]);
    }

    public function addNewProduct(Request $request)
    {

        $request->validate([
            'product_src' => 'required|image',
            'product_name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'cat_id' => 'required',
            'gender' => 'required',
            'description' => 'required|min:10'

        ]);
        $product = new product();
        $ext = $request->file('product_src')->extension();
        $final_name = date('YmdHis') . '.' . $ext;
        $request->file('product_src')->move(public_path('images/'), $final_name);
        $product->product_src = $final_name;
        $product->product_name = $request->product_name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->brand_id = $request->brand_id;
        $product->cat_id = $request->cat_id;
        $product->gender = $request->gender;
        $product->description = $request->description;
        $product->save();

        return redirect()->back()->with('success', 'Add New Product Success');
    }

    public function deleteProduct($id)
    {
        $product = product::find($id);
        if (file_exists(public_path('images/' . $product->product_src)) and !empty($product->product_src)) {
            unlink(public_path('images/' . $product->product_src));
        }
        
        $photos = Photo::where('pro_id', $id)->get();
        foreach($photos as $photo){
            if (file_exists(public_path('images/product_photos/' . $photo->photo_src)) and !empty($photo->photo_src)) {
                unlink(public_path('images/product_photos/' . $photo->photo_src));
            }
            $photo->delete();
        }
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function viewEditId($id)
    {
        $product = product::find($id);
        return view('admin.editProduct', ['product' => $product]);
    }

    public function editProduct($id, Request $request)
    {
        $product = product::find($id);
        $request->validate([
            'product_src' => 'required|image',
            'product_name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'cat_id' => 'required',
            'gender' => 'required',
            'description' => 'required|min:10'

        ]);

        $ext = $request->file('product_src')->extension();
        $final_name = date('YmdHis') . '.' . $ext;
        $request->file('product_src')->move(public_path('images/'), $final_name);
        $product->product_src = $final_name;
        $product->product_name = $request->product_name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->brand_id = $request->brand_id;
        $product->cat_id = $request->cat_id;
        $product->gender = $request->gender;
        $product->description = $request->description;
        $product->save();
        return redirect()->back()->with('success', 'Product Edited successfully.');
    }


    //remove when done project
    public function viewAddPhotos($id)
    {
        $product = product::find($id);
        return view('admin.addPhotos', ['product' => $product]);
    }

    public function addPhotos(Request $request){
        $record = new photo();
        $record->pro_id= $request->pro_id;
        $ext = $request->file('product_src')->extension();
        $final_name = date('YmdHis') . '.' . $ext;
        $request->file('product_src')->move(public_path('images/product_photos/'), $final_name);
        $record->photo_src= $final_name;
        $record->save();

        return redirect()->back()->with('success', 'ok');
    }
    //

 

        public function viewOrders(){
            $orders = DB::table('orders')->paginate(12);
            return view('admin.viewOrders', ['orders' => $orders]);
        }


}
