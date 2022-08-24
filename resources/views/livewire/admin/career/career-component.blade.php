<div>


    <div class="row pb-3">
        <div class="col-6">
            <a class="btn btn-light py-3 px-5 text-black w-100" href="{{route('admin.career.create')}}">Create new {{$this->name}}</a>
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
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Deadline</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Options</th>
                                    <th scope="col">Show</th>

                                </tr>
                                </thead>
                                <tbody wire:sortable="updateOrdering" class="text-center">
                                @foreach($items as $item)
                                    <tr  wire:sortable.item="{{$item->id}}" wire:key="item-{{$item->id}}" >
                                        <th scope="row" wire:sortable.handle>
                                            <i class="ni ni-bullet-list-67" id="bullet"></i>
                                        </th>
                                        <td>
                                            {{$item->title}}
                                        </td>
                                        <td>
                                            {{Str::limit($item->description,10)}}
                                        </td>
                                        <td>
                                            {{$item->city}}
                                        </td>
                                        <td>
                                            {{$item->deadline}}
                                        </td>
                                        <td>
                                            @livewire('admin.supports.toggle-switch',  ['model' => $item, 'field' => 'active'], key($item->id))
                                        </td>
                                        <td>
                                            <a href="" style="margin-left: 10px;" wire:click.prevent="delete({{$item->id}})" class="px-2">
                                                <i class="fa fa-trash" title="Delete"></i>
                                            </a>
                                            @php $specific = $careerSeenCount->where('career_id',$item->id) @endphp
                                        </td>
                                        <td class="d-flex">
                                        @if(count($specific))
                                                <a href="{{route('admin.job.requests',['id' => $item->id])}}" style="margin-left: 10px;"  class="px-2">
                                                    <div class="pointer"><span>{{count($specific)}}</span> </div>
                                                </a>
                                            @else
                                                <a href="{{route('admin.job.requests',['id' => $item->id])}}" style="margin-left: 10px;"  class="px-2">
                                                <i class="fa fa-eye" title="Show"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $items->links('livewire::livewire-pagination') }}
                            @if((count($careerSeenCount)))
                                <a class="btn btn-success  mb-5 position-fixed bottom-0 " style="bottom: 0; cursor: pointer" wire:click="updateSeen">Update Requests Seen</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div><!--End Row-->
    </div>

