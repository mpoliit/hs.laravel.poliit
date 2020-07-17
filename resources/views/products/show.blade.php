@extends('layouts.app')

@inject('wishlist', 'App\Services\WishListService' )

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
                <p>Rating: {{round($product->averageRating(), 1 )?? 0}}/5 {{ $product->usersRated() >0 ? "({$product->usersRated()})" : '' }}</p>
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
                    <form class="form-horizontal postptars" action="{{route('rating.add', $product)}}" id="addStar" method="POST">
                        @csrf
                        <div class="form-group required">
                            <div class="col-sm-12">
                                @if($product->getUserProductRating() )
                                    @for($i = 5; $i >= 1;$i--)
                                        <input type="radio"
                                               class="star star-{{$i}}"
                                               value="{{$i}}"
                                               id="star-{{$i}}"
                                               name="star"
                                               @if($i == $product->getUserProductRating()) checked="checked" @endif


                                        >
                                        <label for="star-{{$i}}" class="star star-{{$i}}"></label>
                                    @endfor
                                @else
                                    <input type="radio" class="star star-5" value="5" id="star-5" name="star">
                                    <label for="star-5" class="star star-5"></label>
                                    <input type="radio" class="star star-4" value="4" id="star-4" name="star">
                                    <label for="star-4" class="star star-4"></label>
                                    <input type="radio" class="star star-3" value="3" id="star-3" name="star">
                                    <label for="star-3" class="star star-3"></label>
                                    <input type="radio" class="star star-2" value="2" id="star-2" name="star">
                                    <label for="star-2" class="star star-2"></label>
                                    <input type="radio" class="star star-1" value="1" id="star-1" name="star">
                                    <label for="star-1" class="star star-1"></label>




                                @endif

                            </div>

                        </div>

                    </form>
                    <hr>
                    @if($wishlist->isUserFollowed($product))
                        <form action="{{route('wishlist.delete', $product)}}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Remove from Wish List">
                        </form>
                    @else
                        <a href="{{route('wishlist.add', $product)}} " class="btn btn-success">{{__('Add to Wish List')}}</a>
                    @endif

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
