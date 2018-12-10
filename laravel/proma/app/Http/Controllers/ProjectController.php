<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Project_assigned;
use App\User;
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usernamear = array();
        $fulldata = array();
        $data_array = project::select('id', 'title', 'start_date', 'end_date', 'actual_close')->where('monitoring', 1)->where('status', 1)->get();
        foreach ($data_array as $aa) {
            // return $aa->id;
            $use_array = DB::table('project_assigned')
                ->join('users', 'project_assigned.user_id', '=', 'users.id')
                ->select('users.user_name', 'users.status', 'users.id')
                ->where('project_assigned.project_id', $aa->id)
                ->where('users.status', 1)
                ->get();
            // array_push($usernamear, $use_array);
            // return $use_array;
            $usernamear['id'] = $aa->id;
            $usernamear['title'] = $aa->title;
            $usernamear['user_names'] = $use_array;
            $myDateTime = \DateTime::createFromFormat('Y-m-d h:i:s', $aa->start_date);
            $newDateString = $myDateTime->format('d/m/Y');
            $usernamear['start_date'] = $newDateString;
            $myDateTime1 = \DateTime::createFromFormat('Y-m-d h:i:s', $aa->end_date);
            $newDateString1 = $myDateTime1->format('d/m/Y');
            $usernamear['end_date'] = $newDateString1;
            $myDateTime2 = \DateTime::createFromFormat('Y-m-d h:i:s', $aa->actual_close);
            $newDateString2 = $myDateTime2->format('d/m/Y');
            if ($newDateString2 == "30/11/-0001") {
                $usernamear['actual_close'] = "Default";
            } else {
                $usernamear['actual_close'] = $newDateString2;
            }
            
            // array_push($usernamear, [$aa->id, $aa->title, $use_array, $aa->start_date, $aa->end_date, $aa->actual_close]);
            $fulldata[] = $usernamear;
            $usernamear = array();
            // return ($newDateString2);
        }
        return $fulldata;












        // return $data_array;
        // $use_array = array();
        // $use_array[] = DB::table('project')
        //     ->join('project_assigned', 'project_assigned.project_id', '=', 'project.id')
        //     ->join('users', 'project_assigned.user_id', '=', 'users.id')
        //     ->select('project.id', 'users.user_name')
        //     ->where('project.monitoring', 1)
        //     ->where('project.status', 1)
        //     ->get();
        // foreach ($use_array as $rr) {
        //     return typeOf();
        // };
        // return $use_array;




        // $myarray[] = array(
        //     "id" => $theid,
        //     "name" => name($id),
        //     "text" => $row2['text']
        // );





        // $jso = {
        // };
        // $use = DB::table('project')
        //     ->join('project_assigned', 'project_assigned.project_id', '=', 'project.id')
        //     ->join('users', 'project_assigned.user_id', '=', 'users.id')
        //     ->select('project.id', 'project.title', 'users.user_name', 'project.start_date', 'project.end_date', 'project.actual_close', 'project.monitoring', 'project.status')
        //     ->where('project.monitoring', 1)
        //     ->where('project.status', 1)
        //     ->get();
        // return $use;

                            // UPPER ORG
        // $pro = project::select('id', 'title', 'start_date', 'end_date', 'actual_close')->where('monitoring', 1)->where('status', 1)->get();
        // $use = DB::table('project')
        //     ->join('project_assigned', 'project_assigned.project_id', '=', 'project.id')
        //     ->join('users', 'project_assigned.user_id', '=', 'users.id')
        //     ->select('project.id', 'project.title', 'users.user_name', 'project.start_date', 'project.end_date', 'project.actual_close', 'project.monitoring', 'project.status')
        //     ->where('project.monitoring', 1)
        //     ->where('project.status', 1)
        //     ->get();
        // return $use;
        // return $pro;





        // return user::all();
        // return project::all();
        // return project::select(' id ', ' title ', ' start_date ', ' end_date ', ' actual_close ')->where(' monitoring ', 1)->where(' status ', 1)->get();
        // return project::select(' id ', ' title ', ' start_date ', ' end_date ', ' actual_close ')->where(' monitoring ', 1)->where(' status ', 1)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return project::select(' start_date ', ' end_date ', ' actual_close ')->where(' monitoring ', 1)->where(' status ', 1)->get();
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // return project::select(' id ', ' title ', ' start_date ', ' end_date ', ' actual_close ')->where(' monitoring ', 0)->where(' status', 1)->get();

        $usernamear = array();
        $fulldata = array();
        $data_array = project::select('id', 'title', 'start_date', 'end_date', 'actual_close')->where('monitoring', 0)->where('status', 1)->get();
        foreach ($data_array as $aa) {
            // return $aa->id;
            $use_array = DB::table('project_assigned')
                ->join('users', 'project_assigned.user_id', '=', 'users.id')
                ->select('users.user_name', 'users.status', 'users.id')
                ->where('project_assigned.project_id', $aa->id)
                ->where('users.status', 1)
                ->get();
            // array_push($usernamear, $use_array);
            // return $use_array;
            $usernamear['id'] = $aa->id;
            $usernamear['title'] = $aa->title;
            $usernamear['user_names'] = $use_array;
            $myDateTime = \DateTime::createFromFormat('Y-m-d h:i:s', $aa->start_date);
            $newDateString = $myDateTime->format('d/m/Y');
            $usernamear['start_date'] = $newDateString;
            $myDateTime1 = \DateTime::createFromFormat('Y-m-d h:i:s', $aa->end_date);
            $newDateString1 = $myDateTime1->format('d/m/Y');
            $usernamear['end_date'] = $newDateString1;
            $myDateTime2 = \DateTime::createFromFormat('Y-m-d h:i:s', $aa->actual_close);
            $newDateString2 = $myDateTime2->format('d/m/Y');
            if ($newDateString2 == "30/11/-0001") {
                $usernamear['actual_close'] = "Default";
            } else {
                $usernamear['actual_close'] = $newDateString2;
            }
            
            // array_push($usernamear, [$aa->id, $aa->title, $use_array, $aa->start_date, $aa->end_date, $aa->actual_close]);
            $fulldata[] = $usernamear;
            $usernamear = array();
            // return ($newDateString2);
        }
        return $fulldata;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $use_array = DB::table('project_assigned')
            ->join('users', 'project_assigned.user_id', '=', 'users.id')
            ->select('users.user_name', 'users.status', 'users.id')
            ->where('project_assigned.project_id', $id)
            ->where('users.status', 1)
            ->get();
        return $use_array;
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
        $data = project::findOrFail($id);
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
        //
    }
}
