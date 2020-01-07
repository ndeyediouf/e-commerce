<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<form action="/products/{{$product->id}}" method="post" enctype="multipart/form-data">>
   @csrf
   @method('patch')
   <div><input type="text" name="name" class="form-control" placeholder="le nom du produit" value="{{$product->name}}"></div>
   <div><input type="text" name="price" class="form-control" placeholder="Le prix du produit" value="{{$product->price}}"> </div>
   <div> <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="La description">{{$product->description}}</textarea> </div>
<div>
   <input type="file" name="product_image" class="form-control">
</div>

   <div class="row">
   <div class="col-6 text-right"><img src="{{asset($product->images)}}" alt="{{$product->name}}" width="100"></div><div class="col-6"><h3>Chargez une autre image pour remplacer celle-ci</h3></div>

   <div> <button class="btn btn-primary">Enregistrer</button> </div>
   
</div>
</form>
</body>
</html>