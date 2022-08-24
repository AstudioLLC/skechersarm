<div>
    <div class="container-fluid">
        <div class="page-header min-height-250 border-radius-xl mt-4" style="background-image: url({{asset('admin/assets/img/curved-images/curved0.jpg')}}); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="
                                @if($user->image == null)
                        {{asset('images/supports/profile-icon.jpg')}}
                        @else
                        {{asset('admin/assets/img/bruce-mars.jpg')}}
                        @endif
                            " alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">

                        <h5 class="mb-1">
                            {{$user->name}}
                        </h5>
                        <span class="app__status app__status--live">
                            @if($user->is_online == 1)
                                <span>Is Online </span>
                                <span class="is_online"></span>
                            @else
                                <span>Last Activity ~</span>
                                <span>{{$user->last_activity}}</span>
                            @endif
                            </span>
                        <p class="mb-0 font-weight-bold text-sm">
                            @if(count($user->roles))
                                @foreach($user->roles as $role)
                                    <span>[ {{$role->name}} ]</span>
                                @endforeach
                            @else
                                Regular User
                            @endif
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Platform Settings</h6>
                    </div>
                    <div class="card-body p-3">
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder">Active</h6>
                        <ul class="list-group">
                            <li class="list-group-item border-0 px-0">
                                <div class="form-check form-switch d-flex ps-0">
                                    @livewire('admin.supports.toggle-switch',  ['model' => $user, 'field' => 'active'], key($user->id))
                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault">{{$user->name}} is in @if($user->active)active @else passive @endif mode</label>
                                </div>
                            </li>
                        </ul>
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Roles</h6>
                        <ul class="list-group">

                            <li class="list-group-item border-0 px-0 pb-0">
                                <div class="form-check form-switch d-flex ps-0">
                                    <select wire:model="role" name="role" class="form-control" required>
                                        <option value="">Select Roles</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="roles-section pt-2">
                                    @if(count($user->roles))
                                        @foreach($user->roles as $role)
                                            <span>[ {{$role->name}} ]</span> <a href="" style="margin-left: 10px;" wire:click.prevent="deleteRole({{$role->id}},{{$user->id}})" class="px-2">
                                                <i class="fa fa-window-close" aria-hidden="true"></i>
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Profile Information</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="javascript:;">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <p class="text-sm">
                            Hi, I’m {{$user->name}},
                            I registered on the site in {{$user->created_at}} .
                            @if($user->email_verified_at !== null)
                                I have already passed the mail verification!
                            @else
                                I have not even passed the mail verification!
                            @endif
                        </p>
                        <hr class="horizontal gray-light my-4">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{$user->name}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{$user->phone}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{$user->email}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Gender:</strong> &nbsp; @if($user->gender = true) Male @else Female @endif</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Region:</strong> &nbsp; {{$user->region}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">City:</strong> &nbsp; {{$user->city}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Street:</strong> &nbsp; {{$user->street}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Home:</strong> &nbsp; {{$user->home}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">House:</strong> &nbsp; {{$user->house}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Discount card number:</strong> &nbsp; {{$user->discount_card}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Last Activity:</strong> &nbsp; {{$user->last_activity}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

