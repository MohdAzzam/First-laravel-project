@extends('layouts.app')
@section('title','Customer List')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Customers </h1>

        </div>
    </div>
    @can('create',App\Customer::class)
        <div class="row">
        <div class="col-12">
            <a class="nav-link " href="{{route('customers.create')}}">Add Customer</a>

        </div>
    </div>
    @endcan
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td scope="col">Id</td>
                    <td scope="col">Name</td>
                    <td>User Name</td>
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
                        <td>{{$customer->username}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->phoneNumber}}</td>
                        <td>{{$customer->active}}</td>
                        <td>{{$customer->company->name}}</td>

                        <td>
                            @can('view',$customer)
                            <a class="btn btn-primary" href="{{ $customer->path() }}"
                            >View</a>
                            @endcan
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
