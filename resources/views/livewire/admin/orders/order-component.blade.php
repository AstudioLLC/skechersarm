<div>
    <div class="row">
        <div class="col-lg-12">
            <div class=" row pb-3">
                <form action=""  wire:submit.prevent="searchOrder" class="d-flex">
                    <div class="col-2 m-2">
                        <label for="start_date" class="">Start date</label>
                        <input type="date"  class=" form-control bg-light border-0 p-2" wire:model.defer="start_date">
                    </div>
                    <div class="col-2 m-2">
                        <label for="end_date">End date</label>
                        <input type="date" class="form-control bg-light border-0 p-2" wire:model.defer="end_date">
                    </div>
                    <div class="col-3 m-2">
                        <button type="submit" class="btn btn-dark" style="margin-top: 30px">Search</button>
                    </div>
                </form>
            </div>
            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$name}} Table</h5>
                    <div class="table-responsive" style="overflow-y: hidden;">
                        <table class="table table-striped"
                               style="z-index: 1;
                                position: absolute;
                                top: 60px;
                                left: 0;
                                right: 0;
                                margin: auto;
                                background: #fff;">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Order Nº</th>
                                <th scope="col">Date</th>
                                <th scope="col">User</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                                <th scope="col">Paid</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Options</th>
                            </tr>
                            </thead>
                            <tbody wire:sortable="updateOrdering" class="text-center">
                            @foreach($items  as $item)
                                <tr  wire:sortable.item="{{$item->id}}" wire:key="slide-{{$item->id}}" >
                                    <th scope="row" wire:sortable.handle>
                                        <i class="ni ni-bullet-list-67" id="bullet"></i>
                                    </th>
                                    <td>
                                        {{$item->order_id}}
                                    </td>
                                    <td>
                                        {{ date_format($item->created_at, 'Y-m-d H:i') }}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.user.show',[ 'id'=>$item->user->id ])}}" target="_blank">
                                            {{$item->user->name ?? null}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$item->subtotal. ' ֏' ?? null}}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-success dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{strtoupper($item->status)}}
                                            </button>
                                            <ul class="dropdown-menu w-100 text-center" aria-labelledby="dropdownMenuButton1">
                                                @foreach($statuses as $stat)
                                                <li><a wire:click.prevent="updateOrderStatus({{$item->id}},'{{$stat}}')" class="dropdown-item" href="#">{{strtoupper($stat)}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        @if(($item->online_payment_type == 'arca' || $item->online_payment_type == 'idram') && $item->payment_result  && $item->is_paid == true)
                                         <p>{{ $item->online_payment_type }}</p>

                                            <div class="form-check form-switch active-toggle">
                                                <input class="form-check-input "  type="checkbox" role="switch"  disabled checked >
                                            </div>
                                        @else
                                            @livewire('admin.supports.toggle-switch',  ['model' => $item, 'field' => 'is_paid'], key($item->id))
                                        @endif
                                    </td>
                                    <td>
                                        <p>Payment status: {{ ($item->is_paid == true)? 'Paid' : 'Unpaid' }}</p>
                                        @if($item->is_paid==true)
                                        <p>Payment type: {{ $item->online_payment_type }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{route('admin.order.show',['order_id' => $item->id])}}">
                                            <i class="fa fa-eye"></i>
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
