<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function home()
    // {
    //     return view('dashboard.home');
    // }

    public function login()
    {
        return view('dashboard.login');
    }

    public function register()
    {
        return view('dashboard.register');
    }

    public function registerAccount(Request $request)
    {
        //validasi input
        $request->validate([
            'email' =>'required|email:dns',
            'username' => 'required|min:4|max:8',
            'password' => 'required|min:4',
        ]);

        //input data ke db
        User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        //redirect kemana setelah berhasil tambah data + dikirim pemberitahuan
        return redirect('/')->with('success', 'Berhasil Menambah Akun, Silahkan Login ');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ],[
            'username.exists' => "Akun Belum Ada!"
        ]);
         $user = $request->only('username', 'password');
         if (Auth::attempt($user)){
            return redirect()->route('laptop.index')->with('welcom', "Selamat Datang User ");
         }else{
            return redirect('/')->with('fail', "Gagal Login, Periksa dan Coba Lagi");
         }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('logout', "Berhasil Log Out");
    }


    public function index()
    {

        $laptops = Peminjaman::all();
        $jumlah = Peminjaman::where('done_time', '=',null)->get();
        $jumlahs = Peminjaman::where('done_time', '<>',null)->get();
        return view('dashboard.index', compact('laptops','jumlah','jumlahs'));
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'purposes'=>'required',
            'ket'=>'required',
            'nis'=>'required',
            'region'=>'required',
            'date'=>'required',
            'teacher'=>'required',
        ]);
        Peminjaman::create([
            'name'=>$request->name,
            'purposes'=>$request->purposes,
            'ket'=>$request->ket,
            'nis'=>$request->nis,
            'region'=>$request->region,
            'date'=>$request->date,
            'status'=>0,
            'teacher'=>$request->teacher,
        ]);
        return redirect()->route('laptop.index')->with('add', 'Berhasil Tambah Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }


    public function updateComplated($id)
    {
        Peminjaman::where('id', $id)->update([
            'status' => 1,
            'done_time' => Carbon::now(),
        ]);
        return redirect()->route('laptop.index')->with('done', 'Laptop Sudah dikembalikan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Peminjaman::where('id', $id)->first();
        return view('dashboard.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'=> 'required',
            'purposes'=>'required',
            'ket'=>'required',
            'nis'=>'required',
            'region'=>'required',
            'date'=>'required',
            'teacher'=>'required',
        ]);
        Peminjaman::where('id', $id)->update([
            'name'=>$request->name,
            'purposes'=>$request->purposes,
            'ket'=>$request->ket,
            'nis'=>$request->nis,
            'region'=>$request->region,
            'date'=>$request->date,
            'status'=>0,
            'teacher'=>$request->teacher,
        ]);
        return redirect()->route('laptop.index')->with('update', 'Berhasil Mengubah Data!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Peminjaman::where('id', '=', $id)->delete();
        return redirect()->route('laptop.index')->with('delete', 'Berhasil Menghapus Data!');
    }
}
