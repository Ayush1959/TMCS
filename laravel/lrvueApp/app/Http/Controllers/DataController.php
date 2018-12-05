<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\Data;
use Illuminate\Support\Facades\Config;
// use config;
use DB;


class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Data::all();
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required | email',
            'age' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'number' => 'required | numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => config::get('constant.Validation_Error'),
                'errors' => $validator->errors()
            ]);
            // return response()->json([
                // 'status' => '210'
            // ]);
        } else {
            $input = $request->all();
            $data = new Data;
            $data->name = $request->input('name');
            $data->lastname = $request->input('lastname');
            $data->email = $request->input('email');
            $data->age = $request->input('age');
            $data->address = $request->input('address');
            $data->gender = $request->input('gender');
            $data->number = $request->input('number');
            $saved = $data->save();

            if (isset($saved)) {
                return response()->json([
                    'status' => config::get('constant.Success')
                ]);
            } else {
                return response()->json([
                    'status' => config::get('constant.DB_Save_Error')
                ]);
            }
        }
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
        $data = Data::findOrFail($id);
        $data->update($request->all());
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();
        // $contact->delete();

        return response()->json(null, 204);
    }
}
