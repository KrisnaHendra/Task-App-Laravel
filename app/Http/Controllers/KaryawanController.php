<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\user;

class KaryawanController extends Controller
{

  public function index()
  {
    $karyawan = DB::table('users')
                ->select('users.*','role.id as id_role', 'role.role')
                ->join('role', 'users.role_id', '=', 'role.id')
                ->orderBy('role_id','ASC')
                ->get();
    $role = DB::table('role')->get();
    return view('admin/karyawan',['karyawan' => $karyawan, 'role' => $role]);
  }

  public function tambah(Request $request)
  {
    $this->validate($request,[
      'name' => 'required|min:4',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:5'
    ]);
    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'role_id' => $request->input('role_id')
    ]);
    session()->flash('message', 'Data Telah Ditambahkan');
    return redirect()->back();
  }

  public function hapus($id)
  {
     DB::table('users')->where('id',$id)->delete();
     // session()->flash('message', 'Data Berhasil Dihapus');
     alert()->success('Data Karyawan Berhasil Dihapus','Success');
	   return redirect()->back();
  }

  public function update(Request $request)
  {
    $pass = $request->password;
    // print_r($pass);die;
    if($pass!=''){
      DB::table('users')->where('id',$request->id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role_id' => $request->role_id
      ]);
    }else{
      DB::table('users')->where('id',$request->id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'role_id' => $request->role_id
      ]);
    }
    // session()->flash('message','Data Berhasil Diubah');
    alert()->success('Data Karyawan Berhasil Diubah','Success');
  	return redirect()->back();
  }

}
