<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSellDetailRequest;
use App\Http\Requests\UpdateSellDetailRequest;
use App\Models\SellDetail;

class SellDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreSellDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellDetail  $sellDetail
     * @return \Illuminate\Http\Response
     */
    public function show(SellDetail $sellDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellDetail  $sellDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(SellDetail $sellDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSellDetailRequest  $request
     * @param  \App\Models\SellDetail  $sellDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellDetailRequest $request, SellDetail $sellDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellDetail  $sellDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellDetail $sellDetail)
    {
        //
    }
}
