<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelBlog;
use Illuminate\Support\Facades\Validator;
use App\Services\BlogService;
use Barryvdh\DomPDF\Facade\Pdf;
use Storage;

class BlogController extends Controller
{
    
    protected $BlogService;
    function __construct(
        BlogService $BlogService
    ) {
        $this->BlogService = $BlogService;
    }

    public function downloadpdf()
    {
        $blog  = ModelBlog::all();
        $pdf = PDF::loadview('blog.index', ['data_blog' => $blog])->setOptions(['defauldFont' => 'sans-serif']);
        return $pdf->download('laporan_blog.pdf');
    }

    public function index()
    {
        $blog = $this->BlogService->getData();
        return view('blog.index')->with([
            'data_blog' => $blog
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
        $this->validate($request, [     
            'name'     => 'required',
            'description'   => 'required',
            'created_user_id' => 'required',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);


        //if ($validator->fails()) {
          //  return response()->json($validator->errors(), 422);
         //}

        //$data = $request->except(['_token']);
        //if($request->file('image_id')){
            //$imgName = time().'.'.$request->file('image_id')->extension();
          //  $data['image_id'] = $request->file('image_id')->move('blog',$imgName);
        //}

        $image = $request->file('image');
        $image->storeAs('/blog', $image->hashName());

        $blog = ModelBlog::create([
            'name'     => $request->name,
            'description'   => $request->description,
            'created_user_id'   => $request->created_user_id,
            'image'     => $image->hashName()
            
        ]);
        //ModelBlog::insert($data);
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
    public function edit(ModelBlog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelBlog $blog)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'created_user_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $blog = ModelBlog::findOrFail($blog->id);

        if ($request->file('image') == "") {

            $blog->update([
                'name'     => $request->title,
                'description'   => $request->description,
                'created_user_id'     => $request->created_user_id
                
            ]);
        }else{

            Storage::disk('public')->delete('public/blog/' . $blog->image);

            $image = $request->file('image');
            $image->storeAs('/blog', $image->hashName());
            
            $blog->update([
                'name'     => $request->title,
                'description'   => $request->description,
                'created_user_id' => $request->created_user_id,
                'image'     => $image->hashName()
            ]);
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelBlog $blog)
    {
        $blog->delete();
        return redirect('/');
    }
}
