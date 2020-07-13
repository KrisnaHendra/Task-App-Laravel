<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(){
      $user = DB::table('users')->get();
      $project = DB::table('project')->get();
      $allTask = DB::table('task')
                     ->select(DB::raw('COUNT(id) as total'))
                     ->where('users_id','=',auth()->user()->id)
                     ->get();
      $uncomplete = DB::table('task')
                      ->select(DB::raw('COUNT(id) as uncomplete'))
                      ->where('users_id','=',auth()->user()->id)
                      ->where('dikerjakan','=',0)
                      ->get();
      $pending = DB::table('task')
                      ->select(DB::raw('COUNT(id) as pending'))
                      ->where('users_id','=',auth()->user()->id)
                      ->where('dikerjakan','=',1)
                      ->get();
      $done = DB::table('task')
                      ->select(DB::raw('COUNT(id) as done'))
                      ->where('users_id','=',auth()->user()->id)
                      ->where('dikerjakan','=',2)
                      ->get();
      $task = DB::table('task')
              ->select('task.*','project.nama','users.name')
              ->join('project','task.project_id','=','project.id')
              ->join('users','task.created_by','=','users.id')
              ->where('users_id','=',auth()->user()->id)
              ->where('dikerjakan','=','0')
              ->get();
      $taskProject = DB::table('task')
                     ->select('nama')
                     ->selectRaw('COUNT(task.id) as jumlah')
                     ->join('project','project.id','=','task.project_id')
                     ->where('users_id','=',auth()->user()->id)
                     ->where('dikerjakan','=','0')
                     ->groupBy('nama')
                     ->get();
      $jumlah = [];
      foreach ($taskProject as $key) {
        $jumlah[$key->nama] = $key->jumlah;
      }
      // print_r($jumlah);die;
      $listTask = [];
      foreach ($task as $key) {
        $listTask[$key->nama]['id_user'] = $key->users_id;
        $listTask[$key->nama]['id_project'] = $key->project_id;
        $listTask[$key->nama]['detail'][] = [
          'id' => $key->id,
          'project' => $key->nama,
          'isi' => $key->isi,
          'tipe' => $key->tipe,
          'dikerjakan' => $key->dikerjakan,
          'tgl_assigne' => $key->tgl_assigne,
          'tgl_deadline' => $key->tgl_deadline,
          'tgl_done' => $key->tgl_done,
          'created_at' => $key->created_at,
          'created_by' => $key->name,
        ];
      }
      return view('admin/task',['user'=>$user,'project'=>$project,'listTask'=>$listTask,'jumlah'=>$jumlah,'allTask'=>$allTask,'uncomplete'=>$uncomplete,'pending'=>$pending,'done'=>$done]);
    }

    public function tambah(Request $req)
    {
      $task = DB::table('task')->insert([
        'users_id' => $req->id_user,
        'project_id' => $req->project,
        'isi' => $req->task,
        'tipe' => $req->tipe,
        'dikerjakan' => 0,
        'tgl_assigne' => $req->tgl_assigne,
        'tgl_deadline' => $req->tgl_deadline,
        'tgl_done' => 0,
        'created_at' => time(),
        'created_by' => auth()->user()->id
      ]);
      alert()->success('Task Berhasil Ditambahkan','Sukses');
      return redirect()->back();
    }

    public function hapus($id)
    {
      DB::table('task')->where('id',$id)->delete();
      alert()->success('Task Berhasil Dihapus','Sukses');
      return back();
    }

    public function taskPending(){
      $user = DB::table('users')->get();
      $project = DB::table('project')->get();
      $allTask = DB::table('task')
                     ->select(DB::raw('COUNT(id) as total'))
                     ->where('users_id','=',auth()->user()->id)
                     ->get();
      $uncomplete = DB::table('task')
                      ->select(DB::raw('COUNT(id) as uncomplete'))
                      ->where('users_id','=',auth()->user()->id)
                      ->where('dikerjakan','=',0)
                      ->get();
      $pending = DB::table('task')
                      ->select(DB::raw('COUNT(id) as pending'))
                      ->where('users_id','=',auth()->user()->id)
                      ->where('dikerjakan','=',1)
                      ->get();
      $done = DB::table('task')
                      ->select(DB::raw('COUNT(id) as done'))
                      ->where('users_id','=',auth()->user()->id)
                      ->where('dikerjakan','=',2)
                      ->get();
      $task = DB::table('task')
              ->select('task.*','project.nama','users.name')
              ->join('project','task.project_id','=','project.id')
              ->join('users','task.created_by','=','users.id')
              ->where('users_id','=',auth()->user()->id)
              ->where('dikerjakan','=','1')
              ->get();
      $listTask = [];
      foreach ($task as $key) {
        $listTask[$key->nama]['id_user'] = $key->users_id;
        $listTask[$key->nama]['id_project'] = $key->project_id;
        $listTask[$key->nama]['detail'][] = [
          'id' => $key->id,
          'jumlah' => $key->id,
          'project' => $key->nama,
          'isi' => $key->isi,
          'tipe' => $key->tipe,
          'dikerjakan' => $key->dikerjakan,
          'tgl_assigne' => $key->tgl_assigne,
          'tgl_deadline' => $key->tgl_deadline,
          'tgl_done' => $key->tgl_done,
          'created_at' => $key->created_at,
          'created_by' => $key->name,
        ];
      }
      return view('admin/taskPending',['user'=>$user,'project'=>$project,'listTask'=>$listTask,'allTask'=>$allTask,'uncomplete'=>$uncomplete,'pending'=>$pending,'done'=>$done]);
    }

    public function taskComplete(){
      $user = DB::table('users')->get();
      $project = DB::table('project')->get();
      $allTask = DB::table('task')
                     ->select(DB::raw('COUNT(id) as total'))
                     ->where('users_id','=',auth()->user()->id)
                     ->get();
      $uncomplete = DB::table('task')
                      ->select(DB::raw('COUNT(id) as uncomplete'))
                      ->where('users_id','=',auth()->user()->id)
                      ->where('dikerjakan','=',0)
                      ->get();
      $pending = DB::table('task')
                      ->select(DB::raw('COUNT(id) as pending'))
                      ->where('users_id','=',auth()->user()->id)
                      ->where('dikerjakan','=',1)
                      ->get();
      $done = DB::table('task')
                      ->select(DB::raw('COUNT(id) as done'))
                      ->where('users_id','=',auth()->user()->id)
                      ->where('dikerjakan','=',2)
                      ->get();
      $task = DB::table('task')
              ->select('task.*','project.nama','users.name')
              ->join('project','task.project_id','=','project.id')
              ->join('users','task.created_by','=','users.id')
              ->where('users_id','=',auth()->user()->id)
              ->where('dikerjakan','=','2')
              ->get();
      $listTask = [];
      foreach ($task as $key) {
        $listTask[$key->nama]['id_user'] = $key->users_id;
        $listTask[$key->nama]['id_project'] = $key->project_id;
        $listTask[$key->nama]['detail'][] = [
          'id' => $key->id,
          'jumlah' => $key->id,
          'project' => $key->nama,
          'isi' => $key->isi,
          'tipe' => $key->tipe,
          'dikerjakan' => $key->dikerjakan,
          'tgl_assigne' => $key->tgl_assigne,
          'tgl_deadline' => $key->tgl_deadline,
          'tgl_done' => $key->tgl_done,
          'created_at' => $key->created_at,
          'created_by' => $key->name,
        ];
      }
      return view('admin/taskComplete',['user'=>$user,'project'=>$project,'listTask'=>$listTask,'allTask'=>$allTask,'uncomplete'=>$uncomplete,'pending'=>$pending,'done'=>$done]);
    }

    public function updatePending(Request $req)
    {
      DB::table('task')->where('id',$req->id_task)->update([
        'dikerjakan' => 1
      ]);
      return back();
    }
    public function updateComplete(Request $req)
    {
      DB::table('task')->where('id',$req->id_task)->update([
        'dikerjakan' => 2
      ]);
      return back();
    }
    public function updateUncomplete(Request $req)
    {
      DB::table('task')->where('id',$req->id_task)->update([
        'dikerjakan' => 0
      ]);
      return back();
    }
}
