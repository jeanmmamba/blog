<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name="category";
        $data=category::All();
        return view('admin.category.list', compact('page_name','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name="creer les categories";
        return view('admin.category.create',compact('page_name'));
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
            'name'=>"required"
        ]);

        $category=new category();
        $category->name=$request->name;
        $category->status=1;
        $category->save();
        return redirect()->action('admin\categoryController@index')->with('success','categorie enregistré avec succes');
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
        $page_name="modification de category";
        $category=category::find($id);
        return view('admin.category.edit',compact('page_name','category'));
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
            'name'=>"required"
        ]);
        $category=category::find($id);
        $category->name=$request->name;
        $category->status=1;
        $category->save();
        return redirect()->action('admin\categoryController@index')->with('success','mise a jour effectuée avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=category::find($id);
        $category->delete();
        return redirect()->action('admin\categoryController@index')->with('success','categorie supprimé avec success');
    }

    public function status($id){
        $category=category::find($id);
        if($category->status===1){
            $category->status=0;
        }else{
            $category->status=1;
        }

        $category->save();
        return redirect()->action('admin\categoryController@index')->with('success','le status a correctement été changé');


    }
}
