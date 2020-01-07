
<table class="table table-striped">
       <tr>
           <th>#</th> 
           <th>Nom Produit</th> 
          <th>Prix Produit</th>           <th></th>
       </tr>
       @foreach($products as $product)
           <tr>
               <th>#</th>
               <th>{{$product->name}}</th>
               <th>{{$product->price}} {{ $product->category->name ?? '' }}</th>
               <th></th>
           </tr>
       @endforeach
   </table>
