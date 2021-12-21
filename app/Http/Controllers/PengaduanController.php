<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use App\User;
use App\Http\Requests\PengaduanRequest;
use Illuminate\Http\Request;
use App\Exports\PengaduanExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\NotifyPengaduan;

class PengaduanController extends Controller
{
    public function json(){
        $pengaduan = Pengaduan::all();
        return Datatables::of($pengaduan)
        ->addColumn('action', function($data){
            $button = '&nbsp;&nbsp;&nbsp;<a class="btn btn-info btn-icon p-2 text-white" href="/pengajuan/'.$data->id.'" title="Lihat Detail"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info link-icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></a>';
            $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-icon p-2 text-white" title="Hapus"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->editColumn('created_at', function ($pengaduan) {
            return $pengaduan->created_at ? with(new Carbon($pengaduan->created_at))->format('d F Y') : '';
        })
        ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::paginate(10);
        return view('pengajuan.index', ['pengaduan' => $pengaduan]);

    }

    public function export()
    {
        return Excel::download(new PengaduanExport, 'Pengaduan '.date('d-m-Y').'.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pengajuan.guest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pengaduan $model)
    {
        
        $this->validate($request, [
                'nik' => 'required|min:3',
                'nama' => 'required|min:3',
                'telp' => 'required|min:6',
                'email' => 'required|min:3',
                'jenis'=>'required|min:3',

                
            ],
            [

            ]

        );
        
        $model = new Pengaduan;
        $model->nik= $request->get('nik');
        $model->nama= $request->get('nama');
        $model->telp= $request->get('telp');
        $model->email= $request->get('email');
        $model->jenis = $request->get('jenis');
        $model->deskripsi = "pending";
        
       
        if ($request->file('img1'))
        {
            $model->img1 = $request->file('img1')->store('img1', 'public', 'storage');
        }
        if ($request->file('img2'))
        {
            $model->img2 = $request->file('img2')->store('img2', 'public', 'storage');
        }
        if ($request->file('img3'))
        {
            $model->img3 = $request->file('img3')->store('img3', 'public', 'storage');
        }
        if ($request->file('img4'))
        {
            $model->img4 = $request->file('img4')->store('FotoKTP', 'public', 'storage');
        }

        $model->save();

        $pengaduan = Pengaduan::find($model->id);
        User::find(1)->notify(new NotifyPengaduan($pengaduan));

        Alert::success('Berhasil', 'Pengaduan berhasil dikirim!');

        return redirect()->route('pengaduan.create');

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
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengajuan.show', ['pengaduan' => $pengaduan]);

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
        $pengaduan = Pengaduan::findOrFail($id);
        if(file_exists(storage_path('app/public/' . $pengaduan->img1))){
            \Storage::delete('public/' . $pengaduan->img1); 
        }
        if(file_exists(storage_path('app/public/' . $pengaduan->img2))){
            \Storage::delete('public/' . $pengaduan->img2); 
        }
        if(file_exists(storage_path('app/public/' . $pengaduan->img3))){
            \Storage::delete('public/' . $pengaduan->img3); 
        }
        if(file_exists(storage_path('app/public/' . $pengaduan->img4))){
            \Storage::delete('public/' . $pengaduan->img4); 
        }
        $pengaduan->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus!');
        return redirect()->back();
    }

    public function selesai(Request $request, $id)
    {
        $model = Pengaduan::findOrFail($id);
        $model->deskripsi= "Selesai";
        $model->save();
        Alert::success('Berhasil', 'Data berhasil diupdate!');
        return redirect()->back();
    }

    public function tolak(Request $request, $id)
    {
        $model = Pengaduan::findOrFail($id);
        $model->deskripsi= "Ditolak";
        $model->save();
        Alert::success('Berhasil', 'Data berhasil diupdate!');
        return redirect()->back();
    }
}
