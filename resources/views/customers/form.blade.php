<div class="form-group ">
    <label for="name">Name </label>
    <input class="form-control" type="text" name="name" value="{{ old('name')?? $customer->name}}">
    <span>{{$errors->first('name')}}</span>
</div>
<div class="form-group">
    <label for="email">Email </label>
    <input class="form-control" type="email" name="email" value="{{old('email') ?? $customer->email}}">
    <span>{{$errors->first('email')}}</span>
</div>
<div class="form-group">
    <label for="phoneNumber">Phone Number</label>
    <input class="form-control" type="text" name="phoneNumber" value="{{old('phoneNumber') ?? $customer->phoneNumber}}">
    <span>{{$errors->first('phoneNumber')}}</span>

</div>
<div class="form-group">
    <lable for="active">Status</lable>
    <select name="active" id="active" class="form-control">
        <option value="" disabled>Select customer status</option>
        @foreach($customer->activeOption() as $activeOptionKey=>$activeOptionValue)
            <option value="{{$activeOptionKey}}" {{$customer->active==$activeOptionValue? 'selected':'' }}
            >{{$activeOptionValue}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <lable for="company_id">Company</lable>
    <select name="company_id" id="company_id" class="form-control">
        @foreach($companies as $company)
            <option
                value="{{$company->id }}" {{$company->id==$customer->company_id ? 'selected' :''}}>{{$company->name}}</option>
        @endforeach
    </select>
</div>
@csrf
