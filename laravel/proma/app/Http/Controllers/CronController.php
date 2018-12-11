<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Config;
use App\Project_assigned;
use App\Project_user_log;
use App\Project_delay;
use App\User;
use App\Mail\DemoEmaildays;
use App\Mail\DemoEmail;
use DB;

class CronController extends Controller
{
    public function index()
    {
        // $data = array('name' => "Ayush Srihari");

        // Mail::send(['text' => 'mail'], $data, function ($message) {
        //     $message->to('srihari.ayush@gmail.com', 'Laravel Mail')->subject('Laravel Basic Testing Mail');
        //     $message->from('xyz@gmail.com', 'Ayush');
        // });
        // return 1;
        // echo "Basic Email Sent. Check your inbox.";
        // $ename = "srihari.ayush@gmail.com";
        // $enote = "Hey There";
        // Mail::to($ename)->send($enote);
        $date = date('Y-m-d H:i:s');
        $date_array = array();
        $arr = array();
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
            // $myDateTime = \DateTime::createFromFormat('Y-m-d h:i:s', $aa->end_date);
            // $newDateString = $myDateTime->format('d/m/Y');
            // $myDateTime1 = \DateTime::createFromFormat('Y-m-d h:i:s', $date);
            // $newDateString1 = $myDateTime1->format('d/m/Y:H:i:s');
            // $myDateTime2 = \DateTime::createFromFormat('d/m/Y:H:i:s', $newDateString1);
            // 1
            // 1
            // 1

            // $datetime1 = new \DateTime('2016-11-30 03:55:06');//start time
            // $datetime2 = new \DateTime('2016-11-28 11:55:06');//end time
            // $interval = $datetime1->diff($datetime2);
            // $date1 = $interval->format('%d');//00 years 0 months 0 days 08 hours 0 minutes 0 seconds

            // 1
            // 1   
            // 1

            $datetime1 = new \DateTime($date);//start time
            $datetime2 = new \DateTime($aa->end_date);//end time
            $interval = $datetime1->diff($datetime2);
            // $date1 = $interval->format('%d');//00 years 0 months 0 days 08 hours 0 minutes 0 seconds
            $date1 = $interval->format("%R%a");
            $dae = 2;
            $validarraythreeday = array("+1", "+2", "+3");
            $validarrayday = array("+0");
            if (in_array($date1, $validarraythreeday)) {
                $use_array = DB::table('project_assigned')
                    ->join('users', 'project_assigned.user_id', '=', 'users.id')
                    ->select('users.user_name', 'users.user_type', 'users.status', 'users.id')
                    ->where('project_assigned.project_id', $aa->id)
                    ->where('users.status', 1)
                    ->get();
                    // ->where('users.user_type', 4)
                foreach ($use_array as $zz) {
                    // $data = array('name' => $zz->user_name, 'pname' => $aa->title, 'end' => $aa->end_date);

                    // Mail::queue(['text' => 'mailcd'], $data, function ($message) {
                    //     $message->to('srihari.ayush@gmail.com', 'Laravel Mail')->subject('Laravel Basic Testing Mail');
                    //     $message->from('xyz@gmail.com', 'Ayush');
                    // });
                    $objDemo = new \stdClass();
                    $objDemo->demo_one = $aa->title;
                    $objDemo->demo_two = $aa->end_date;
                    $objDemo->sender = 'SenderUserName';
                    $objDemo->receiver = $zz->user_name;

                    Mail::to("srihari.ayush@gmail.com")->queue(new DemoEmaildays($objDemo));
                }
            }
            if (in_array($date1, $validarrayday)) {
                $use_array = DB::table('project_assigned')
                    ->join('users', 'project_assigned.user_id', '=', 'users.id')
                    ->select('users.user_name', 'users.user_type', 'users.status', 'users.id')
                    ->where('project_assigned.project_id', $aa->id)
                    ->where('users.status', 1)
                    ->get();
                    // ->where('users.user_type', 4)
                foreach ($use_array as $zz) {
                    // $data = array('name' => $zz->user_name, 'pname' => $aa->title, 'end' => $aa->end_date);

                    // Mail::queue(['text' => 'mailcd'], $data, function ($message) {
                    //     $message->to('srihari.ayush@gmail.com', 'Laravel Mail')->subject('Laravel Basic Testing Mail');
                    //     $message->from('xyz@gmail.com', 'Ayush');
                    // });
                    $objDemo = new \stdClass();
                    $objDemo->demo_one = $aa->title;
                    $objDemo->demo_two = $aa->end_date;
                    $objDemo->sender = 'SenderUserName';
                    $objDemo->receiver = $zz->user_name;

                    Mail::to("srihari.ayush@gmail.com")->queue(new DemoEmail($objDemo));
                }
            }

            // $date1 = $date->getTimestamp();
            // $date1 = strtotime($myDateTime2);
            // $date1 = $newDateString1->getTimestamp();
            // $date1 = new \DateTime($newDateString);
            // $date1 = $newDateString1;
            // $date1 = date_create("2017-02-10 00:00:00");
            // $date2 = $newDateString;
            // $date2 = date_create("2017-02-03 11:03:00");
            // $arr[$aa->title] = $dae;
            // $arr[2] = $datetime2;
            // $diff = date_diff($date1, $date2);
            // $stats = $diff->format("%a");
            // $stats = $date - $aa->end_date;
            // $arr[$aa->title] = $stats;
            // array_push($arr, $stats);
            // return $stats;
            // if ($stats <= 3 && $stats > 0) {
                //     $use_array = DB::table('project_assigned')
            //         ->join('users', 'project_assigned.user_id', '=', 'users.id')
            //         ->select('users.user_name', 'users.user_type', 'users.status', 'users.id')
            //         ->where('project_assigned.project_id', $aa->id)
            //         ->where('users.status', 1)
            //         ->get();
            //         // ->where('users.user_type', 4)
            //     foreach ($use_array as $zz) {
            //         $data = array('name' => $zz->user_name, 'pname' => $aa->title, 'end' => $aa->end_date);

            //         Mail::send(['text' => 'mail'], $data, function ($message) {
            //             $message->to('srihari.ayush@gmail.com', 'Laravel Mail')->subject('Laravel Basic Testing Mail');
            //             $message->from('xyz@gmail.com', 'Ayush');
            //         });
            //     }
            // }
            // if ($stats == 0) {
            //     $use_array = DB::table('project_assigned')
            //         ->join('users', 'project_assigned.user_id', '=', 'users.id')
            //         ->select('users.user_name', 'users.user_type', 'users.status', 'users.id')
            //         ->where('project_assigned.project_id', $aa->id)
            //         ->where('users.status', 1)
            //         ->get();
            //         // ->where('users.user_type', 4)
            //     foreach ($use_array as $zz) {
            //         $data = array('name' => $zz->user_name, 'pname' => $aa->title, 'end' => $aa->end_date);

            //         Mail::send(['text' => 'mailcd'], $data, function ($message) {
            //             $message->to('srihari.ayush@gmail.com', 'Laravel Mail')->subject('Laravel Basic Testing Mail');
            //             $message->from('xyz@gmail.com', 'Ayush');
            //         });
            //     }
            // } 
            // else {
                //     $date_array[$aa->title] = 2;
                // }

        }
        // return $arr;
            // return $date_array;
    }
}
