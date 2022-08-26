<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('test',function (){

//  \Illuminate\Support\Facades\Artisan::call('config:cache');
//  \Illuminate\Support\Facades\Artisan::call('config:clear');
//  \Illuminate\Support\Facades\Artisan::call('vendor:publish --force');
\Illuminate\Support\Facades\Artisan::call('optimize:clear');
//    \Illuminate\Support\Facades\DB::table('fast_orders')->update(['seen' => false]);

});



/* Special for Migration fresh  */

//Route::get('fresh',function (){
//    \Illuminate\Support\Facades\Session::flush();
//    \Illuminate\Support\Facades\Artisan::call('migrate:fresh');
//    \Illuminate\Support\Facades\Artisan::call('db:seed');
//    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
//});

/* Special for Auth Routes  */

Auth::routes(['verify' => true]);


/* Special Routes for Frontend Page with Localization */


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect']],function() {

    /* Special Route for Livewire with Localization routes fix  */

    Route::post('livewire/message/{name}', '\Livewire\Controllers\HttpConnectionHandler');

    /* Special Routes for Socialite  */

    Route::get('auth/facebook', [\App\Http\Controllers\Auth\SocialController::class, 'facebookRedirect'])->name('auth.facebook');
    Route::get('auth/facebook/callback', [\App\Http\Controllers\Auth\SocialController::class, 'loginWithFacebook']);

    Route::get('auth/google', [\App\Http\Controllers\Auth\SocialController::class,'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [\App\Http\Controllers\Auth\SocialController::class,'handleGoogleCallback']);

    Route::get('auth/twitter', [\App\Http\Controllers\Auth\SocialController::class,'redirectToTwitter'])->name('auth.twitter');
    Route::get('auth/twitter/callback', [\App\Http\Controllers\Auth\SocialController::class,'handleTwitterCallback']);

    /* Special Routes for Users Cabinet  */

    Route::prefix('cabinet')->middleware(['auth','verified'])->group(function() {

        /* Special Routes for Registered Users  */

        Route::get('settings',\App\Http\Livewire\Frontend\Cabinet\SettingsComponent::class)->name('cabinet.settings');
        Route::get('change-password',\App\Http\Livewire\Frontend\Cabinet\PasswordChangeComponent::class)->name('cabinet.password.change');
        Route::get('cart',\App\Http\Livewire\Frontend\Cabinet\CartComponent::class)->name('cabinet.cart');
        Route::get('purchasing-archive',\App\Http\Livewire\Frontend\Cabinet\PurchasingArchive::class)->name('cabinet.purchasing.archive');
        Route::get('bonus-card',\App\Http\Livewire\Frontend\Cabinet\BonusCardComponent::class)->name('cabinet.bonus-card');
        Route::post('bonus/addCard',[\App\Http\Livewire\Frontend\Cabinet\BonusCardComponent::class,'addCard'])->name('bonus.addCard');
        Route::get('ongoing-purchases',\App\Http\Livewire\Frontend\Cabinet\OngoingPurchases::class)->name('cabinet.ongoing.purchases');
        Route::get('wishlist',\App\Http\Livewire\Frontend\Cabinet\FavoriteProductsComponent::class)->name('cabinet.wishlist');

        /* Special Routes for Payment methods  */

    });

    Route::get('payments/idram/success', [\App\Http\Controllers\Frontend\IdramController::class,'success'])->name('payment.idram.success');
    Route::get('payments/idram/failed', [\App\Http\Controllers\Frontend\IdramController::class,'failed'])->name('payment.idram.failed');
    Route::post('payments/idram/result', [\App\Http\Controllers\Frontend\IdramController::class,'result'])->name('payment.idram.result');

    Route::post('place-order', \App\Http\Controllers\Frontend\PaymentController::class)->name('place.order');
    Route::get('payment/arca/result',\App\Http\Controllers\Frontend\ArcaController::class)->name('arca.result');
    /* User realtime chat routes */

    Route::get('/inbox', [\App\Http\Controllers\InboxController::class, 'index'])->name('inbox.index');
    Route::get('/inbox/{id}', [\App\Http\Controllers\InboxController::class, 'show'])->name('inbox.show');

    /* Special routes for Static Pages */

    Route::get('/',\App\Http\Livewire\Frontend\Pages\HomeComponent::class)->name('home');
    Route::post('search',\App\Http\Livewire\Frontend\Pages\Static\SearchComponent::class)->name('search.result');
    Route::get('contacts',\App\Http\Livewire\Frontend\Pages\Static\ContactComponent::class)->name('contact');
    Route::get('collection',\App\Http\Livewire\Frontend\Pages\Static\CollectionComponent::class)->name('collection');
    Route::get('discounts',\App\Http\Livewire\Frontend\Pages\Static\DiscountComponent::class)->name('discount');
    Route::get('vacancy/{id}',\App\Http\Livewire\Frontend\Pages\Static\VacancyDetailsComponent::class)->name('vacancy.details');
    Route::get('blog/{url?}',\App\Http\Livewire\Frontend\Pages\Static\BlogDetailsComponent::class)->name('blog.details');
    Route::get('/{url?}', \App\Http\Livewire\Frontend\Pages\PageManager::class)->where('url', implode('|',\App\Models\Page::pluck('url')->toArray()))->name('page');

    Route::get('collection/{url?}',\App\Http\Livewire\Frontend\Pages\Static\BrandComponent::class)->name('collection.details');
    /* Specific Routes for shop Pages' */

    Route::get('compare-product',\App\Http\Livewire\Frontend\Shop\CompareProductComponent::class)->name('compare.product');
    Route::get('/product/{slug}', [\App\Http\Controllers\Frontend\CategoryProductController::class,'product'])->name('product');
    Route::get('wishlist',\App\Http\Livewire\Frontend\Shop\WishlistComponent::class)->name('favorite.products');
    /* Special routes for Categories */

    Route::get('/{category:slug}/{childCategory:slug?}/{childCategory2?}/{lastCategory?}', [\App\Http\Controllers\Frontend\CategoryProductController::class,'category'])->name('category');

});



