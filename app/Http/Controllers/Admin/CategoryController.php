<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Category;
use Storage;
use Image;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $infoCategries=Category::latest()->get();
       return view('admin.category.index',compact('infoCategries'));
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
      $this->validate($request,[
        'category'=>'required|unique:categories,categorie_name',
        // 'picture'=>'required|mimes:jpeg,jpg,png',
      ],[
        'category|required'=>'Category field required',
      ]);

      if($request->hasFile('picture')){
        $image=$request->file('picture');
        $imageName='Category_image-'.uniqid().'-'.time().'.'.$image->getClientOriginalExtension();
        if(!Storage::disk('public')->exists('category/image')){
            Storage::disk('public')->makeDirectory('category/image');
        }
        Image::make($image)->resize(1600,479)->save(public_path('storage/category/image/'.$imageName));

        if(!Storage::disk('public')->exists('category/banner')){
            Storage::disk('public')->makeDirectory('category/banner');
        }
        Image::make($image)->resize(500,333)->save(public_path('storage/category/banner/'.$imageName));
      }else{
        $imageName="default.png";
      }

          $storeCategries =   new  Category;
          $storeCategries->categorie_name = $request->category;
          $storeCategries->categorie_image = $imageName;
          $storeCategries->save();
          Toastr::info('Success', 'Category information store success');
          return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $categries=Category::findOrFail($id);
      return view('admin.category.show',compact('categries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categries=Category::findOrFail($id);
      return view('admin.category.edit',compact('categries'));
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
      // print_r($_POST);
     $this->validate($request,[
       'category'=>'required',
       // 'picture'=>'mimes:jpeg,jpg,png',
     ],[
       'category|required'=>'Category field required',
     ]);

     $updateCategory=Category::findOrFail($id);
     $image=$request->file('picture');
     if(isset($image)){

     $imageName='categorie_image'.uniqid().'-'.time().'.'.$image->getClientOriginalExtension();
     if(!Storage::disk('public')->exists('category/image')){
       Storage::disk('public')->makeDirectory('category/image');
     }

     //delete image //catego ry image
       if(Storage::disk('public')->exists('category/image/'.$updateCategory->categorie_image)){
         Storage::disk('public')->delete('category/image/'.$updateCategory->categorie_image);
       }
       Image::make($image)->resize(1600,479)->save(public_path('storage/category/image/'.$imageName));
//banner image
       if(!Storage::disk('public')->exists('category/banner')){
         Storage::disk('public')->makeDirectory('category/banner');
       }

       //delete image banner
       if(Storage::disk('public')->exists('category/banner/'.$updateCategory->categorie_image)){
         Storage::disk('public')->delete('category/banner/'.$updateCategory->categorie_image);
       }
       Image::make($image)->resize(500,333)->save(public_path('storage/category/banner/'.$imageName));
     }else{
       $imageName=$updateCategory->categorie_image;
     }

         $updateCategory->categorie_name = $request->category;
         $updateCategory->categorie_image = $imageName;
         $updateCategory->save();
         Toastr::success('update', 'Category information update success');
         return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $categries=Category::findOrFail($id)->delete([

  ]);
    Toastr::success('Delete', 'Category information destroy success');
    return back();
    }
}
