<div>
    <div class="row pb-3">
        <div class="col-6">
            <a class="btn btn-light py-3 px-5 text-black w-100" href="{{route('admin.career')}}">Back</a>
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
                                <th scope="col">Title</th>
                                <th scope="col">Schedule</th>
                                <th scope="col">Salary</th>
                                <th scope="col">City</th>
                                <th scope="col">Deadline</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>
                                        {{$parent->title}}
                                    </td>
                                    <td>
                                        {{$parent->schedule}}
                                    </td>
                                    <td>
                                        {{$parent->salary}}
                                    </td>
                                    <td>
                                        {{$parent->city}}
                                    </td>
                                    <td>
                                        {{$parent->deadline}}
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div><!--End Row-->

    <div class="row">
        <div class="testimonials">
            <h2 class="title">These individuals sent resumes for the position</h2>
            <p class="description">{{$parent->title}}</p>

            <div class="slider-container">
                <div class="slider">
                    @foreach($items as $item)
                        <div class="slide-box">
                            @if(!$item->seen)
                                <small class="badge badge-light"  id="glow-green">{{$item->name}} requested for working</small>
                            @endif
                        <!-- Testi One -->
                        <p class="comment">
                            {{$item->notes ?? null}}
                        </p>

                        <a href="{{asset('files/jobRequests')}}/{{$item->file}}" download><img src="{{asset('frontend/images/icons/pdf-download.png')}}" /></a>
                        <h3 class="name">{{$item->name}} {{$item->surname}}</h3>
                        <h4 class="job">{{$item->phone}} - {{$item->email}}</h4>
                        </div>
                    @endforeach
                </div>

                <a href="#!" class="control-slider btn-left">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#!" class="control-slider btn-right">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<script>

    const sliderElm = document.querySelector(".slider-container .slider");
    const btnLeft = document.querySelector(".slider-container .btn-left");
    const btnRight = document.querySelector(".slider-container .btn-right");

    const numberSliderBoxs = sliderElm.children.length;
    let idxCurrentSlide = 0;

    // Functions:
    function moveSlider() {
        let leftMargin = (sliderElm.clientWidth / numberSliderBoxs) * idxCurrentSlide;
        sliderElm.style.marginLeft = -leftMargin + "px";
        console.log(sliderElm.clientWidth, leftMargin);
    }
    function moveLeft() {
        if (idxCurrentSlide === 0) idxCurrentSlide = numberSliderBoxs - 1;
        else idxCurrentSlide--;

        moveSlider();
    }
    function moveRight() {
        if (idxCurrentSlide === numberSliderBoxs - 1) idxCurrentSlide = 0;
        else idxCurrentSlide++;

        moveSlider();
    }

    // Event Listeners:
    btnLeft.addEventListener("click", moveLeft);
    btnRight.addEventListener("click", moveRight);
    window.addEventListener("resize", moveSlider);

</script>
