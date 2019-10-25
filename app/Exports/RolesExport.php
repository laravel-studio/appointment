<?php

namespace App\Exports;

use App\Role;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RolesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Role::select('name', 'display_name', 'description')->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Display Name',
            'Description',
        ];
    }
}
