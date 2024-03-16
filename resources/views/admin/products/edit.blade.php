@extends('master')
@section('content')

<form method="POST" action="{{route('product_update',$product->id)}}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="Box"> 
        <div class="row mt-2">
            <div class="col-md-4">
                <label class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="col-md-4">
                <label for="exampleFormControlTextarea1" class="form-label">descrição</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $product->description }}</textarea>                    
            </div>
            <div class="col-md-4">
                <label class="form-label">valor</label>
                <input type="number" name="amount" class="form-control" value="{{ $product->amount }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">quantidade</label>
                <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">imagem</label>
                <input name="image" class="form-control" type="file" id="formFile">
            </div>    
            <div class="col-md-4">
                <label class="form-label">está ativo?</label>
                <select name="is_active" class="form-select" aria-label="selecione">
                    <option >selecione</option>
                    <option value="1" {{ $product->is_active == true ? 'selected' : '' }}>ativo</option>
                    <option value="0" {{ $product->is_active == false ? 'selected' : '' }}>inativo</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">                
            <div class="col-md-4">
                <label class="form-label">categoria ID</label>
                <select name="category_id" class="form-select" aria-label="selecione">]
                    <option >selecione</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected': '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">sku</label>
                <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">
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