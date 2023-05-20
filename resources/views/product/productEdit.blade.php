@extends('layouts.newApp')
@section('title','Products')

@section('header')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <h5 class="text-dark font-weight-bold my-1 mr-5">@lang("Products")</h5>
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{route('product.index')}}" class="text-muted">@lang("List")</a>
                </li>

            </ul>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <div class="d-flex align-items-center">


    </div>
@endsection


@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h3 class="bg-white text-primary font-weight-bolder  p-4 mb-4 shadow-sm">ແກ້ໄຂ</h3>
                <div class="modal-content">

                    <form action="{{route('product.update',$edit->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            @if(\App\Models\User::find(Auth::user()->id)->user_type == "admin")
                                <div class="form-group">
                                    <label>ຮ້ານຄ້າ</label>
                                    <select class="form-control" name="store_id">
                                        @foreach($stores as $type)
                                            <option value="{{$type->id}}"
                                                    @if($type->id == $edit->store_id)
                                                    selected
                                                @endif
                                            >
                                                {{$type->fname}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="form-group">
                                <label>@lang("ປະເພດສິນຄ້າ")</label>
                                <select class="form-control" name="product_type_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                                @if($category->id == $edit->product_type_id)
                                                selected
                                            @endif
                                        >

                                                {{$category->name}}


                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>@lang("Name")</label>
                                <input type="text" class="form-control" name="name" value="{{old('name',$edit->name)}}" required>
                            </div>


                            <div class="form-group">
                                <label>@lang("Image")</label>
                                <input type='file' name="image" onchange="readURLImage(this);" class="form-control"/>
                                <div class="mt-4 d-flex justify-content-between flex-wrap">
                                    <img src="{{$edit->image}}" width="180px" />


                                    <img id="image" width="180px" />

                                </div>
                            </div>

                            <div class="form-group">
                                <label>@lang("Cost Price")</label>
                                <input type="text" class="form-control" name="cost_price" id="money"  value="{{old('cost_price',$edit->cost_price)}}" required>
                            </div>
                            <div class="form-group">
                                <label>@lang("Sell Price")</label>
                                <input type="text" class="form-control" name="sell_price" id="money" value="{{old('sell_price',$edit->sell_price)}}" required>
                            </div>


                            <div class="form-group">
                                <label>@lang("Description")</label>
                                <textarea name="description" class="form-control" rows="4">{{old('description',$edit->description)}}</textarea>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-block ">ແກ້ໄຂ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





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
