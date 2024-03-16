@extends('master')
@section('content')

<form method="POST" action="{{route('customer_store')}}">
{{ csrf_field() }}

<div class="Box"> 
        <div class="row mt-2">
            <div class="col-md-4">
                <label class="form-label">Nome</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">phone</label>
                <input type="number" name="phone" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">adress</label>
                <input type="text" name="adress" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">city</label>
                <input type="text" name="city" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">state</label>
                <input type="text" name="state" class="form-control">
            </div>  
        </div>
        <div class="row mb-3">                
            <div class="col-md-4">
                <label class="form-label">number</label>
                <input type="number" name="number" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">postcode</label>
                <input type="text" name="postcode" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">district</label>
                <input type="text" name="district" class="form-control">
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