    
   <div class="container">
       <div><p><a href="{{route('categories.index')}}">{{__('Enregistrement d\'un produit')}}</a></p></div>
       <div class="container">
           <form action="{{route('product.store')}}" method="post">
               @csrf
               <div>
                   <input type="text" name="name" class="form-control" placeholder="le nom du produit">
               </div>
               <div>
                   <input type="text" name="price" class="form-control" placeholder="Le prix du produit">
               </div>
               div>
   <select name="category_id" id="category_id" class="form-control">
      < <option value=""></option>
       @foreach($categories as $key => $value)
           <option value="{{$key}}" {{ $key == $product->category_id ? 'selected="selected"':''}}>{{$value}}</option>
       @endforeach
   </select>
</div>

               <div>
                   <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="La description"></textarea>
               </div>
               <div>
                   <button class="btn btn-primary">Enregistrer</button>
               </div>
           </form>