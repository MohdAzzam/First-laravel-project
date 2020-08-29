@extends('layout')
@section('title','Add New Customer')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Add New Customers</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/customer" method="post">
                @include('customers.form')
                <button type="submit" class="btn btn-primary ">Add Customer</button>

            </form>

        </div>
    </div>
@endsection
