<div>
    <div class="row pb-3">
        <div class="col-6">
            {{--            <a class="btn btn-light py-3 px-5 text-black w-100" href="{{route('admin.blog.create')}}">Create new {{$this->name}}</a>--}}
        </div>
    </div>

    <div class="row">


        <div class="col-lg-12">
{{--            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />--}}
            <div class="card">
                <div class="card-body">
{{--                    <h5 class="card-title">{{$name}} Table</h5>--}}
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Barcode</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created at</th>
                                <th scope="col"><i class="fa fa-cog"></i></th>
                            </tr>
                            </thead>

                            <tbody wire:sortable="updateOrdering" class="text-center">
                                <tr wire:sortable.item="{{$item->id}}" wire:key="bonus-{{$item->id}}" >
                                    <td wire:sortable.handle>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <i class="ni ni-bullet-list-67" id="bullet"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $item->card_code }}
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->name }} {{ $item->surname }}</p>
                                        {{--                                        <p class="text-xs text-secondary mb-0">Organization</p>--}}
                                    </td>
                                    <td class="align-middle text-center text-sm">

                                    @if($item->status == 1)
                                        <td class="text-success">Active</td>
                                    @elseif($item->status == 2)
                                        <td class="text-danger">Rejected</td>
                                    @else
                                        <td class="text-danger">Inactive</td>
                                        @endif

                                    </td>
                                    <td class="align-middle text-center">
                                        <span>{{$item->created_at->format('Y-m-d')}}</span>
                                    </td>
                                    <td class="align-middle">

                                        <a href="" style="margin-left: 10px;" wire:click.prevent="delete({{$item->id}})" class="px-2">
                                            <i class="fa fa-trash" title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @if($item->status == 0)
                    <div class="d-flex" >
                        <form style="margin-right: 10px" enctype="multipart/form-data" wire:submit.prevent="updateStatus1">
                            <button value="1"  wire:model.lazy="status" class="btn btn-dark" >Reject</button>
                        </form>
                        <form  enctype="multipart/form-data" wire:submit.prevent="updateStatus">
                            <button value="2"  wire:model.lazy="status" class="btn btn-danger" >To accept</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



