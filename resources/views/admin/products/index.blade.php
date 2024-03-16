@extends('master')
@section('content')

@if(Session::has('success'))
<h3>{{ Session::get('success') }}</h3>
@endif
<a href="{{ route('product_create') }}" class="btn btn-primary">cadastro de produto</a>
<table class="table">
            <thead>
              <tr>
                <th scope="col">Imagem</th>
                <th scope="col">Produto</th>
                <th scope="col">Valor</th>
                <th scope="col" colspan="2"></th>
              </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
              <tr>
                <th scope="row">
                <img src="{{asset('image/vinho-roxo.jpeg')}}" class="logotipo" width="250px" height="250px">
                </th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->amount }}</td>
                <td>
                    <a href="{{ route('product_edit',$product->id) }}" class="btn btn-primary">modificar</a>
                </td>
                <td>                  
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $product->id }}">deletar</button>
                      <div class="modal fade" id="exampleModal_{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">exclusão de produto {{ $product->name }}</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>deseja deletar mesmo o produto {{ $product->name }}, com o codigo sku {{ $product->sku }}?</p>
                            </div>
                            <div class="modal-footer">
                              <form method="post" action="{{ route('product_destroy',$product->id) }}">
                              {{ csrf_field() }}
                              {{ method_field('delete') }}
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">canselar</button>
                              <button type="submit" class="btn btn-primary">confirmar</button>
                            </form>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                  </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
          
@endsection