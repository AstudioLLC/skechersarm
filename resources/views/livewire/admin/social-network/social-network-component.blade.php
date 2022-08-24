<div>


    <div class="row pb-3">
        <div class="col-6">
            <a class="btn btn-light py-3 px-5 text-black w-100" href="{{route('admin.social_network.create')}}">Create new {{$this->name}}</a>
        </div>
        <div class="col-6">
            <a href="{{route('admin.social_network.trashed')}}" class="float-right btn btn-light py-3 px-5 text-black w-100">Trashed</a>

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
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Active</th>
                                <th scope="col">Url</th>
                            </tr>
                            </thead>
                            <tbody wire:sortable="updateOrdering" class="text-center">
                            @foreach($items as $item)
                                <tr  wire:sortable.item="{{$item->id}}" wire:key="slide-{{$item->id}}" >
                                    <th scope="row" wire:sortable.handle>
                                        <i class="ni ni-bullet-list-67" id="bullet"></i>
                                    </th>
                                    <td>
                                        <img src="{{asset('images/social_network')}}/{{$item->image}}" class="avatar avatar-sm me-3" alt="user1">
                                    </td>
                                    <td>
                                        {{$item->title}}
                                    </td>
                                    <td>
                                        @livewire('admin.supports.toggle-switch',  ['model' => $item, 'field' => 'active'], key($item->id))
                                    </td>
                                    <td>
                                        {{$item->url}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.social_network.edit',['id'=>$item->id ?? null])}}" class="px-2">
                                            <i class="fa fa-edit" title="Edit"></i>
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

                    </div>
                </div>
            </div>
        </div>
    </div><!--End Row-->
</div>
