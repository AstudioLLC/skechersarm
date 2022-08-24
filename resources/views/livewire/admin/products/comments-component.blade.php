<div>

    <div class="row">


        <div class="col-lg-12">
            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Comments</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Product</th>
                                <th scope="col">Body</th>
                                <th scope="col">Moderated</th>
                                <th scope="col">Options</th>
                            </tr>
                            </thead>
                            <tbody  class="text-center">
                            @foreach($items as $key => $item)
                                <tr>
                                    <th scope="row">
                                        {{$key+1}}
                                    </th>
                                    <td>
                                        {{$item->user->name}}
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{route('admin.product.show',['id' => $item->product->id])}}" class="text-black">{{$item->product->name}}</a>
                                    </td>
                                    <td>
                                        {{$item->body}}
                                    </td>
                                    <td>
                                        @livewire('admin.supports.toggle-switch',  ['model' => $item, 'field' => 'validated'], key($item->id))
                                    </td>
                                    <td>
                                        <a href="" style="margin-left: 10px;" wire:click.prevent="delete({{$item->id}})" class="px-2">
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
