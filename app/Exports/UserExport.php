<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UserExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('roles', 'User')->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            '#',
            'Telp',
            'Nama Perusahaan',
            'Bidang Usaha',
            'Alamat',
            'Jabatan',
            'Status',
            'Roles',
            '#',
            'Dibuat',
            'Diperbarui',
        ];
    }
}
