<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Trail\UploadImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    use UploadImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Request $request)
    {
        Session::put('edit_product_url',request()->fullUrl());
        $product = Product::latest();

        if (Auth::user()->user_type != "admin") {
            $product->where('store_id',Auth::user()->store_id);
        }

//search
        if ($search = $request->search_code){
            $product->where("product_code",$search);
        }
        if ($search = $request->search_name){
            $product->where('name','LIKE', '%'.$search.'%');
        }

        if ($search = $request->search_product_type_id){
            $product->where("product_type_id",$search);
        }



        if (Auth::user()->user_type = "admin"){
            if ($search = $request->search_store_id){
                $product->where("store_id",$search);
            }
        }


        return view("product.productList")
            ->with("list_products",$product->paginate(10))
            ->with("product_types",ProductType::latest()->get())
            ->with("stores",User::where('user_type','store')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        if (Auth::user()->user_type == "admin"){
            $store_id = $request->store_id;
        }else{
            $store_id = Auth::user()->store_id;
        }

        $product = new Product();
        $product->name = $request->name;
        $product->image = $this->upload($request,"products");
        $product->cost_price = round(str_replace('.', '', $request->cost_price));
        $product->sell_price = round(str_replace('.', '', $request->sell_price));
        $product->product_type_id = $request->product_type_id;
        $product->description = $request->description;
        $product->store_id = $store_id;
         $product->save();
        return back()->with("success","success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (Auth::user()->user_type != "admin") {
            if ($product->store_id != Auth::user()->store_id){
                return abort(404);
            }
        }

        return view("product.productEdit")
            ->with("list_products","list_products")
            ->with("categories",ProductType::latest()->get())
            ->with("stores",User::where('user_type','store')->get())
            ->with('edit',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if (Auth::user()->user_type != "admin") {
            if ($product->store_id != Auth::user()->store_id){
                return abort(404);
            }
        }

        $product->name = $request->name;
        if ($request->image){
            $product->image = $this->editImage($request,$product->image,'products');
        }
        $product->cost_price = round(str_replace('.', '', $request->cost_price));
        $product->sell_price = round(str_replace('.', '', $request->sell_price));
        $product->product_type_id = $request->product_type_id;
        if (Auth::user()->user_type == "admin"){
            $store_id = $request->store_id;
        }else{
            $store_id = Auth::user()->store_id;
        }
        $product->store_id = $store_id;
        $product->description = $request->description;
        $product->save();

        if (session('edit_product_url')){
            return redirect(session('edit_product_url'))->with('success','success');
        }else{
            return redirect()->route('product.index')->with("success","success");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (Auth::user()->user_type != "admin") {
            if ($product->store_id != Auth::user()->store_id){
                return abort(404);
            }
        }
        $this->deleteImageJ($product->image,"products");
        $product->delete();
        return back()->with("success","success");
    }
}
