@extends('master')
@section('content')

        
<form action="{{ route('store') }}" method="post">
<input name="_token" type="hidden" value="{{ csrf_token() }}">            
        <div class="row mt-5">
            <div class="col-md-12">
                <h3 class="CorVermelha">Dados de Faturamento</h3>
            </div>            
        </div>
        <div class="Box"> 
            <div class="row mt-2">
                <div class="col-md-4">
                    <label class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Endereço</label>
                    <input type="text" name="adress" class="form-control">
                </div>
                <div class="col">
                    <label class="form-label">Número</label>
                    <input type="text" name="number" class="form-control">
                </div>    
                <div class="col">
                    <label class="form-label">Cep</label>
                    <input type="text" name="postcode" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Bairro</label>
                    <input type="text" name="district" class="form-control">
                </div>
                <div class="col">
                    <label class="form-label">Cidade</label>
                    <input type="text" name="city" class="form-control">
                </div>
                <div class="col">
                    <label class="form-label">Estado</label>
                    <input type="text" name="state" class="form-control">
                </div>
            </div>
            
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h3 class="CorVermelha">Informações do Pedido</h3>
            </div>            
        </div>
    <div class="Box"> 
        <div class="row mt-2">
            <div class="col-md-4">
                <label class="form-label">forma de pagamento</label>
                <input type="text" name="payment" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">valor total</label>
                <input type="text" class="form-control" value="{{ $total }}" disabled>
                <input type="hidden" name="total" value="{{ $total }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">desconto</label>
                <input type="text" name="discont" class="form-control">
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">frete</label>
                    <input type="text" name="freight" class="form-control">
                </div>
        </div>
        
        <div class="row mt-2">
            <div class="col">
                <button type="submit" class="btn btn-primary">Finalizar Compra</button>
            </div>
        </div>
    </div>
</form>
@endsection