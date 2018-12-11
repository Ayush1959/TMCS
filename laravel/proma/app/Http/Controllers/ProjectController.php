<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Config;
use App\Project_assigned;
use App\Project_user_log;
use App\Project_delay;
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
            $delay_array = DB::table('project_delay')
                ->join('users', 'project_delay.user_id', '=', 'users.id')
                ->select('users.user_name', 'users.status', 'users.id')
                ->where('project_delay.project_id', $aa->id)
                ->where('users.status', 1)
                ->get();
            // array_push($usernamear, $use_array);
            // return $use_array;
            // return $delay_array;
            $usernamear['delay'] = $delay_array;
            
            // array_push($usernamear, [$aa->id, $aa->title, $use_array, $aa->start_date, $aa->end_date, $aa->actual_close]);
            $fulldata[] = $usernamear;
            $usernamear = array();
            // return ($newDateString2);
        }
        return $fulldata;







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
        $usernamear = array();
        $fulldata = array();
        $data_array = project::select('id', 'title', 'start_date', 'end_date', 'actual_close')->where('monitoring', 0)->where('status', 1)->get();
        foreach ($data_array as $aa) {
            $use_array = DB::table('project_assigned')
                ->join('users', 'project_assigned.user_id', '=', 'users.id')
                ->select('users.user_name', 'users.status', 'users.id')
                ->where('project_assigned.project_id', $aa->id)
                ->where('users.status', 1)
                ->get();
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
            $delay_array = DB::table('project_delay')
                ->join('users', 'project_delay.user_id', '=', 'users.id')
                ->select('users.user_name', 'users.status', 'users.id')
                ->where('project_delay.project_id', $aa->id)
                ->where('users.status', 1)
                ->get();
            $usernamear['delay'] = $delay_array;
            $fulldata[] = $usernamear;
            $usernamear = array();
        }
        return $fulldata;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $data_array = user::select('id', 'user_name', 'status', 'score')->where('status', 1)->get();
        return $data_array;
        // foreach ($data_array as $aa) {
        //     return $aa;
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request, $id)
    {
        $delay_arraylist = array();
        $use_array = DB::table('project_assigned')
            ->join('users', 'project_assigned.user_id', '=', 'users.id')
            ->select('users.user_name', 'users.status', 'users.id')
            ->where('project_assigned.project_id', $id)
            ->where('users.status', 1)
            ->get();
        $del_array = DB::table('project_delay')
            ->join('users', 'project_delay.user_id', '=', 'users.id')
            ->select('users.user_name', 'users.status', 'users.id')
            ->where('project_delay.project_id', $id)
            ->where('users.status', 1)
            ->get();
        $delay_arraylist[1] = $use_array;
        $delay_arraylist[2] = $del_array;
        return $delay_arraylist;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function usersupdate(Request $request, $id)
    {
        // $user = Auth::user()->user_name;
        // return $user;
        $data = user::findOrFail($id);
        $input = $request->all();
        if ($request->input('type') == "Credit") {
            $dd = $data->score;
            $ff = $dd + $request->input('score');
            $debit = 0;
        } else {
            $dd = $data->score;
            $ff = $dd - $request->input('score');
            $debit = 1;
        }
        $data->score = $ff;
        $data->save();

        // $input = $request->all();
        $datas = new Project_user_log();
        $datas->user_id = $request->input('id');
        if ($debit == 0) {
            $datas->comments = $request->input('score') . ' Score credited to ' . $data->user_name . ' by user ' . Auth::user()->user_name . ' <br> User Comment: ' . $request->input('comments');
        } else {
            $datas->comments = $request->input('score') . ' Score debited to ' . $data->user_name . ' by user ' . Auth::user()->user_name . ' <br> User Comment: ' . $request->input('comments');
        }

        $datas->user_name = $data->user_name;
        $datas->comment_by = Auth::user()->id;

        // $datas->comments = $request->input('comments');
        $saved = $datas->save();

        if (isset($saved)) {
            return response()->json([
                'status' => config::get('constant.Success')
            ]);
        } else {
            return response()->json([
                'status' => config::get('constant.DB_Save_Error')
            ]);
        }
        // return $ff;
        // $data->score->update($ff);
        // update(['active' => true]);
        
        // $dd = $data->score;
        // return $dd;
        // $data->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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

    public function userslog(Request $request)
    {
        $input = $request->all();
        $data = new Project_user_log();
        $data->user_id = $request->input('id');
        $data->comments = $request->input('comments');
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delay(Request $request, $id)
    {
        $del_array = array();
        $input = $request->all();
        $data = new Project_delay();
        $delay_array1 = DB::table('project_delay')
            ->join('users', 'project_delay.user_id', '=', 'users.id')
            ->select('users.id')
            ->where('project_delay.project_id', $request->input('testVal'))
            // ->where('users.status', 1)
            ->get();
        // return $delay_array1;
        foreach ($delay_array1 as $aa) {
            array_push($del_array, $aa->id);
        }
        if (in_array($request->input('selectedClient'), $del_array)) {
            return 1;
        } else {
            $data->project_id = $request->input('testVal');
            $data->user_id = $request->input('selectedClient');
            $saved = $data->save();
        }

        if (isset($saved)) {
            // return 1;
            return response()->json([
                'status' => config::get('constant.Success')
            ]);
        } else {
            // return 0;
            return response()->json([
                'status' => config::get('constant.DB_Save_Error')
            ]);
        }




        // $xxx = array();
        // $xxx[1] = $request->input('testVal');
        // $xxx[2] = $request->input('selectedClient');
        // return $xxx;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_array = project_delay::select('id', 'project_id', 'user_id')->where('user_id', $id)->get();
        foreach ($data_array as $aaa) {
            $data = project_delay::findOrFail($aaa['id']);
            $data->delete();
            // return $aaa['id'];
        }
        // $data = project_delay::findOrFail($data_array->id);
        // $data = project_delay::with(['user_id'])->findOrFail($id);
        // $data->delete();
        // $contact->delete();

        return response()->json(null, 204);
    }
}
