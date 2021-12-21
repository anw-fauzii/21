<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pelaporan;
use App\Review;
use App\Pengaduan;
use App\Charts\DashboardChart;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        if (Gate::allows('isAdmin')) {

            $countpelaporan = Pelaporan::count();
            $countreview = Review::count();
            $countSelesai = Pengaduan::where('deskripsi', "Selesai")->count();
            $countDitolak = Pengaduan::where('deskripsi', "Ditolak")->count();
            $countPending = Pengaduan::where('deskripsi', "Pending")->count();
            $pelaporanairapi = url('/pelaporan-air-chart-ajax');
            $pelaporanudaraapi = url('/pelaporan-udara-chart-ajax');
            $pelaporanlimbahb3api = url('/pelaporan-limbahb3-chart-ajax');
            $pelaporanlingkunganapi = url('/pelaporan-lingkungan-chart-ajax');

            $pengaduanapi = url('/pengaduan-chart-ajax');

            $pelaporanairchart = new DashboardChart;
            $pelaporanairchart->labels(['Triwulan 1', 'Triwulan 2', 'Triwulan 3', 'Triwulan 4'])->load($pelaporanairapi);

            $pelaporanudarachart = new DashboardChart;
            $pelaporanudarachart->labels(['Semester 1', 'Semester 2'])->load($pelaporanudaraapi);

            $pelaporanlimbahb3chart = new DashboardChart;
            $pelaporanlimbahb3chart->labels(['Triwulan 1', 'Triwulan 2', 'Triwulan 3', 'Triwulan 4'])->load($pelaporanlimbahb3api);

            $pelaporanlingkunganchart = new DashboardChart;
            $pelaporanlingkunganchart->labels(['Semester 1', 'Semester 2'])->load($pelaporanlingkunganapi);

            $pengaduanchart = new DashboardChart;
            $pengaduanchart->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'OKtober', 'November', 'Desember'])->load($pengaduanapi);

            return view('dashboard', compact('pelaporanairchart', 'pelaporanudarachart', 'pelaporanlimbahb3chart', 'pelaporanlingkunganchart', 'pengaduanchart', 'countpelaporan', 'countreview', 'countPending', 'countSelesai', 'countDitolak'));
        
        } elseif (Gate::allows('isUser')) {

            $countpelaporanair = Pengaduan::where('jenis')
                                ->count();
            $countpelaporanudara = Pelaporan::where('user_id', auth()->user()->id)
                                ->where('jenis', 'Udara')
                                ->count();
            $countpelaporanlimbah = Pelaporan::where('user_id', auth()->user()->id)
                                ->where('jenis', 'LimbahB3')
                                ->count();
            $countpelaporanlingkungan = Pelaporan::where('user_id', auth()->user()->id)
                                ->where('jenis', 'Lingkungan')
                                ->count();
            $countpelaporan = Pelaporan::where('user_id', auth()->user()->id)->count();
            $pelaporan = Pelaporan::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();

            return view('dashboard', compact('countpelaporanair', 
                                                'countpelaporanudara', 
                                                'countpelaporanlimbah', 
                                                'countpelaporanlingkungan',
                                                'countpelaporan',
                                                'pelaporan'));
        
        } elseif (Gate::allows('isOperator')) {

            $countpelaporanair = Pelaporan::where('user_id', auth()->user()->id)
                                ->where('jenis', 'Air')
                                ->count();
            $countpelaporanudara = Pelaporan::where('user_id', auth()->user()->id)
                                ->where('jenis', 'Udara')
                                ->count();
            $countpelaporanlimbah = Pelaporan::where('user_id', auth()->user()->id)
                                ->where('jenis', 'LimbahB3')
                                ->count();
            $countpelaporanlingkungan = Pelaporan::where('user_id', auth()->user()->id)
                                ->where('jenis', 'Lingkungan')
                                ->count();
            $pelaporan = Pelaporan::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();

            return view('dashboard', compact('countpelaporanair', 
                                                'countpelaporanudara', 
                                                'countpelaporanlimbah', 
                                                'countpelaporanlingkungan',
                                                'pelaporan'));
        
        } else {
            abort(404, 'Anda tidak memiliki cukup hak akses');
        }

        
    }

    public function pelaporanairchartAjax(Request $request)
    {
        $pelaporanyear = $request->has('pelaporanyear') ? $request->pelaporanyear : date('Y');

        $pelaporan = Pelaporan::select(\DB::raw("COUNT(*) as count"))
                    ->where('jenis', 'Air')
                    ->whereYear('created_at', $pelaporanyear)
                    ->groupBy(\DB::raw("periode"))
                    ->pluck('count');

        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"
        ];
        $pelaporanairchart = new DashboardChart;
        $pelaporanairchart->minimalist(true);
        $pelaporanairchart->dataset('Grafik Pelaporan Baru', 'pie', $pelaporan)
                        ->color($borderColors)
                        ->backgroundcolor($fillColors);;
  
        return $pelaporanairchart->api();
    }

    public function pelaporanudarachartAjax(Request $request)
    {
        $pelaporanyear = $request->has('pelaporanyear') ? $request->pelaporanyear : date('Y');

        $pelaporan = Pelaporan::select(\DB::raw("COUNT(*) as count"))
                    ->where('jenis', 'Udara')
                    ->whereYear('created_at', $pelaporanyear)
                    ->groupBy(\DB::raw("periode"))
                    ->pluck('count');

        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        $pelaporanudarachart = new DashboardChart;
        $pelaporanudarachart->minimalist(true);
        $pelaporanudarachart->dataset('Grafik Pelaporan Baru', 'pie', $pelaporan)
                        ->color($borderColors)
                        ->backgroundcolor($fillColors);;
  
        return $pelaporanudarachart->api();
    }

    public function pelaporanlimbahb3chartAjax(Request $request)
    {
        $pelaporanyear = $request->has('pelaporanyear') ? $request->pelaporanyear : date('Y');

        $pelaporan = Pelaporan::select(\DB::raw("COUNT(*) as count"))
                    ->where('jenis', 'LimbahB3')
                    ->whereYear('created_at', $pelaporanyear)
                    ->groupBy(\DB::raw("periode"))
                    ->pluck('count');

        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        $pelaporanlimbahb3chart = new DashboardChart;
        $pelaporanlimbahb3chart->minimalist(true);
        $pelaporanlimbahb3chart->dataset('Grafik Pelaporan Baru', 'pie', $pelaporan)
                        ->color($borderColors)
                        ->backgroundcolor($fillColors);;
  
        return $pelaporanlimbahb3chart->api();
    }

    public function pelaporanlingkunganchartAjax(Request $request)
    {
        $pelaporanyear = $request->has('pelaporanyear') ? $request->pelaporanyear : date('Y');

        $pelaporan = Pelaporan::select(\DB::raw("COUNT(*) as count"))
                    ->where('jenis', 'Lingkungan')
                    ->whereYear('created_at', $pelaporanyear)
                    ->groupBy(\DB::raw("periode"))
                    ->pluck('count');

        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        $pelaporanlingkunganchart = new DashboardChart;
        $pelaporanlingkunganchart->minimalist(true);
        $pelaporanlingkunganchart->dataset('Grafik Pelaporan Baru', 'pie', $pelaporan)
                        ->color($borderColors)
                        ->backgroundcolor($fillColors);;
  
        return $pelaporanlingkunganchart->api();
    }

    public function pengaduanchartAjax(Request $request)
    {
        $pengaduanyear = $request->has('pengaduanyear') ? $request->pengaduanyear : date('Y');

        $pengaduan = Pengaduan::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', $pengaduanyear)
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        $pengaduanchart = new DashboardChart;
  
        $pengaduanchart->dataset('Grafik Pengaduan Baru', 'line', $pengaduan)
                    ->color("#ef5350")
                    ->backgroundcolor("#ef5350")
                    ->fill(false);
  
        return $pengaduanchart->api();
    }

    public function waiting()
    {
        //
        return view('waiting');
    }
}
