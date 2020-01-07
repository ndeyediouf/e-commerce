<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E_COMMERCE</title>
</head>
<body>
<h1>"ns contacter"</h1>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
   <div class="container">
       <div class="container">
           <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" >
           

               @csrf
               <div>
                   <input type="text" name="name" class="form-control" placeholder="Le nom du produit">
               </div>
               <div>
                   <input type="text" name="price" class="form-control" placeholder="Le prix du produit">
               </div>   <select name="category_id" id="category_id" class="form-control">
       <option value=""></option>
       @foreach($categories as $key => $value)
           <option value="{{$key}}">{{$value}}</option>
       @endforeach
       <div><input type="file" name="product_image" class="form-control"></div> 

   </select>
</div>
               <div>
                   <textarea name="description" id="description" cols="200" rows="20" class="form-control" placeholder="LA DESCRIPTION DU PRODUIT"></textarea>
               </div>
               <div>
                   <button type="submit" class="btn btn-primary">valider</button>
               </div>
           </form>
           
           </div>
           </div>
           </div>
</body>
</html>