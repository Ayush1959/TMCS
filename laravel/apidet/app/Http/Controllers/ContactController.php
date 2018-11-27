<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
//for validations and tkng reasponse
use App\Contact;
use Illuminate\Support\Facades\Config;
// use config;
use DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::all();
    }

    /**
     * Show the form for creating a new resource.
     *
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
    public function stored(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lname' => 'required',
            'email' => 'required | email',
            'age' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'status' => 'required | numeric'
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
            $contact = new Contact;
            $contact->name = $request->input('name');
            $contact->lname = $request->input('lname');
            $contact->email = $request->input('email');
            $contact->age = $request->input('age');
            $contact->address = $request->input('address');
            $contact->gender = $request->input('gender');
            $contact->status = $request->input('status');
            $saved = $contact->save();

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

        // $this->validate($request, [
        //     'name' => 'required',
        //     'lname' => 'required',
        //     'email' => 'required | email',
        //     'age' => 'required',
        //     'address' => 'required',
        //     'gender' => 'required',
        //     'status' => 'required | numeric'
        // ]);
        // $errors = $validator->errors();

        // if (count($errors > 0)) {
        //     return response()->json([
        //         'status' => '210'
        //     ]);
        // } else {
        //     $input = $request->all();
        //     $contact = new Contact;
        //     $contact->name = $request->input('name');
        //     $contact->lname = $request->input('lname');
        //     $contact->email = $request->input('email');
        //     $contact->age = $request->input('age');
        //     $contact->address = $request->input('address');
        //     $contact->gender = $request->input('gender');
        //     $contact->status = $request->input('status');
        //     $saved = $contact->save();

        //     if (isset($saved)) {
        //         return response()->json([
        //             'status' => '200'
        //         ]);
        //     } else {
        //         return response()->json([
        //             'status' => '208'
        //         ]);
        //     }
        // }            
        // return response()->json([
           
        //     'status' => '200'
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return $contact;
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
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        return $contact;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        // $contact->delete();

        return response()->json(null, 204);
    }
}