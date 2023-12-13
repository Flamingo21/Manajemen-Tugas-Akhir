<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bank;
use App\Models\Topup;
use App\Models\Tagihan;
use App\Models\Kegiatan;
use App\Models\Saldo;

use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatans  = DB::table('kegiatans')
            ->orderBy('id', 'desc')
            ->get();

        $kegiatansPag  = DB::table('kegiatans')
            ->orderBy('id', 'desc')
            ->paginate(3);
        return view('user.index', compact('kegiatans','kegiatansPag'));
    }

    public function cari(Request $request)
    {
        //menangkap data pencarian
        $cari = $request->cari;

        //mengambil data dari table kegiatan sesuai pencarian
        $kegiatans = DB::table('kegiatans')
            ->where('nama', 'like', "%" . $cari . "%")
            ->orwhere('desc', 'like', "%" . $cari . "%")
            ->paginate(3);

        //mengirim data kegiatan ke view
        return view('user.search', compact(['kegiatans'], 'cari'));
    }

    public function tampilevent($id)
    {
        $events  = Kegiatan::findOrFail($id);
        return view('user.eventdetails', compact('events', 'id'));
    }

    public function konfirmasievent($id)
    {
        $events  = Kegiatan::findOrFail($id);
        return view('user.konfirmasi', compact('events', 'id'));
    }

    public function buatevent(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->store('public/images');
        $path = $request->file('image')->store('images');

        $events = new Kegiatan;
        $events->nama = $request->get('nama');
        $events->desc = $request->get('desc');
        $events->harga = $request->get('harga');
        $events->picName = $name;
        $events->picPath = $path;
        $events->save();
        return redirect()->route('editevent');
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
