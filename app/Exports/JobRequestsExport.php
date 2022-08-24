<?php

namespace App\Exports;

use App\Models\JobRequest;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class JobRequestsExport implements FromCollection, WithMapping, WithHeadings,WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //returns JobRequests Data with career data, all JobRequest data, not restricted to start/end dates
        return JobRequest::with('career')->get();
    }

    public function map($jobRequest) : array {
        return [
            $jobRequest->id ?? null,
            $jobRequest->name ?? null,
            $jobRequest->surname ?? null,
            $jobRequest->phone ?? null,
            $jobRequest->email ?? null,
            $jobRequest->file ?? null,
            $jobRequest->notes ?? null,
            $jobRequest->career->title ?? null .' - ' . $jobRequest->career->city ?? null,
            $jobRequest->active ? 'Active' : 'No Active' ?? null ,

            Carbon::parse($jobRequest->created_at)->toFormattedDateString(),
            Carbon::parse($jobRequest->updated_at)->toFormattedDateString()
        ] ;


    }

    public function headings() : array {
        return [
            '#',
            'Name',
            'Surname',
            'Phone',
            'Email',
            'File',
            'Notes',
            'Career',
            'Is Active',
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
            'H' => 15,
            'I' => 15,
            'J' => 15,
            'K' => 15,
            'L' => 15,
            'M' => 15,
            'N' => 15,
            'O' => 15,
            'P' => 20,
            'Q' => 40,
            'R' => 20,
            'S' => 20,
        ];
    }
}

