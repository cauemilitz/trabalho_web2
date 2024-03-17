@extends('master')
@section('content')

<form method="POST" action="{{route('order_update',$order->id)}}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="Box"> 
        <div class="row mt-2">
        <div class="col-md-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" aria-label="selecione">
                    <option value="">selecione</option>
                    @foreach($status as $key => $value)
                    <option {{ $order->status == $key ? "selected" : "" }} value="{{ $key }}" >{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">total</label>
                <input type="number" name="total" class="form-control" value="{{ $order->total }}">
            </div>
        </div>
        <div class="row">
        <div class="col-md-4">
                <label class="form-label">coupon</label>
                <select name="coupon_id" class="form-select" aria-label="selecione">
                    <option value="">selecione</option>
                    @foreach($coupons as $coupon)
                    <option {{$order->coupon_id == $coupon->id ? 'selected' : '' }} value="{{ $coupon->id }}" >{{ $coupon->code }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">customer ID</label>
                <select name="customer_id" class="form-select" aria-label="selecione">]
                    <option >selecione</option>
                    @foreach($customers as $customer)
                    <option {{ $order->customer_id == $customer->id ? 'selected' : '' }} value="{{ $customer->id }}" >{{ $customer->name }}</option>
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