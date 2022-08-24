

<div>

        <section class="shipping-methods mt-4">
            <div class="container">
                @if($items)
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col"></th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Sec. Telephone</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Active</th>

                                </tr>
                                </thead>
                                <tbody wire:sortable="updateOrdering" class="text-center">
                                @foreach($items as $item)
                                    <tr wire:sortable.item="{{$item->id}}" wire:key="method-{{$item->id}}" >
                                        <td wire:sortable.handle>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <i class="ni ni-bullet-list-67" id="bullet"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$item->title}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$item->location}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$item->email}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$item->telephone}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$item->sec_telephone}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{Str::limit($item->description,10)}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @livewire('admin.supports.toggle-switch',  ['model' => $item, 'field' => 'active'], key($item->id))
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <a href="{{route('admin.gallery',['model' => 'store','key' => $item->id])}}">
                                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="" style="margin-left: 10px;" wire:click.prevent="delete({{$item->id}})" class="px-2">
                                                <i class="fa fa-trash" header_header_title="Delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <div class="row mt-4">
            <div class="col-12" wire:ignore>
                <form wire:submit.prevent="store" enctype="multipart/form-data">
                    <third-tab-container >
                        <!-- TAB CONTROLS -->
                        <input type="radio" id="thirdtabToggle01" name="third-tabs" value="1" checked />
                        <label class="thirdtabToggle01 intro" for="thirdtabToggle01" checked="checked">English</label>
                        <input type="radio" id="thirdtabToggle02" name="third-tabs" value="2" />
                        <label class="thirdtabToggle02" for="thirdtabToggle02">Armenian</label>
                        <input type="radio" id="thirdtabToggle03" name="third-tabs" value="3" />
                        <label class="thirdtabToggle03" for="thirdtabToggle03">Russian</label>
                        <third-tab-content>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <input id="en2" type="text" wire:model.defer="title.en" class="@error('title') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Title (en)">
                                        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <input id="en2" type="text" wire:model.defer="location.en" class="@error('location') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Location (en)">
                                        @error('location') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <input id="en2" type="text" wire:model.defer="description.en" class="@error('description.en') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Description (en)">
                                        @error('description.en') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <input id="en2" type="text" wire:model.defer="email" class="@error('email') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Email">
                                        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <input id="en2" type="text" wire:model.defer="telephone" class="@error('telephone') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Telephone">
                                        @error('telephone') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <input id="en2" type="text" wire:model.defer="sec_telephone" class="@error('sec_telephone') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Sec. Telephone">
                                        @error('sec_telephone') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </third-tab-content>
                        <third-tab-content>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <input id="en2" type="text" wire:model.defer="title.hy" class="@error('title') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Title (hy)">
                                        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <input id="en2" type="text" wire:model.defer="location.hy" class="@error('location') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Location (hy)">
                                        @error('location') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <input id="en2" type="text" wire:model.defer="description.hy" class="@error('description.en') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Description (hy)">
                                        @error('description.en') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </third-tab-content>
                        <third-tab-content>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <input id="en2" type="text" wire:model.defer="title.ru" class="@error('title') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Title (ru)">
                                        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <input id="en2" type="text" wire:model.defer="location.ru" class="@error('location') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Location (ru)">
                                        @error('location') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <input id="en2" type="text" wire:model.defer="description.ru" class="@error('description.en') form-control-alternative is-invalid @enderror form-control box-shadow border-color-ligth p-3" placeholder="Description (ru)">
                                        @error('description.en') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </third-tab-content>

                    </third-tab-container>




                    <button type="submit" class="btn btn-light py-3 px-5 text-black w-100">Save</button>

                </form>


            </div>

        </div>

</div>
