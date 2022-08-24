<div>
    <section>
        <div class="container">
            @if($items)
                <div class="faqs-container">
                    @foreach($items as $item)
                    <div class="faq-singular">
                        <h2 class="faq-question" itemprop="name">{{$item->question}}</h2>
                        <div class="faq-answer">
                            <div itemprop="text">
                                {{$item->answer}}
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>

            @endif
        </div>
    </section>
    <button class="btn btn-light py-3 px-5 text-black w-100 mt-4" onclick="headerContent()">Click for create new Block</button>

    <div class="row mt-4" id="header-content-section" style="display: none;" wire:ignore>
            <div class="col-12" wire:ignore>
                <form wire:submit.prevent="store" enctype="multipart/form-data">
                        <div class="form-group has-danger" wire:ignore>
                            <livewire:admin.supports.form-title name="Question"/>
                            <third-tab-container >
                                <!-- TAB CONTROLS -->
                                <input type="radio" id="thirdtabToggle01" name="third-tabs" value="1" checked />
                                <label class="thirdtabToggle01 intro" for="thirdtabToggle01" checked="checked">English</label>
                                <input type="radio" id="thirdtabToggle02" name="third-tabs" value="2" />
                                <label class="thirdtabToggle02" for="thirdtabToggle02">Armenian</label>
                                <input type="radio" id="thirdtabToggle03" name="third-tabs" value="3" />
                                <label class="thirdtabToggle03" for="thirdtabToggle03">Russian</label>
                                <third-tab-content>
                                    <input type="text" name="question.en" class="form-control @error('question.en') form-control-alternative is-invalid @enderror question-en" id="en2" wire:model.defer="question.en" placeholder="Enter English Title">
                                </third-tab-content>
                                <third-tab-content>
                                    <input type="text" name="question.hy" class="form-control @error('question.hy') form-control-alternative is-invalid @enderror question-hy" id="hy2" wire:model.defer="question.hy" placeholder="Enter Armenian Title">
                                </third-tab-content>
                                <third-tab-content>
                                    <input type="text" name="question.ru" class="form-control @error('question.ru') form-control-alternative is-invalid @enderror question-ru" id="ru2" wire:model.defer="question.ru" placeholder="Enter Russian Title">
                                </third-tab-content>

                            </third-tab-container>
                            @error('question') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    <div class="form-group has-danger">
                        <livewire:admin.supports.form-title name="Answer"/>
                        <tab-container wire:ignore>
                            <!-- TAB CONTROLS -->
                            <input type="radio" id="tabToggle01" name="tabs" value="1" checked /><label class="tabToggle01 intro" for="tabToggle01" checked="checked">English</label>
                            <input type="radio" id="tabToggle02" name="tabs" value="2" /><label class="tabToggle02" for="tabToggle02">Armenian</label>
                            <input type="radio" id="tabToggle03" name="tabs" value="3" /><label class="tabToggle03" for="tabToggle03">Russian</label>
                            <tab-content>
                                <textarea type="text" name="answer.en" class="form-control answer-en" id="en" wire:model.defer="answer.en" placeholder="Enter English Description"></textarea>
                            </tab-content>
                            <tab-content>
                                <textarea type="text" name="answer.hy" class="form-control answer-hy" id="hy" wire:model.defer="answer.hy" placeholder="Enter Armenian Description"></textarea>
                            </tab-content>
                            <tab-content>
                                <textarea type="text" name="answer.ru" class="form-control answer-ru" id="ru" wire:model.defer="answer.ru" placeholder="Enter Russian Description"></textarea>
                            </tab-content>


                        </tab-container>
                        @error('answer') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="btn btn-light py-3 px-5 text-black w-100">Save</button>
                </form>
            </div>

        </div>
</div>


@push('js')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>


    $(document).ready(function() {
        $(".faqs-container .faq-singular:first-child").addClass("active").children(".faq-answer").slideDown();//Remove this line if you dont want the first item to be opened automatically.
        $(".faq-question").on("click", function(){
            if( $(this).parent().hasClass("active") ){
                $(this).next().slideUp();
                $(this).parent().removeClass("active");
            }
            else{
                $(".faq-answer").slideUp();
                $(".faq-singular").removeClass("active");
                $(this).parent().addClass("active");
                $(this).next().slideDown();
            }
        });
    });
</script>
@endpush
