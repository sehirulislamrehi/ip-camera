<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth('super_admin')->check() || auth('web')->check()) {




            //run process
            $OperatingSystem = php_uname('s');
            if ($OperatingSystem == "Windows NT") {

                $descriptorspec = array(
                    0 => array("pipe", "r"),
                    1 => array("pipe", "w"),
                );

                // $runPath = "rtsp_m3u8\ip_172.17.107.24.bat";
                // if (is_resource($prog = proc_open("start /b " . $runPath, $descriptorspec, $pipes, NULL))) {
                // } 
                // else {
                //     echo ("Failed to execute!");
                //     exit();
                // }

                // $runPath = "rtsp_m3u8\ip_172.17.107.25.bat";
                // if (is_resource($prog = proc_open("start /b " . $runPath, $descriptorspec, $pipes, NULL))) {
                // } 
                // else {
                //     echo ("Failed to execute!");
                //     exit();
                // }

                // $runPath = "rtsp_m3u8\ip_172.17.140.91.bat";
                // if (is_resource($prog = proc_open("start /b " . $runPath, $descriptorspec, $pipes, NULL))) {
                // } 
                // else {
                //     echo ("Failed to execute!");
                //     exit();
                // }
            } 

            //find pid
            // $processes = explode("\n", shell_exec("tasklist.exe"));
            // $pid = 0;
            // foreach( $processes as $key => $p ){
            //     $explode_1 = explode("ffmpeg.exe",$p); 
            //     if( isset($explode_1[1]) ){
            //         $explode_2 = explode("Console",$explode_1[1])[0];
            //         $pid = (int) $explode_2; 
            //     }
            // }

            //delete process
            // $pid = 2632;
            // stripos(php_uname('s'), 'win')>-1  ? exec("taskkill /F /T /PID $pid") : exec("kill -9 $pid");

            return view('backend.dashboard');
        } else {
            return view("errors.404");
        }
    }
}
