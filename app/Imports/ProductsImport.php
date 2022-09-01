<?php

namespace App\Imports;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductsImport implements ToCollection,WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {

            $name = '{"hy":"' . $row[2] . '","ru":"' . $row[3] . '","en":"' . $row[4] . '"}';
            $description = '{"hy":"' . $row[5] . '","ru":"' . $row[6] . '","en":"' . $row[7] . '"}';
            $slug = Str::slug($row[2]) . '-'.$row[1];

                DB::table('products')->updateOrInsert(
                    ['barcode' => $row[1]],
                    [
                        'name' => $name,
                        'article_1c' => $row[0],
                        'description' => $description,
                        'price' => $row[9],
                        'slug' => $slug,
//                    'sale_percent' => $row[14],
//                    'sale_price' => $row[9] - ($row[9] * $row[14] / 100),
                        'brand_id' => $row[14],
                        'quantity' => $row[12],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                );
                $product = Product::whereBarcode($row[1])->first();
                $this->updateRelations($product, $row);

        }

    }



    protected function updateRelations($product,$row)
    {
        $product->categories()->sync($row[8]);

        $valls = explode(',',$row[13]);
        foreach ($valls as $critery){
            $product->criteries()->attach($critery,[
                'barcode' => $row[1],
                'count' => $row[12]
            ]);
        }



    }
//    protected function updateCriterias($product,$row)
//    {
//        if (!in_array($product->id,DB::table('product_criteria')->pluck('product_id')->toArray()))
//        {
//            $product->criteries()->attach([$row[13]]);
//        }else{
//            DB::table('product_criteria')->where('product_id',$product->id)->update(['criteria_id' => [$row[13]]]);
//        }
//
//    }



}
