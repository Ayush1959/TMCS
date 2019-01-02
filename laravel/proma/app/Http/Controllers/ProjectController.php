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
use App\Project_backlog;
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
        $hours = 0;
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
        $username = $request->input('user');
        $year = $request->input('year');
        $month = $request->input('month');
        $nmonth = date('m', strtotime($month));
        $date = $year . "-" . $nmonth;
        $userid_array = user::select('id')->where('user_name', $username)->get();
        foreach ($userid_array as $aa) {
            $task_array = DB::table('time_tracker')->select('hours_taken')->where('user_id', $aa->id)->where('start_datetime', 'LIKE', "%$date%")->where('end_datetime', 'LIKE', "%$date%")->get();
            foreach ($task_array as $task) {
                $hours += $task->hours_taken;
            }
            $projectBacklog_array = DB::table('project_backlog_log')->select('product_backlog_id', 'status', 'created_at')->where('task_owner', $aa->id)->where('created_at', 'LIKE', "%$date%")->get();
            foreach ($projectBacklog_array as $zz) {
                if ($zz->status == "done") {
                    $compTask += 1;
                } else if ($zz->status == "ready-for-review") {
                    $readyTask += 1;
                }
                $productBacklog_array = DB::table('product_backlog')->select('type', 'bug_severity', 'project_id')->where('id', $zz->product_backlog_id)->get();
                foreach ($productBacklog_array as $dd) {
                    array_push($project_id_array, $dd->project_id);
                    if ($dd->type == "Bug") {
                        $totBug += 1;
                    }
                    if ($dd->bug_severity == "functionality") {
                        $funBug += 1;
                    }
                }

            }
            $unique_project_id = array_unique($project_id_array);
            foreach ($unique_project_id as $upid) {
                $project_name = DB::table('project')->select('title')->where('id', $upid)->get();
                $project_backlog_log = DB::table('project_backlog_log')->select('product_backlog_id')->where('task_owner', $aa->id)->where('created_at', 'LIKE', "%$date%")->get();
                $taskdata = DB::table('time_tracker')->select('hours_taken')->where('user_id', $aa->id)->where('project_id', $upid)->where('start_datetime', 'LIKE', "%$date%")->where('end_datetime', 'LIKE', "%$date%")->get();
                foreach ($taskdata as $tasks) {
                    $singlehours += $tasks->hours_taken;
                }
                foreach ($project_backlog_log as $fdata) {
                    $project_backlog_data = DB::table('product_backlog')->select('type', 'id', 'project_id')->where('id', $fdata->product_backlog_id)->where('project_id', $upid)->get();
                    foreach ($project_backlog_data as $backlog_data) {
                        // $project_backlog_log_data = DB::table('project_backlog_log')->select('product_backlog_id', 'status')->where('product_backlog_id', $backlog_data->id)->where('task_owner', $aa->id)->where('created_at', 'LIKE', "%$date%")->get();
                        // foreach ($project_backlog_log_data as $prodatas) {
                        //     if ($prodatas->status == "done") {
                        //         $done += 1;
                        //     } else if ($prodatas->status == "ready-for-review") {
                        //         $rdy += 1;
                        //     } else if ($prodatas->status == "reopen") {
                        //         $reopn += 1;
                        //     }
                        // }
                        if ($backlog_data->type == "Bug") {
                            $totalBug += 1;
                        }
                    }
                }
                // array_push($project_array, $project_name[0]->title);
                $project_array["name"] = $project_name[0]->title;
                // array_push($project_array, $totalBug);
                $project_array["Bug"] = $totalBug;
                $project_array["done"] = $done;
                $project_array["ready"] = $rdy;
                $project_array["reopen"] = $reopn;
                $project_array["shours"] = $singlehours;
                // array_push($project_test, $project_array);
                $project_test[$project_name[0]->title] = $project_array;
                $project_array = [];
                $totalBug = 0;
                $done = 0;
                $rdy = 0;
                $reopn = 0;
                $singlehours = 0;
            }
        }
        $projectArrays = array_unique($projectArray);
        // return $projectArrays;
        // $object = (object)$projectArrays;
        $othBug = $totBug - $funBug;
        $fullDataArray["funBug"] = $funBug;
        $fullDataArray["othBug"] = $othBug;
        $fullDataArray["totBug"] = $totBug;
        $fullDataArray["compTask"] = $compTask;
        $fullDataArray["readyTask"] = $readyTask;
        $fullDataArray["hours"] = ceil($hours);
        $fullDataArray["data"] = $projectArrays;
        $fullDataArray["projects"] = $project_test;

        // array_push($fullDataArray, $projectArrays);
        // array_push($fullDataArray, $othBug);
        // array_push($fullDataArray, $totBug);
        // array_push($fullDataArray, $compTask);
        // array_push($fullDataArray, $readyTask);
        // return $funBug;
        // return $data_array->id;
        // ready-for-review
        // done
        return $fullDataArray;

    }
}
