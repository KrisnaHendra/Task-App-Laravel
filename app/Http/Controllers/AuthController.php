<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use SweetAlert;

class AuthController extends Controller
{

    public function getLogin()
    {
      return view('login');
    }

    public function postLogin(Request $request)
    {
      // $this->validate($request,[
      //   'email' => 'required|email',
      //   'password' => 'required|min:5'
      // ]);
      // dd('Login Ok');
      if(!auth()->attempt(['email'=>$request->email,'password'=>$request->password])){
        session()->flash('message','Data yang anda masukkan salah!');
        return redirect()->back();
      }else if((auth()->user()->role_id) == 1 ){
        alert()->success('Administrator '.auth()->user()->name, 'Welcome');
        return redirect()->route('home');
      }else{
        return redirect()->route('home');
      }
      // print_r(auth()->user()->role_id);die;
      // return redirect()->route('home');
    }

    public function getRegister()
    {
      return view('register');
    }

    public function postRegister(Request $request)
    {
      $pesan = [
        'required' => 'Data Harus Diisi!',
        'name.min' => 'Nama Terlalu Pendek!',
        'email' => 'Penulisan Email Salah!',
        'unique' => 'Email Sudah Terdaftar!',
        'password.min' => 'Password Terlalu Pendek!',
        'password.confirmed' => 'Password Tidak Sama'
      ];
      $this->validate($request,[
        'name' => 'required|min:4',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:5|confirmed'
      ],$pesan);
      // dd('Registrasi OK');
      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role_id' => '2',
      ]);

      auth()->loginUsingId($user->id);

      return redirect()->back();
    }

    public function logout()
    {
      auth()->logout();
      session()->flash('message','Anda Berhasil Keluar');
      // alert()->success('You have been logged out.', 'Good bye!');
      return redirect()->route('login');
    }

}
