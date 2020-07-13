<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SweetAlert;

class HomeController extends Controller
{

    public function index(){
      $uncomplete = DB::table('task')
                     ->select(DB::raw('COUNT(id) as uncomplete'))
                     ->where('dikerjakan','=',0)
                     ->get();
      $pending = DB::table('task')
                      ->select(DB::raw('COUNT(id) as pending'))
                      ->where('dikerjakan','=',1)
                      ->get();
      $done = DB::table('task')
                      ->select(DB::raw('COUNT(id) as done'))
                      ->where('dikerjakan','=',2)
                      ->get();
      $totTask = DB::table('users')
                ->select('users.id','users.name')
                ->selectRaw('COUNT(task.id) as totTask')
                ->leftJoin('task','users.id','=','task.users_id')
                ->groupBy('users.id','users.name')
                ->get();
      $user = DB::table('users')->select('id','name')->get();
      $dikerjakan = DB::table('users')
                    ->select('users.id','users.name')
                    ->selectRaw('COUNT(task.id) as dikerjakan')
                    ->leftJoin('task','users.id','=','task.users_id')
                    ->where('dikerjakan','=',1)
                    ->orWhere('dikerjakan','=',2)
                    ->groupBy('users.id','users.name')
                    ->get();
      $listProject = DB::table('project')->get();
      $tes=[];
      foreach ($dikerjakan as $key) {
          $tes[$key->name] = $key->dikerjakan;
      }
      foreach($tes as $key){
        foreach($user as $u){
          if(!isset($tes[$u->name])){
            $tes[$u->name] = 0;
          }
          $tes[$u->name];
        }
      }
      // print_r($tes);die;
      $task=[];
      foreach ($totTask as $key) {
        $task[$key->name]['id'] = $key->id;
        $task[$key->name]['complete'] = 2;
        $task[$key->name]['total'] = $key->totTask;
      }
      // print_r($task);die;

      return view('admin/dashboard',['listProject'=>$listProject,'uncomplete'=>$uncomplete,'pending'=>$pending,'done'=>$done,'task'=>$task,'tes'=>$tes]);
    }

    public function profile()
    {
      return view('admin/profile');
    }

    public function updateProfile(Request $request)
    {
      if($request->password!=''){
        DB::table('users')->where('id',$request->id)->update([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password)
        ]);
      }else{
        DB::table('users')->where('id',$request->id)->update([
          'name' => $request->name,
          'email' => $request->email
        ]);
      }
      session()->flash('message','Profile Berhasil Diubah');
      return redirect()->back();
    }

}
