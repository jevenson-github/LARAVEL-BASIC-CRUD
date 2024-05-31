{{-- Appending the resources of bootstrap  --}}
@extends('layouts.app') 



@section('content')
    
   <div class="container">
    <h1>Product Page</h1>
        <a href="{{route('product.create')}}">CREATE PRODUCT</a> 
        <div class="row">
     <table border=1>
        <th>ID</th>
        <th>NAME</th>
        <th>PRICE</th>
        <th>QTY</th>
        <th>DESCRIPTION</th>
        <th>EDIT</th>
        <th>DELETE</th>
        {{-- loop the data  --}}
        @foreach ($products as $product )
          <tr>
            <td>{{  $product['id']}}</td> 
            <td>{{  $product['name']}}</td>
             <td>{{  $product['price']}}</td>
             <td>{{  $product['qty']}}</td>
             <td>{{  $product['description']}}</td>
             <td><a href="{{ route('product.edit', ['product' => $product]) }}">EDIT</a></td>
             <td>
                <form method="post" action="{{route('product.delete', ['product' => $product ])  }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="DELETE">
                </form>
             </td>
          </tr>
         
        @endforeach
     </table> 
   </div>
    @if (session()->has('message'))
     
     <script>
        alert("{{ session('message') }}"); 
     </script>
       
    @endif

   </div>

    @endsection