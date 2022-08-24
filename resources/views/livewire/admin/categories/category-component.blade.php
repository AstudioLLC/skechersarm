<div wire:ignore>


    <div class="row pb-3">
        <div class="col-6">
            <a class="btn btn-light py-3 px-5 text-black w-100" href="{{route('admin.category.create')}}">Create new {{$this->name}}</a>
        </div>
        <div class="col-6">
            <a href="{{route('admin.category.trashed')}}" class="float-right btn btn-light py-3 px-5 text-black w-100">Trashed</a>

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
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Active</th>
                                <th scope="col">Options</th>
                            </tr>
                            </thead>
                            <tbody wire:sortable="updateOrdering" class="text-center">
                            @foreach($productCategories as $item)
                                <tr  wire:sortable.item="{{$item->id}}" wire:key="slide-{{$item->id}}" >
                                    <th scope="row" wire:sortable.handle>
                                        <i class="ni ni-bullet-list-67" id="bullet"></i>
                                    </th>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                        {{$item->name}}
                                        @if(count($item->childCategories))
                                            <a class="text-xs text-secondary mb-0"
                                               href="{{ route('admin.subcategories', ['id' => $item->id]) }}">
                                                Subcategories ({{count($item->childCategories)}})
                                            </a>
                                        @endif
                                        </div>
                                    </td>
                                    <td>
                                        @livewire('admin.supports.toggle-switch',  ['model' => $item, 'field' => 'active'], key($item->id))
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{route('admin.category.filter',['category_id' => $item->id])}}">
                                            <i class="fa fa-filter" aria-hidden="true"></i>
                                        </a>
{{--                                        <a href="{{route('admin.gallery',['model' => 'category','key' => $item->id])}}">--}}
{{--                                            <i class="fa fa-picture-o" aria-hidden="true"></i>--}}
{{--                                        </a>--}}
                                        <a href="{{route('admin.category.edit',['id'=>$item->id ?? null])}}">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>

                                        @if((!count($item->childCategories) && !count($item->products)))
                                            <a href="" wire:click.prevent="delete({{$item->id}})">
                                                <i class="fa fa-trash" title="Delete"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $productCategories->links('livewire::livewire-pagination') }}

                    </div>
                </div>
            </div>
        </div>
    </div><!--End Row-->
</div>
