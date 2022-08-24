<div>
    <form>

        <div class="row p-2 pt-3 rounded-top">
            <div class="col-lg-12">
                <div class="form-group has-danger" wire:ignore>
                    <livewire:admin.supports.form-title name="Options"/>
                    <sec-tab-container >
                        <!-- TAB CONTROLS -->
                        <input type="radio" id="sectabToggle01" name="sec-tabs" value="1" checked />
                        <label class="sectabToggle01 intro" for="sectabToggle01" checked="checked">English</label>
                        <input type="radio" id="sectabToggle02" name="sec-tabs" value="2" />
                        <label class="sectabToggle02" for="sectabToggle02">Armenian</label>
                        <input type="radio" id="sectabToggle03" name="sec-tabs" value="3" />
                        <label class="sectabToggle03" for="sectabToggle03">Russian</label>
                        <sec-tab-content>
                            <input type="text" wire:model="title.en" class="@error('title.en') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Enter English title">
                        </sec-tab-content>
                        <sec-tab-content>
                            <input type="text" wire:model="title.hy" class="@error('title.hy') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Enter Armenian title">
                        </sec-tab-content>
                        <sec-tab-content>
                            <input type="text" wire:model="title.ru" class="@error('title.ru') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Enter Russian title">
                        </sec-tab-content>

                    </sec-tab-container>
                    @error('title.en') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

            </div>
        </div>
        <div class="row p-2 pb-3 rounded-bottom">
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-light py-3 px-5 w-100 text-black" wire:click.prevent="store()" type="submit">Save</button>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Options Table</h5>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Options</th>
                    </tr>
                    </thead>
                    <tbody wire:sortable="updateOrdering" class="text-center">
                    @foreach($items as $item)
                        <tr  wire:sortable.item="{{$item->id}}" wire:key="item-{{$item->id}}" >
                            <th scope="row" wire:sortable.handle>
                                <i class="ni ni-bullet-list-67" id="bullet"></i>
                            </th>
                            <td>
                                {{$item->title}}
                            </td>
                            <td>
                                @can('poll-delete')
                                    <a href="" style="margin-left: 10px;" wire:click.prevent="delete({{$item->id}})" class="px-2">
                                        <i class="fa fa-trash" title="Delete"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
