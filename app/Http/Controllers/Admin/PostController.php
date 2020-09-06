<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Storage;
use Image;
use App\Category;
use App\Tag;
use App\Post;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $postInfo=Post::where('is_approve',1)->latest()->get();
      $postInfo=Post::all();
       return view('admin.post.index',compact('postInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categoryinfo=Category::all();
      $taginfo=Tag::all();
        return view('admin.post.create',compact('categoryinfo','taginfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // print_r($_POST);
      $this->validate($request,[
        'tittle'=>'required',
        // 'picture'=>'required',
        'status'=>'required',
        'categorie'=>'required',
        'tages'=>'required',
        'body'=>'required',
      ],[

      ]);

      if($request->hasFile('picture')){
        $image=$request->file('picture');
        $imageName='post_image-'.uniqid().'-'.time().'.'.$image->getClientOriginalExtension();
        if(!Storage::disk('public')->exists('postimage')){
            Storage::disk('public')->makeDirectory('postimage');
        }
        Image::make($image)->resize(500,479)->save(public_path('storage/postimage/'.$imageName));
      }else{
        $imageName="default.png";
      }

        $postInfo = new Post;
        $postInfo->post_tittle=$request->tittle;
        $postInfo->user_id = Auth::id();
        $postInfo->post_image=$imageName;
        $postInfo->post_body=$request->body;
        if(isset($request->status)){
        $postInfo->post_status=true;
      }else{
        $postInfo->post_status=false;
      }
      $postInfo->is_approve=true;
      $postInfo->save();
      $postInfo->categories()->attach($request->categorie);
      $postInfo->tages()->attach($request->tages);
      Toastr::info('Success', 'Post information store success');
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
      $postInfo=Post::findOrFail($id);
      $categoryinfo=Category::all();
      $taginfo=Tag::all();
       return view('admin.post.show',compact('postInfo','categoryinfo','taginfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $postInfo=Post::findOrFail($id);
      $categoryinfo=Category::all();
      $taginfo=Tag::all();
       return view('admin.post.edit',compact('postInfo','categoryinfo','taginfo'));
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
        $this->validate($request,[

        ],[

        ]);
          $postInfo=Post::findOrFail($id);
          $image=$request->file('picture');
          if(isset($image)){

            $imageName='post_image-update'.uniqid().'-'.time().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('postimage')){
                Storage::disk('public')->makeDirectory('postimage');
            }
            if(Storage::disk('public')->exists('postimage/'.$postInfo->post_image)){
                Storage::disk('public')->delete('postimage/'.$postInfo->post_image);
            }
            Image::make($image)->resize(500,479)->save(public_path('storage/postimage/'.$imageName));
          }else{
            $imageName=$postInfo->post_image;
          }

            $postInfo->post_tittle=$request->tittle;
            $postInfo->user_id=Auth::id();
            $postInfo->post_image=$imageName;
            $postInfo->post_body=$request->body;
            if(isset($request->status)){
            $postInfo->post_status=true;
          }else{
            $postInfo->post_status=false;
          }
          $postInfo->is_approve=true;
          $postInfo->save();
          $postInfo->categories()->sync($request->categorie);
          $postInfo->tages()->sync($request->tages);
          Toastr::info('Success', 'Post information store success');
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
        $postInfo=Post::findOrFail($id)->delete([

        ]);
        Toastr::success('Delete', 'Post information destroy success');
        return back();
    }

    public function pending()
    {
      $postInfo=Post::where('is_approve',0)->get();
       return view('admin.pending.pending',compact('postInfo'));
    }

    public function approved($id)
    {
      $approved=Post::findOrFail($id);
      $approved->is_approve=true;
      $approved->save();
      Toastr::success('Approved', 'Post Approved successfuly');
      return back();
    }

    public function post_pending($id)
    {
      $approved=Post::findOrFail($id);
      $approved->is_approve=false;
      $approved->save();
      Toastr::success('Pending', 'Post Pending successfuly');
      return back();
    }

}
