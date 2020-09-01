@extends('layouts.app')
@section('title','Customer List')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Customers </h1>
            <a class="nav-link " href="{{route('customers.create')}}">Add Customer</a>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3>Customer</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td scope="col">Id</td>
                    <td scope="col">Name</td>
                    <td scope="col">Email</td>
                    <td scope="col">Phone Number</td>
                    <td scope="col">Status</td>
                    <td scope="col">Company Name</td>
                    <td></td>
                </tr>
                </thead>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->phoneNumber}}</td>
                        <td>{{$customer->active}}</td>
                        <td>{{$customer->company->name}}</td>
                        <td><a class="btn btn-primary" href="{{ route('customers.show', ['customer'=>$customer]) }}"
                            >View</a>
                        </td>

                    </tr>

                @endforeach
            </table>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{$customers->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
