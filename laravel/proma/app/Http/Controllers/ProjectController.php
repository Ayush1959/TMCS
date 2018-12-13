<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Config;
use App\Project_assigned;
use App\Project_user_log;
use App\Project_monthly_log;
use App\Project_delay;
use App\User;
use DB;

class ProjectController extends Controller
{
    /**
     * @Author Ayush
     * @Date 11/12/18
     * @param  
     * @return array of Project data
     * @Description gets all data of project if it is monitored
     */
    public function index()
    {
        $usernamear = array();
        $fulldata = array();
        $data_array = project::select('id', 'title', 'start_date', 'end_date', 'actual_close')->where('monitoring', 1)->where('status', 1)->get();
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
     * @Author Ayush
     * @Date 11/12/18
     * @param  
     * @return array of Project data
     * @Description gets all data of project if it is not monitored
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
     * @Author Ayush
     * @Date 11/12/18
     * @param  
     * @return array of User data
     * @Description gets data of users if status is one
     */
    public function users()
    {
        $data_array = user::select('id', 'user_name', 'status', 'score')->where('status', 1)->get();
        return $data_array;
    }

    /**
     * @Author Ayush
     * @Date 11/12/18
     * @param  
     * @return array of username data
     * @Description gets data of username and score from users 
     */

    public function userdata()
    {
        $dates = array();
        $data_array = user::select('id', 'user_name', 'status', 'score', 'user_type')->where('status', 1)->where('user_type', 4)->paginate(5);
        $date_array = project_monthly_log::select('date')->get();
        foreach ($date_array as $aa) {
            array_push($dates, $aa->date);
        }
        $fin_date = array_unique($dates);
        $data_array["dates"] = $fin_date;
        return $data_array;
    }

    /**
     * @Author Ayush
     * @Date 11/12/18
     * @param  int  $id
     * @return array of user names
     * * @Description gets username of users in a project for modal popup
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
     * @Author Ayush
     * @Date 11/12/18
     * @param  int  $id
     * @return array of user names and scores
     * * @Description gets username and score of users in a project according to given date
     */

    public function datechangeread($id)
    {
        $data_array = project_monthly_log::select('id', 'user_name', 'user_id', 'score')->where('date', $id)->paginate(5);
        return $data_array;

    }

    /**
     * @Author Ayush
     * @Date 11/12/18
     * @param  int  $id
     * @return http response
     * * @Description Change the users score on given id
     */
    public function usersupdate(Request $request, $id)
    {
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
    }

    /**
     * @Author Ayush
     * @Date 11/12/18
     * @param  int  $id
     * @return array of that project details which is not needeed
     * * @Description stops or starts monitoring data
     */
    public function update(Request $request, $id)
    {
        $data = project::findOrFail($id);
        $data->update($request->all());
        return $data;
    }

    /**
     * @Author Ayush
     * @Date 11/12/18
     * @param  Request  request
     * @return array of user names
     * @Description Not found
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
     * @Author Ayush
     * @Date 11/12/18
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @description to add users into project delayed user list
     */
    public function delay(Request $request)
    {

        $del_array = array();
        $input = $request->all();
        $data = new Project_delay();
        $delay_array1 = DB::table('project_delay')
            ->join('users', 'project_delay.user_id', '=', 'users.id')
            ->select('users.id')
            ->where('project_delay.project_id', $request->input('selectedProjectId'))
            ->get();
        foreach ($delay_array1 as $aa) {
            array_push($del_array, $aa->id);
        }
        if (in_array($request->input('selectedClient'), $del_array)) {
            return response()->json(208, 208);
        } else {
            $data->project_id = $request->input('selectedProjectId');
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
    }

    /**
     * @Author Ayush
     * @Date 11/12/18
     * @param  int  $id
     * @return response
     * @Description deletes responsive users from delay table
     */
    public function destroy($id)
    {
        $data_array = project_delay::select('id', 'project_id', 'user_id')->where('user_id', $id)->get();
        foreach ($data_array as $aaa) {
            $data = project_delay::findOrFail($aaa['id']);
            $data->delete();
        }

        return response()->json(null, 204);
    }
}
