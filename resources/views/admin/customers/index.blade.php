@extends('master')
@section('content')

@if(Session::has('success'))
<h3>{{ Session::get('success') }}</h3>
@endif
<a href="{{ route('customer_create') }}" class="btn btn-primary">cadastro de cliente</a>
<table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">nome</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
              <tr>
                
                
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>
                    <a href="{{ route('customer_edit',$customer->id) }}" class="btn btn-primary">modificar</a>
                </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
          
@endsection