@extends('master')
@section('content')


        <img src="../../example-app/public/image/logotipo do site.png" class="logotipo" width="250px" height="250px">

        <h3 class="title">Filtros de pesquisa</h3>
        <div class="row">

            <form method="post"  action="{{ route('search') }}">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <div class="col-md-3">
                    <div class="mt-5 mb-3">                
                        <input type="text" class="form-control" name="name" placeholder="Nome do produto">
                    </div> 
                </div>
                <div class="col-md-3">
                    <div class="mt-5 mb-3">                
                        <input type="number" class="form-control" name="amount" placeholder="Preço">
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
                            </svg> Aplicar
                        </button>
                    </div>
                    
                </div>
            </form>
        </div>
        
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="card mb-2">
                    <img src="{{ asset('image/vinho-roxo.jpeg')}}" class="card-img-top" width="100px" height="350px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->sku }}</p>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><b>{{ $product->amount }}</b></p>
                        <form method="post" action="{{ route('add-item') }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
                            </svg> adicionar
                        </button>
                        </form>
                    </div>
                </div> 
            </div>
    
            @endforeach

        
        

               
    
@endsection