<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Artisan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class PageComponent extends Component
{
    use WithPagination,LivewireAlert,AuthorizesRoleOrPermission;

    public $name = 'Pages', $currentPage = 1, $searchTerm, $searchTerm1, $ordering;
    public bool $active;

    public function mount()
    {
        $this->authorizeRoleOrPermission('page-list');

    }

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Page::find($item['value'])->update(['ordering' => $item['order']]);
            Artisan::call('cache:clear');
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
        Page::find($id)->delete();
        $this->alert('error', 'Page Deleted Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
    }

    public function render()
    {
        $query = '%'.$this->searchTerm.'%';
        $query = '%'.$this->searchTerm1.'%';
        $last = request()->segment(count(request()->segments()));
        if (preg_match('~[0-9]+~',$last))
        {
            $infoPages = Page::where('parent_id',$last)->orderBy('ordering','asc')->whereAbout(true)->where(function($sub_query){
                $sub_query->where('title', 'like', '%'.$this->searchTerm.'%');
            })->paginate(40);
//        whereBuyers(true)
            $forSellerPages = Page::where('parent_id',$last)->with('childpages')->orderBy('ordering','asc')->where(function($sub_query1){
                $sub_query1->where('title', 'like', '%'.$this->searchTerm1.'%');
            })->paginate(40);

            $dinamic_pages = Page::where('parent_id','!=', null)->get();
        }else{
            $infoPages = Page::orderBy('ordering','asc')->whereAbout(true)->where(function($sub_query){
                $sub_query->where('title', 'like', '%'.$this->searchTerm.'%');
            })->paginate(40);
//        whereBuyers(true)
            $forSellerPages = Page::where('parent_id')->with('childpages')->orderBy('ordering','asc')->where(function($sub_query1){
                $sub_query1->where('title', 'like', '%'.$this->searchTerm1.'%');
            })->paginate(40);
            $dinamic_pages = Page::where('parent_id','!=', null)->get();
        }

//
//        if (preg_match('~[0-9]+~',$last))
//        {
//            $productCategories = Category::with('childCategories.childCategories')
//                ->where('category_id',$last)
//                ->orderBy('ordering','ASC')->where(function($sub_query){
//                    $sub_query->where('name', 'like', '%'.$this->searchTerm.'%');
//                })->paginate(20);
//        }else {
//            $productCategories = Category::with('childCategories.childCategories')
//                ->whereNull('category_id')
//                ->orderByRaw('-category_id ASC')
//                ->orderBy('ordering','ASC')->where(function($sub_query){
//                    $sub_query->where('name', 'like', '%'.$this->searchTerm.'%');
//                })->paginate(20);
//        }





        return view('livewire.admin.pages.page-component',compact('infoPages','forSellerPages', 'dinamic_pages'))->extends('layouts.admin');
    }
}
