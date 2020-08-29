@extends('layouts.app')
@section('title','Contact Us')
@section('content')
    <h1>Contact Us </h1>
    @if(! session()->has('massage'))
    <form action="/contact" method="post">
        <div class="form-group ">
            <label for="name">Name </label>
            <input class="form-control" type="text" name="name" value="{{ old('name')}}">
            <span>{{$errors->first('name')}}</span>
        </div>
        <div class="form-group">
            <label for="email">Email </label>
            <input class="form-control" type="email" name="email" value="{{old('email') }}">
            <span>{{$errors->first('email')}}</span>
        </div>
        <div class="form-group">
            <label for="massage">Massage </label>
            <textarea  name="massage" id="massage" cols="20" rows="10" class="form-control">
                {{old('massage')}}
            </textarea>
            <span>{{$errors->first('massage')}}</span>
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
    @endif
@endsection
