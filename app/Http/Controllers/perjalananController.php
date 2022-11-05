<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Perjalanan;
use App\Models\User;
use Illuminate\Validation\Rule;

class perjalananController extends Controller
{
    // Public function __construct(){
    //     $this->middleware('authcek');
    // }

    // Menampilkan data perjalanan di page Table
    Public function index()
    {
        // if (Auth::check())
        $data = DB::table('perjalanans')
                ->join('users', 'users.id', '=', 'perjalanans.id_user')
                ->select('users.email','perjalanans.id', 'perjalanans.tanggal', 'perjalanans.jam', 'perjalanans.lokasi', 'perjalanans.suhu')
                ->where('users.id', '=', auth()->user()->id)

        // Diganti jadi Pagination
        // ->get(); 
        
        ->paginate(5);
        // dd($data);
        return view('pages.table', ['data'=>$data]);
    }

    // Menampilkan halaman input data perjalanan
    Public function perjalanan()
    {
        return view('pages.forms');
    }

    // Menyimpan data perjalanan ke dalam database
    Public function simpanPerjalanan(Request $request)
    {
        $request->validate(
            [
                'tanggal'=>'required|date|before_or_equal:today',
                'jam'=>[
                    'required',
                    Rule::unique('perjalanans')->where('tanggal', $request->tanggal)->where('jam', $request->jam)
                ],
            ]);

        $data=[
            'id_user'=>auth()->user()->id,
            'tanggal'=>$request->tanggal,
            'jam'=>$request->jam,
            'lokasi'=>$request->lokasi,
            'suhu'=>$request->suhu
        ];

        // dd($data);
        Perjalanan::create($data);
        return redirect('/tabel-data-perjalanan')->with('alert-success', 'Data telah tersimpan!');
    }

    // Fungsi Search
    Public function cariPerjalanan(Request $request)
    {
        if (!empty($request->input('lokasi')) && empty($request->input('suhu')) && empty($request->input('tanggal')) && empty($request->input('jam'))) {
            $search = $request->lokasi;

            $data = perjalanan::where('id_user', auth()->user()->id)
                ->where('perjalanans.lokasi', 'LIKE', $search)
                ->paginate(5)
                ->withQueryString();

            $data->appends($request->input());
            
                if ($data){
                    return view('pages.table', ['data'=>$data])->with('alert-info', 'Data ditemukan!');
                }else{
                    abort(404);
                }

        }elseif (empty($request->input('lokasi')) && !empty($request->input('suhu')) && empty($request->input('tanggal')) && empty($request->input('jam'))) {
            $search = $request->suhu;

            $data = perjalanan::where('id_user', auth()->user()->id)
                ->where('perjalanans.suhu', 'LIKE', '%' .$search. '%')
                ->paginate(5)
                ->withQueryString();

            $data->appends($request->input());
            
                if ($data){
                    return view('pages.table', ['data'=>$data])->with('alert-info', 'Data ditemukan');
                }else{
                    abort(404);
                }

        }elseif (empty($request->input('lokasi')) && empty($request->input('suhu')) && !empty($request->input('tanggal')) && empty($request->input('jam'))) {
            $search = $request->tanggal;

            $data = perjalanan::where('id_user', auth()->user()->id)
                ->where('perjalanans.tanggal', 'LIKE', '%' .$search. '%')
                ->paginate(5)
                ->withQueryString();

            $data->appends($request->input());

                if ($data){
                    return view('pages.table', ['data'=>$data])->with('alert-info', 'Data ditemukan');
                }else{
                    abort(404);
                }

        }elseif (empty($request->input('lokasi')) && empty($request->input('suhu')) && empty($request->input('tanggal')) && !empty($request->input('jam'))) {
            $search = $request->jam;

            $data = perjalanan::where('id_user', auth()->user()->id)
                ->where('perjalanans.jam', 'LIKE', '%' .$search. '%')
                ->paginate(5)
                ->withQueryString();

            $data->appends($request->input());
                    
                if ($data){
                    return view('pages.table', ['data'=>$data])->with('alert-info', 'Data ditemukan!');
                }else{
                    abort(404);
                }

        }else {
            $data = perjalanan::where('id_user', auth()->user()->id)
                ->select('perjalanans.*')
                ->paginate(5)
                ->withQueryString();

        return view('pages.table', ['data'=>$data]);
        }
    }

    // Fungsi sortBy
    Public function urutkanPerjalanan(Request $request){

    // Logic sortby
        // Data tanggal descendant
        if ($request->input('tanggalDesc') == "Desc") {

            $sorted = perjalanan::where('id_user', auth()->user()->id)
                    ->orderByDesc('tanggal')
                    ->paginate(5)
                    ->withQueryString();

            return view('pages.table', ['data' => $sorted]);
        }
        // Data tanggal ascendant
        elseif ($request->input('tanggalAsc') == "Asc") {
            
            $sorted = perjalanan::where('id_user', auth()->user()->id)
                    ->orderBy('tanggal')
                    ->paginate(5)
                    ->withQueryString();
             
            return view('pages.table', ['data' => $sorted]);
        } 
        // Data jam descendant
        elseif ($request->input('jamDesc') == "Desc") {

            $sorted = perjalanan::where('id_user', auth()->user()->id)
                    ->orderByDesc('jam')
                    ->paginate(5)
                    ->withQueryString();
            
            return view('pages.table', ['data' => $sorted]);
        } 
        // Data jam ascendant
        elseif ($request->input('jamAsc') == "Asc") {
            
            $sorted = perjalanan::where('id_user', auth()->user()->id)
                    ->orderBy('jam')
                    ->paginate(5)
                    ->withQueryString();
            
            return view('pages.table', ['data' => $sorted]);
        } 
        // Data suhu descendant
        elseif ($request->input('suhuDesc') == "Desc") {

            $sorted = perjalanan::where('id_user', auth()->user()->id)
                    ->orderByDesc('suhu')
                    ->paginate(5)
                    ->withQueryString();
            
            return view('pages.table', ['data' => $sorted]);
        } 
        // Data suhu ascendant
        elseif ($request->input('suhuAsc') == "Asc") {            

            $sorted = perjalanan::where('id_user', auth()->user()->id)
                    ->orderBy('suhu')
                    ->paginate(5)
                    ->withQueryString();
            
            return view('pages.table', ['data' => $sorted]);
        }
    }

    Public function hapusData(Request $request) {
        Perjalanan::find(((int) $request->id))->delete();
        return redirect()->route('data-perjalanan')->with('alert-danger', "Data berhasil dihapus");
    }

    Public function editData(Request $request) {
        $selected = Perjalanan::find(((int) $request->id));
        // dd($selected);
        return view('pages.edit', ['data' => $selected ]);
    }

    public function simpanEdit(Request $request) 
    {
        $perjalanan = Perjalanan::find(((int) $request->id));
        $perjalanan->tanggal = $request->tanggal;
        $perjalanan->lokasi = $request->lokasi;
        $perjalanan->jam = $request->jam;
        $perjalanan->suhu = $request->suhu;
        $perjalanan->update();

        return redirect('/tabel-data-perjalanan')->with('alert-success', 'Data Telah diperbaharui');
    }
}
