@extends('layouts.app')
@section('title','Details For'.$customer->name)
@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Details for {{$customer->name}}</h1>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3>Active Customer</h3>
            <table class="table table-hover table-striped">
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
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->phoneNumber}}</td>
                    <td>{{$customer->active}}</td>
                    <td>{{$customer->company->name}}</td>
                    <td><a class="btn btn-primary" href="/customers/{{$customer->id}}/edit">Edit</a></td>
                </tr>

            </table>
        </div>
    </div>

@endsection
