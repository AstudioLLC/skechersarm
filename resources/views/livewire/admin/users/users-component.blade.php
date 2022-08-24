<div>


    <div class="row pb-3">
        <div class="col-12">
            <a class="btn btn-light py-3 px-5 text-black w-100" href="#">Export  {{$this->name}} Data</a>
        </div>
    </div>

    <div class="row">


        <div class="col-lg-12">
            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$name}} Table</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Options</th>
                            </tr>
                            </thead>
                            <tbody wire:sortable="updateOrdering">
                            @foreach($items as $item)
                                <tr  wire:sortable.item="{{$item->id}}" wire:key="user-{{$item->id}}" >
                                    <th scope="row" wire:sortable.handle>
                                        <i class="ni ni-bullet-list-67" id="bullet"></i>
                                    </th>
                                    <td>
                                         <span> {{$item->name}}</span>
                                    </td>
                                    <td>
                                        {{$item->email}}
                                    </td>
                                    <td>
                                        @if(count($item->roles))
                                            @foreach($item->roles as $role)
                                                <span>[ {{$role->name}} ]</span>
                                            @endforeach
                                        @elseif(!$item->seen) <span class="new_user_row" data-text="New user..">New User..</span>
                                        @else
                                            Regular User
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.user.show',['id' => $item->id ?? null], compact('item'))}}" class="px-2">
                                            <i class="fa fa-eye" title="Show"></i>
                                        </a>
                                        <a href="" style="margin-left: 10px;" wire:click.prevent="delete({{$item->id}})" class="px-2">
                                            <i class="fa fa-trash" title="Delete"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $items->links('livewire::livewire-pagination') }}

                        @if($seenCount)
                            <a class="btn btn-success  mb-5 position-fixed bottom-0 " style="bottom: 0; cursor: pointer" wire:click="updateSeen">Update Users Seen</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div><!--End Row-->
</div>
