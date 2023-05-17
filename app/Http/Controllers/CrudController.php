<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use App\helpers\CrudFormatter;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crud = Crud::all();
        
        if ($crud) {
            return CrudFormatter::createCrud(200, 'success', $crud);
        }else {
            return CrudFormatter::createCrud(400, 'failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|min:8',
                'umur' => 'required|min:2',
                'tanggal_lahir' => 'required',
            ]);

            $cruds = Crud::create([
                'nama' => $request->nama,
                'umur' => $request->umur,
                'tanggal_lahir' => \Carbon\Carbon::parse($request->tanggal_lahir)->format('Y-m-d'),
            ]);

            $getDataSaved = Crud::where('id', $cruds->id)->first();

            if ($getDataSaved) {
                return CrudFormatter::createCrud(200, 'success', $getDataSaved);
            }else {
                return CrudFormatter::createCrud(400, 'failed');
            }
        } catch (Exception $error) {
            return CrudFormatter::createCrud(400, 'failed', $error);
        }
    }

    public function createToken()
    {
        return csrf_token();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $crudDetail = Crud::where('id', $id)->first();

            
            if ($getDataSaved) {
                return CrudFormatter::createCrud(200, 'success', $getDataSaved);
            }else {
                return CrudFormatter::createCrud(400, 'failed');
            }
        } catch (Exception $error) {
            return CrudFormatter::createCrud(400, 'failed', $error);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        try {
            $request->validate([
                'nama' => 'required|min:8',
                'umur' => 'required|min:3',
                'tanggal_lahir' => 'required',

            ]);

            $cruds = Crud::findOrFail($id);

            $cruds = Crud::update([
                'nama' => $request->nama,
                'umur' => $request->umur,
                'tanggal_lahir' => $request->tanggal_lahir,
            ]);

            $updatedCrud = Crud::where('id', $crud->id)->first();

            if ($updateCrud) {
                return CrudFormatter::createCrud(200, 'success', $getDataSaved);
            }else {
                return CrudFormatter::createCrud(400, 'failed');
            }
        } catch (Exception $error) {
            return CrudFormatter::createCrud(400, 'failed', $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       try {
        $cruds = Crud::findOrFail($id);
        $proses = $crud->delete();

        if ($proses) {
            return CrudFormatter::createCrud(200, 'success', $getDataSaved);
            }else {
                return CrudFormatter::createCrud(400, 'failed');
            }
        } catch (Exception $error) {
            return CrudFormatter::createCrud(400, 'failed', $error);
        }
        }


        public function trash ()
        {
            try {
                $cruds = Crud::onlyTrashed()->get();
                if ($cruds) {
                    return CrudFormatter::createCrud(200, 'success', $getDataSaved);
                    }else {
                        return CrudFormatter::createCrud(400, 'failed');
                    }
                } catch (Exception $error) {
                    return CrudFormatter::createCrud(400, 'failed', $error);
                }
                }
                 

                 public function restore($id)
                 {
                    try {
                        $cruds = Crud::onlyTrashed()->where('id', $id);
                        $cruds->restore();
                        $dataRestore = Crud::where('id', $id)->first();

                        if ($dataRestore) {
                            return CrudFormatter::createCrud(200, 'success', $getDataSaved);
                            }else {
                                return CrudFormatter::createCrud(400, 'failed');
                            }
                        } catch (Exception $error) {
                            return CrudFormatter::createCrud(400, 'failed', $error);
                        }
                        }  

                public function permanentDeletes($id)
                        {
                            try {
                                $cruds = Crud::onlyTrashed()->where('id', $id);
                                $proses = $crud->forceDelete();

                                if ($proses) {
                                    return CrudFormatter::createCrud(200, 'success', $getDataSaved);
                                    }else {
                                        return CrudFormatter::createCrud(400, 'failed');
                                    }
                                } catch (Exception $error) {
                                    return CrudFormatter::createCrud(400, 'failed', $error);
                                }
                                }  
        

                            }
                        
                    
                 
        

     
    

