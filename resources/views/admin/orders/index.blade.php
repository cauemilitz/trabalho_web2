@extends('master')
@section('content')

@if(Session::has('success'))
<h3>{{ Session::get('success') }}</h3>
@endif
<a href="{{ route('order_create') }}" class="btn btn-primary">cadastro de pedido</a>
<table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">cliente</th>
                <th scope="col">status</th>
                <th scope="col">total</th>
                <th scope="col" colspan="2"></th>
              </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
              <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->total }}</td>
                <td>
                    <a href="{{ route('order_edit',$order->id) }}" class="btn btn-primary">modificar</a>
                </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
          
@endsection