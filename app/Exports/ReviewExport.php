<?php

namespace App\Exports;

use App\Review;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReviewExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Review::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama Penanggap',
            'Nama Pelapor',
            'Email',
            'Nama Perusahaan',
            'Bidang Usaha',
            'Jenis Pelaporan',
            'Periode',
            'Tahun',
            'Tanggapan Dok.Pelaporan',
            'Tanggapan Dok.Izin',
            'Tanggapan Dok.Lab',
            'Kesimpulan',
            'No Surat',
            'ID Verifikasi',
            'PDF',
            'ID Pelaporan',
            'ID User',
            'Tanggal Dibuat',
            'Terahir Diperbaharui'
        ];
    }
}
