<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Sell;
use App\Models\SellDetail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Slide;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Trail\UploadImage;

class FontEndController extends Controller
{
    use UploadImage;

    public function login(){
        return view('fontEndPage.login');
    }
    public function customerRegister(){
        return view('fontEndPage.customer-register');
    }
    public function customerRegisterStore(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $customer = new User();
        $customer->fname = $request->fname;
        $customer->lname = $request->lname;
        $customer->gender = $request->gender;
        $customer->birthday = $request->birthday;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->remark = $request->remark;
        $customer->password = Hash::make($request->password);
        $customer->user_type = "customer";

        $customer->save();

        event(new Registered($customer));
        Auth::login($customer);
        return redirect(RouteServiceProvider::HOME);

    }

    public function storeRegister(){
        return view('fontEndPage.store-register');
    }

    public function storeRegisterStore(Request $request){
        $request->validate([
            'image' => 'file|image|max:50000|mimes:jpeg,png,jpg,svg',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $store = new User();
        $store->fname = $request->fname;
        $store->lname = $request->lname;
        $store->mobile = $request->mobile;
        $store->address = $request->address;
        $store->email = $request->email;
        $store->remark = $request->remark;
        $store->password = Hash::make($request->password);
        $store->user_type = "store";
        $store->image = $this->upload($request,'store_images');
        $store->status = false;
        $store->save();

        $update_store = User::find($store->id);
        $update_store->store_id= $store->id;
        $update_store->save();

        event(new Registered($store));
        Auth::login($store);
        return redirect(RouteServiceProvider::HOME);

    }

    public function home(Request $request){

        Session::put('url',$request->fullUrl());

        $products = Product::whereHas('stores', function($q){
            $q->where('status', true);
        })->latest();
        if ($search = $request->search_product_type_id){
            $products->where('product_type_id',$search);
        }

        if ($search = $request->search_name){
            $products->where('name','LIKE', '%'.$search.'%')
            ->orWhere('description','LIKE', '%'.$search.'%');
        }

        if ( $request->start >0){
            $products->where('sell_price','>=',$request->start);
        }
        if ($request->end > 0){
            $products->where('sell_price','<=',$request->end);
        }
        if ($request->start >0 && $request->end >0){
            $products->where('sell_price', '>=', $request->start)
                ->where('sell_price', '<=', $request->end);
        }



        return view('fontEndPage.home')
            ->with('home_page','home_page')
            ->with('sliders',Slide::where('status',1)->latest()->get())
            ->with('product_types',ProductType::all())
            ->with('products',$products->paginate(12));
    }

    public function store(){
        $stores = User::where('user_type','store')->where('status',true)->latest();
        return view('fontEndPage.store')
            ->with('list_stores',$stores->paginate(9));
    }

    public function storeDetail(Request $request){
        $store = User::find($request->id);
        $totalSell = 0;
        $amountSell = 0;
        $amountStock = 0;
        foreach($store->products as $product){
            $totalSell += $product->totalSell();
            $amountSell += $product->sellItems();
            $amountStock += $product->sumStocks();
        }

        return view('fontEndPage.storeDetail')
            ->with('list_stores','list_stores')
            ->with('store',$store)
            ->with('total_sell',$totalSell)
            ->with('amount_stock',$amountStock)
            ->with('amount_sell',$amountSell);
    }

    public function sell(){
        return view('fontEndPage.sell')
            ->with('sells',Sell::where('customer_id',Auth::user()->id)->latest()->paginate(5));
    }



    public function cart()
    {
        return view('fontEndPage.cart');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->sell_price,
                "image" => $product->image,
                "store_id" => $product->store_id
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'ສຳເລັດ');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function removeToCart($id)
    {


        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']--;
        } else{
            return redirect()->back()->with('warning', 'not found');
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'ສຳເລັດ');
    }


    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

        }
        return redirect()->back()->with('success', 'ສຳເລັດ');
    }


    public function checkout()
    {
        if (Session::get('cart') == null) {
            return redirect()->route('home');
        }
        $items = Session::get('cart');

        //get all store_success
        $arrayStores = [];
        foreach ($items as $item) {
            if (!in_array($item['store_id'], $arrayStores)) {
                array_push($arrayStores, $item['store_id']);
            }
        }
        $status = 'pending';

        //sell all store
        for($i=0;$i<count($arrayStores);$i++){
            $sell = new Sell();
            $sell->status = $status;
            $sell->customer_id = Auth::user()->id;
            $sell->store_id = $arrayStores[$i];
            $sell->total = 0;
            $sell->save();

            $total = 0;
            foreach ($items as $item) {
            if ($item['store_id'] == $arrayStores[$i]){
                $product = Product::find($item['id']);
                $amount = $item['quantity'];
                $sellDetail = new SellDetail();
                $sellDetail->quantity =  $amount;
                $sellDetail->cost_price = $product->cost_price;
                $sellDetail->sell_price = $product->sell_price;
                $sellDetail->status = $status;
                $sellDetail->sell_id = $sell->id;
                $sellDetail->product_id =   $item['id'];
                $sellDetail->save();

                $total += ($product->sell_price*$amount);

            }
            }

            //update total to order
            $updateOrder = Sell::find($sell->id);
            $updateOrder->total = $total;
            $updateOrder->save();

        }
        session()->forget('cart');

     return redirect()->route('sell.list')->with('success','ສຳເລັດ');
    }


}
