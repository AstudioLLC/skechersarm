<?php

namespace App\Exports;

use App\Models\Category;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CategoriesExport implements FromCollection, WithMapping, WithHeadings,WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //returns Category Data with Products and Filters data, all Categories data, not restricted to start/end dates
        return Category::with('products','filters')->get();
    }

    public function map($category) : array {
        return [
            $category->id ?? null,
            $category->name ?? null,
            strip_tags($category->description)  ?? null,
            $category->active ? 'Active' : 'No Active' ?? null,
            $category->category_id ?? null,
            'Has ' . count($category->products) . ' Products',
            $category->filters->pluck('title')->implode(', '),
            Carbon::parse($category->created_at)->toFormattedDateString(),
            Carbon::parse($category->updated_at)->toFormattedDateString()
        ] ;


    }

    public function headings() : array {
        return [
            '#',
            'Name',
            'Description',
            'Active',
            'Parent Category',
            'Products',
            'Filters',
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
