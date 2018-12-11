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

class CronController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d H:i:s');
        $date_array = array();
        $data_array = project::select('id', 'title', 'start_date', 'end_date', 'actual_close')->where('monitoring', 1)->where('status', 1)->get();
        foreach ($data_array as $aa) {
            if ($aa->end_date < $date) {

                // $date_array[$aa->title] = 1;
                $use_array = DB::table('project_assigned')
                    ->join('users', 'project_assigned.user_id', '=', 'users.id')
                    ->select('users.user_name', 'users.user_type', 'users.status', 'users.id')
                    ->where('project_assigned.project_id', $aa->id)
                    ->where('users.status', 1)
                    ->where('users.user_type', 4)
                    ->get();
                foreach ($use_array as $zz) {

                    $data = user::findOrFail($zz->id);
                    $dd = $data->score;
                    $ff = $dd - 1;
                    $data->score = $ff;
                    $data->save();

                    $datas = new Project_user_log();
                    $datas->user_id = $zz->id;
                    $datas->comments = '1 Score debited to ' . $data->user_name . ' automatically due to delay in end date ';
                    $datas->user_name = $data->user_name;
                    $datas->comment_by = "Automatically";
                    $saved = $datas->save();
                }
                $delay_array = DB::table('project_delay')
                    ->join('users', 'project_delay.user_id', '=', 'users.id')
                    ->select('users.user_name', 'users.user_type', 'users.status', 'users.id')
                    ->where('project_delay.project_id', $aa->id)
                    ->where('users.status', 1)
                    ->where('users.user_type', 4)
                    ->get();
                foreach ($delay_array as $del) {

                    $data = user::findOrFail($del->id);
                    $dde = $data->score;
                    $ffe = $dde - 2;
                    $data->score = $ffe;
                    $data->save();

                    $datas = new Project_user_log();
                    $datas->user_id = $del->id;
                    $datas->comments = '2 Score debited to ' . $data->user_name . ' automatically due to delay Responsive ';
                    $datas->user_name = $data->user_name;
                    $datas->comment_by = "Automatically";
                    $saved = $datas->save();
                }
            } 
            // else {
            //     $date_array[$aa->title] = 2;
            // }

        }
        // return $date_array;
    }
}
