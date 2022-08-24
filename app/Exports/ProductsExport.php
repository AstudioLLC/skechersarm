<?php

namespace App\Exports;

use App\Models\Product;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithMapping, WithHeadings,WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //returns Product Data with Brands data, all products data, not restricted to start/end dates
        return Product::with('categories','brand')->get();
    }

    public function map($product) : array {
        return [
            $product->id ?? null,
            $product->name ?? null,
            strip_tags($product->description)  ?? null,
            $product->price ?? null,
            $product->sale_price ?? null,
            $product->sale_percent ?? null,
            $product->image ?? null,
            $product->stock_status ?? null,
            $product->quantity ?? null,
            $product->is_new ? 'yes' : 'no'  ?? null,
            $product->top_seller ? 'yes' : 'no'  ?? null,
            $product->rating ?? null,
            $product->article_1c ?? null,
            $product->barcode ?? null,
            $product->label ?? null,
            $product->brand->title ?? null,
            $product->categories->pluck('name')->implode(' / '),
            Carbon::parse($product->created_at)->toFormattedDateString(),
            Carbon::parse($product->updated_at)->toFormattedDateString()
        ] ;


    }

    public function headings() : array {
        return [
            '#',
            'Name',
            'Description',
            'Price',
            'Sale price',
            'Sale Percent',
            'Image',
            'Stock status',
            'Quantity',
            'Is NEW',
            'TOP Seller',
            'Rating',
            '1C Article',
            'Barcode',
            'Label',
            'Brand',
            'Category',
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
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'G' => 15,
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
