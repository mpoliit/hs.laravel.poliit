@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{__('Category "' . $category->title . '"')}}</h3>
            </div>
            <div class="col-md-12">
                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row">

                           @include('categories.parts.category_view',['category'=>$category,'products' => $products])
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row">

                            @include('categories.parts.products_show',['category'=>$category,'products' => $products])
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
