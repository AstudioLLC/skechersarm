<?php

namespace App\Http\Livewire\Admin\Products;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\Product;
use App\Traits\AuthorizesRoleOrPermission;
use App\Traits\UploadZip;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ProductComponent extends Component
{
    use WithPagination,LivewireAlert, WithFileUploads,UploadZip,AuthorizesRoleOrPermission;

    public $name = 'Products', $currentPage = 1, $searchTerm,  $ordering;
    public bool $active;
    public $uploadedExcel;

    public function mount()
    {
        $this->authorizeRoleOrPermission('product-list');
    }

    public function importExcel()
    {
        Excel::import(new ProductsImport(), $this->uploadedExcel);
        $this->alert('success', 'Excel uploaded Successfully');
        return $this->uploadedExcel;
    }
    public function exportExcel()
    {
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }

    public function exportCsv()
    {
        return Excel::download(new ProductsExport(), 'products.csv');
    }


    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Product::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        $this->alert('error', 'Product Deleted Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
    }

    public function render()
    {
        $query = '%'.$this->searchTerm.'%';
        $items = Product::orderBy('ordering','asc')->where(function($sub_query){
            $sub_query->where('name', 'like', '%'.$this->searchTerm.'%');
                })->paginate(10);
        return view('livewire.admin.products.product-component',compact('items'))->extends('layouts.admin');
    }
}
