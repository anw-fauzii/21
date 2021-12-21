<?php

namespace App\Exports;

use App\Pelaporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Gate;

class PelaporanExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if (Gate::allows('isAdmin')) {
            return Pelaporan::all();
        } elseif (Gate::allows('isUser')) {
            return Pelaporan::where('user_id', auth()->user()->id )->get();
        }  else {
            abort(404, 'Anda tidak memiliki cukup hak akses');
        }
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'Telepon',
            'Email',
            'Nama Perusahaan',
            'Bidang Usaha',
            'Jenis Pelaporan',
            'Periode',
            'Tahun',
            'Dok.Pelaporan',
            'Dok.Izin',
            'Dok.Lab',
            'Status',
            'User ID',
            'Tanggal Dibuat',
            'Terahir Diperbaharui'
        ];
    }
}
