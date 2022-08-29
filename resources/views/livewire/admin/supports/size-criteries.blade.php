<div>

    <div class="row mt-4 mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                         @if($filter->criteries)

                                <div class="table-responsive">
                                    <table class="table table-striped" >
                                        <thead>
                                        <tr class="text-center">
                                            <th scope="col">Title</th>
                                            <th scope="col">Barcode</th>
                                            <th scope="col">Count</th>
                                            <th scope="col">Attach</th>
                                        </tr>
                                        </thead>
                                        <tbody  class="text-center">

                                        @foreach($filter->criteries as $key => $criteria)
                                            @if(in_array($criteria->id,array_diff($filter->criteries->pluck('id')->toArray(),$item->criteries->pluck('id')->toArray())))
                                            <tr >
                                                <td>
                                                    {{$criteria->title}}
                                                </td>
                                                    <td>
                                                        <input type="text" wire:model="fakeBarcode.{{$key}}" wire:key="{{$key}}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" wire:model="fakeCount.{{$key}}" wire:key="{{$key}}" class="form-control">
                                                    </td>

                                                    <td>
                                                        @if($item->criteries->contains($criteria->id))
                                                            <span>Already attached</span>
                                                        @else
                                                            <a href="" style="margin-left: 10px;" wire:click.prevent="attach({{$criteria->id}})" class="px-2">
                                                                <i class="fa fa-paperclip" title="Attach"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Exciting Pivot values</h5>
                    @if($pivot_values)

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col">Criteria</th>
                                    <th scope="col">Barcode</th>
                                    <th scope="col">Count</th>
                                    <th scope="col">Detach</th>
                                    <th scope="col">Edit</th>
                                </tr>
                                </thead>
                                <tbody  class="text-center">

                                @foreach($pivot_values as $key => $pivot_value)
                                        <tr>

                                            @php($criteria_title = \App\Models\Criteria::whereId($pivot_value->criteria_id)->first())
                                            <td>
                                                {{$criteria_title->title}}
                                            </td>
                                            <td>
                                                {{$pivot_value->barcode}}
                                            </td>
                                            <td>
                                                {{$pivot_value->count}}

                                            </td>
                                            <td>
                                                <a href="" style="margin-left: 10px;" wire:click.prevent="detach({{$pivot_value->criteria_id}})" class="px-2">
                                                    <i class="fa fa-trash" title="Detach"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button wire:click.prevent="edit({{ $pivot_value->uuid }})" class="btn btn-primary btn-sm">Edit</button>

                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    @if($updateMode)
        @include('livewire.admin.supports.size-criteries-edit')
    @endif

</div>
