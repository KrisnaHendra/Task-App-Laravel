<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{

    public function index(Request $req)
    {
      $month = '';
      $year = '';
      $namaBulan = date("F",strtotime($req->periode));
      $project = DB::table('project')->get();
      $data = DB::table('task')
              ->leftJoin('users','task.users_id','=','users.id')
              ->leftJoin('project','task.project_id','=','project.id')
              ->whereMonth('tgl_assigne','=',$month)
              ->get();
      return view('admin/laporan',['project'=>$project,'data'=>$data,'bulan'=>$namaBulan,'tahun'=>$year]);
    }

    public function cari(Request $req){
      $month = date("m",strtotime($req->periode));
      $namaBulan = date("F",strtotime($req->periode));
      $year = date("Y",strtotime($req->periode));

      $project = DB::table('project')->get();
      $data = DB::table('task')
              ->leftJoin('users','task.users_id','=','users.id')
              ->leftJoin('project','task.project_id','=','project.id')
              ->whereMonth('tgl_assigne','=',$month)
              ->get();
      return view('admin/laporan',['project'=>$project,'data'=>$data,'bulan'=>$namaBulan,'tahun'=>$year]);
    }


}
