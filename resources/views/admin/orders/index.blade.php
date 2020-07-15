@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">{{__('Id')}}</th>
                        <th scope="col">{{__('User Name')}}</th>
                        <th scope="col">{{__('User email')}}</th>
                        <th scope="col">{{__('Total')}}</th>
                        <th scope="col" class="text-center">{{__('Action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @each('admin.orders.parts.orders_row', $orders, 'order')
                    </tbody>
                </table>

                {{ $orders->links() }}
            </div>
        </div>
    </div>
    </div>
@endsection
