



<div>
@if($item->categories->first()->filters)
@foreach($item->categories->first()->filters as $filter)

    {{--        @foreach(($item->categories->first()->parentCategory->parentCategory->parentCategory->filters) ?--}}
    {{--        $item->categories->first()->parentCategory->parentCategory->parentCategory->filters :--}}
    {{--        (($item->categories->first()->parentCategory->parentCategory->filters)?--}}
    {{--        $item->categories->first()->parentCategory->parentCategory->filters :--}}
    {{--        (($item->categories->first()->parentCategory->filters) ?$item->categories->first()->parentCategory->filters :--}}
    {{--        $item->categories->first()->filters)  )   as $filter)--}}





    <div class="row mt-4 mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$filter->title}} - Criteries</h5>

                    @if($filter->criteries)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col">Title</th>
                                    <th scope="col">Attach</th>
                                    <th scope="col">Detach</th>
                                </tr>
                                </thead>
                                <tbody  class="text-center">
                                @foreach($filter->criteries as $criteria)
                                    <tr>
                                        <td>
                                            {{$criteria->title}}
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
                                        <td>
                                            @if($item->criteries->contains($criteria->id))
                                                <a href="" style="margin-left: 10px;" wire:click.prevent="detach({{$criteria->id}})" class="px-2">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
@else

<div>

    {{--    --}}
    {{--       @foreach(($item->categories->first()->parentCategory->filters)?$item->categories->first()->parentCategory->filters:--}}
    {{--       (($item->categories->first()->filters)?$item->categories->first()->filters: $item->categories->first()->parentCategory->parentCategory->filters ??--}}
    {{--       $item->categories->first()->parentCategory->filters) as $filter)--}}
    @foreach($item->categories->first()->parentCategory->parentCategory->parentCategory->filters ?? $item->categories->first()->parentCategory->parentCategory->filters ??
            $item->categories->first()->parentCategory->filters
 as $filter)

        {{--        @foreach(($item->categories->first()->parentCategory->parentCategory->parentCategory->filters) ?--}}
        {{--        $item->categories->first()->parentCategory->parentCategory->parentCategory->filters :--}}
        {{--        (($item->categories->first()->parentCategory->parentCategory->filters)?--}}
        {{--        $item->categories->first()->parentCategory->parentCategory->filters :--}}
        {{--        (($item->categories->first()->parentCategory->filters) ?$item->categories->first()->parentCategory->filters :--}}
        {{--        $item->categories->first()->filters)  )   as $filter)--}}





        <div class="row mt-4 mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$filter->title}} - Criteries</h5>

                        @if($filter->criteries)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th scope="col">Title</th>
                                        <th scope="col">Attach</th>
                                        <th scope="col">Detach</th>
                                    </tr>
                                    </thead>
                                    <tbody  class="text-center">
                                    @foreach($filter->criteries as $criteria)
                                        <tr>
                                            <td>
                                                {{$criteria->title}}
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
                                            <td>
                                                @if($item->criteries->contains($criteria->id))
                                                    <a href="" style="margin-left: 10px;" wire:click.prevent="detach({{$criteria->id}})" class="px-2">
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


@endif
