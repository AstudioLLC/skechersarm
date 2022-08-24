<div>

{{--    @if($updateMode)--}}
{{--        @include('livewire.admin.filters.edit')--}}
{{--    @endif--}}
    <div class="row pb-3">
        <div class="col-12">
            <a class="btn btn-light py-3 px-5 text-black w-100">Manage Filters</a>
        </div>
    </div>

    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Edit</th>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Criteries</th>
                                <th scope="col">Delete</th>

                            </tr>
                            </thead>
                            <tbody  class="text-center">
                            @foreach($items as $item)
                                <tr>
                                    <td>
                                        <button wire:click="edit({{ $item->id }})" class="btn btn-primary btn-sm">Edit</button>
                                    </td>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        {{$item->title}}
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{route('admin.category.filter.criteries',['filter_id' => $item->id])}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if($item->id>5)
                                        <a href="" style="margin-left: 10px;" wire:click.prevent="delete({{$item->id}})" class="px-2">
                                            <i class="fa fa-trash" title="Detach"></i>
                                        </a>
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

    @if($updateMode)
            @include('livewire.admin.filters.edit')
    @else
    <div class="row">
        <div class="col-12">
            <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="store">
                <div class="form-group has-danger" wire:ignore>
                    <livewire:admin.supports.form-title name="Title"/>
                    <third-tab-container >
                        <!-- TAB CONTROLS -->
                        <input type="radio" id="thirdtabToggle01" name="third-tabs" value="1" checked />
                        <label class="thirdtabToggle01 intro" for="thirdtabToggle01" checked="checked">English</label>
                        <input type="radio" id="thirdtabToggle02" name="third-tabs" value="2" />
                        <label class="thirdtabToggle02" for="thirdtabToggle02">Armenian</label>
                        <input type="radio" id="thirdtabToggle03" name="third-tabs" value="3" />
                        <label class="thirdtabToggle03" for="thirdtabToggle03">Russian</label>
                        <third-tab-content>
                            <input type="text" name="title.en"  class="form-control  @error('title.en') form-control-alternative is-invalid @enderror title-en" id="en2" wire:model.defer="title.en" placeholder="Enter English Title">
                        </third-tab-content>
                        <third-tab-content>
                            <input type="text" title="title.hy" class="form-control @error('title.hy') form-control-alternative is-invalid @enderror title-hy" id="hy2" wire:model.defer="title.hy" placeholder="Enter Armenian Title">
                        </third-tab-content>
                        <third-tab-content>
                            <input type="text" title="title.ru" class="form-control @error('title.ru') form-control-alternative is-invalid @enderror title-ru" id="ru2" wire:model.defer="title.ru" placeholder="Enter Russian Title">
                        </third-tab-content>

                    </third-tab-container>
                    @error('title.en') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <button type="submit" class="btn btn-light py-3 px-5 text-black w-100">
                    Save
                </button>
            </form>
        </div>
    </div>
    @endif

</div>
