@extends('layouts.newApp')
@section('title','Slide')

@section('header')


    <div class="d-flex align-items-baseline flex-wrap mr-5">

        <h5 class="text-dark font-weight-bold my-1 mr-5">@lang('Slide')</h5>
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('slide.index')}}" class="text-muted">@lang('List')</a>
            </li>

        </ul>
        <!--end::Breadcrumb-->
    </div>
    <div class="d-flex align-items-center">
        <!--begin::Actions-->

    {{--        <a href="{{route('slide.index')}}" class="btn btn-light-primary font-weight-bolder btn-sm" ><i class="fas fa-list"></i> Slider List</a>--}}

    <!--end::Actions-->

    </div>

@endsection


@section('content')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <h3 class="bg-white  font-weight-bolder  p-4 mb-4 shadow-sm"><i class="fas fa-sliders-h mr-2"></i>@lang('Edit Slide') </h3>


                <form action="{{route('slide.update',$edit->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Title')</label>
                            <input type="text" name="title" class="form-control" value="{{old('title',$edit->title)}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Title')</label>
                            <textarea name="content" id="content" name="content" class="form-control">{{old('content',$edit->content)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>@lang('Image')</label>

                            <input type='file' name="image" onchange="readURLImage(this);" class="form-control"/>
                            <div class="mt-4 d-flex justify-content-between">
                                <img src="{{$edit->image}}" width="180px" />
                                <div>

                                    <img id="image" width="180px" />
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary btn-block">@lang('Save changes')</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

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
