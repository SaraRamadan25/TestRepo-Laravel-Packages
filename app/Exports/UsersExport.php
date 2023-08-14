<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class UsersExport implements  WithMultipleSheets
{

    use Exportable;

    public function sheets(): array
    {
        $sheets = [];

        for ($month = 1; $month <= 12; $month++) {
            $sheets[] = new UsersPerMonthSheet();

        }
        return $sheets;

    }

  /*  public function query()
    {
        return User::query(); // Use query() instead of all() for better performance
    }

    public function map($user): array
    {
        return [
            'Custom text '.$user->name,
            $user->email,
            Date::dateTimeToExcel($user->created_at),
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Created At',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_YYYYMMDD2,
        ];
    }*/

}
