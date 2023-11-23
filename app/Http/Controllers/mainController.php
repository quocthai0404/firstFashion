<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\orderDetails;
use App\Models\product;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class mainController extends Controller
{
    public function show(){
        $products = DB::table('products')->get();
 
        return view('welcome', ['pd' => $products]);
    }

    public function htmlLogin(){
        return view('login');
    }

    public function beginLogin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
       
        if(Auth::attempt([
            'username' => $username,
            'password' => $password
        ])){
            $user = User::where('username', $username)-> first();
            Auth::login($user);
            $request->session()->flash('successLogin', 'Login Success!');
            return redirect('/');
        }else{
            $request->session()->flash('error', 'Username Or Password Incorrect');
            return view('login');
        }
        
    }

    public function logout(){
        Auth::logout();
        session()->flash('success', 'Log Out Success!');
        return redirect('/');
    }
    public function beginSignUp(Request $request){
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $fullname = $request->fullname;
        $validated = $request->validate([
            'username' => 'required|min:8',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'fullname' => 'required|min:5',
        ]);
        $existingUser = DB::table('users')->where('email', $email)->orWhere('username', $username)->first();

        if ($existingUser) {
            session()->flash('existingUser', 'Email or Username already exists in the system. Please choose another registration information.');
            return redirect('signup');
        }else{
            $user = new User();
            $user -> fullname = $fullname;
            $user -> email = $email;
            $user -> username = $username;
            $user -> password = bcrypt($password);
            $user -> user_role = 0;
            $user -> save();
            session()->flash('successSignUp', 'You have successfully registered, please login to continue.');
            return redirect('login');
        }
        
    }

    public function showInHome(){
        $products = Product::paginate(12);

        return view('index', ['products' => $products]);
    }

    public function productMen(){
       $products = DB::table('products')->where('gender',1)->paginate(12);
        
       $category = DB::table('categories')->whereIn('id', [1, 2, 3, 4])->get();

       $brands = DB::table('brands')->get();
        
       return view('men', ['products' => $products, 'category' => $category, 'brands' => $brands]);

       
    }

    public function productWomen(){
        $products = DB::table('products')->where('gender',0)->paginate(12);
         
        $category = DB::table('categories')->whereIn('id', [1, 2, 3, 4])->get();
 
        $brands = DB::table('brands')->get();
         
        return view('women', ['products' => $products, 'category' => $category, 'brands' => $brands]);
 
        
     }

    public function filterCat($categoryId){
        $products = DB::table('products')
        ->where('gender', 1)
        ->where('cat_id', $categoryId)
        ->paginate(12);
        $category = DB::table('categories')->whereIn('id', [1, 2, 3, 4])->get();
        $brands = DB::table('brands')->get();
       
        return view('men', ['products' => $products, 'category' => $category, 'brands' => $brands]);
    }

    public function filterCatWomen($categoryId){
        $products = DB::table('products')
        ->where('gender', 0)
        ->where('cat_id', $categoryId)
        ->paginate(12);
        $category = DB::table('categories')->whereIn('id', [1, 2, 3, 4])->get();
        $brands = DB::table('brands')->get();
       
        return view('women', ['products' => $products, 'category' => $category, 'brands' => $brands]);
    }

    // public function filterProduct(Request $request){
    //     $price_order = $request->price_order;
    //     $selectedCategory = $request->category;
    //     $brands = DB::table('brands')->get();
    //     $category = DB::table('categories')->get();
    //     if($price_order=='low_to_high'){
    //         $products = DB::table('products')
    //         ->where('gender', 1)
    //         ->where('cat_id', $selectedCategory)
    //         ->orderBy('price', 'asc')
    //         ->paginate(40);
    //     }else{
    //         $products = DB::table('products')
    //         ->where('gender', 1)
    //         ->where('cat_id', $selectedCategory)
    //         ->orderBy('price', 'desc')
    //         ->paginate(40);
    //     }
        
       
    //     return view('men', ['products' => $products, 'category' => $category, 'brands' => $brands]);
        
    // }

    public function filterProduct($selectedPriceOrder, $selectedCategory){
        $brands = DB::table('brands')->get();
        $category = DB::table('categories')->get();
        if($selectedCategory==0){
            if($selectedPriceOrder=='low_to_high'){
                $products = DB::table('products')
                ->where('gender', 1)
                ->orderBy('price', 'asc')
                ->paginate(12);
            }else{
                $products = DB::table('products')
                ->where('gender', 1)
                ->orderBy('price', 'desc')
                ->paginate(12);
                }
        }else{
            if($selectedPriceOrder=='low_to_high'){
                $products = DB::table('products')
                ->where('gender', 1)
                ->where('cat_id', $selectedCategory)
                ->orderBy('price', 'asc')
                ->paginate(12);
            }else{
                $products = DB::table('products')
                ->where('gender', 1)
                ->where('cat_id', $selectedCategory)
                ->orderBy('price', 'desc')
                ->paginate(12);
                }
        }
        return view('men', ['products' => $products, 'category' => $category, 'brands' => $brands]);
        
    }
    // public function filterProductWomen(Request $request){
    //     $price_order = $request->price_order;
    //     $selectedCategory = $request->category;
    //     $brands = DB::table('brands')->get();
    //     $category = DB::table('categories')->whereIn('id', [1, 2, 3, 4])->get();
    //     if($price_order=='low_to_high'){
    //         $products = DB::table('products')
    //         ->where('gender', 0)
    //         ->where('cat_id', $selectedCategory)
    //         ->orderBy('price', 'asc')
    //         ->paginate(12);
    //     }else{
    //         $products = DB::table('products')
    //         ->where('gender', 0)
    //         ->where('cat_id', $selectedCategory)
    //         ->orderBy('price', 'desc')
    //         ->paginate(12);
    //     }
        
       
    //     return view('women', ['products' => $products, 'category' => $category, 'brands' => $brands]);
        
    // }
    public function filterProductWomen($selectedPriceOrder, $selectedCategory){
        $brands = DB::table('brands')->get();
        $category = DB::table('categories')->get();
        if($selectedCategory==0){
            if($selectedPriceOrder=='low_to_high'){
                $products = DB::table('products')
                ->where('gender', 0)
                ->orderBy('price', 'asc')
                ->paginate(12);
            }else{
                $products = DB::table('products')
                ->where('gender', 0)
                ->orderBy('price', 'desc')
                ->paginate(12);
                }
        }else{
            if($selectedPriceOrder=='low_to_high'){
                $products = DB::table('products')
                ->where('gender', 0)
                ->where('cat_id', $selectedCategory)
                ->orderBy('price', 'asc')
                ->paginate(12);
            }else{
                $products = DB::table('products')
                ->where('gender', 0)
                ->where('cat_id', $selectedCategory)
                ->orderBy('price', 'desc')
                ->paginate(12);
                }
        }
        return view('women', ['products' => $products, 'category' => $category, 'brands' => $brands]);
        
    }
    
    public function filterBrand($brandID){
        $category = DB::table('categories')->whereIn('id', [1, 2, 3, 4])->get();
        $brands = DB::table('brands')->get();
        $products = DB::table('products')
        ->where('gender',1)
        ->where('brand_id',$brandID)
        ->paginate(12);
        return view('men', ['products' => $products, 'category' => $category, 'brands' => $brands]);
    }

    public function filterBrandWomen($brandID){
        $category = DB::table('categories')->whereIn('id', [1, 2, 3, 4])->get();
        $brands = DB::table('brands')->get();
        $products = DB::table('products')
        ->where('gender',0)
        ->where('brand_id',$brandID)
        ->paginate(12);
        return view('women', ['products' => $products, 'category' => $category, 'brands' => $brands]);
    }

    public function detailProductbyID($id){
        $product = DB::table('products')->where('id', $id)->first();
        $productRelate = DB::table('products')->where('cat_id', $product->cat_id)->where('gender', $product->gender)->inRandomOrder()->limit(8)->get();
        $photos = DB::table('photos')->where('pro_id', $id)->get();
        return view('product-detail', ['product' => $product, 'productRelates' => $productRelate, 'photos' => $photos]);

    }
    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $quantityRequest = $request->num_product;
        $cart = session()->get('cart', []);
 
        if(isset($cart[$id])) {
            $cart[$id]['quantity']+=$quantityRequest;
        }  else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "product_src" => $product->product_src,
                "price" => $product->price,
                "quantity" => $quantityRequest,
                "description" => $product->description,
                "gender" => $product->gender,
                "brand_id" => $product->brand_id,
                "cat_id" => $product->cat_id, 
                
            ];
        }
 
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
        
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function getProductById($id){
        
        try {
            $productSeleted = product::find($id);
            $product = DB::table('products')
                    ->where('cat_id', $productSeleted->cat_id)
                    ->where('gender', $productSeleted->gender)
                    
                    ->get();
            return response()->json($product);
        } catch (\Exception $e) {

            return response()->json(['error' => 'product not found'], 404);
        }
    
    }

    public function doneOrder(Request $request){
        $order = new order();
        $order -> user_id = $request->userId;
        $order -> phoneNumber = $request->userPhoneNumber;
        $order -> address = $request->userAddress;
        $order -> fullName = $request->userFullname;
        $order -> subTotal = $request->subTotal;
        $order -> fax = $request->fax;
        $order -> shipping = $request->shipping;
        $order -> total = $request->total;
        $order->save();
        

        $cart = session()->get('cart');
       
        foreach ($cart as $index => $item) {
            $orderDetail = new orderDetails();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $index;
            $orderDetail->product_name = $item['product_name'];
            $orderDetail->price = $item['price'];
            $orderDetail->quantity = $item['quantity'];
            $orderDetail->save();
            
        }
        session()->put('cart', []);
        return redirect('/')->with('success', 'Order has been received');

    }


    public function store(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'message' => 'required'
        ]);
  
        Contact::create($request->all());
  
        return redirect()->back()->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }

    
    
    

}
