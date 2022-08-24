<?php

namespace App\Traits;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait  UploadZip
{
    public $uploadedZipImages;

    public function importZip()
    {
        $zip = new \ZipArchive();

        $zipStatus = $zip->open($this->uploadedZipImages->getRealPath());
        if ($zipStatus !== true) {
            throw new \Exception($zipStatus);
        }else{
            $storageDestinationPath= public_path("images/zip");

            if (!File::exists( $storageDestinationPath)) {
                File::makeDirectory($storageDestinationPath, 0755, true);
            }
            $zip->extractTo($storageDestinationPath);
            $zip->close();
            $this->alert('success','Images Uploaded Successfully');
            $filesInFolder = File::files('images/zip');
            $this->imagesToDatabase($filesInFolder);
        }

    }

    public function imagesToDatabase($filesInFolder)
    {
        $products = Product::whereNotNull('article_1c')->get();

        /* Saving Product Images to Database */

        foreach($filesInFolder as $path) {
            foreach ($products as $product){

                $file = pathinfo($path);
                $imageName = $file['filename'];
                $imageBasename = $file['basename'];
                $imageCode = Str::of($imageName)->before('-');
                $generalImagePath = public_path('images/products');
                $generalImageThumbnailPath = public_path('images/products/thumbnail');
                $galleryImagePath = public_path('images/gallery');
                $zipPath = public_path('images/zip');

                /* Saving Product General Image */
                if (!Str::contains($imageName,'-')){
                    Product::whereBarcode($imageCode)->update(['image' => $imageBasename]);
                    File::copy($zipPath.'/'.$imageBasename,$generalImagePath.'/'.$imageBasename);
                    File::copy($zipPath.'/'.$imageBasename,$generalImageThumbnailPath.'/'.$imageBasename);
                }
                /* Saving Product Gallery Images */
                if (Str::contains($imageName,'-') && $product->barcode == $imageCode) {
                    DB::table('galleries')->updateOrInsert(['model' => 'product', 'key' => $product->id, 'image' => $imageBasename]);
                    File::copy($zipPath.'/'.$imageBasename,$galleryImagePath.'/'.$imageBasename);
                }
            }
        }
        File::cleanDirectory($zipPath);
        $this->uploadedZipImages = '';
    }
}
