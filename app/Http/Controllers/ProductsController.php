<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ProductsController extends Controller
{   
    public function __construct()
    {
       //$this->middleware('auth');
    }
    





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = \App\Product::all();
        return view('product.home', compact('products'));
        
        $products = \App\Product::orderBy('created_at', 'DESC')->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::pluck('name','id');
        return view('products.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
            $data = $request->validate([
                'name'=>'required|min:3',
                'price' => 'required|max:700000000|numeric',
                'description' => 'max:1000000',
                "product_image" => 'nullable | image | mimes:jpeg,png,jpg,gif | max: 2048'

            ]); 
            $product = new Product();
            //On verfie si une image est envoyée
            if($request->has('product_image')){
                //On enregistre l'image dans un dossier
                $image = $request->file('product_image');
                //Nous allons definir le nom de notre image en combinant le nom du produit et un timestamp
                $image_name = Str::slug($request->input('name')).'_'.time();
                //Nous enregistrerons nos fichiers dans /uploads/images dans public
                $folder = '/uploads/images/';
                //Nous allons enregistrer le chemin complet de l'image dans la BD
                $product->images = $folder.$image_name.'.'.$image->getClientOriginalExtension();
                //Maintenant nous pouvons enregistrer l'image dans le dossier en utilisant la methode uploadImage(

            }
            //dd($request->input('category_id'));
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->category_id = $request->input('category_id');
            $product->save();
            return redirect('/products');
        }
        
        public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null){
            $name = !is_null($filename) ? $filename : str_random('25');
            $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
         
            return $file;
         }
         

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    { 
          $product =\App\ Product::where('slug',$slug)->first();
          return view("products.show", compact('product'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

              //$this->authorize('admin');
            $product = \App\Product::find($id);//on recupere le produit
            $categories = \App\Category::pluck('name','id');
            return view('products.edit', compact('product'));
         
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          
            $data = $request->validate([
               'name'   => 'required',
               'price' => 'required | numeric',
               'product_image' => 'nullable | image | mimes:jpeg,png,jpg,gif | max:2048'
            ]);


        
            $product = \App\Product::find($id);
            if($product){
                if($request->has('product_image')){
                    //On enregistre l'image dans une variable
                    $image = $request->file('product_image');
                    if(file_exists(public_path().$product->images))//On verifie si le fichier existe
                        //Storage::delete(asset($product->images));//On le supprime alors
                    //Nous enregistrerons nos fichiers dans /uploads/images dans public
                    $folder = '/uploads/images/';
                    $image_name = Str::slug($request->input('name')).'_'.time();
                    $product->images = $folder.$image_name.'.'.$image->getClientOriginalExtension();
                    //Maintenant nous pouvons enregistrer l'image dans le dossier en utilisant la méthode uploadImage();
                    $this->uploadImage($image, $folder, 'public', $image_name);
                }




                $product->update([
                "name" => $request->input('name'),
                "price" =>$request->input('price'),
                "description" => $request->input('description'),
                "category_id" => $request->input('category_id'),
                    
                ]);
            }

               $product->save();
            return redirect()->back();
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
        {
            $product = Product::find($id);
            if($product)
                $product->delete();
            return redirect()->back();
         }
         $user = Auth::user();
         $user_id = Auth::id();
         $produit->user_id  = Auth::id();
     $produit->save();
         
         
    





         

    }
}











