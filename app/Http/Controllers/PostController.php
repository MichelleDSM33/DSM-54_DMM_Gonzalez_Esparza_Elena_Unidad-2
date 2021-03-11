<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        //dd($post);
        return response()->json(['posts'=> $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrfail($id);
        return response()->json(['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function postByCategory($id) {
        $posts = Post::Where('category_id',$id)->get();

        return response()->json(['posts'=>$posts]);
    }
    public function postforteen($min) {
        $max=$min+5;
        $posts = Post::Where('id','<=',$max)
        ->Where('id','>',$min)
        ->get();

        return response()->json(['posts'=>$posts]);
    }

    // ultimos 3 post de cada categorya
   /// public function lastsquerys($id){
    //    $posts = Post::where('category_id',$id)
     //   ->orderBy('id', 'desc')
     //   ->take(3)
     //   ->get();

        //return response()->json(['posts'=>$posts]);
  //  }
  /*public function PostCategory(){
    $i=0;
    $j=0;
    $array=array();
    $categories = Category::all();
    foreach ($categories as $category){
        $array[$i][$j]=$category;
        $posts = Post::where('category_id',$category->id)
        ->orderBy('id', 'desc')
        ->take(3)
        ->get();
        $i=$i+1;
        foreach ($posts as $post){
            $j=$j+1;
            $array[$i][$j]=$post;
        }
    }
    
    return response()->json(
        [
        'posts'=>$array
        ]);  
}
    public function lastsquerys($id)
{
    //llamamos a la categoria segun el id que mandemos en el request 
    $category = ModelsCategory::findOrFail($id);
    // declaramos $ post para acceder a los post de la categoria con el id enviado por el request
    $posts = Post::where('category_id', $category->id)
    ->latest('id')
    ->get();
    return response()->json(
        [
        'category'=>$category,
        'posts'=>$posts
        ]); */
        public function Examen(){
            $uno=0;
            $dos=0;
            $posCategory=array();
          
            
            
            // ['name' => 'George', 'age' => 29]
            
            $categories = Category::all()
            ->take(3);
            foreach ($categories as $category){
                $posCategory[$uno][$dos]=$category;
                $posts = Post::where('category_id',$category->id)
                ->orderBy('id', 'desc')
                ->take(3)
                ->get();
                $uno=$uno+1;
                foreach ($posts as $post){
                    $dos=$dos+1;
                    $posCategory[$uno][$dos]=$post;
                }
                $dos=0;
            }
            return response()->json(
                [
                'Category_post'=>$posCategory
                
                ]);  
        }

}


