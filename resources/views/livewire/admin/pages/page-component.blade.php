<div wire:ignore>


    <div class="row pb-3">
        <div class="col-6">
            <a class="btn btn-light py-3 px-5 text-black w-100" href="{{route('admin.page.create',['position' => 'about'])}}">Create new {{$this->name}} for Information</a>
        </div>
        <div class="col-6">
            <a class="btn btn-light py-3 px-5 text-black w-100" href="{{route('admin.page.create',['position' => 'buyers'])}}">Create new {{$this->name}} for Sellers</a>
        </div>
    </div>

    <div class="row">


{{--        <div class="col-lg-6">--}}
{{--            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />--}}

{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">Info {{$name}} Table</h5>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-striped">--}}
{{--                            <thead>--}}
{{--                            <tr class="text-center">--}}
{{--                                <th scope="col">#</th>--}}
{{--                                <th scope="col">Title</th>--}}
{{--                                <th scope="col">Active</th>--}}
{{--                                <th scope="col">Options</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody wire:sortable="updateOrdering" class="text-center">--}}
{{--                            @foreach($infoPages as $infoPage)--}}
{{--                                <tr  wire:sortable.item="{{$infoPage->id}}" wire:key="item-{{$infoPage->id}}" >--}}
{{--                                    <th scope="row" wire:sortable.handle>--}}
{{--                                        <i class="ni ni-bullet-list-67" id="bullet"></i>--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        {{$infoPage->title}}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        @livewire('admin.supports.toggle-switch',  ['model' => $infoPage, 'field' => 'active'], key($infoPage->id))--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{route('admin.gallery',['model' => 'page','key' => $infoPage->id])}}">--}}
{{--                                            <i class="fa fa-picture-o" aria-hidden="true"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="{{route('admin.pages.edit',['id' => $infoPage->id])}}" >--}}
{{--                                            <i class="fa fa-edit" title="Edit"></i>--}}
{{--                                        </a>--}}
{{--                                        @if(empty($infoPage->static))--}}
{{--                                        <a href="" wire:click.prevent="delete({{$infoPage->id}})" >--}}
{{--                                            <i class="fa fa-trash" title="Delete"></i>--}}
{{--                                        </a>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}

{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        {{ $infoPages->links('livewire::livewire-pagination') }}--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col-lg-12">
            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm1" />

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">For Seller {{$name}} Table</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Active</th>
                                <th scope="col">Options</th>
                            </tr>
                            </thead>
                            <tbody wire:sortable="updateOrdering" class="text-center">

                            @foreach($forSellerPages as $forSellerPage)
                                <tr  wire:sortable.item="{{$forSellerPage->id}}" wire:key="item-{{$forSellerPage->id}}" >
                                    <th scope="row" wire:sortable.handle>
                                        <i class="ni ni-bullet-list-67" id="bullet"></i>
                                    </th>
{{--                                    <td>--}}
{{--                                        {{$forSellerPage->title}}--}}
{{--                                    </td>--}}

                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            {{$forSellerPage->title}}
                                            @if(count($forSellerPage->childpages))
                                                <a class="text-xs text-secondary mb-0"
                                                   href="{{ route('admin.subpages', ['id' => $forSellerPage->id]) }}">
                                                    Subpages ({{count($forSellerPage->childpages)}})
                                                </a>
                                            @endif
                                        </div>
                                    </td>

                                    <td>
                                        @livewire('admin.supports.toggle-switch',  ['model' => $forSellerPage, 'field' => 'active'], key($forSellerPage->id))
                                    </td>
                                    <td>
                                        <a href="{{route('admin.gallery',['model' => 'page','key' => $forSellerPage->id])}}">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.pages.edit',['id' => $forSellerPage->id])}}" >
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>
                                        @if(empty($forSellerPage->static))
                                            @if(!count($forSellerPage->childpages))
                                        <a href="" wire:click.prevent="delete({{$forSellerPage->id}})" >
                                            <i class="fa fa-trash" title="Delete"></i>
                                        </a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $forSellerPages->links('livewire::livewire-pagination') }}

                    </div>
                </div>
            </div>
        </div>
    </div><!--End Row-->
</div>
