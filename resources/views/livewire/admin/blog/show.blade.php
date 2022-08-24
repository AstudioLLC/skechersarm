<div>
    <article class="product-card">
        <div class="product-card__promotion">
            <span>{{ $blog->id }}</span>
        </div>

        <div class="product-card__footer">
            <a href="{{ route('admin.blogs') }}" class="product-card__button">See All Blogs</a>
        </div>
    </article>

    <div class="slide-card-body">
        <div class="row">
            <div class="col-md-7">
                <img src="{{asset('images/blogs')}}/{{$blog->image}}" alt="{{$blog->id}}" class="show-image pb-3">
                <img src="{{asset('images/blogs')}}/{{$blog->sec_image}}" alt="{{$blog->id}}" class="show-image">

            </div>
            <div class="col-md-5">

                <span class="model-name"> TITLE)</span>
                <span>{{$blog->title}}</span>
                <i class="fa fa-heading" aria-hidden="true"></i><br>
                <span class="model-name"> URL)</span>
                <span>{{$blog->url}}</span>
                <i class="fa fa-link" aria-hidden="true"></i><br>
                <span class="model-name">SHORT)</span>
                <span>{{$blog->short}}</span>
                <i class="fa fa-link" aria-hidden="true"></i><br>
                <span class="model-name">DESCRIPTION)</span>
                <span>{{$blog->description}}</span>
                <i class="fa fa-file-text" aria-hidden="true"></i><br>
                <span class="model-name">ACTIVE)</span>
                <span>{{$blog->active ? 'Active' : 'Inactive'}}</span>
                <i class="fa fa-toggle-on" aria-hidden="true"></i><br>
                <span class="model-name">CREATED AT)</span>
                <span>{{$blog->created_at}}</span>
                <i class="fa fa-calendar" aria-hidden="true"></i><br>
            </div>
        </div>
    </div>


</div>
