<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Bank;
use App\Models\Topup;
use App\Models\Tagihan;
use App\Models\Kegiatan;
use App\Models\Saldo;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dosen.staff');
    }
    public function tampilacc()
    {
        $no = 1;
        $users = User::all();
        $saldos = Saldo::all();
        return view('admin.accounts',compact('users','saldos', 'no'));
    }
    public function isiacc(Request $request)
    {
        $users = new User;
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->password = bcrypt($request->get('password'));
        $users->pin = $request->get('pin');
        $users->status = $request->get('status');
        $users->save();
        return redirect()->route('accounts');
    }

    public function gantiacc($id)
    {
        $sid = $id;
        $users = User::all();
        return view ('admin.gantiacc',compact('sid', 'users'));
    }

    public function gantiisiacc(Request $request, $id)
    {
        User::where('id', $id)
        ->update([
            'name' =>  $request->get('name'),
            'email' =>  $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'pin' => $request->get('pin'),
            'status' => $request->get('status')
        ]);
        return redirect()->route('accounts');
    }

    public function updatetopup()
    {
        $no = 1;
        $users = User::all();
        $topups = Topup::all();
        $banks = Bank::all();
        return view('admin.updatetopup',compact('users','banks','topups', 'no'));
    }
    public function verif($id){
        $topups = Topup::findOrFail($id);
        DB::table('topups')
        -> where ('id',$id)
        -> update(['status'=>'lunas']);
        $users=$topups->id_siswa;
        DB::table('saldos')
        -> where ('id_siswa',$users)
        -> update(['saldo'=>
            (DB::table('topups')
            -> where ('id_siswa',$users)
            -> where ( 'status' ,'=', 'lunas' )
            -> SUM('nominal'))-
            (DB::table('tagihans')
            -> where ('id_siswa',$users)
            -> SUM('total_tagihan'))]);
        return redirect()->route('updatetopup')->with(['id' => $id, 'topups' => $topups, 'users' => $users] );
    }
    public function editevent()
    {
        $events = Kegiatan::all();
        $tagihans = Tagihan::all();
        return view ('admin.editevent',compact('events', 'tagihans'));

    }
    public function editdataevent($id)
    {
        $sid = $id;
        $events = Kegiatan::all();
        $tagihans = Tagihan::all();
        return view ('admin.editdataevent',compact('sid', 'events', 'tagihans'));
    }

    public function editupdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

           ]);

        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->store('public/images');
        $path = $request->file('image')->store('images');

        Kegiatan::where('id', $id)
        ->update([
            'nama' =>  $request->get('nama'),
            'desc' => $request->get('desc'),
            'harga' => $request->get('harga'),
            'picName' => $name,
            'picPath' => $path
        ]);
        return redirect()->route('editevent');
    }


    public function deletedataevent($id)
    {
        DB::table('tagihans')
        ->where('id_kegiatan' ,'=', $id)
        ->delete();
        Kegiatan::findOrFail($id)->delete();
        $no = 1;
        if($no < 15 && $no++){
        DB::table('saldos')
        -> where ('id_siswa',$no)
        -> update(['saldo'=>
            (DB::table('topups')
            -> where ('id_siswa',$no)
            -> where ( 'status' ,'=', 'lunas' )
            -> SUM('nominal'))-
            (DB::table('tagihans')
            -> where ('id_siswa',$no)
            -> SUM('total_tagihan'))]);
        }
        return redirect()->route('editevent');
    }

    public function deleteacc($id)
    {
        DB::table('tagihans')
        ->where('id_siswa' ,'=', $id)
        ->delete();
        DB::table('saldos')
        ->where('id_siswa' ,'=', $id)
        ->delete();
        DB::table('topups')
        ->where('id_siswa' ,'=', $id)
        ->delete();
        User::findOrFail($id)->delete();
        return redirect()->route('accounts');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
