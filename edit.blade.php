<form action="{{route('product.update',['id'=>$product->id])}}" method="post">
   @csrf
   @method('patch')
   <div><input type="text" name="name" class="form-control" placeholder="le nom du produit" value="{{$product->name}}"></div>
   <div><input type="text" name="price" class="form-control" placeholder="Le prix du produit" value="{{$product->price}}"> </div>
   <div> <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="La description">{{$product->description}}</textarea> </div>
   <div> <button class="btn btn-primary">Enregistrer</button> </div>
</form>
