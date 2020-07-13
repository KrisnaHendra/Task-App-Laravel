<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use SweetAlert;

class ProjectController extends Controller
{
    public function index(){
      $project = DB::table('project')->get();
      return view('admin/project',['project'=>$project]);
    }

    public function tambah(Request $req)
    {
      $pesan = [
        'required' => '- Nama project tidak boleh kosong!',
        'min' => '- Nama Project Terlalu Pendek'
      ];
      $this->validate($req,[
        'nama' => 'required|min:4',
      ],$pesan);
      $user = DB::table('project')->insert([
        'nama' => $req->nama,
        'created_at' => time(),
        'created_by' => auth()->user()->id
      ]);
      // session()->flash('message','Project Baru Telah Ditambahkan');
      alert()->success('Project Baru Telah Ditambahkan', 'Success')->persistent('OK');
      return redirect()->back();
    }

    public function hapus($id){
      DB::table('project')->where('id',$id)->delete();
      // return redirect()->back()->with('success', 'Project Berhasil Dihapus','Success');
      // alert()->success('Project Berhasil Dihapus', 'Success');
      alert()->message('Project Berhasil Dihapus', 'Success');
      return redirect()->back();
    }

    public function update(Request $req){
        DB::table('project')->where('id',$req->id)->update([
          'nama' => $req->nama
        ]);
        // session()->flash('message','Project Telah Diupdate');
        alert()->success('Project Berhasil Diupdate', 'Success');
        return redirect()->back();
    }

}
