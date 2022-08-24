<?php

namespace App\Exports;

use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport  implements FromCollection, WithMapping, WithHeadings,WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //returns User Data with Orders and Order Items data, all Users data, not restricted to start/end dates
        return User::with('orders.orderItems')->get();
    }

    public function map($user) : array {
        return [
            $user->id ?? null,
            $user->name ?? null,
            $user->last_name  ?? null,
            $user->email  ?? null,
            $user->phone  ?? null,
            $user->country  ?? null,
            $user->city  ?? null,
            $user->district  ?? null,
            $user->region  ?? null,
            $user->address  ?? null,
            $user->street  ?? null,
            $user->home  ?? null,
            $user->house  ?? null,
            $user->registered_phone  ?? null,
            $user->orders_count  ?? null,
            $user->discount_card  ?? null,
            $user->gender  ?? null,
            Carbon::parse($user->date_birthday)->toFormattedDateString(),
            Carbon::parse($user->email_verified_at)->toFormattedDateString(),
            $user->last_activity  ?? null,

            Carbon::parse($user->created_at)->toFormattedDateString(),
            Carbon::parse($user->updated_at)->toFormattedDateString()
        ] ;


    }

    public function headings() : array {
        return [
            '#',
            'Name',
            'Last Name',
            'Email',
            'Phone',
            'Country',
            'City',
            'District',
            'Region',
            'Address',
            'Street',
            'Home',
            'House',
            'Registered Phone',
            'Orders count',
            'Discount Card',
            'Gender',
            'Date birthday',
            'Email verified',
            'Last Activity',

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
            'T' => 20,
            'U' => 20,
            'V' => 20
        ];
    }
}
