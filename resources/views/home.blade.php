@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="text-center">{{__('Home Page')}}</h2>
            </div>
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success"role="alert">
                        {{session('status')}}
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <div class="album py-5 bg-light">
                    <div class="container">
                        <h3 class="text-center mb-5">{{__('Products')}}</h3>
                        <div class="row">

                            @each('products.parts.product_view', $products, 'product')
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-12">
                <div class="album py-5 bg-light">
                    <div class="container">
                        <h3 class="text-center mb-5">{{__('Categories')}}</h3>
                        <div class="row d-flex justify-content-between align-items-center">
                            @each('categories.parts.category_view', $categories, 'category')
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
