@extends('master')
@section('content')
<h1>pagina de pagamento</h1>


<img src="{{ asset('storage/'.$qrCode) }}" />
<form action="{{ route('simulate') }}" method="post">
<input type="hidden" name="order_id" value="{{ $orderId }}">
<input name="_token" type="hidden" value="{{ csrf_token() }}">
<button type="submit" class="btn btn-primary">simular pagamento</button>
</form>
@endsection