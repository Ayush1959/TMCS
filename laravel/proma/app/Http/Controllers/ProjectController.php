<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Config;
use App\Project_assigned;
use App\Project_user_log;
use App\Project_monthly_log;
use App\Project_backlog_log;
use App\Product_backlog;
use App\Project_delay;
use App\Time_tracker;
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
        $data_array = user::select('id', 'user_name', 'status', 'score')->where('status', 1)->where('users.user_type', 4)->get();
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
        $data = array();
        $data_array = user::select('id', 'user_name', 'status', 'score', 'user_type')->where('status', 1)->where('user_type', 4)->paginate(12);
        $date_array = project_monthly_log::select('date')->get();
        foreach ($date_array as $aa) {
            array_push($dates, $aa->date);
        }
        foreach ($data_array as $aa) {
            array_push($data, $aa);
        }
        $fin_date = array_unique($dates);
        $data_array["dates"] = $fin_date;
        $data_array["udatas"] = $data;
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
     * @return array of project details
     * * @Description gets searched project
     */

    public function search(Request $request)
    {
        $input = $request->all();
        $monitoring = $request->input('monitor');
        $ptitle = $request->input('title');
        if (isset($ptitle)) {
            $query = project::select('id', 'title', 'start_date', 'end_date', 'actual_close')->where('monitoring', 1)->where('status', 1)->where('title', $ptitle);
        } else {
            $query = project::select('id', 'title', 'start_date', 'end_date', 'actual_close')->where('monitoring', 1)->where('status', 1);
        }

        $usernamear = array();
        $fulldata = array();
        $data_array = $query->get();
        // $data_array = project::select('id', 'title', 'start_date', 'end_date', 'actual_close')->where('monitoring', 1)->where('status', 1)->where('title', $id)->get();
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
        if (empty($fulldata)) {
            // return response()->json(206, 206);
            return response()->json([
                'status' => config::get('constant.DB_Search_Error')
            ], config::get('constant.DB_Search_Error'));
            // $aa = config::get('constant.DB_Search_Error');
            // return $aa;
            // return config::get('constant.DB_Search_Error')
        } else {
            // $aa = config::get('constant.DB_Save_Error');
            // return $aa;
            return $fulldata;
        }
        
        // return $fulldata;
    }


    /**
     * @Author Ayush
     * @Date 11/12/18
     * @param  int  $id
     * @return array of project details
     * * @Description gets searched project
     */

    public function searchNm(Request $request)
    {
        $input = $request->all();
        $monitoring = $request->input('monitor');
        $ptitle = $request->input('title');
        $pagenate = $request->input('pagenate');
        if (isset($ptitle)) {
            $query = project::select('id', 'title', 'start_date', 'end_date', 'actual_close')->where('monitoring', $monitoring)->where('status', 1)->where('title', 'LIKE', "%$ptitle%");
        } else {
            $query = project::select('id', 'title', 'start_date', 'end_date', 'actual_close')->where('monitoring', $monitoring)->where('status', 1);
        }
        $usernamear = array();
        $fulldata = array();
        $datap_array = $query->paginate($pagenate);
        //return $datap_arr
        // $data_array = project::select('id', 'title', 'start_date', 'end_date', 'actual_close')->where('monitoring', 0)->where('status', 1)->get();
        foreach ($datap_array as $aa) {
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
        if (empty($fulldata)) {
            // return response()->json(206, 206);
            return response()->json([
                'status' => config::get('constant.DB_Search_Error')
            ], config::get('constant.DB_Search_Error'));
            // $aa = config::get('constant.DB_Search_Error');
            // return $aa;
            // return config::get('constant.DB_Search_Error')
        } else {
            // $aa = config::get('constant.DB_Save_Error');
            // return $aa;
            // $datap_array->append($fulldata);
            // array_push($datap_array, $fulldata);
            $passData = array();
            $passData["data"] = $fulldata;
            $passData["pageData"] = $datap_array;
            // array_push($passData, $datap_array);
            // array_push($passData, $fulldata);
            return $passData;
            // return $fulldata;
        }
        // return $fulldata;

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
        $data = array();
        $data_array = project_monthly_log::select('id', 'user_name', 'user_id', 'score')->where('date', $id)->paginate(12);
        foreach ($data_array as $aa) {
            array_push($data, $aa);
        }
        $data_array["udatas"] = $data;
        return $data_array;

    }

    /**
     * @Author Ayush
     * @Date 17/12/18
     * @param  int  $id
     * @return array of user months and scores
     * * @Description takes username and finds score of users in a project according to date
     */

    public function userSearch($id)
    {
        // return date("Y");
        $data_array = project_monthly_log::select('id', 'user_name', 'date', 'user_id', 'score')->where('user_name', $id)->whereYear('date', '=', date('Y'))->orderBy('date')->get();
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
        $datas->comment_by = Auth::user()->user_name;
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


    /**
     * @Author Ayush
     * @Date 11/12/18
     * @param  int  $request
     * @return array of log details
     * * @Description gets Comment logs
     */

    public function getLogs(Request $request)
    {
        $input = $request->all();
        $username = $request->input('username');
        $start = $request->input('dateStart');
        $end = $request->input('dateEnd');
        $pagenate = $request->input('pagenate');
        $query = project_user_log::select('id', 'user_name', 'created_at', 'comments', 'comment_by');

        if (isset($username)) {
            $query = $query->where('user_name', $username);
        }
        // if (isset($start) && isset($end)) {
        //     if ($start == $end) {
        //         $query = $query->where('created_at', 'LIKE', "%$end%");
        //     }
        // } else {
        if (isset($start)) {
            $query = $query->where('created_at', '>=', $start);
        }
        if (isset($end)) {
            $query = $query->where('created_at', '<=', $end);
        }
        // }

        $usernamear = array();
        $fulldata = array();
        $fullUserData = array();
        $datap_array = $query->paginate($pagenate);
        $data_array = user::select('id', 'user_name')->where('status', 1)->where('user_type', 4)->get();
        foreach ($data_array as $aa) {
            $userar['id'] = $aa->id;
            $userar['name'] = $aa->user_name;
            $fullUserData[] = $userar;
            $userar = array();
        }
        foreach ($datap_array as $aa) {
            $usernamear['id'] = $aa->id;
            $usernamear['user_name'] = $aa->user_name;
            $usernamear['comments'] = $aa->comments;
            $usernamear['comment_by'] = $aa->comment_by;
            $myDateTime = \DateTime::createFromFormat('Y-m-d h:i:s', $aa->created_at);
            $newDateString = $myDateTime->format('d/m/Y');
            $usernamear['start_date'] = $newDateString;
            $fulldata[] = $usernamear;
            $usernamear = array();
        }
        if (empty($fulldata)) {
            return response()->json([
                'status' => config::get('constant.DB_Search_Error')
            ], config::get('constant.DB_Search_Error'));
        } else {
            $passData = array();
            $passData["data"] = $fulldata;
            $passData["pageData"] = $datap_array;
            $passData["userData"] = $fullUserData;
            return $passData;
        }
        // return $fulldata;

    }


    /**
     * @Author Ayush
     * @Date 17/12/18
     * @param  int  $id
     * @return array of user tasks 
     * * @Description takes username and finds tasks relay projects
     */

    public function userTaskSearch(Request $request)
    {
        $funBug = 0;
        $othBug = 0;
        $totBug = 0;
        $compTask = 0;
        $readyTask = 0;
        $done = 0;
        $reopn = 0;
        $rdy = 0;
        $singlehours = 0;
        $fullDataArray = [];
        $project_array = [];
        $project_test = [];
        $projectArray = [];
        $totalBug = 0;
        $project_id_array = [];
        $input = $request->all();
        $userid = $request->input('user');
        $year = $request->input('year');
        $month = $request->input('month');
        $nmonth = date('m', strtotime($month));
        $date = $year . "-" . $nmonth;
        $hours = time_tracker::where('user_id', $userid)->whereMonth('start_datetime', '=', $nmonth)->whereYear('start_datetime', '=', $year)->whereMonth('end_datetime', '=', $nmonth)->whereYear('end_datetime', '=', $year)->sum('hours_taken');
        $completedtasks = project_backlog_log::where('task_owner', $userid)->where('created_at', 'LIKE', "%$date%")->where('status', "done")->count();
        $readytoview = project_backlog_log::where('task_owner', $userid)->where('created_at', 'LIKE', "%$date%")->where('status', "ready-for-review")->count();
        $totalBug = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
            ->where('project_backlog_log.task_owner', $userid)
            ->where('project_backlog_log.created_at', 'LIKE', "%$date%")
            ->where('product_backlog.type', "Bug")->count();
        $functionalityBug = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
            ->where('project_backlog_log.task_owner', $userid)
            ->where('project_backlog_log.created_at', 'LIKE', "%$date%")
            ->where('product_backlog.type', "Bug")
            ->where('product_backlog.bug_severity', "functionality")->count();
        $otherBug = $totalBug - $functionalityBug;
        // return $otherBug;

        $projectIds = project::join('product_backlog', 'product_backlog.project_id', '=', 'project.id')
            ->join('project_backlog_log', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
            ->select('project.id')
            ->where('project_backlog_log.task_owner', $userid)
            ->where('project_backlog_log.created_at', 'LIKE', "%$date%")
            ->distinct('project.id')
            ->get();
            // ->groupby('project.id')
        // return $projectIds;
        foreach ($projectIds as $projectid) {
            $projectname = project::select('title')->where('id', $projectid->id)->get();
            $singlebugsTotal = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
                ->where('project_backlog_log.task_owner', $userid)
                ->where('product_backlog.project_id', $projectid->id)
                ->where('project_backlog_log.created_at', 'LIKE', "%$date%")
                ->where('product_backlog.type', "Bug")->count();
            $singlebugsFunctional = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
                ->where('project_backlog_log.task_owner', $userid)
                ->where('project_backlog_log.created_at', 'LIKE', "%$date%")
                ->where('product_backlog.project_id', $projectid->id)
                ->where('product_backlog.type', "Bug")
                ->where('product_backlog.bug_severity', "functionality")->count();
            $singlebugsOther = $singlebugsTotal - $singlebugsFunctional;
            $singleHours = time_tracker::where('user_id', $userid)->where('project_id', $projectid->id)
                ->whereMonth('start_datetime', '=', $nmonth)
                ->whereYear('start_datetime', '=', $year)
                ->whereMonth('end_datetime', '=', $nmonth)
                ->whereYear('end_datetime', '=', $year)
                ->sum('hours_taken');
            $singleCompletedtasks = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
                ->where('project_backlog_log.task_owner', $userid)
                ->where('product_backlog.project_id', $projectid->id)
                ->where('project_backlog_log.created_at', 'LIKE', "%$date%")
                ->where('project_backlog_log.task_owner', $userid)
                ->where('project_backlog_log.created_at', 'LIKE', "%$date%")
                ->where('project_backlog_log.status', "done")
                ->count();

            $singlereadytoreview = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
                ->where('project_backlog_log.task_owner', $userid)
                ->where('product_backlog.project_id', $projectid->id)
                ->where('project_backlog_log.created_at', 'LIKE', "%$date%")
                ->where('project_backlog_log.task_owner', $userid)
                ->where('project_backlog_log.created_at', 'LIKE', "%$date%")
                ->where('project_backlog_log.status', "ready-for-review")
                ->count();

            $singlereopen = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
                ->where('project_backlog_log.task_owner', $userid)
                ->where('product_backlog.project_id', $projectid->id)
                ->where('project_backlog_log.created_at', 'LIKE', "%$date%")
                ->where('project_backlog_log.task_owner', $userid)
                ->where('project_backlog_log.created_at', 'LIKE', "%$date%")
                ->where('project_backlog_log.status', "reopen")
                ->count();
            // project_backlog_log::where('task_owner', $userid)->where('created_at', 'LIKE', "%$date%")->where('status', "done")->count();

            // array_push($project_test, $singlereopen);
            // array_push($project_test, $singlebugsOther);
            // array_push($project_test, $singlebugsTotal);
            $project_array["name"] = $projectname[0]->title;
                // array_push($project_array, $totalBug);
            $project_array["Bug"] = $singlebugsTotal;
            $project_array["done"] = $singleCompletedtasks;
            $project_array["ready"] = $singlereadytoreview;
            $project_array["reopen"] = $singlereopen;
            $project_array["shours"] = ceil($singleHours);
            $project_test[$projectname[0]->title] = $project_array;
            $project_array = [];
            // $totalBug = 0;
            // $done = 0;
            // $rdy = 0;
            // $reopn = 0;
            // $singlehours = 0;
        }
        // return $project_test;
        $fullDataArray["funBug"] = $functionalityBug;
        $fullDataArray["othBug"] = $otherBug;
        $fullDataArray["totBug"] = $totalBug;
        $fullDataArray["compTask"] = $completedtasks;
        $fullDataArray["readyTask"] = $readytoview;
        $fullDataArray["hours"] = ceil($hours);
        // $fullDataArray["data"] = $projectArrays;
        $fullDataArray["projects"] = $project_test;

        return $fullDataArray;
    }


    /**
     * @Author Ayush
     * @Date 17/12/18
     * @param  int  $Request
     * @return array of Project details 
     * * @Description takes project id and finds data related to projects
     */

    public function singleProjectdata(Request $request)
    {
        $ary = [];
        $Fary = [];
        $projectArray = [];
        $fullDataArray = [];
        $bugsAssignedArray = [];
        $bugsReportedArray = [];
        $fullData = [];
        $hourarray = [];
        $fullFData = [];
        $input = $request->all();
        $projectid = $request->input('projectid'); //project id
        $projectname_array = project::select('title')->where('id', $projectid)->get(); //project Name array
        $projectName = $projectname_array[0]->title;
        $projectusers = project::join('project_assigned', 'project_assigned.project_id', '=', 'project.id')
            ->join('users', 'project_assigned.user_id', '=', 'users.id')
            ->where('project.id', $projectid)
            ->select('users.id')
            ->distinct('users.id')->get(); //users in project
        $projectStartDate_array = project::select('start_date')->where('id', $projectid)->get(); //project Start Date array
        // $projectStartDate = $projectStartDate_array[0]->start_date;
        $myStartDateTime = \DateTime::createFromFormat('Y-m-d h:i:s', $projectStartDate_array[0]->start_date); //formattting Date
        $projectStartDate = $myStartDateTime->format('d/m/Y'); //Formatted date

        $projectEndDate_array = project::select('end_date')->where('id', $projectid)->get(); //project End Date array
        // $projectEndDate = $projectEndDate_array[0]->End_date;
        $myEndDateTime = \DateTime::createFromFormat('Y-m-d h:i:s', $projectEndDate_array[0]->end_date); //formattting Date
        $projectEndDate = $myEndDateTime->format('d/m/Y'); //Formatted End date

        $totalDays = date_diff($myEndDateTime, $myStartDateTime)->format("%a"); //Total days worked
        // array_push($ary, $totalDays);
        // return \Response::json($totalDays);

        foreach ($projectusers as $user) {
            $username = user::select('user_name')->where('id', $user->id)->get()[0]->user_name; //username
            // $username = $username_array[0]->user_name;
            $designation = user::select('designation')->where('id', $user->id)->get()[0]->designation; //designation
            $salary = user::select('salary')->where('id', $user->id)->get()[0]->salary; //salary
            $salaryPerHour = $salary / 30 / 8; //salary per hour
            $hoursWorked = time_tracker::where('user_id', $user->id)
                ->where('project_id', $projectid)
                ->sum('hours_taken');
            $hoursWorkedRounded = ceil($hoursWorked);
            $projectCost = ceil($salaryPerHour * $hoursWorked);

            $readytoreview = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
                ->where('project_backlog_log.task_owner', $user->id)
                ->where('product_backlog.project_id', $projectid)
                ->where('project_backlog_log.status', "ready-for-review")
                ->count();
            $done = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
                ->where('project_backlog_log.task_owner', $user->id)
                ->where('product_backlog.project_id', $projectid)
                ->where('project_backlog_log.status', "done")
                ->count();
            $scheduled = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
                ->where('project_backlog_log.task_owner', $user->id)
                ->where('product_backlog.project_id', $projectid)
                ->where('project_backlog_log.status', "scheduled")
                ->count();
            $bugsAssigned = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
                ->where('project_backlog_log.task_owner', $user->id)
                ->where('product_backlog.project_id', $projectid)
                ->where('product_backlog.type', "Bug")
                ->count();
            $bugsReported = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
                ->where('product_backlog.user_id', $user->id)
                ->where('product_backlog.project_id', $projectid)
                ->where('product_backlog.type', "Bug")
                ->count();
            $storyPoints = product_backlog::where('project_id', $projectid)
                ->where('user_id', $user->id)
                ->sum('story_points');




            $ary["name"] = $username;
            $ary["designation"] = $designation;
            $ary["totalhours"] = $hoursWorkedRounded;
            $ary["salaryPerHour"] = $salaryPerHour;
            $ary["projectCost"] = $projectCost;
            $ary["readytoreview"] = $readytoreview;
            $ary["scheduled"] = $scheduled;
            $ary["bugsAssigned"] = $bugsAssigned;
            $ary["bugsReported"] = $bugsReported;
            $ary["storyPoints"] = $storyPoints;
            $ary["done"] = $done;
            array_push($hourarray, $projectCost);
            array_push($bugsAssignedArray, $bugsAssigned);
            array_push($bugsReportedArray, $bugsReported);
            // $ary["Pr"] = $storyPoints_array;

            array_push($fullData, $ary);
            $ary = [];
        }


        $FhoursWorked = time_tracker::where('project_id', $projectid)
            ->sum('hours_taken');
        $FhoursWorkedRounded = ceil($FhoursWorked);
        // $FprojectCost = ceil($salaryPerHour * $hoursWorked);

        $Freadytoreview = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
            ->where('product_backlog.project_id', $projectid)
            ->where('project_backlog_log.status', "ready-for-review")
            ->count();
        $Fdone = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
            ->where('product_backlog.project_id', $projectid)
            ->where('project_backlog_log.status', "done")
            ->count();
        $Fscheduled = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
            ->where('product_backlog.project_id', $projectid)
            ->where('project_backlog_log.status', "scheduled")
            ->count();
        // $FbugsAssigned = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
        //     ->where('product_backlog.project_id', $projectid)
        //     ->where('product_backlog.type', "Bug")
        //     ->count();
        // $FbugsReported = project_backlog_log::join('product_backlog', 'project_backlog_log.product_backlog_id', '=', 'product_backlog.id')
        //     ->where('product_backlog.project_id', $projectid)
        //     ->where('product_backlog.type', "Bug")
        //     ->count();
        $FstoryPoints = product_backlog::where('project_id', $projectid)
            ->sum('story_points');



        // $Fary["name"] = $username;
        // $Fary["designation"] = $designation;
        $Fary["totalhours"] = $FhoursWorkedRounded;
        // $Fary["salaryPerHour"] = $FsalaryPerHour;
        // $Fary["projectCost"] = $FprojectCost;
        $Fary["readytoreview"] = $Freadytoreview;
        $Fary["scheduled"] = $Fscheduled;
        // $Fary["bugsAssigned"] = $FbugsAssigned;
        // $Fary["bugsReported"] = $FbugsReported;
        $Fary["storyPoints"] = $FstoryPoints;
        $Fary["done"] = $Fdone;
            // $ary["Pr"] = $storyPoints_array;

        array_push($fullFData, $Fary);
        // $Fary = [];






        $fullDataArray["data"] = $fullData;
        $fullDataArray["datatotal"] = $fullFData;
        $fullDataArray["name"] = $projectName;
        $fullDataArray["totaldays"] = $totalDays;
        $fullDataArray["start"] = $projectStartDate;
        $fullDataArray["totalcost"] = array_sum($hourarray);
        $fullDataArray["totalBugsAssigned"] = array_sum($bugsAssignedArray);
        $fullDataArray["totalBugsReported"] = array_sum($bugsReportedArray);
        // array_push($fullDataArray[], $projectArray);
        // array_push($fullDataArray[], $projectArray);

        return $fullDataArray;
    }

    /**
     * @Author Ayush
     * @Date 03/01/18
     * @param  int  $id, Request
     * @return array Changes Date
     * * @Description stops or starts monitoring data
     */
    public function StartDateupdate(Request $request, $id)
    {
        $data = project::findOrFail($id);
        $input = $request->all();
        $startDate = $request->input('startdate');
        $data->start_date = $startDate;
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
     * @Author Ayush
     * @Date 03/01/18
     * @param  int  $id, Request
     * @return array Changes End Date
     * * @Description stops or starts monitoring data
     */
    public function EndDateupdate(Request $request, $id)
    {
        $data = project::findOrFail($id);
        $input = $request->all();
        $EndDate = $request->input('Enddate');
        $data->end_date = $EndDate;
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
