@foreach
<div class="col-lg-4 col-sm-6 portfolio-item">
   <div class="card h-100">
       <a href="#"><img class="card-img-top" src="{{$product->images ?? asset('uploads/images/default.png')}}" height="250" width="250" alt=""></a>
       <div class="card-body">
           <h4 class="card-title">
               <a href="/produit/{{$product->id}}/show">{{$product->name}}</a>
           </h4>
           <p class="card-text">{!! \Illuminate\Support\Str::words($product->description, 25,'....')  !!}</p>
       </div>
   </div>
</div>

($products as $product)
   <tr>
       <th>#</th>
       <th>{{$products->name}}</th>
       <th>{{$products->price}} {{ $products->Category->name??'' }}</th>
       <th>{{$products->description}}</th>
       <th>
         
       </th>
   </tr>
@endforeach

