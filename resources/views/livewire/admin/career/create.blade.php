<div>

    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="store">

        <div class="row">
            <div class="col-6">
                <div class="form-group has-danger" wire:ignore>
                    <livewire:admin.supports.form-title name="Working Schedule"/>
                    <sec-tab-container >
                        <!-- TAB CONTROLS -->
                        <input type="radio" id="sectabToggle01" name="sec-tabs" value="1" checked />
                        <label class="sectabToggle01 intro" for="sectabToggle01" checked="checked">English</label>
                        <input type="radio" id="sectabToggle02" name="sec-tabs" value="2" />
                        <label class="sectabToggle02" for="sectabToggle02">Armenian</label>
                        <input type="radio" id="sectabToggle03" name="sec-tabs" value="3" />
                        <label class="sectabToggle03" for="sectabToggle03">Russian</label>
                        <sec-tab-content>
                            <input type="text" class="form-control @error('schedule.en') form-control-alternative is-invalid @enderror schedule-en" id="en" wire:model.defer="schedule.en" placeholder="Enter English Title">
                        </sec-tab-content>
                        <sec-tab-content>
                            <input type="text" class="form-control @error('schedule.hy') form-control-alternative is-invalid @enderror schedule-hy" id="hy" wire:model.defer="schedule.hy" placeholder="Enter Armenian Title">
                        </sec-tab-content>
                        <sec-tab-content>
                            <input type="text" class="form-control @error('schedule.ru') form-control-alternative is-invalid @enderror schedule-ru" id="ru" wire:model.defer="schedule.ru" placeholder="Enter Russian Title">
                        </sec-tab-content>

                    </sec-tab-container>
                    @error('schedule') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-6">
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
                            <input type="text" name="title.en" class="form-control @error('title.en') form-control-alternative is-invalid @enderror title-en" id="en2" wire:model.defer="title.en" placeholder="Enter English Title">
                        </third-tab-content>
                        <third-tab-content>
                            <input type="text" name="title.hy" class="form-control @error('title.hy') form-control-alternative is-invalid @enderror title-hy" id="hy2" wire:model.defer="title.hy" placeholder="Enter Armenian Title">
                        </third-tab-content>
                        <third-tab-content>
                            <input type="text" name="title.ru" class="form-control @error('title.ru') form-control-alternative is-invalid @enderror title-ru" id="ru2" wire:model.defer="title.ru" placeholder="Enter Russian Title">
                        </third-tab-content>

                    </third-tab-container>
                    @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                </div>


            </div>
        </div>




        <div class="form-group has-danger">
            <livewire:admin.supports.form-title name="Description"/>
            <tab-container wire:ignore>
                <!-- TAB CONTROLS -->
                <input type="radio" id="tabToggle01" name="tabs" value="1" checked /><label class="tabToggle01 intro" for="tabToggle01" checked="checked">English</label>
                <input type="radio" id="tabToggle02" name="tabs" value="2" /><label class="tabToggle02" for="tabToggle02">Armenian</label>
                <input type="radio" id="tabToggle03" name="tabs" value="3" /><label class="tabToggle03" for="tabToggle03">Russian</label>
                <tab-content>
                    <textarea type="text" name="description.en" class="form-control description-en" id="en" wire:model.defer="description.en" placeholder="Enter English Description"></textarea>
                </tab-content>
                <tab-content>
                    <textarea type="text" name="description.hy" class="form-control description-hy" id="hy" wire:model.defer="description.hy" placeholder="Enter Armenian Description"></textarea>
                </tab-content>
                <tab-content>
                    <textarea type="text" name="description.ru" class="form-control description-ru" id="ru" wire:model.defer="description.ru" placeholder="Enter Russian Description"></textarea>
                </tab-content>


            </tab-container>
            @error('description') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="Working Hours"/>
                    <input type="text" class="form-control @error('hours') form-control-alternative is-invalid @enderror " wire:model.defer="hours" placeholder="Enter Working hours for example (09։30 - 18։30)">
                    @error('hours') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

            </div>
            <div class="col-6">
                <div class="form-group has-danger">
                    <livewire:admin.supports.form-title name="Salary"/>
                    <input type="text" class="form-control @error('salary') form-control-alternative is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Salary price" wire:model.defer="salary">
                    @error('salary') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group has-danger" wire:ignore>
                    <livewire:admin.supports.form-title name="City"/>
                    <four-tab-container >
                        <!-- TAB CONTROLS -->
                        <input type="radio" id="fourtabToggle01" name="four-tabs" value="1" checked />
                        <label class="fourtabToggle01 intro" for="fourtabToggle01" checked="checked">English</label>
                        <input type="radio" id="fourtabToggle02" name="four-tabs" value="2" />
                        <label class="fourtabToggle02" for="fourtabToggle02">Armenian</label>
                        <input type="radio" id="fourtabToggle03" name="four-tabs" value="3" />
                        <label class="fourtabToggle03" for="fourtabToggle03">Russian</label>
                        <four-tab-content>
                            <input type="text" name="city.en" class="form-control @error('city.en') form-control-alternative is-invalid @enderror city-en" id="en2" wire:model.defer="city.en" placeholder="Enter English City name">
                        </four-tab-content>
                        <four-tab-content>
                            <input type="text" name="city.hy" class="form-control @error('city.hy') form-control-alternative is-invalid @enderror city-hy" id="hy2" wire:model.defer="city.hy" placeholder="Enter Armenian City name">
                        </four-tab-content>
                        <four-tab-content>
                            <input type="text" name="city.ru" class="form-control @error('city.ru') form-control-alternative is-invalid @enderror city-ru" id="ru2" wire:model.defer="city.ru" placeholder="Enter Russian City name">
                        </four-tab-content>

                    </four-tab-container>
                    @error('city') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group has-danger">
                    <livewire:admin.supports.form-title name="Deadline"/>
                    <input style="margin-top: 59px;" type="date" class="form-control @error('deadline') form-control-alternative is-invalid @enderror"  placeholder="Enter Salary price" wire:model.defer="deadline">
                    @error('deadline') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-light py-3 px-5 text-black w-100">
            Save
        </button>

    </form>


</div>


