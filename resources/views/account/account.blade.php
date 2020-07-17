@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{__('User Account')}}</h3>
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
                <form action="{{route('account.update')}}" method="POST">
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
                        <label for="balance" class="col-md-4 col=form-label text-md-right">{{__('Balance')}}</label>
                        <div class="col-md-6">
                            <input id="balance"
                                   type="number"
                                   class="form-control @error('balance') is-invalid @enderror"
                                   name="balance"
                                   value="{{Auth()->user()->balance}}"

                            >
                        </div>



                        <div class="form-group row">
                            <div class="col-md-10 text-right">
                                <input type="submit" class="btn btn-info" value="Update Account">

                            </div>

                        </div>

                </form>
            </div>


        </div>
    </div>
@endsection
