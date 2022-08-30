<div>

    <div class="row">
        <div class="col-12">
            <livewire:admin.supports.form-title name="Ordered User Details"/>
        </div>
    </div>
    <div class="row fast-order-row">
        @if($order->user->name)
        <div class="col-4 fast-order-col">
                <livewire:admin.supports.form-title name="Registered User"/>
            {{$order->user->name ?? 'Not Registered'}}
        </div>
        @endif
        @if($order->name || $order->user->name)
        <div class="col-4 fast-order-col">
                <livewire:admin.supports.form-title name="Name"/>
            {{$order->name ?? $order->user->name ?? null}}
        </div>
        @endif
        @if($order->last_name || $order->user->last_name)
        <div class="col-4 fast-order-col">
                <livewire:admin.supports.form-title name="Last Name"/>
            {{$order->last_name ?? $order->user->last_name ?? null}}
        </div>
        @endif
        @if($order->email || $order->user->email)
        <div class="col-4 fast-order-col">
                <livewire:admin.supports.form-title name="Email"/>
            {{$order->email ?? $order->user->email ?? null}}
        </div>
        @endif
        @if($order->phone || $order->user->phone)
        <div class="col-4 fast-order-col">
                <livewire:admin.supports.form-title name="Phone"/>
            {{$order->phone ?? $order->user->phone ?? null}}
        </div>
        @endif
        @if($order->city || $order->user->city)
        <div class="col-4 fast-order-col">
                <livewire:admin.supports.form-title name="City"/>
            {{$order->city ?? $order->user->city ?? null}}
        </div>
        @endif
        @if($order->district || $order->user->district)
        <div class="col-4 fast-order-col">
                <livewire:admin.supports.form-title name="District"/>
            {{$order->district ?? $order->user->district ?? null}}
        </div>
        @endif
        @if($order->address || $order->user->address)
        <div class="col-4 fast-order-col">
                <livewire:admin.supports.form-title name="Address"/>
            {{$order->address ?? $order->user->address ?? null}}
        </div>
        @endif
        @if($order->home || $order->user->home)
        <div class="col-4 fast-order-col">
                <livewire:admin.supports.form-title name="Home"/>
            {{$order->home ?? $order->user->home ?? null}}
        </div>
        @endif
        @if($order->apartment)
        <div class="col-4 fast-order-col">
                <livewire:admin.supports.form-title name="Apartment"/>
            {{$order->apartment ?? null}}
        </div>
        @endif
        @if($order->notes)
        <div class="col-4 fast-order-col">
                <livewire:admin.supports.form-title name="Notes"/>
            {{$order->notes ?? null}}
        </div>
        @endif
        @if($order->stores)
        <div class="col-4 fast-order-col">
                <livewire:admin.supports.form-title name="Store"/>
            {{$order->stores ?? null}}
        </div>
        @endif
            @if($order->payment_type)
                <div class="col-4 fast-order-col">
                    <livewire:admin.supports.form-title name="Payment type"/>
                    {{$order->payment_type ?? null}}
                </div>
            @endif
            @if($order->online_payment_type)
                <div class="col-4 fast-order-col">
                    <livewire:admin.supports.form-title name="Payment method"/>
                    {{$order->online_payment_type ?? null}}
                </div>
            @endif
            @if($order->is_paid == 0 || $order->is_paid == 1)
                <div class="col-4 fast-order-col">
                    <livewire:admin.supports.form-title name="Payment status"/>
                    {{($order->is_paid)?'paid' :'unpaid'}}
                </div>
            @endif
        @if($order->subtotal)
        <div class="col-4 fast-order-col">
                <livewire:admin.supports.form-title name="Subtotal"/>
            {{$order->subtotal ?? null}}
        </div>
        @endif
    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order Details</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Options</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($order->orderItems as $key => $item)

                                <tr>
                                    <th scope="row">
                                        {{$key + 1}}
                                    </th>
                                    <td>
                                        <a target="_blank" href="{{route('admin.product.show',['id' => $item->product->id])}}">
                                            <img class="avatar avatar-sm me-3" src="{{asset('images/products')}}/{{$item->product->image}}" alt="{{$item->product->name}}" />
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-black " target="_blank" href="{{route('admin.product.show',['id' => $item->product->id])}}">
                                        @if(isset($item->product_id))
                                            {{$item->product->name ?? null}}
                                        @endif
                                        </a>
                                    </td>
                                    <td>
                                        {{$item->price. ' ֏' ?? null}}
                                    </td>
                                    <td>
                                       {{$item->quantity ?? null}}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                                            Details
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                            <div style="width: 100%; text-align: end">
                            @if($order->delivery)
                            <p class="m-0">Ընդամենը՝ {{number_format($order->total)}} ֏</p>
                            <p class="m-0">Առաքման գին՝ {{number_format($order->delivery)}} ֏</p>
                            @endif
                            <p class="m-0">Ընդհանուր գին՝ {{number_format($order->subtotal)}} ֏</p>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div><!--End Row-->
    <div class="row mt-4">
        <div class="col-12">

        @foreach($order->orderItems as $key => $item)
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$item->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @livewire('admin.products.show',  ['id' => $item->product_id], key($item->product_id))
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
