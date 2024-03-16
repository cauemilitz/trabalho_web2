@extends('master')
@section('content')

<form method="POST" action="{{route('customer_update',$customer->id)}}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="Box"> 
        <div class="row mt-2">
            <div class="col-md-4">
                <label class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">email</label>
                <input type="email" name="email" class="form-control" value="{{ $customer->email }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">phone</label>
                <input type="number" name="phone" class="form-control" value="{{ $customer->phone }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">adress</label>
                <input type="text" name="adress" class="form-control" value="{{ $customer->adress }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">city</label>
                <input type="text" name="city" class="form-control" value="{{ $customer->city }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">state</label>
                <input type="text" name="state" class="form-control" value="{{ $customer->state }}">
            </div>  
        </div>
        <div class="row mb-3">                
            <div class="col-md-4">
                <label class="form-label">number</label>
                <input type="number" name="number" class="form-control" value="{{ $customer->number }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">postcode</label>
                <input type="text" name="postcode" class="form-control" value="{{ $customer->postcode }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">district</label>
                <input type="text" name="district" class="form-control" value="{{ $customer->district }}">
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <button type="submit" class="btn btn-primary">salvar</button>
        </div>
    </div>
</form>

@endsection