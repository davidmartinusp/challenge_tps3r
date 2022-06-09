<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelBlog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelBlog::all();

        return view('blog.index')->with([
            'results' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [     
            'name'     => 'required',
            'description'   => 'required',
            'image_id'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
         }

        $data = $request->except(['_token']);
        if($request->file('image_id')){
            $imgName = time().'.'.$request->file('image_id')->extension();
            $data['image_id'] = $request->file('image_id')->move('blog',$imgName);
        }

        ModelBlog::insert($data);
        return redirect('/');
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
        $data = ModelBlog::findOrFail($id);
        
        return view('blog.edit')->with([
            'results' => $data
        ]);
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
            'name' => 'required',
            'description' => 'required',
            'image_id' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $item = ModelBlog::findOrFail($id);
        $data = $request->except(['_token']);

        if($request->file('image_id')){

            if($item->image != ''){
                unlink($item->image);
            }
            
            
            $imgName = time().'.'.$request->file('image_id')->extension();
            $data['image_id'] = $request->file('image_id')->move('blog',$imgName);
        }
        $item->update($data);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ModelBlog::findOrFail($id);
        unlink($item->image);
        $item->delete();
        return redirect('/');
    }
}
