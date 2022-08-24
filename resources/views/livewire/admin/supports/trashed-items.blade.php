<div>


    <div class="row pb-3">
        <div class="col-6">
            <a class="btn btn-light py-3 px-5 text-black w-100" id="backtogo">Go Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$name}}</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Options</th>
                            </tr>
                            </thead>
                            <tbody wire:sortable="updateOrdering" class="text-center">
                            @foreach($items as $item)
                                <tr  wire:sortable.item="{{$item->id}}" wire:key="slide-{{$item->id}}" >
                                    <th scope="row" wire:sortable.handle>
                                        <i class="ni ni-bullet-list-67" id="bullet"></i>
                                    </th>
                                    <td>
                                        @if($item->image)
                                            <img src="{{$item->getImage()}}" class="avatar avatar-sm me-3">
                                        @endif
                                    </td>
                                    <td>
                                        {{$item->title ?? $item->name}}
                                    </td>
                                    <td>

                                        <a style="cursor: pointer" class="px-2" wire:click.prevent="restore({{$item->id}})">
                                            <i class="fa fa-trash-restore"></i>
                                        </a>
                                        <a style="cursor: pointer" class="px-2" wire:click.prevent="forceDelete({{$item->id}})">
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

@push('js')
    <script>
        $('#backtogo').click(function() {
            console.log('Er')
            history.go(-1);

        })
    </script>
@endpush
