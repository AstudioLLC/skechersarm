<?php

namespace App\Http\Livewire\Admin\Supports;

use App\Models\Criteria;
use App\Models\Filter;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SizeCriteries extends Component
{
    use LivewireAlert;

    public $product_id;
    public $product;
    public $count;
    public $fakeBarcode;
    public $fakeCount;
    public $barcode;
    public $pivot_id;
    public $updateMode = false;

    public function mount($product_id)
    {
        $this->product_id = $product_id;
        $this->product = Product::whereid($product_id)->first();
    }
    public function edit($pivot_id)
    {
        $pivot = DB::table('product_criteria')->where('id',$pivot_id)->first();
        $this->barcode = $pivot->barcode;
        $this->count = $pivot->count;
        $this->pivot_id = $pivot->id;
        $this->updateMode = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'count' => 'nullable',
            'barcode' => 'nullable|unique:products,barcode',
        ]);
        DB::table('product_criteria')->where('id',$this->pivot_id)->update([
            'barcode' => $this->barcode,
            'count' => $this->count,
        ]);

        $this->updateMode = false;

        $this->alert('success', 'Size has been updated successfully');
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->barcode = '';
        $this->count = '';
    }


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'count' => 'nullable',
            'barcode' => 'nullable|unique:products,barcode',
        ]);
    }

    public function attach($criteria_id)
    {
        $this->validate([
            'count' => 'nullable',
            'barcode' => 'nullable|unique:products,barcode',
        ]);

        foreach ($this->fakeBarcode as $key => $value){
            $this->product->criteries()->attach($criteria_id,[
                'barcode' => $this->fakeBarcode[$key],
                'count' => $this->fakeCount[$key]
            ]);
        }
        $this->alert('success', 'Attached Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
        return  redirect('management/size-criteries/'.$this->product_id);

    }

    public function detach($criteria_id)
    {
        $this->product->criteries()->wherePivot('criteria_id','=',$criteria_id)->detach();
        $this->alert('error', 'Detached Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
        return  redirect('management/size-criteries/'.$this->product_id);
    }
    public function render()
    {

        $filter = Filter::whereStatic('size')->with('criteries')->first();
        $item = Product::whereId($this->product_id)->with('categories.filters.criteries','categories.parentCategory.parentCategory','criteries')->withTrashed()->first();
        $pivot_values = DB::table('product_criteria')->where('product_id',$item->id)->get();

        return view('livewire.admin.supports.size-criteries',compact('pivot_values','filter','item'))->extends('layouts.admin');
    }
}
