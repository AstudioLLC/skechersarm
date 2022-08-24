<?php

namespace App\Http\Livewire\Admin\SocialNetwork;

use App\Models\SocialNetwork;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class SocialNetworkComponent extends Component
{
    use LivewireAlert, WithPagination;

    public bool $active;

    public $name = 'Social Network', $currentPage = 1, $searchTerm,  $ordering;

    public $title;
    public $url;
    public $image;


    public function delete($id)
    {
        SocialNetwork::find($id)->delete();
        $this->alert('warning', 'Social network Deleted Successfully');

    }


    public function render()
    {
        $query = '%'.$this->searchTerm.'%';

        $items = SocialNetwork::orderBy('ordering','asc')->where(function($sub_query){
            $sub_query->where('title', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.social-network.social-network-component', compact('items'))->extends('layouts.admin');
    }
}
