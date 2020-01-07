@extends('layouts.app');
@section('content');
    <div class="container">


<table class="table table-striped">
       <tr>
         <th>#</th>
         <th>image produit</th>    
         <th>Nom Produit</th>   
         <th>Description produit</th>
         <th>Prix Produit</th>

         <th></th>         
       </tr>
       @foreach($products as $product);
           <tr>
               <th>#</th>
               <th><img src="{{$product->images ? asset($product->images) :
                asset('uploads/images/default.png')}}" alt="{{$product->images}}"
                 width="50"></th>
               <th>{{$product->name}}</th>
               <th>{{$product->description}}</th>
               <th>{{$product->price}}</th>
               

</p>
 </th>
               <th> <th>
           <p><a href="{{route('editer_produit',['id'=>$product->id])}}" class="btn btn-primary">Editer</a></p>

           <form action="/delete/{{$product->id}}" method="post">
               @csrf
               @method('delete')
               <input type="submit" class="btn btn-danger" name="delete" value="Supprimer">
           </form>
</th>
           </tr>
       @endforeach
   </table>
   </div>
   @endsection