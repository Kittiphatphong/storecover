<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSellRequest;
use App\Http\Requests\UpdateSellRequest;
use App\Models\Payment;
use App\Models\Sell;
use App\Models\SellDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Sell::latest();
        $allOrder = Sell::latest();

        if (Auth::user()->user_type != "admin") {
            $orders->where('store_id',Auth::user()->store_id);
            $allOrder->where('store_id',Auth::user()->store_id);
        }

        if ($search = $request->search_order_id){
            $orders->where("id",$search);
            $allOrder->where("id",$search);
        }
        if ($request->start && $request->end){
            $orders->whereBetween('created_at', [Carbon::parse($request->start), Carbon::parse($request->end)->addDay(1)]);
            $allOrder->whereBetween('created_at', [Carbon::parse($request->start), Carbon::parse($request->end)->addDay(1)]);
        }
        if ($search = $request->search_status){
            $orders->where("status",$search);
            $allOrder->where("status",$search);
        }
        if ($search = $request->search_client){
            $orders->whereHas('users',function ($q) use($search){
                $q->where('email','LIKE', '%'.$search.'%')
                    ->orWhere('fname','LIKE', '%'.$search.'%')
                    ->orWhere('lname','LIKE', '%'.$search.'%');
            });
            $allOrder->whereHas('users',function ($q) use($search){
                $q->where('email','LIKE', '%'.$search.'%')
                    ->orWhere('fname','LIKE', '%'.$search.'%')
                    ->orWhere('lname','LIKE', '%'.$search.'%');
            });
        }

        $allOrders = $allOrder->get();
        $balance = 0 ;
        foreach ($allOrders as $all){
            foreach ($all->orderItems as $item)
                $balance += ($item->quantity*$item->cost_price);
        }



        return view("sell.sellList")
            ->with('list_sells', $orders->paginate(10))
            ->with('all_orders', $allOrders)
            ->with('balance',$balance);
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
     * @param  \App\Http\Requests\StoreSellRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function show(Sell $sell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function edit(Sell $sell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSellRequest  $request
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellRequest $request, Sell $sell)
    {
        if (Auth::user()->user_type != "admin") {
            if ($sell->store_id != Auth::user()->store_id){
                return abort(404);
            }
        }

        $status = $request->status;
        //update order to success status

        $sell->status =  $status;
        $sell->save();

        //update order item to success status
        SellDetail::where('sell_id', $sell->id)->update(['status' => $status]);

        //create payment
        $findPayment = Payment::where('sell_id',$sell->id)->get();

        if($findPayment->count()>0){

            $payment = Payment::find($findPayment->pluck('id')->first());
            $payment->status = $status;
            $payment->save();
        }else{

            $payment = new Payment();
            $payment->amount = $sell->total;
            $payment->status = $status;
            $payment->sell_id = $sell->id;
            $payment->store_id = $sell->store_id;
            $payment->customer_id = $sell->customer_id;
            $payment->save();
        }



        return back()->with('success','ສຳດເລັດ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sell $sell)
    {
        //
    }
}
