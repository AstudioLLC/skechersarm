<?php

namespace App\Http\Livewire\Admin\Supports;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ThemeSwitcher extends Component
{
    public array $themes;
    public array $gradients;

    public function mount()
    {
        $this->themes = [
            'theme1',
            'theme2',
            'theme3',
            'theme4',
            'theme5',
            'theme6',
            'theme7',
            'theme8',
            'theme9',
            'theme10',
            'theme11',
            'theme12',
            'theme13',
            'theme14',
            'theme15'
        ];
    }

    public function getTheme($key,$value)
    {
        Session::forget($key);
        Session::put([$key => $value]);
    }
    public function render()
    {

        return view('livewire.admin.supports.theme-switcher');
    }
}
