<?php

namespace App\Http\Livewire\Admin\Supports;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\FastOrder;
use App\Models\JobRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LeftMenu extends Component
{
    public $seenCount;
    public $careerSeenCount;
    public $newCommentsCount;
    public $newOrdersCount;
    public $newContactCount;
    protected $listeners = ['refreshLeftMenu'=>'$refresh'];

    public function mount()
    {
        $this->seenCount = User::whereSeen(false)->count();
        $this->careerSeenCount = JobRequest::whereSeen(false)->count();
        $this->newCommentsCount = Comment::whereValidated(false)->count();
        $this->newOrdersCount = Order::whereSeen(false)->count();
        $this->newContactCount = Contact::whereSeen(false)->count();
        $this->newFastOrdersCount = FastOrder::whereSeen(false)->count();

    }

    public function render()
    {
        return view('livewire.admin.supports.left-menu');
    }
}
