    <div>
        <div class="row pb-3">
            <div class="col-6">
                <a class="btn btn-light py-3 px-5 text-black w-100" href="{{route('admin.blog.create')}}">Create new {{$this->name}}</a>
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
                                <th scope="col">Status</th>
                                <th scope="col">Created at</th>
                                <th scope="col"><i class="fa fa-cog"></i></th>
                            </tr>
                            </thead>
                            <tbody wire:sortable="updateOrdering" class="text-center">
                            @foreach($items as $item)
                                <tr wire:sortable.item="{{$item->id}}" wire:key="blog-{{$item->id}}" >
                                    <td wire:sortable.handle>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <i class="ni ni-bullet-list-67" id="bullet"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{asset('images/blogs')}}/{{$item->image}}" class="avatar avatar-sm me-3" alt="user1">
                                            </div>

                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{!! $item->title !!}</p>
                                        {{--                                        <p class="text-xs text-secondary mb-0">Organization</p>--}}
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @livewire('admin.supports.toggle-switch',  ['model' => $item, 'field' => 'active'], key($item->id))

                                    </td>
                                    <td class="align-middle text-center">
                                        <span>{{$item->created_at->format('Y-m-d')}}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{route('admin.blog.show',['url' => $item->url ?? null], compact('item'))}}" class="px-2">
                                            <i class="fa fa-eye" title="Show"></i>
                                        </a>
                                        <a href="{{route('admin.gallery',['model' => 'blog','key' => $item->id])}}">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.blog.edit',['url'=>$item->url ?? null])}}" class="px-2">
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
    </div>
</div>



