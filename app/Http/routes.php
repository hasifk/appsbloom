<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */



/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('clientadmin.signup');
    });


    Route::post('registerme', 'Auth\IndexController@register');


    Route::get('login', 'Auth\IndexController@login');
    Route::post('tologin', 'Auth\IndexController@tologin');
});


/* * ****************************************************************************************************************** */
Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('success', 'Auth\IndexController@success');
    //logout

    Route::get('logout', 'Auth\IndexController@logout');
    
    //Profile
    Route::get('profile', 'ClientDashboard\ProfileController@Profile');
    Route::post('client_save', 'ClientDashboard\ProfileController@ProfileSave');
    Route::get('profile-update', 'ClientDashboard\ProfileController@ProfileUpdate');
    Route::get('profile_delete', 'ClientDashboard\ProfileController@ProfileDelete');
    
    //Gallery
    Route::get('gallery', 'ClientDashboard\GalleryController@Gallery');
    Route::post('gallery_save', 'ClientDashboard\GalleryController@GallerySave');
    Route::get('gallery_delete', 'ClientDashboard\GalleryController@GalleryDelete');

    //FindUs
    Route::get('find-us', 'ClientDashboard\FindUsController@FindUs');
    Route::post('coordinates_save', 'ClientDashboard\FindUsController@CoordinatesSave');
    Route::get('findus_delete', 'ClientDashboard\FindUsController@FindusDelete');
    Route::get('findus_update/{id}', 'ClientDashboard\FindUsController@FindusUpdate');
    //PriceLists

    Route::get('price-list', 'ClientDashboard\PricelistController@PriceLists');
    Route::post('pricelists_save', 'ClientDashboard\PricelistController@PricelistSave');
    
    //News
    Route::get('news', 'ClientDashboard\NewsController@News');
    Route::post('news_save', 'ClientDashboard\NewsController@NewsSave');
    Route::get('news_delete', 'ClientDashboard\NewsController@NewsDelete');
    Route::get('update-news/{id}', 'ClientDashboard\NewsController@UpdateNews');
    
    //Rooms
    Route::get('rooms', 'ClientDashboard\RoomController@Room');
    Route::post('room_save', 'ClientDashboard\RoomController@RoomSave');
    Route::get('room_delete', 'ClientDashboard\RoomController@RoomDelete');
    Route::get('update-room/{id}', 'ClientDashboard\RoomController@UpdateRoom');
    
    //Coupons
    Route::get('coupons', 'ClientDashboard\CouponsController@Coupons');
    Route::post('coupon_save', 'ClientDashboard\CouponsController@CouponSave');
    Route::get('coupon_delete', 'ClientDashboard\CouponsController@CouponDelete');
    Route::get('update-coupons/{id}', 'ClientDashboard\CouponsController@UpdateCoupon');
    
    //Social
    Route::get('social', 'ClientDashboard\SocialController@Social');
    Route::post('social_save', 'ClientDashboard\SocialController@SocialSave');
    Route::get('social_delete', 'ClientDashboard\SocialController@SocialDelete');
    Route::get('update-social/{id}', 'ClientDashboard\SocialController@UpdateSocial');
    
    //Offers
    Route::get('offers', 'ClientDashboard\OffersController@Offers');
    Route::post('offer_save', 'ClientDashboard\OffersController@OfferSave');
    Route::get('offer_delete', 'ClientDashboard\OffersController@OfferDelete');
    Route::get('update-offer/{id}', 'ClientDashboard\OffersController@UpdateOffer');

    //Videos
    Route::get('videos', 'ClientDashboard\VideoController@Videos');
    Route::post('video_save', 'ClientDashboard\VideoController@VideoSave');
    Route::get('video_delete', 'ClientDashboard\VideoController@VideoDelete');
    Route::get('update-video/{id}', 'ClientDashboard\VideoController@UpdateVideo');

    //Messages
    Route::get('messages', 'ClientDashboard\MessagesController@Messages');
    Route::post('message_save', 'ClientDashboard\MessagesController@MessageSave');
    Route::get('message_delete', 'ClientDashboard\MessagesController@MessageDelete');
    Route::get('update-message/{id}', 'ClientDashboard\MessagesController@UpdateMessage');
    
    //Fanwall
    Route::get('fanwall', 'ClientDashboard\FanwallController@Fanwall');
    Route::get('fanwall_status', 'ClientDashboard\FanwallController@FanwallStatus');
    
     //FeedBack
    Route::get('feedback', 'ClientDashboard\FeedbackController@Feedbacks');
    Route::post('reply_save', 'ClientDashboard\FeedbackController@ReplySave');
    Route::get('feedback_status', 'ClientDashboard\FeedbackController@FeedbackStatus');
    
    //PushNotification
    Route::get('push-notification', 'ClientDashboard\PushNotificationController@Notifications');
    Route::post('reply_save', 'ClientDashboard\PushNotificationControllerController@NotificationSave');
    Route::get('notification_status', 'ClientDashboard\PushNotificationController@NotificationStatus');
    Route::get('update-notification/{id}', 'ClientDashboard\PushNotificationControllerController@UpdateNotification');
});
