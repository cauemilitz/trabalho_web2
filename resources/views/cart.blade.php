@extends('master')
@section('content')

@if(count($products)==0)
<h1>Seu carrinho está vazio</h1>
@else

<div class="card">
    <div class="card-header">
      Carrinho
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Imagem</th>
            <th scope="col">Produto</th>
            <th scope="col">Valor</th>
            <th scope="col">Quantidade</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            <th scope="row">
              <img src="./image/vinho-roxo.jpeg" width="150px" height="150px" />
            </th>
            <td>{{ $product['product']->name}}</td>
            <td>{{ $product['amount'] }}</td>
              
            <td>
              <form action="{{ route('operation') }}" method="POST">
                <input type="hidden" name="operation" value="add">
                <input type="hidden" name="product_id" value="{{  $product['product']->id }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary">+</button> 
              </form>
              {{$product['quantity']}} 
              <form action="{{ route('operation') }}" method="POST">
              <input type="hidden" name="operation" value="sub">
                <input type="hidden" name="product_id" value="{{  $product['product']->id }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary">-</button>
              </form>
            </td>
            </tr>
            @endforeach
            {{$total}}
        </tbody>
      </table>              
    </div>
  </div>
  <form action="{{ route('remove-cart') }}" method="post">
    <input name="_token" type="hidden" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-secondary">esvaziar carrinho</button>
    
  </form>
  <form action="{{ route('finish-pay') }}" method="post">
  <input name="_token" type="hidden" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-primary">finalizar compra</button>
  </form>
@endif
       
@endsection