<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class CustomerController extends Controller
{

    public function __construct()
    {

   if (Auth::user()->user_type != 'admin'){
       return abort(404);
   }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.listCustomer')
            ->with('list_customers',User::where('user_type','customer')->get());
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
        $customer = User::find($id);
        $status = $customer->status;
        if($status == 0){
            $customer->status = 1;

        }else{
            $customer->status = 0;
        }
        $customer->save();
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
        return view('customer.editCustomer')
            ->with('list_customers','list_customers')
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

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['confirmed'],
        ]);
        $customer = User::find($id);
        $customer->fname = $request->fname;
        $customer->lname = $request->lname;
        $customer->gender = $request->gender;
        $customer->birthday = $request->birthday;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->remark = $request->remark;
        if ($request->password){
            $customer->password = Hash::make($request->password);
        }


        $customer->save();
        return  redirect()->route('customer.index')->with('success','ສໍາເລັດ');
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
