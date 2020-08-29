@extends('layout')
@section('title','Customer List')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Customers </h1>
                <a class="nav-link " href="customers/create">Add Customer</a>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3>Active Customer</h3>
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
                        <td><a class="btn btn-primary" href="/customers/{{$customer->id}}">View</a></td>
                        <form action="/customers/{{$customer->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <td><button class="btn btn-danger" type="submit">Delete</button></td>

                        </form>

                    </tr>

                @endforeach
            </table>
        </div>
    </div>

@endsection
