<?php

namespace App\Exports;

use App\Models\Career;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CareersExport implements FromCollection, WithMapping, WithHeadings,WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //returns Career Data with jobRequests data, all Career data, not restricted to start/end dates
        return Career::with('jobRequests')->get();
    }

    public function map($career) : array {
        return [
            $career->id ?? null,
            $career->title ?? null,
            $career->content ?? null,
            strip_tags($career->description)  ?? null,
            $career->schedule ?? null,
            $career->hours ?? null,
            $career->salary ?? null,
            $career->city ?? null,
            Carbon::parse($career->deadline)->toFormattedDateString(),
            'Have ' . count($career->jobRequests) . ' job requests from these ' .$career->jobRequests->pluck('name')->implode(', '),
            Carbon::parse($career->created_at)->toFormattedDateString(),
            Carbon::parse($career->updated_at)->toFormattedDateString()
        ] ;


    }

    public function headings() : array {
        return [
            '#',
            'Title',
            'Content',
            'Description',
            'Schedule',
            'Hours',
            'Salary',
            'City',
            'Deadline',
            'Count Requests',
            'Updated At',
            'Created At'
        ] ;
    }
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 30,
            'C' => 20,
            'D' => 25,
            'E' => 25,
            'F' => 25,
            'G' => 25,
            'H' => 25,
            'I' => 25,
            'J' => 45,
            'K' => 25,
            'L' => 25,
            'M' => 25,
            'N' => 25,
            'O' => 15,
            'P' => 20,
            'Q' => 40,
            'R' => 20,
            'S' => 20,
        ];
    }
}
