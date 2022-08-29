<?php

use Illuminate\Support\Facades\Route;

/* Special Login Route for Admin  */

Route::prefix('management')->get('login',[\App\Http\Livewire\Admin\LoginComponent::class,'index'])->name('admin.login');

/* Special Routes for Admin  */

Route::prefix('management')->name('admin.')->middleware(['auth','has_role'])->group(function(){

    /* Special Routes for Dashboard  */

    Route::get('dashboard',\App\Http\Livewire\Admin\DashboardComponent::class)->name('route');

    /* Special Routes for Users  */

    Route::get('users',\App\Http\Livewire\Admin\Users\UsersComponent::class)->name('users');
    Route::get('user/show/{id}',\App\Http\Livewire\Admin\Users\Show::class)->name('user.show');

    /* Special Routes for Polls  */

    Route::get('polls',\App\Http\Livewire\Admin\Polls\PollComponent::class)->name('polls');
    Route::get('poll/create',\App\Http\Livewire\Admin\Polls\Create::class)->name('poll.create');
    Route::get('user/edit/{id}',\App\Http\Livewire\Admin\Polls\Edit::class)->name('poll.edit');
    Route::get('poll/options/{id}',\App\Http\Livewire\Admin\Polls\Options::class)->name('poll.options');

    /* Special Routes for Orders  */

    Route::get('orders',\App\Http\Livewire\Admin\Orders\OrderComponent::class)->name('orders');
    Route::get('fast-orders',\App\Http\Livewire\Admin\Orders\FastOrderComponent::class)->name('fast.orders');
    Route::get('fast-order/{order_id}',\App\Http\Livewire\Admin\Orders\Show::class)->name('fast.order.show');
    Route::get('order/{order_id}',\App\Http\Livewire\Admin\Orders\Show::class)->name('order.show');

    /* Special Routes for Slides  */

    Route::get('slides',\App\Http\Livewire\Admin\Slides\SlidesComponent::class)->name('slides');
    Route::get('slide/create',\App\Http\Livewire\Admin\Slides\Create::class)->name('slide.create');
    Route::get('slide/edit/{id}',\App\Http\Livewire\Admin\Slides\Edit::class)->name('slide.edit');
    Route::get('slides/trashed',\App\Http\Livewire\Admin\Slides\Trashed::class)->name('slides.trashed');

    /* Special Routes for Contact  */
    Route::get('contact',\App\Http\Livewire\Admin\Contacts\ContactComponent::class)->name('contact');
    Route::get('contact/edit/{id}', \App\Http\Livewire\Admin\Contacts\Edit::class)->name('contact.edit');
    Route::get('contact/trashed', \App\Http\Livewire\Admin\Contacts\Trashed::class)->name('contact.trashed');

    /* Special Routes for Information  */

    Route::get('information',\App\Http\Livewire\Admin\Information\InformationComponent::class)->name('information');
    Route::get('information/create', \App\Http\Livewire\Admin\Information\Create::class)->name('information.create');
    Route::get('information/edit/{id}',\App\Http\Livewire\Admin\Information\Edit::class)->name('information.edit');
    Route::get('information/trashed', \App\Http\Livewire\Admin\Information\Trashed::class)->name('information.trashed');

    /* Special Routes for social_network  */

    Route::get('social_network', \App\Http\Livewire\Admin\SocialNetwork\SocialNetworkComponent::class)->name('social_network');
    Route::get('social_network/create',\App\Http\Livewire\Admin\SocialNetwork\Create::class)->name('social_network.create');
    Route::get('social_network/edit/{id}', \App\Http\Livewire\Admin\SocialNetwork\Edit::class)->name('social_network.edit');
    Route::get('social_network/trashed', \App\Http\Livewire\Admin\SocialNetwork\Trashed::class)->name('social_network.trashed');

    /* Special Routes for Model Galleries  */

    Route::get('gallery/{model?}/{key?}',\App\Http\Livewire\Admin\Supports\Gallery::class)->name('gallery');

    /* Special Routes for Home Banners  */

    Route::get('home-banners',\App\Http\Livewire\Admin\HomeBanners\HomeBannerComponent::class)->name('home.banners');

    /* Special Routes for Brands  */

    Route::get('brands',\App\Http\Livewire\Admin\Brands\BrandComponent::class)->name('brands');

    /* Special Routes for Categories  */

    Route::get('categories',\App\Http\Livewire\Admin\Categories\CategoryComponent::class)->name('categories');
    Route::get('categories/{id}',\App\Http\Livewire\Admin\Categories\CategoryComponent::class)->name('subcategories');


    Route::get('category/create',\App\Http\Livewire\Admin\Categories\Create::class)->name('category.create');
    Route::get('category/edit/{id}',\App\Http\Livewire\Admin\Categories\Edit::class)->name('category.edit');
    Route::get('category/trashed',\App\Http\Livewire\Admin\Categories\Trashed::class)->name('category.trashed');
    Route::get('category-filter/{category_id}',\App\Http\Livewire\Admin\Supports\CategoryFilter::class)->name('category.filter');
    Route::get('category-filter/criteries/{filter_id}',\App\Http\Livewire\Admin\Supports\CategoryFilterCriteries::class)->name('category.filter.criteries');
    Route::get('filters',\App\Http\Livewire\Admin\Filters\Create::class)->name('filters');
    Route::get('product-criteries/{product_id}',\App\Http\Livewire\Admin\Supports\ProductCriterias::class)->name('product.criteries');

    /* Special Routes for Products  */


    Route::get('product/trashed',\App\Http\Livewire\Admin\Products\Trashed::class)->name('product.trashed');
    Route::get('products',\App\Http\Livewire\Admin\Products\ProductComponent::class)->name('products');
    Route::get('product/create',\App\Http\Livewire\Admin\Products\Create::class)->name('product.create');
    Route::get('product/comments',\App\Http\Livewire\Admin\Products\CommentsComponent::class)->name('product.comment');
    Route::get('product/{id}',\App\Http\Livewire\Admin\Products\Show::class)->name('product.show');
    Route::get('product/edit/{id}',\App\Http\Livewire\Admin\Products\Edit::class)->name('product.edit');
    Route::get('size-criteries/{product_id}',\App\Http\Livewire\Admin\Supports\SizeCriteries::class)->name('size.criteries');


//    /* Special Routes for About us  */
//
//    Route::get('about-us',\App\Http\Livewire\Admin\AboutUs\AboutUsComponent::class)->name('abouts');
//    Route::get('about-us/{id}',\App\Http\Livewire\Admin\AboutUs\Edit::class)->name('abouts.edit');
//
//
    /* Special Routes for Pages  */

    Route::get('pages/',\App\Http\Livewire\Admin\Pages\PageComponent::class)->name('pages');
    Route::get('pages/{id}',\App\Http\Livewire\Admin\Pages\PageComponent::class)->name('subpages');
    Route::get('page/create/{position?}',\App\Http\Livewire\Admin\Pages\Create::class)->name('page.create');
    Route::get('page/edit/{id}',\App\Http\Livewire\Admin\Pages\Edit::class)->name('pages.edit');


    Route::get('trashed/{model}/{path}',\App\Http\Livewire\Admin\Supports\TrashedItems::class)->name('trashed');

    /* Special Routes for Stores  */

    Route::get('stores',\App\Http\Livewire\Admin\Stores\StoreComponent::class)->name('stores');

    /* Special Routes for Question and Answer  */

    Route::get('question-answer',\App\Http\Livewire\Admin\QuestionAnswer\QuestionAnswerComponent::class)->name('question.answer');


    /* Special Routes for Career  */

    Route::get('career',\App\Http\Livewire\Admin\Career\CareerComponent::class)->name('career');
    Route::get('career/create',\App\Http\Livewire\Admin\Career\Create::class)->name('career.create');

    Route::get('job-requests/{id}',\App\Http\Livewire\Admin\Career\Requests\JobRequestsComponent::class)->name('job.requests');

    /* Special Routes for Blog  */

    Route::get('blogs',\App\Http\Livewire\Admin\Blog\BlogsComponent::class)->name('blogs');
    Route::get('blog/create',\App\Http\Livewire\Admin\Blog\Create::class)->name('blog.create');
    Route::get('blog/edit/{url}',\App\Http\Livewire\Admin\Blog\Edit::class)->name('blog.edit');
    Route::get('blog/{url}',\App\Http\Livewire\Admin\Blog\Show::class)->name('blog.show');

    /* Special Routes for delivery  */

    Route::get('delivery-regions',\App\Http\Livewire\Admin\DeliveryRegions\DeliveryRegionComponent::class)->name('delivery-regions');
    Route::get('delivery-region/create',\App\Http\Livewire\Admin\DeliveryRegions\Create::class)->name('delivery-region.create');
    Route::get('delivery-region/edit/{url}', \App\Http\Livewire\Admin\DeliveryRegions\Edit::class)->name('delivery-region.edit');


    Route::get('delivery-cities/{id}', \App\Http\Livewire\Admin\DeliveryCities\DeliveryCitiesComponent::class)->name('delivery-cities');
    Route::get('delivery-cities/create/{id}',\App\Http\Livewire\Admin\DeliveryCities\Create::class)->name('delivery-cities.create');
    Route::get('delivery-cities/edit/{id}',\App\Http\Livewire\Admin\DeliveryCities\Edit::class)->name('delivery-cities.edit');

    /* Special Routes for bonus  */
    Route::get('bonus',\App\Http\Livewire\Admin\Bonus\BonusComponent::class)->name('bonus');
    Route::get('bonus/edit/{id}', \App\Http\Livewire\Admin\Bonus\Edit::class)->name('bonus.edit');


    /* Special Routes for Chat  */

    Route::get('chat', [\App\Http\Controllers\InboxController::class, 'index'])->name('chat.index');
    Route::get('chat/{id}', [\App\Http\Controllers\InboxController::class, 'show'])->name('chat.show');

    /* Special Route for image upload from CKEDITOR  */


});

/* Special Routes for Roles  */

Route::resource('roles',\App\Http\Controllers\Admin\RoleController::class);
