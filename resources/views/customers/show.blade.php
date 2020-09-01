@extends('layouts.app')
@section('title','Details For'.$customer->name)
@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Details for {{$customer->name}}</h1>
        </div>
    </div>

    <div class="row ">
        <div class="col-12 d-flex justify-content-center pt-3">
            <div class="card" style="width: 18rem;">
                @if($customer->image)
                    <img src="{{asset('storage/'.$customer->image)}}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <h5 class="card-title text-center">{{$customer->name}}</h5>
                    <h6 class="card-text py-2">

                        <strong>Customer Id :</strong> {{$customer->id}}<br><br>
                        <strong>Company Name :</strong> {{$customer->company->name}}<br><br>
                        <strong>Email :</strong> {{$customer->email}}<br><br>
                        <strong>Phone Number :</strong> {{$customer->phoneNumber}}<br><br>
                        <strong>Customer Type :</strong> {{$customer->active}}<br>


                    </h6>
                    <a class="btn btn-primary d-flex flex-column " href="/customers/{{$customer->id}}/edit">Edit</a>
                    <br>
                    <form action="{{route('customers.destroy',['customer'=>$customer])}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <div class="d-flex flex-column ">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
