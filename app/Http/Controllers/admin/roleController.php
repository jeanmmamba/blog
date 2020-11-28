<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\role;
use App\permission;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name='role';
        $data=role::All();
        return view('admin.role.list',compact('page_name','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $page_name='role create';
        $permission=permission::pluck('name','id');
        return view('admin.role.create',compact('permission','page_name'));
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
            'name'=>"required",
            'permission'=>"required|array",
            'permission.*'=>"required|string"
        ],
        [
            'name.required'=>'inserez un nom',
            'permission.required'=>'inseree un chaine de caractere comme permission',
            'permission.*.required'=>'you must select a permission'
        ]);

        $role=new role();
        $role->name=$request->name;
        $role->display_name=$request->display_name;
        $role->description=$request->description;
        $role->save();
        foreach($request->permission as $value){
            $role->attachpermission($value);
        }
        return redirect()->action('admin\roleController@index')->with('success','permission created successfully');
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
        $page_name='role';
        $role=role::find($id);
        $permission=permission::pluck('name','id');
        $selectedPermission = DB::table('permission_role')->where('permission_role.role_id',$id)->pluck('permission_id')->toArray();
        return view('admin.role.edit',compact('page_name','permission','selectedPermission','role'));
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
            'name'=>"required",
            'permission'=>"required|array",
            'permission.*'=>"required|string"
        ],
        [
            'name.required'=>'inserez un nom',
            'permission.required'=>'inserez un chaine de caractere comme permission',
            'permission.*.required'=>'you must select a permission'
        ]);

        $role=role::find($id);
        $role->name=$request->name;
        $role->display_name=$request->display_name;
        $role->description=$request->description;
        $role->save();

        DB::table('permission_role')->where('role_id',$id)->delete();
        foreach ($request->permission as $value) {
            $role->attachPermission($value);
        }


        return redirect()->action('admin\roleController@index')->with('success','role update succesfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=role::find($id);
        $role->delete();
        return redirect()->action('admin\roleController@index')->with('success','role deleted successfully');
    }
}




