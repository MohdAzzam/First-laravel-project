@extends('layouts.app')
@section('title','Update Customer')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Update Customer {{$customer->name}} </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/customers/{{$customer->id}}" method="POST">
                @method('PATCH')
                @include('customers.form')
                <button type="submit" class="btn btn-success ">Save</button>

            </form>

        </div>
    </div>
@endsection
