@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{__($product->name)}}</h3>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                @if(Storage::disk('public')->has($product->thumbnail))
                    <img src="{{Storage::disk('public')->url($product->thumbnail)}}" class="card-img-top" style=" ">
                @endif
            </div>
            <div class="col-md-6">
                @if($product->discount > 0)
                    <p>Old Price: <small style="text-decoration: line-through; color: red">{{round($product->price, 2)}}$</small></p>
                @endif
                <p>Price: {{$product->printPrice()}}$</p>
                <p>SKU: {{$product->SKU}}</p>
                <p>Quantity: {{$product->quantity}}</p>
                <hr>
                <div>
                    <p>Product Categories:</p>
                    @include('categories.parts.category_view', ['category'=>$product->category()->first()])
                </div>
                @auth
                    @if($product->quantity >0)
                        <hr>
                        <div>
                            <p>Add to Cart:</p>
                             <form action="{{route('cart.add',$product)}}" method="POST" class="form-inline">

                                @csrf
                                @method('post')
                                <div class="form-group mx-sm-3 mb-2">

                                    <label for="product_count" class="sr-only">Count:</label>
                                    <input type="number"
                                           name="product_count"
                                           class="form-control"
                                           id="product_count"
                                           min="1"
                                           max="{{$product->quantity}}"
                                           value="1"
                                    >

                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Buy</button>
                            </form>
                        </div>
                    @endif
                        <hr>


                @else
                    <h5 class="text-center p-3" style="color: red" >{{ __('Please sing in for buying')}}</h5>
                @endauth

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h4>Description:</h4>
                <p>{{$product->description}}</p>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#addStar') . change(' .star', function (e) {
                $(this) .submit();

            });

        });
    </script>
@endsection
