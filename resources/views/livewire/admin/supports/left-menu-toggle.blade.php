<div>
    <ul class="navbar-nav mr-auto align-items-center">
        <li class="nav-item">
            <a class="nav-link toggle-menu" wire:click="setToggle('{{\Illuminate\Support\Facades\Session::exists('Toggled') ? 'False' : 'Toggled'}}', '{{\Illuminate\Support\Facades\Session::exists('Toggled') ? 'False' : 'toggled'}}')" href="javascript:void();">
                <i class="icon-menu menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <form class="search-bar">
                <input type="text" class="form-control" placeholder="Enter keywords">
                <a href="javascript:void();"><i class="icon-magnifier"></i></a>
            </form>
        </li>
    </ul>
</div>
