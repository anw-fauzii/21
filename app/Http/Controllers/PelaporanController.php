<?php

namespace App\Http\Controllers;

use App\Pelaporan;
use App\Review;
use App\User;
use App\Mail\ReviewEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PelaporanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Exports\PelaporanExport;
use App\Exports\PelaporanUsersExport;
use App\Exports\ReviewExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\NotifyPelaporanStats;
use App\Notifications\NotifyReview;

class PelaporanController extends Controller
{
    public function json()
    {
        if (Gate::allows('isAdmin')) {
            $pelaporan = Pelaporan::where('status', '=', 'Reviewing');
            return Datatables::of($pelaporan)
            ->addColumn('action', function($data){
                $button = '<a class="btn btn-warning btn-icon p-2 text-white" role="button" href="/pelaporan/tanggapi/'.$data->id.'" title="Tanggapi"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit link-icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a class="btn btn-info btn-icon p-2 text-white" href="/pelaporan/'.$data->id.'" title="Lihat Detail"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info link-icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-icon p-2 text-white" title="Hapus"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->editColumn('created_at', function ($pelaporan) {
                return $pelaporan->created_at ? with(new Carbon($pelaporan->created_at))->format('d F Y') : '';
            })
            ->make(true);
        } elseif (Gate::allows('isUser')) {

            $pelaporan = Pelaporan::where('user_id', '=', auth()->user()->id);
            return Datatables::of($pelaporan)
            ->addColumn('action', function($data){
                $button = '&nbsp;&nbsp;&nbsp;<a class="btn btn-info btn-icon p-2 text-white" href="/pelaporan/'.$data->id.'" title="Lihat Detail"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info link-icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-icon p-2 text-white" title="Hapus"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->editColumn('created_at', function ($pelaporan) {
                return $pelaporan->created_at ? with(new Carbon($pelaporan->created_at))->format('d F Y') : '';
            })
            ->make(true);            
        }  else {
            abort(403, 'Anda tidak memiliki cukup hak akses!');
        }
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Gate::allows('isAdmin')) {
            return view('pelaporan.index');
        } elseif (Gate::allows('isUser')) {
            $pelaporan = Pelaporan::where('user_id', '=', auth()->user()->id)->paginate(10);
            //$kecamatan = Kecamatan::where('id')->get();
            return view('pelaporan.index', ['pelaporan' => $pelaporan]);
        }  else {
            abort(403, 'Anda tidak memiliki cukup hak akses');
        }
    }

    public function form(Request $request)
    {      
        if (Gate::allows('isUser')) {
            if(auth()->user()->completed == 'false'){
                return view('profile.edit');   
            } else {
                return view('pelaporan.form');   
            }

        } else {
            abort(403, 'Anda tidak memiliki cukup hak akses');
           
        }
        
    }

    public function mail()
    {      
        $model = Review::find(34);
        $date = Carbon::now()->format('d F Y');
        return view('pelaporan.mail', compact('model', 'date')); 
        
        
    }

    /**  
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function formstatus(Request $request)
    {
        if (Gate::allows('isUserWaiting')) {
            abort(403, 'Anda tidak memiliki cukup hak akses');
        } else {
            $this->validate($request, [
                'periode' => 'required',
                'tahun' => 'required',
                'jenis' => 'required',
            ],
            [
                'periode.required' => 'Periode Wajib dipilih.',       
                'tahun.required' => 'Tahun Wajib dipilih.',        
                'jenis.required' => 'Jenis Wajib dipilih.',                         
            ]);
        
            $periode = $request->get('periode');
            $tahun = $request->get('tahun');
            $jenis = $request->get('jenis');


            $filter = Pelaporan::where('periode', $periode)
                ->where('tahun', $tahun)
                ->where('jenis', $jenis)
                ->first();

            return view('pelaporan.form-pengajuan',compact('filter','periode','tahun','jenis'));
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pelaporan $model)
    {
        //
        if (Gate::allows('isUserWaiting')) {
            abort(403, 'Anda tidak memiliki cukup hak akses');
        } else {
            if ($request->jenis == 'Air') {
               $this->validate($request, [
                'nama' => 'required|min:3',
                'telp' => 'required|min:6',
                'email' => 'required|min:6',
                'nama_perusahaan' => 'required|min:6',
                'bidang_usaha'=> 'required|min:3',
                'alamat'=> 'required|min:3',
                'jenis' => 'required|min:3',
                'periode' => 'required|min:1',
                'tahun' => 'required|min:1',
                'dokumentasi' => 'mimes:png,jpg,jpeg',
                'dok_1' => 'mimes:docx,doc,pdf',
                'dok_2' => 'mimes:docx,doc,pdf',
                'dok_3' => 'mimes:docx,doc,pdf',
                'dok_4' => 'mimes:docx,doc,pdf',
                ],
                [
                    'nama.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                    'telp.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                    'email.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                    'nama_perusahaan.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                    'bidang_usaha.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                    'alamat.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                    'dokumentasi.mimes' => 'Inputan Dokumentasi Pelaporan harus berupa file bertipe: png, jpg, jpeg.',
                    'dok_1.mimes' => 'Inputan dokumen Gambaran Pengelolaan Air harus berupa file bertipe: docx, doc, pdf.',
                    'dok_2.mimes' => 'Inputan dokumen Sertifikat Uji Lab harus berupa file bertipe: docx, doc, pdf.',
                    'dok_3.mimes' => 'Inputan dokumen Izin Ipalasa harus berupa file bertipe: docx, doc, pdf.',
                ]
                );
            } elseif ($request->jenis == 'Udara') {
                $this->validate($request, [
                    'nama' => 'required|min:3',
                    'telp' => 'required|min:6',
                    'email' => 'required|min:6',
                    'nama_perusahaan' => 'required|min:6',
                    'bidang_usaha'=> 'required|min:3',
                    'alamat'=> 'required|min:3',
                    'jenis' => 'required|min:3',
                    'periode' => 'required|min:1',
                    'tahun' => 'required|min:1',
                    'dok_1' => 'required|mimes:docx,doc,pdf',
                    'dok_2' => 'required|mimes:docx,doc,pdf',
                    'dok_3' => 'mimes:docx,doc,pdf',
                    ],
                    [
                        'nama.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'telp.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'email.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'nama_perusahaan.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'bidang_usaha.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'alamat.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'dok_1.required' => 'Inputan dokumen Deskripsi Pengelolaan Pencemaran Udara wajib.',
                        'dok_2.required' => 'Inputan dokumen Udara Ambien (Hasil Uji Lab) wajib.',
                        'dok_1.mimes' => 'Inputan dokumen Deskripsi Pengelolaan Pencemaran Udara harus berupa file bertipe: docx, doc, pdf.',
                        'dok_2.mimes' => 'Inputan dokumen Udara Ambien (Hasil Uji Lab) harus berupa file bertipe: docx, doc, pdf.',
                        'dok_3.mimes' => 'Inputan dokumen Udara Emisi (Hasil Uji Lab) harus berupa file bertipe: docx, doc, pdf.',
                    ]
                    );
            } elseif ($request->jenis == 'LimbahB3') {
                $this->validate($request, [
                    'nama' => 'required|min:3',
                    'telp' => 'required|min:6',
                    'email' => 'required|min:6',
                    'nama_perusahaan' => 'required|min:6',
                    'bidang_usaha'=> 'required|min:3',
                    'alamat'=> 'required|min:3',
                    'jenis' => 'required|min:3',
                    'periode' => 'required|min:1',
                    'tahun' => 'required|min:1',
                    'dok_1' => 'required|mimes:docx,doc,pdf',
                    'dok_2' => 'required|mimes:docx,doc,pdf',
                    'dok_3' => 'required|mimes:docx,doc,pdf',
                    'dok_4' => 'required|mimes:docx,doc,pdf',
                    ],
                    [
                        'nama.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'telp.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'email.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'nama_perusahaan.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'bidang_usaha.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'alamat.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'dok_1.required' => 'Inputan dokumen Deskripsi Pengelolaan Limbah B3 wajib.',
                        'dok_2.required' => 'Inputan dokumen Bukti Manifest wajib.',
                        'dok_3.required' => 'Inputan dokumen MOU Pengelolaan Limbah B3 dengan Pihak ke-3 wajib.',
                        'dok_4.required' => 'Inputan dokumen Izin TPS Limbah B3 wajib.',
                        'dok_1.mimes' => 'Inputan dokumen Deskripsi Pengelolaan Limbah B3 harus berupa file bertipe: docx, doc, pdf.',
                        'dok_2.mimes' => 'Inputan dokumen Bukti Manifest harus berupa file bertipe: docx, doc, pdf.',
                        'dok_3.mimes' => 'Inputan dokumen MOU Pengelolaan Limbah B3 dengan Pihak ke-3 harus berupa file bertipe: docx, doc, pdf.',
                        'dok_4.mimes' => 'Inputan dokumen Izin TPS Limbah B3 harus berupa file bertipe: docx, doc, pdf.',
                    ]
                    );
            } elseif ($request->jenis == 'Lingkungan') {
                $this->validate($request, [
                    'nama' => 'required|min:3',
                    'telp' => 'required|min:6',
                    'email' => 'required|min:6',
                    'nama_perusahaan' => 'required|min:6',
                    'bidang_usaha'=> 'required|min:3',
                    'alamat'=> 'required|min:3',
                    'jenis' => 'required|min:3',
                    'periode' => 'required|min:1',
                    'tahun' => 'required|min:1',
                    'dok_1' => 'required|mimes:docx,doc,pdf',
                    ],
                    [
                        'nama.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'telp.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'email.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'nama_perusahaan.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'bidang_usaha.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'alamat.required' => 'Harap edit terlebih dahulu di halaman edit profil.',
                        'dok_1.required' => 'Inputan dokumen Pelaporan wajib.',
                        'dok_1.mimes' => 'Inputan dokumen Pelaporan harus berupa file bertipe: docx, doc, pdf.',
                    ]
                    );
            } else {
                abort(404);
            }
            
            $model = new Pelaporan;
            $model->nama= $request->get('nama');
            $model->telp= $request->get('telp');
            $model->nama_perusahaan = $request->get('nama_perusahaan');
            $model->email = $request->get('email');
            $model->bidang_usaha = $request->get('bidang_usaha');
            $model->alamat = $request->get('alamat');
            $model->jenis = $request->get('jenis');
            $model->periode = $request->get('periode');  
            $model->tahun = $request->get('tahun');  
            if ($request->file('dokumentasi')) {
                $model->dokumentasi = $request->file('dokumentasi')->store('Pelaporan-'.$model->jenis.'/Periode-'.$model->periode.'/Tahun-'.$model->tahun.'/Dokumentasi', 'public');
            } 

            if ($request->get('jenis') == 'Air') {
                $model->dok_1 = $request->file('dok_1')->store('Pelaporan-'.$model->jenis.'/Periode-'.$model->periode.'/Tahun-'.$model->tahun.'/Gambaran-Pengelolaan-Air', 'public');
                $model->dok_2 = $request->file('dok_2')->store('Pelaporan-'.$model->jenis.'/Periode-'.$model->periode.'/Tahun-'.$model->tahun.'/Sertifikat-Uji-Lab', 'public');
                $model->dok_3 = $request->file('dok_3')->store('Pelaporan-'.$model->jenis.'/Periode-'.$model->periode.'/Tahun-'.$model->tahun.'/Izin-Ipalasa', 'public');
            } elseif ($request->get('jenis') == 'LimbahB3') {
                $model->dok_1 = $request->file('dok_1')->store('Pelaporan-'.$model->jenis.'/Periode-'.$model->periode.'/Tahun-'.$model->tahun.'/Deskripsi-Pengelolaan-LimbahB3', 'public');
                $model->dok_2 = $request->file('dok_2')->store('Pelaporan-'.$model->jenis.'/Periode-'.$model->periode.'/Tahun-'.$model->tahun.'/Bukti-Manifest', 'public');
                $model->dok_3 = $request->file('dok_3')->store('Pelaporan-'.$model->jenis.'/Periode-'.$model->periode.'/Tahun-'.$model->tahun.'/MOU-Pengelolaan-LimbahB3', 'public');
                $model->dok_4 = $request->file('dok_4')->store('Pelaporan-'.$model->jenis.'/Periode-'.$model->periode.'/Tahun-'.$model->tahun.'/Izin-TPS-LimbahB3', 'public');
            } elseif ($request->get('jenis') == 'Udara') {
                $model->dok_1 = $request->file('dok_1')->store('Pelaporan-'.$model->jenis.'/Periode-'.$model->periode.'/Tahun-'.$model->tahun.'/Deskripsi-Pengelolaan-Pencemaran-Udara', 'public');
                $model->dok_2 = $request->file('dok_2')->store('Pelaporan-'.$model->jenis.'/Periode-'.$model->periode.'/Tahun-'.$model->tahun.'/Udara-Ambien', 'public');
                $model->dok_3 = $request->file('dok_3')->store('Pelaporan-'.$model->jenis.'/Periode-'.$model->periode.'/Tahun-'.$model->tahun.'/Udara-Emisi', 'public');
            } elseif ($request->get('jenis') == 'Lingkungan') {
                $model->dok_1 = $request->file('dok_1')->store('Pelaporan-'.$model->jenis.'/Periode-'.$model->periode.'/Tahun-'.$model->tahun.'/Dokumen-Pelaporan', 'public');
            } else {
                abort(404);
            }
            
            $model->user_id = auth()->user()->id;

            $model->save();

            $pelaporan = Pelaporan::find($model->id);
            User::find(1)->notify(new NotifyPelaporanStats($pelaporan));

            Alert::success('Berhasil', 'Pelaporan berhasil dikirim!');

            return back()->withStatus(__('Pelaporan berhasil dikirim.'));

        }
    }

    public function pelaporanexport()
    {
        if (Gate::allows('isUserWaiting')) {
            abort(403, 'Anda tidak memiliki cukup hak akses');
        } else {
            return Excel::download(new PelaporanExport, 'Pelaporan '.date('d-m-Y').'.xlsx');
        }
        
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
        if (Gate::allows('isUserWaiting')) {
            abort(403, 'Anda tidak memiliki cukup hak akses');
        } else {
            $pelaporan = Pelaporan::find($id);
            return view('pelaporan.show', ['pelaporan' => $pelaporan]);
        }
        
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

    public function jsonreview()
    {
        if (Gate::allows('isAdmin')) {
            $review = Review::all();
            return Datatables::of($review)
            ->addColumn('action', function($data){
                $button = '<a class="btn btn-info btn-icon p-2 text-white" href="/tanggapan/'.$data->id.'" title="Lihat Detail"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info link-icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->editColumn('created_at', function ($review) {
                return $review->created_at ? with(new Carbon($review->created_at))->format('d F Y') : '';
            })
            ->make(true);
        } else {
            abort(403, 'Anda tidak memiliki cukup hak akses');
        }
    }

    public function indexreview()
    {  
        if (Gate::allows('isUserWaiting')) {
            abort(403, 'Anda tidak memiliki cukup hak akses');
        } else {
            $review = Review::all();
            return view('review.index', ['review' => $review]);
        }
    }

    public function pelaporanreview($id)
    {  
        if (Gate::allows('isUserWaiting')) {
            abort(403, 'Anda tidak memiliki cukup hak akses');
        } else {
           $pelaporan = Pelaporan::find($id);
            $review = Review::all();
            return view('pelaporan.review', ['pelaporan' => $pelaporan, 'review' => $review]); 
        }
        
    }

    public function review(Request $request, Review $model)
    {  
        if (Gate::allows('isAdmin')) {
            if ($request->jenis == 'Air') {
                $this->validate($request, [
                    'review_dok_1' => 'required|min:3',
                    'review_dok_2' => 'required|min:3',
                    'review_dok_3' => 'required|min:3',
                    ],
                    [
                        'review_dok_1.required' => 'Tanggapan dokumen Gambaran Pengelolaan Air wajib diisi.',
                        'review_dok_2.required' => 'Tanggapan dokumen Sertifikat Uji Lab wajib diisi.',
                        'review_dok_3.required' => 'Tanggapan dokumen Izin Ipalasa wajib diisi.',
                        'review_dok_1.min' => 'Tanggapan dokumen Gambaran Pengelolaan Air minimal 3 karakter.',
                        'review_dok_2.min' => 'Tanggapan dokumen Sertifikat Uji Lab minimal 3 karakter.',
                        'review_dok_3.min' => 'Tanggapan dokumen Izin Ipalasa minimal 3 karakter.',
                    ]
                 );
            } elseif ($request->jenis == 'Udara') {
                $this->validate($request, [
                    'review_dok_1' => 'required|min:3',
                    'review_dok_2' => 'required|min:3',
                    'review_dok_3' => 'required|min:3',
                    ],
                    [
                        'review_dok_1.required' => 'Tanggapan dokumen Deskripsi Pengelolaan Pencemaran Udara wajib diisi.',
                        'review_dok_2.required' => 'Tanggapan dokumen Udara Ambien (Hasil Uji Lab) wajib diisi.',
                        'review_dok_3.required' => 'Tanggapan dokumen Udara Emisi (Hasil Uji Lab) wajib diisi.',
                        'review_dok_1.min' => 'Tanggapan dokumen Deskripsi Pengelolaan Pencemaran Udara minimal 3 karakter.',
                        'review_dok_2.min' => 'Tanggapan dokumen Udara Ambien (Hasil Uji Lab) minimal 3 karakter.',
                        'review_dok_3.min' => 'Tanggapan dokumen Udara Emisi (Hasil Uji Lab) minimal 3 karakter.',
                    ]
                    );
            } elseif ($request->jenis == 'LimbahB3') {
                $this->validate($request, [
                    'review_dok_1' => 'required|min:3',
                    'review_dok_2' => 'required|min:3',
                    'review_dok_3' => 'required|min:3',
                    'review_dok_4' => 'required|min:3',
                    ],
                    [
                        'review_dok_1.required' => 'Tanggapan dokumen Deskripsi Pengelolaan Limbah B3 wajib diisi.',
                        'review_dok_2.required' => 'Tanggapan dokumen Bukti Manifest wajib diisi.',
                        'review_dok_3.required' => 'Tanggapan dokumen MOU Pengelolaan Limbah B3 wajib diisi.',
                        'review_dok_4.required' => 'Tanggapan dokumen Izin TPS Limbah B3 wajib diisi.',
                        'review_dok_1.min' => 'Tanggapan dokumen Deskripsi Pengelolaan Limbah B3 minimal 3 karakter.',
                        'review_dok_2.min' => 'Tanggapan dokumen Bukti Manifest minimal 3 karakter.',
                        'review_dok_3.min' => 'Tanggapan dokumen MOU Pengelolaan Limbah B3 minimal 3 karakter.',
                        'review_dok_4.min' => 'Tanggapan dokumen Izin TPS Limbah B3 minimal 3 karakter.',
                    ]
                    );
            } elseif ($request->jenis == 'Lingkungan') {
                $this->validate($request, [
                    'review_dok_1' => 'required|min:3',
                    ],
                    [
                        'review_dok_1.required' => 'Tanggapan dokumen Pelaporan wajib diisi.',
                        'review_dok_1.min' => 'Tanggapan dokumen Pelaporan minimal 3 karakter.',
                    ]
                    );
            } else {
                 abort(404);
            }
            $model = new Review;
            $model->nama = auth()->user()->name;
            $model->nama_pelapor = $request->get('nama_pelapor');
            $model->email = $request->get('email');
            $model->nama_perusahaan = $request->get('nama_perusahaan');
            $model->bidang_usaha = $request->get('bidang_usaha');
            $model->alamat = $request->get('alamat');
            $model->jenis = $request->get('jenis');  
            $model->periode = $request->get('periode');  
            $model->tahun = $request->get('tahun');  
            $model->review_dok_1 = $request->get('review_dok_1');
            $model->review_dok_2 = $request->get('review_dok_2');
            $model->review_dok_3 = $request->get('review_dok_3');
            $model->review_dok_4 = $request->get('review_dok_4');
            $model->kesimpulan = $request->get('kesimpulan');

            $nomorSurat = Review::whereYear("created_at", Carbon::now()->year)->count();
            $no_surat = $nomorSurat + 1;
            $model->no_surat = '660.1/'.$no_surat.'/DLH/'.date('Y');

            do {
                $model->id_verifikasi = mt_rand(10000000, 99999999);
            } while ( DB::table( 'review' )->where( 'id_verifikasi', $model->id_verifikasi )->exists());
            $model->pelaporan_id = $request->get('pelaporan_id');  
            $model->user_id = auth()->user()->id;
            $update = Pelaporan::findOrFail($request->get('pelaporan_id'));
            $update->status ='Reviewed';
            $update->save();

            $date = Carbon::now()->format('d F Y');

            $data["email"]=$request->get("email");
            $data["client_name"]=$request->get("nama_pelapor");
            $data["subject"]='Hasil Pelaporan '.$request->get('jenis');
            $model->pdf = 'PDF-Pelaporan/'.date('Y').'/Triwulan-'.$model->periode.'/Pelaporan-'.$model->jenis.'-'.$model->id_verifikasi.'.pdf';
            $pdf = PDF::loadView('pelaporan.mail', ['model' => $model, 'date' => $date])->setPaper('a4');
            $pdf->getDomPDF()->setHttpContext(
                stream_context_create([
                    'ssl' => [
                        'allow_self_signed'=> TRUE,
                        'verify_peer' => FALSE,
                        'verify_peer_name' => FALSE,
                    ]
                ])
            );
            try{
                Mail::raw('Halo '.$model->nama_pelapor.', terimakasih telah melakukan pelaporan.
            Berikut kami lampirkan dokumen hasil dari pelaporan yang telah direview.', function($message)use($data,$pdf,$model) {
                $message->to($data["email"], $data["client_name"])
                ->subject($data["subject"])
                ->attachData($pdf->output(), "Pelaporan ".$model->jenis." ".$model->nama_perusahaan.".pdf");
                });
            }catch(JWTException $exception){
                $this->serverstatuscode = "0";
                $this->serverstatusdes = $exception->getMessage();
            }
            if (Mail::failures()) {
                $this->statusdesc  =   "Error sending mail";
                $this->statuscode  =   "0";

            }else{

            $this->statusdesc  =   "Message sent Succesfully";
            $this->statuscode  =   "1";
            }
            \Storage::disk('local')->put('public/PDF-Pelaporan/'.date('Y').'/Triwulan-'.$model->periode.'/Pelaporan-'.$model->jenis.'-'.$model->id_verifikasi.'.pdf', $pdf->output());
        
            $model->save();

            $review = Review::find($model->id);
            User::find($update->user_id)->notify(new NotifyReview($review));

            Alert::success('Berhasil', 'Pelaporan berhasil ditanggapi!');
            return redirect()->route('pelaporan.index')->withStatus(__('Pelaporan berhasil ditanggapi.'));            
        } else {
            abort(403, 'Anda tidak memiliki cukup hak akses');
        }
        
    }

    public function exportreview()
    {
        if (Gate::allows('isUserWaiting')) {
            abort(403, 'Anda tidak memiliki cukup hak akses');
        } else {
            return Excel::download(new ReviewExport, 'tanggapan.xlsx');
        }
        
    }

    public function showreview($id)
    {  
        if (Gate::allows('isUserWaiting')) {
            abort(403, 'Anda tidak memiliki cukup hak akses');
        } else {
            $review = Review::find($id);
            return view('review.show', ['review' => $review]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PelaporanRequest $request, $id)
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
        $pelaporan = Pelaporan::findOrFail($id);
        if(file_exists(storage_path('app/public/' . $pelaporan->dok_1))){
            \Storage::delete('public/' . $pelaporan->dok_1); 
        }
        if(file_exists(storage_path('app/public/' . $pelaporan->dok_2))){
            \Storage::delete('public/' . $pelaporan->dok_2); 
        }
        if(file_exists(storage_path('app/public/' . $pelaporan->dok_3))){
            \Storage::delete('public/' . $pelaporan->dok_3); 
        }
        if(file_exists(storage_path('app/public/' . $pelaporan->dok_4))){
            \Storage::delete('public/' . $pelaporan->dok_4); 
        }
        $pelaporan->delete();

        return redirect()->route('pelaporan.index')->withStatus(__('Pelaporan successfully deleted.'));
    }
}
