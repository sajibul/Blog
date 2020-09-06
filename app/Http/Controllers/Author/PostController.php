<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use App\Notifications\NewAuthorPost;
use Illuminate\Support\Facades\Notification;
use Storage;
use Image;
use App\Category;
use App\Tag;
use App\Post;
use Auth;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postInfo=Auth::user()->postes()->latest()->get();
        return view('author.post.index',compact('postInfo'));
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
          return view('author.post.create',compact('categoryinfo','taginfo'));
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
      $postInfo->is_approve=false;
      $postInfo->save();
      $postInfo->categories()->attach($request->categorie);
      $postInfo->tages()->attach($request->tages);

      // $users=User::where('role_id','1')->get();
      // Notification::send($users, new NewAuthorPost($postInfo));
      Toastr::info('Success', 'Post information store success');
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
       $postInfo=Post::findOrFail($id);

       if($postInfo->user_id!=Auth::id()){
         Toastr::info('Permission', 'You have no permission');
         return back();
       }

       $categoryinfo=Category::all();
       $taginfo=Tag::all();
        return view('author.post.show',compact('postInfo','categoryinfo','taginfo'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
       $postInfo=Post::findOrFail($id);

       if($postInfo->user_id!=Auth::id()){
         Toastr::info('Permission', 'You have no permission');
         return back();
       }

       $categoryinfo=Category::all();
       $taginfo=Tag::all();
        return view('author.post.edit',compact('postInfo','categoryinfo','taginfo'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
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
           $postInfo->is_approve=false;
           $postInfo->save();
           $postInfo->categories()->sync($request->categorie);
           $postInfo->tages()->sync($request->tages);
           Toastr::info('Success', 'Post information store success');
           return back();

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
       $postInfo=Post::findOrFail($id);
       if($postInfo->user_id!=Auth::id()){
         Toastr::info('Permission', 'You have no permission');
         return back();
       }

         $postInfo=Post::findOrFail($id)->delete([

         ]);
         Toastr::success('Delete', 'Post information destroy success');
         return back();
     }
}
