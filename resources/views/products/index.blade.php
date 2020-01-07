<table class="table table-striped">
       <tr>
           <th>#</th>          <th>Nom Produit</th>           <th>Prix Produit</th>           <th>Editer</th> <th></th>
       </tr>
       @foreach($products as $product)
           <tr>
               <th>#</th>
               <th>{{$product->name}}</th>
               <th>{{$product->price}} {{ $product->category->name ?? '' }}</th>
               <th>
               
                   <p><a href="{{route('editer_produit',['id'=>$product->id])}}">class="btn btn-primary">Editer</a>
                   </p>
                   </th>
                   <th>
                   <form action="product/{{$product->id}}" method="post">
               @csrf
               @method('delete')
               <p><a href="">Supprimer</a></p>
               <input type="submit" class="btn btn-danger" name="delete" value="Supprimer">
           </form>

       </th>
           </tr>
       @endforeach
   </table>


