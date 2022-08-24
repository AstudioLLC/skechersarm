<div>


    <div class="row pb-3">
        <div class="col-3">
            <a class="btn btn-light py-3 px-5 text-black w-100" href="{{route('admin.product.create')}}">Create new {{$this->name}}</a>
        </div>
        <div class="col-3">
            <a href="{{route('admin.product.trashed')}}" class="btn btn-light py-3 px-5 text-black w-100">
                Trashed {{$name}}
            </a>
        </div>
        <div class="col-3 d-flex">
            <form enctype="multipart/form-data" wire:submit.prevent="importExcel">
                <label for="file-input">
                    <img src="{{asset('frontend/images/import-excel.png')}}"  style="width: 80px; cursor: pointer" alt="">
                </label>

                <input type="file" class="d-none"  id="file-input" wire:model="uploadedExcel">
                @if($uploadedExcel)
                    <button class="btn btn-outline-success" type="submit">Save</button>
                @endif
            </form>
            <form enctype="multipart/form-data" wire:submit.prevent="importZip">
                <label for="file-zip">
                    <img src="{{asset('frontend/images/zip.png')}}"  style="width: 80px; cursor: pointer" alt="">
                </label>

                <input type="file" class="d-none"  id="file-zip" wire:model="uploadedZipImages">
                @if($uploadedZipImages)
                    <button class="btn btn-outline-success" type="submit">Save</button>
                @endif
            </form>

        </div>
        <div class="col-3">
            <a class="float-end" wire:click="exportCsv"><img src="{{asset('frontend/images/csv.jpg')}}"  style="width: 80px; cursor: pointer" alt=""></a>

            <a class="float-end" wire:click="exportExcel"><img src="{{asset('frontend/images/excel1.png')}}"  style="width: 100px; cursor: pointer" alt=""></a>
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
                                <th scope="col">Barcode</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Active</th>
                                <th scope="col">Options</th>
                            </tr>
                            </thead>
                            <tbody wire:sortable="updateOrdering" class="text-center">
                            @foreach($items as $item)
                                <tr  wire:sortable.item="{{$item->id}}" wire:key="item-{{$item->id}}" >
                                    <th scope="row" wire:sortable.handle>
                                        <i class="ni ni-bullet-list-67" id="bullet"></i>
                                    </th>
                                    <td>
                                        {{$item->barcode}}
                                    </td>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        {{date_format($item->created_at, 'Y-m-d H:m')}}
                                    </td>
                                    <td>
                                        @livewire('admin.supports.toggle-switch',  ['model' => $item, 'field' => 'active'], key($item->id))
                                    </td>
                                    <td>
                                        <a href="{{route('admin.product.criteries',['product_id' => $item->id])}}">
                                            <i class="fa fa-filter" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.gallery',['model' => 'product','key' => $item->id])}}">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        </a>
                                        <a target="_blank" href="{{route('admin.product.show',['id' => $item->id])}}" >
                                            <i class="fa fa-eye" title="Show"></i>
                                        </a>
                                        <a href="{{route('admin.product.edit',['id' => $item->id])}}" >
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>
                                        <a href="" wire:click.prevent="delete({{$item->id}})" >
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
