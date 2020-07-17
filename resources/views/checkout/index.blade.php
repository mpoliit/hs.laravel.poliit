@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{__('Checkout')}}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


            </div>
            <div class="col-md-8">
                <form action="{{route('orders.create')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col=form-label text-md-right">{{__('Name')}}</label>
                        <div class="col-md-6">
                            <input id="name"
                                   type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name"
                                   value="{{Auth()->user()->name}}"
                                   autocomplete="name"
                                   autofocus
                            >
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="surname" class="col-md-4 col=form-label text-md-right">{{__('Surname')}}</label>
                        <div class="col-md-6">
                            <input id="surname"
                                   type="text"
                                   class="form-control @error('surname') is-invalid @enderror"
                                   name="surname"
                                   value="{{Auth()->user()->surname}}"
                                   autocomplete="surname"
                                   autofocus
                            >
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col=form-label text-md-right">{{__('Email')}}</label>
                        <div class="col-md-6">
                            <input id="email"
                                   type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email"
                                   value="{{Auth()->user()->email}}"
                                   autocomplete="email"

                            >
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col=form-label text-md-right">{{__('Phone')}}</label>
                        <div class="col-md-6">
                            <input id="phone"
                                   type="text"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   name="phone"
                                   value="{{Auth()->user()->phone}}"

                            >
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="country" class="col-md-4 col=form-label text-md-right">{{__('Country')}}</label>
                        <div class="col-md-6">
                            <input id="country"
                                   type="text"
                                   class="form-control @error('country') is-invalid @enderror"
                                   name="country"
                                   value="{{old('country')}}"

                            >
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="city" class="col-md-4 col=form-label text-md-right">{{__('City')}}</label>
                        <div class="col-md-6">
                            <input id="city"
                                   type="text"
                                   class="form-control @error('city') is-invalid @enderror"
                                   name="city"
                                   value="{{old('city')}}"

                            >
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col=form-label text-md-right">{{__('Address')}}</label>
                        <div class="col-md-6">
                            <input id="address"
                                   type="text"
                                   class="form-control @error('address') is-invalid @enderror"
                                   name="address"
                                   value="{{old('address')}}"

                            >
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-10 text-right">
                            <input type="submit" class="btn btn-info" value="Create Order">

                        </div>

                    </div>

                </form>
            </div>
            <div class="col-md-4">
                <table class="table table-light">
                    <thead>
                    <tr>
                        <th>{{__('Product')}}</th>
                        <th>{{__('Quantity')}}</th>
                        <th>{{__('Price')}}</th>
                        <th>{{__('Subtotal')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::instance('cart')->content() as $cartItem)
                        <tr>
                            <td>
                                <a href="{{route('products.show',$cartItem->id)}}"><strong>{{$cartItem->name}}</strong></a>
                                <p>{{($cartItem->options->has('size') ? $cartItem->options->size : '')}}</p>
                            </td>
                            <td>{{ $cartItem->qty}}</td>
                            <td>{{ $cartItem->price }}$</td>
                            <td>{{ $cartItem->total }}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <hr>
                <table class="table table-dark" >
                    <tbody>
                    <tr>
                        <td colspan="2">&nbsp</td>
                        <td>Subtotal</td>
                        <td>{{Cart::subtotal() . __('$')}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp</td>
                        <td>Tax</td>
                        <td>{{Cart::tax() . __('$')}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp</td>
                        <td>Total</td>
                        <td>{{Cart::total() . __('$')}}</td>
                    </tr>

                    </tbody>

                </table>
            </div>

        </div>
    </div>
@endsection
