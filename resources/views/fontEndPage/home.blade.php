@extends('layouts.fontApp')
@section('title','Home')


@section('content')

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

        @foreach($sliders as $key =>$slider)

                            <div class="carousel-item @if($key==0) active @endif">
                                <img class="d-block w-100"  src="{{$slider->image}}" alt="First slide">
                            </div>

            @endforeach
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>

    <nav class="navbar navbar-expand-lg navbar-dark  mb-5 shadow p-4 pl-4" style="background-color: #607D8B">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">ປະເພດສິນຄ້າ:</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- Link -->
                <li class="nav-item ">
                    <a class="nav-link     @if(request()->get('search_product_type_id') != '')
                        text-white
@endif" href="{{route('home')}}">@lang("All") ({{\App\Models\Product::all()->count()}})</a>
                </li>

                @foreach($product_types as $type)
                <li class="nav-item">
                    <a class="nav-link
 @if(request()->get('search_product_type_id') !=$type->id )
                        text-white
@endif " href="{{route('home',['search_product_type_id'=>$type->id])}}">{{$type->name}} ({{$type->products->count()}})</a>
                </li>

                @endforeach

            </ul>

            <!-- Search -->
            <form class=" py-1 " style="max-width: 12rem">
                <input type="search"   value="{{ request()->get('search_name') }}" name="search_name" class="form-control rounded-0" placeholder=@lang("Search") aria-label="Search">
            </form>
        </div>

        </div>
    </nav>



    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-body">
            <form class="" method="get" action="{{route('home')}}">
                <div class="justify-content-start d-flex">
                <div class="form-group">
                    <label>ລາຄາເລີ່ມ</label>
                    <input type="number" step="1000" class="form-control" value="{{request()->get('start')}}" name="start" >
                </div>
                    <div class="mx-2"></div>
                    <div class="form-group">
                        <label>ລາຄາສູງສູດ</label>
                        <input type="number" step="1000" class="form-control" value="{{request()->get('end')}}" name="end">
                    </div>
                    <div class="mx-2"></div>
                    <div class="form-group">
                        <label>.</label>
                    <button type="submit" class="btn btn-light-success form-control"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>
    <div class="container">



                <div class="row">

                    @foreach($products as $product)
                        <!--begin::Product-->
                    <div class="col-md-3 col-lg-12 col-xxl-3">
                        <div class="card card-custom gutter-b card-stretch">

                            <div class="card-body d-flex flex-column rounded bg-light justify-content-between">

                                <div class="d-flex justify-content-between">

                                    <div><img src="{{$product->stores->image}}" width="50px"></div>
                                    <div><span class="badge badge-secondary">{{$product->stores->fname}}</span></div>
                                </div>
                                <div class="text-center rounded mb-4">
                                    <img src="{{$product->image}}" class="mw-100 w-200px" />
                                </div>
                                <div class="d-flex justify-content-between text-muted mb-2">
                                    <div>
                                        @lang('Stock') :  @if($product->stocks)
                                            {{number_format($product->sumStocks())}}
                                        @else
                                            0
                                        @endif
                                    </div>
                                    <div>
                                        ຂາຍແລ້ວ : @if($product->stocks)
                                            {{number_format($product->sellItems())}}
                                        @else
                                            0
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between bg-secondary rounded p-1">
                                    <div>
                                    <h4 class="font-size-h5">
                                        <a href="#" class="text-dark-75 font-weight-bolder">{{$product->name}}</a>
                                    </h4>
                                    <div class="font-size-h6 text-muted font-weight-bolder">{{number_format($product->sell_price)}}</div>

                                    </div>

                                    <div>
                                        @auth

                                            @if(\App\Models\User::find(Auth::user()->id)->user_type == 'customer')

                                                @if($product->sumStocks() >0)
                                                    @if(session('cart'))
                                                        @foreach(session('cart') as $id => $details)
                                                            @if($details['id'] == $product->id)
                                                            <span class="badge badge-warning">{{$details['quantity']}}</span>
                                                            @endif
                                                        @endforeach
                                                            @endif

                                            <a  href="{{ route('add.to.cart', $product->id) }}" class="btn btn-secondary">
											         <i class="fas fa-cart-plus fa-3x"></i>
                                            </a>
                                                @else
                                                    <span   class="btn btn-text-muted">
                                                        <i class="fas fa-cart-plus fa-3x"></i>
                                                    </span>
                                                @endif
                                            @endif
                                        @else
                                            <a class="topbar-item "  href="{{route('client.login')}}">
                                                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg">
											<span class="svg-icon svg-icon-xl svg-icon-light mr-2 ">

											         <i class=" far fa-user-circle"></i>
                                            </span>
                                                    <span > @lang('Login')</span>
                                                    <span class="pulse-ring"></span>
                                                </div>
                                            </a>
                                        @endauth

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                            <!--end::Product-->
                    @endforeach
                </div>
        {{$products->withQueryString()->links("pagination::bootstrap-4")}}

    </div>




@endsection

