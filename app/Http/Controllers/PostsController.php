<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Session;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('admin.posts.index')->with('post_data',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Category::all();
        $tags = Tag::All();

        if($categories->count() == 0 || $tags->count() == 0)
        {
            Session::flash('info','you must have some "categories" and "tags" before attemting to create a new Post');
            return redirect()->back();
        }


        return view('admin.posts.create')->with('categories',$categories)
                                         ->with('tags',$tags);
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

        // dd($request->all());
        $this->validate($request,[
            'title' => 'required',
            'featured' => 'required',
            'category_id'=> 'required',
            'content' => 'required',
            'tags' => 'required'

        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts',$featured_new_name);


        $post = Post::create([
            'title' => $request->title,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'slug' => str_slug($request->title)


        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success','Post created succesfully');

        return redirect()->back();
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $post = Post::find($id);
        

        return view('admin.posts.edit')->with('edit_data',$post)
                                       ->with('categories',Category::all())
                                       ->with('tags',Tag::all());


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
         $this->validate($request,[
            'title' => 'required',
           
            'category_id'=> 'required',
            'content' => 'required'
        ]);

         $post = Post::find($id);

         if($request->hasFile('featured'))
         {
            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/' . $featured_new_name;  
         }

         $post->title = $request->title;
         $post->content = $request->content;
         $post->category_id = $request->category_id;

         $post->save();

         $post->tags()->sync($request->tags);

          Session::flash('success','The post updated successfully ');

        return redirect()->route('posts');



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
        $post = Post::find($id);

        $post->delete();

        Session::flash('delete','The post was just trashed');

        return redirect()->back();

    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('trashed_data',$posts);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first(); // get id using query builder

        $post->forceDelete();

        Session::flash('delete','Post deleted permanently');

        return redirect()->back();


    }

    public function restore($id)
    {

        $post = Post::withTrashed()->where('id',$id)->first();

        $post->restore();

        Session::flash('success','Post Restroed Successfully');
        return redirect()->back();
    }
}
