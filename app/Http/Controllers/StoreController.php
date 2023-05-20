<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Trail\UploadImage;

class StoreController extends Controller
{
    use UploadImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        if (Auth::user()->user_type != 'admin'){
            return abort(404);
        }
    }

    public function index()
    {
        return view('store.listStore')
            ->with('list_stores',User::where('user_type','store')->get());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $store->save();

        $update_store = User::find($store->id);
        $update_store->store_id= $store->id;
        $update_store->save();
        return back()->with('success','ສຳເລັດ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = User::find($id);
        $status = $store->status;
        if($status == 0){
            $store->status = 1;

        }else{
            $store->status = 0;
        }
        $store->save();
        return  back()->with('success','ສໍາເລັດ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('store.editStore')
            ->with('list_stores','list_stores')
            ->with('edit',User::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'file|image|max:50000|mimes:jpeg,png,jpg,svg',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['confirmed'],
        ]);
        $store = User::find($id);
        $store->fname = $request->fname;
        $store->lname = $request->lname;
        $store->mobile = $request->mobile;
        $store->address = $request->address;
        $store->email = $request->email;
        $store->remark = $request->remark;
        if ($request->password){
            $store->password = Hash::make($request->password);
        }
        if($request->image){
            $store->image = $this->editImage($request,$store->image,'store_images');
        }

        $store->save();
        return  redirect()->route('store.index')->with('success','ສໍາເລັດ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
