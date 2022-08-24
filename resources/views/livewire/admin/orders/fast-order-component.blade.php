<div>

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
                                <th scope="col">User</th>
                                <th scope="col">Total</th>
                                <th scope="col">Date</th>
                                <th scope="col">Options</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($items as $key => $item)
                                <tr @if(!$item->seen) class="table-success" @endif>
                                    <th scope="row">
                                        {{$key+1}}
                                    </th>
                                    <td>
                                        <a href="{{route('admin.user.show',[ 'id'=>$item->user->id ])}}" target="_blank">
                                            {{$item->user->name ?? null}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$item->subtotal. ' ֏' ?? null}}
                                    </td>
                                    <td>
                                        {{$item->created_at}}
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{route('admin.fast.order.show',['order_id' => $item->id])}}">
                                            <i class="fa fa-eye"></i>
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
