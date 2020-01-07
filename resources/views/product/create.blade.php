<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Salut</h1>
   <div class="container">
       <div><p><a href="">{{__('Enregistrement d\'un produit')}}</a></p></div>
       <div class="container">
           <form action="{{route('product.store')}}" method="post">
               @csrf
               <div>
                   <input type="text" name="name" class="form-control" placeholder="le nom du produit">
               </div>
               <div>
                   <input type="text" name="price" class="form-control" placeholder="Le prix du produit">
               </div>
               <div>
                   <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="La description"></textarea>
               </div>
               <div>
                   <button class="btn btn-primary">Enregistrer</button>
               </div>
           </form>
           
           </div>
           </div>
           </div>
</body>
</html>