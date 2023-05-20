@extends('layouts.newApp')
@section('title','Products')

@section('header')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <h5 class="text-dark font-weight-bold my-1 mr-5">@lang("Products")</h5>
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{route('product.index')}}" class="text-muted">@lang('List')</a>
                </li>

            </ul>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <div class="d-flex align-items-center">
        <!--begin::Actions-->

        <a  class="btn btn-light-primary font-weight-bolder btn-sm"  data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus-square"></i>ເພີ່ມ</a>
        <!--end::Actions-->

    </div>
@endsection


@section('content')



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <h3 class="bg-white text-primary font-weight-bolder  p-4 mb-4 shadow-sm">@lang("List") @lang('Products')</h3>

                <div class="card-body bg-white text-primary font-weight-bolder  p-4 mb-4 shadow-sm">

                    <form method="get" action="{{route('product.index')}}">
                        <div class="row mb-6">

                            <div class="col-lg-3 mb-lg-0 mb-6">
                                <label>@lang("Name"):</label>
                                <input type="text" class="form-control"

                                       placeholder="@lang("Search") @lang("Name")"
                                       name="search_name"
                                       value="{{ request()->get('search_name') }}"
                                />
                            </div>
                            @if(\App\Models\User::find(Auth::user()->id)->user_type == "admin")
                            <div class="col-lg-3 mb-lg-0 mb-6">
                                <label>ຮ້ານຄ້າ</label>


                                    <select class="form-control" name="search_store_id">
                                        <option value=""
                                                @if(request()->get('search_store_id') == "")
                                                selected
                                            @endif
                                        >@lang("All")</option>
                                        @foreach($stores as $type)
                                            <option value="{{$type->id}}"
                                                    @if(request()->get('search_store_id') == $type->id)
                                                    selected
                                                @endif
                                            >
                                                {{$type->fname}}

                                            </option>
                                        @endforeach

                                    </select>

                            </div>
                            @endif
                            <div class="col-lg-3 mb-lg-0 mb-6">
                                <label>ປະເພດສິນຄ້າ</label>

                                <div class=" input-group">
                                    <select class="form-control" name="search_product_type_id">
                                        <option value=""
                                                @if(request()->get('search_product_type_id') == "")
                                                selected
                                            @endif
                                        >@lang("All")</option>
                                        @foreach($product_types as $type)
                                            <option value="{{$type->id}}"
                                                    @if(request()->get('search_product_type_id') == $type->id)
                                                    selected
                                                @endif
                                            >
                                                    {{$type->name}}

                                            </option>
                                        @endforeach

                                    </select>
                                    <button type="submit" class="btn btn-outline-primary ml-4"><i class="fa fa-search"></i>@lang("Search")</button>
                                    <a href="{{route("product.index")}}" class="btn btn-outline-warning ml-4"><i class="fas fa-undo"></i>@lang("Reset")</a>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>


                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>@lang("Created At")</th>
                            @if(\App\Models\User::find(Auth::user()->id)->user_type == "admin")
                                <th>@lang("Store")</th>
                            @endif
                            <th>@lang("Image")</th>
                            <th>@lang("Name")</th>
                            <th>@lang("Sell Price")</th>
                            <th>@lang("Cost Price")</th>

                            <th>ປະເພດສິນຄ້າ</th>

                            <th>@lang("Stock")</th>

                            <th>@lang("Action")</th>

                            <th>@lang("Updated at")</th>



                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_products as $item)
                            <tr>
                                <td>{{$item->created_at}}</td>
                                @if(\App\Models\User::find(Auth::user()->id)->user_type == "admin")
                                <td >
<div class="d-flex justify-content-between">
                                    <div class="item" style="width: 50px;"><a href="{{$item->stores->image}}" data-lightbox="photos"><img class="img-fluid" src="{{$item->stores->image}}"></a></div>
                                    {{$item->stores->fname}}
</div>
                                </td>
                                @endif
                                <td>
                                    <div class="item" style="width: 50px;"><a href="{{$item->image}}" data-lightbox="photos"><img class="img-fluid" src="{{$item->image}}"></a></div>
                                </td>
                                <td>
                                        {{$item->name}}
                                </td>
                                <td>

                                        <b>{{number_format($item->sell_price)}}</b>
                                </td>
                                <td>{{number_format($item->cost_price)}}</td>

                                <td>
                                    <b class="badge badge-pill badge-primary">

                                            {{$item->product_types->name}}

                                    </b>
                                </td>

                                <td><b class=" text-dark">
                                        @if($item->stocks)
                                            {{number_format($item->sumStocks())}}
                                        @else
                                            0
                                        @endif
                                    </b></td>
                                <td>
                                    <div class="d-flex justify-content-start m-0">

                                        <a href="{{route('product.edit',$item->id)}}" class="btn btn-link" ><i class="far fa-edit text-primary"></i></a>

                                        <form action="{{route('product.destroy',$item->id)}}" method="post" class="delete{{$item->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" btn btn-link delete_button" data-id="{{$item->id}}"><i class="fas fa-trash text-primary"></i></button>
                                        </form>
                                        <a href="{{route('stock.edit',$item->id)}}" class="btn btn-link" ><i class="fa fa-plus-square text-primary"></i></a>

                                    </div>
                                </td>

                                <td>{{$item->updated_at}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$list_products->withQueryString()->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ເພີ່ມສິນຄ້າ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        @if(\App\Models\User::find(Auth::user()->id)->user_type == "admin")
                            <div class="form-group">
                                <label>ຮ້ານຄ້າ</label>
                                <select class="form-control" name="store_id">
                                    @foreach($stores as $type)
                                        <option value="{{$type->id}}">
                                            {{$type->fname}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="form-group">
                            <label>ປະເພດສິນຄ້າ</label>
                            <select class="form-control" name="product_type_id">
                                @foreach($product_types as $type)
                                    <option value="{{$type->id}}">
                                            {{$type->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>@lang("Name")</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>@lang("Image")</label>
                            <input type='file' name="image" onchange="readURLImage(this);" class="form-control"/>
                            <div class="d-flex justify-content-center mt-2">
                                <img id="image" width="180px" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang("Cost Price")</label>
                            <input type="text" class="form-control" name="cost_price" id="money" required>
                        </div>
                        <div class="form-group">
                            <label>@lang("Sell Price")</label>
                            <input type="text" class="form-control" name="sell_price" id="money" required>
                        </div>



                        <div class="form-group">
                            <label>@lang("Description")</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang("Close")</button>
                        <button type="submit" class="btn btn-primary">@lang("Submit")</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@section('script')

    <script>
        function readURLImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection
@endsection
