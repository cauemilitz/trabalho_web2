@extends('master')
@section('content')

<form method="POST" action="{{route('order_store')}}">
{{ csrf_field() }}
    <div class="Box"> 
        <div class="row mt-2">
            <div class="col-md-4">
                <label class="form-label">total</label>
                <input type="number" name="total" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">coupon</label>
                <select name="coupon_id" class="form-select" aria-label="selecione">
                    <option value="">selecione</option>
                    @foreach($coupons as $coupon)
                    <option value="{{ $coupon->id }}" >{{ $coupon->code }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">  
            <div class="col-md-4">
                <label class="form-label">cliente</label>
                <select name="customer_id" class="form-select" aria-label="selecione">
                    <option >selecione</option>
                    @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" >{{ $customer->name }}</option>
                    @endforeach
                </select>
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