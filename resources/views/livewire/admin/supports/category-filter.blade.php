<div>


    <div class="row pb-3">
        <div class="col-12">
            <a class="btn btn-light py-3 px-5 text-black w-100">Manage {{$sp_category->name}}'s filters</a>
        </div>
    </div>

    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Filters for specific {{$sp_category->name}}</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Title</th>
                                <th scope="col">Criteries</th>
                                <th scope="col">Attach</th>
                                <th scope="col">Detach</th>
                            </tr>
                            </thead>
                            <tbody  class="text-center">
                            @foreach($items as $item)
                                <tr>
                                    <td>
                                        {{$item->title}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.category.filter.criteries',['filter_id' => $item->id])}}" class="px-2" target="_blank">
                                            <i class="fa fa-eye" title="Criteries"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if($sp_category->filters->contains($item->id))
                                            <span>Already attached</span>
                                        @else
                                            <a href="" style="margin-left: 10px;" wire:click.prevent="attach({{$item->id}})" class="px-2">
                                                <i class="fa fa-paperclip" title="Attach"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($sp_category->filters->contains($item->id))
                                        <a href="" style="margin-left: 10px;" wire:click.prevent="detach({{$item->id}})" class="px-2">
                                            <i class="fa fa-trash" title="Detach"></i>
                                        </a>
                                        @else
                                            <span>Not attached</span>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div><!--End Row-->
</div>
