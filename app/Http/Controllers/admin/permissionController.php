<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\permission;

class permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
        $page_name='permission';
        $data=permission::All();
        return view('admin.permission.list', compact('data','page_name'));

     }

    // public function jean(){
    //     return view('admin.permission.list');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
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
            'name'=>"required"
        ],[
            'name.required'=>"name field is required",
            'name.alpha_num'=>"this field accepts alpha numeric characters"
        ]);

        $permission=new permission;
        $permission->name=$request->name;
        $permission->display_name=$request->display_name;
        $permission->description=$request->description;
        $permission->save();

        return redirect()->action('admin\permissionController@create')->with('succes','permission create succesfully');
    
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
        $page_name='permission edit';
        $permission=permission::find($id);
        return view('admin.permission.edit',compact('permission', 'page_name'));
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
        $this->validate($request, [
            'name'=>"required|alpha_num"
        ],[
            'name.required'=>"name field is required",
            'name.alpha_num'=>"this field accepts alpha numeric characters"
        ]);

        $permission=permission::find($id);
        $permission->name=$request->name;
        $permission->display_name=$request->display_name;
        $permission->description=$request->description;
        $permission->save();

        return redirect()->action('admin\permissionController@index')->with('success','permission update succesfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission=permission::find($id);
        $permission->delete();
        return redirect()->action('admin\permissionController@index')->with('success','permission deleted successfully');
    }
}
