<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection, WithMapping, WithHeadings,WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //returns User Data with Orders and Order Items data, all Users data, not restricted to start/end dates
        return Order::with('user','orderItems')->get();
    }

    public function map($user) : array {
        return [
            $user->id ?? null,
            $user->user->name ?? null,
            $user->city  ?? null,
            $user->district  ?? null,
            $user->address  ?? null,
            $user->home  ?? null,
            $user->apartment  ?? null,
            $user->method  ?? null,
            $user->notes  ?? null,
            $user->stores  ?? null,
            $user->subtotal  ?? null,
            $user->discount  ?? null,
            $user->total  ?? null,
            $user->order_id  ?? null,
            $user->status  ?? null,
            $user->payment_type  ?? null,
            $user->online_payment_type  ?? null,

            Carbon::parse($user->created_at)->toFormattedDateString(),
            Carbon::parse($user->updated_at)->toFormattedDateString()
        ] ;


    }

    public function headings() : array {
        return [
            '#',
            'User',
            'City',
            'District',
            'Address',
            'Home',
            'Apartment',
            'Method',
            'Notes',
            'Stores',
            'Subtotal',
            'Discount',
            'Total',
            'Order ID',
            'Status',
            'Payment Type',
            'Online Payment Type',


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
