<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\Style;

class UsersPerMonthSheet implements FromQuery, WithTitle, WithHeadings, WithEvents
{

    public function registerEvents(): array
    {
        $styleArray = [
            'font' => [
                'bold' => true,
            ]
        ];

        return [
            AfterSheet::class => function (AfterSheet $event) use ($styleArray) {
                $event->sheet->getStyle('A1:G1')->applyFromArray($styleArray);
                $event->sheet->setCellValue('C27', '=SUM(C2:C26)');
            },
        ];
    }

    public function query()
    {
        return User
            ::query()
            ->where('id', '>', 25);
    }

    public function headings(): array
    {
        return [
            'id',
            'Name',
            'Points',
            'Email',
            'Verified At',
            'Created At',
            'Updated At',
        ];
    }

    public function title(): string
    {
        return 'Month';
    }
}
