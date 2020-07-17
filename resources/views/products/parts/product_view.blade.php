<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        @if(Storage::disk('public')->has($product->thumbnail))
            <img src="{{Storage::disk('public')->url($product->thumbnail)}}"
                 height="225" class="card-img-top"style="">
        @endif
        <div class="card-body">
            <p class="card-title">{{__($product->name)}}</p>
            <hr>
            <p class="card-text">{{__($product->small_description)}}</p>
            <div class="d-flex flex-column justify-content-center align-items-start">
                <small class="text-muted">Categories:</small>
                <div class="btn-group align-self-end">
                    @if($product->category()->exists())
                        @include('categories.parts.product_category',['category'=> $product->category()->first()])
                    @endif

                </div>

            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{route('products.show', $product->id)}}"
                    class="btn btn-sm btn-outline-dark">
                        {{__('Show')}}
                    </a>
                </div>
                <div class="text-muted">
                    @if ($product->discount >0)
                        <small style="color: red; text-decoration: line-through">
                            {{$product->price . __('$')}}
                        </small>
                    @endif
                    {{$product->printPrice()}}
                </div>

            </div>
        </div>

    </div>
</div>
