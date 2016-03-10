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
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header('content-type: application/json; charset=utf-8');

Route::post('insertbooking/{id}', 'Api\ApiController@InsertBooking');

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('clientadmin.signup');
    });


    Route::post('registerme', 'Auth\IndexController@register');


    Route::get('login', 'Auth\IndexController@login');
    Route::post('tologin', 'Auth\IndexController@tologin');
    Route::get('api/{id}/{page}', 'Api\ApiController@Display');
    Route::post('insertfanwall/{id}', 'Api\ApiController@InsertFanwall');
    Route::post('insertfeedback/{id}', 'Api\ApiController@InsertFeedback');
});


/* * ****************************************************************************************************************** */
Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('success', 'Auth\IndexController@success');
    Route::get('clients/success', 'Auth\IndexController@success');
    
    
    
    Route::get('logout', 'Auth\IndexController@logout');
    /* Route::post('areainterest', 'Auth\IndexController@areainterest');
      Route::get('apptype', 'ClientDashboard\AppsController@apptype');
      Route::post('storeapptype', 'ClientDashboard\AppsController@storeapptype');
      Route::get('appinfo', 'ClientDashboard\AppsController@appinfo');
      Route::post('storeappinfo', 'ClientDashboard\AppsController@storeappinfo'); */

    //Home
    
    Route::get('home', 'ClientDashboard\HomeController@Home');
    Route::get('clients/home', 'ClientDashboard\HomeController@Home');
    Route::post('home_save', 'ClientDashboard\HomeController@HomeSave');
    //About

    Route::get('manageabout', 'ClientDashboard\AboutController@manageabout');
    Route::post('saveabout', 'ClientDashboard\AboutController@saveabout');

    Route::get('clients/manageabout', 'ClientDashboard\AboutController@manageabout');
    Route::post('clients/saveabout', 'ClientDashboard\AboutController@saveabout');

    //Services

    Route::get('manageservices', 'ClientDashboard\ServicesController@manageservices');
    Route::post('saveservice', 'ClientDashboard\ServicesController@saveservice');
    Route::get('editservice/{id}', 'ClientDashboard\ServicesController@editservice');
    Route::post('updateservice', 'ClientDashboard\ServicesController@updateservice');
    Route::get('deleteservice/{id}', 'ClientDashboard\ServicesController@deleteservice');

    Route::get('clients/manageservices', 'ClientDashboard\ServicesController@manageservices');
    Route::post('clients/saveservice', 'ClientDashboard\ServicesController@saveservice');
    Route::get('clients/editservice/{id}', 'ClientDashboard\ServicesController@editservice');
    Route::post('clients/updateservice', 'ClientDashboard\ServicesController@updateservice');
    Route::get('clients/deleteservice/{id}', 'ClientDashboard\ServicesController@deleteservice');

    //Contacts

    Route::get('managecontact', 'ClientDashboard\ContactController@managecontact');
    Route::post('savecontact', 'ClientDashboard\ContactController@savecontact');

    Route::get('clients/managecontact', 'ClientDashboard\ContactController@managecontact');
    Route::post('clients/savecontact', 'ClientDashboard\ContactController@savecontact');

    //Shedule

    Route::get('manageschedule', 'ClientDashboard\ScheduleController@manageschedule');
    Route::post('saveschedule', 'ClientDashboard\ScheduleController@saveschedule');

    Route::get('clients/manageschedule', 'ClientDashboard\ScheduleController@manageschedule');
    Route::post('clients/saveschedule', 'ClientDashboard\ScheduleController@saveschedule');

    //Loyality

    Route::get('manageloyalty', 'ClientDashboard\LoyaltyController@manageloyalty');
    Route::post('saveloyalty', 'ClientDashboard\LoyaltyController@saveloyalty');
    Route::get('editloyalty/{id}', 'ClientDashboard\LoyaltyController@editloyalty');
    Route::post('updateloyalty', 'ClientDashboard\LoyaltyController@updateloyalty');
    Route::get('deleteloyalty/{id}', 'ClientDashboard\LoyaltyController@deleteloyalty');

    Route::get('clients/manageloyalty', 'ClientDashboard\LoyaltyController@manageloyalty');
    Route::post('clients/saveloyalty', 'ClientDashboard\LoyaltyController@saveloyalty');
    Route::get('clients/editloyalty/{id}', 'ClientDashboard\LoyaltyController@editloyalty');
    Route::post('clients/updateloyalty', 'ClientDashboard\LoyaltyController@updateloyalty');
    Route::get('clients/deleteloyalty/{id}', 'ClientDashboard\LoyaltyController@deleteloyalty');

    //Events

    Route::get('manageevents', 'ClientDashboard\EventsController@manageevents');
    Route::post('saveevent', 'ClientDashboard\EventsController@saveevent');
    Route::get('editevent/{id}', 'ClientDashboard\EventsController@editevent');
    Route::post('updateevent', 'ClientDashboard\EventsController@updateevent');
    Route::get('deleteevent/{id}', 'ClientDashboard\EventsController@deleteevent');

    Route::get('clients/manageevents', 'ClientDashboard\EventsController@manageevents');
    Route::post('clients/saveevent', 'ClientDashboard\EventsController@saveevent');
    Route::get('clients/editevent/{id}', 'ClientDashboard\EventsController@editevent');
    Route::post('clients/updateevent', 'ClientDashboard\EventsController@updateevent');
    Route::get('clients/deleteevent/{id}', 'ClientDashboard\EventsController@deleteevent');

    //Langualges

    Route::get('managelanguages', 'ClientDashboard\LanguagesController@managelanguages');
    Route::post('savelanguage', 'ClientDashboard\LanguagesController@savelanguage');
    Route::get('editlanguage/{id}', 'ClientDashboard\LanguagesController@editlanguage');
    Route::post('updatelanguage', 'ClientDashboard\LanguagesController@updatelanguage');
    Route::get('deletelanguage/{id}', 'ClientDashboard\LanguagesController@deletelanguage');

    Route::get('clients/managelanguages', 'ClientDashboard\LanguagesController@managelanguages');
    Route::post('clients/savelanguage', 'ClientDashboard\LanguagesController@savelanguage');
    Route::get('clients/editlanguage/{id}', 'ClientDashboard\LanguagesController@editlanguage');
    Route::post('clients/updatelanguage', 'ClientDashboard\LanguagesController@updatelanguage');
    Route::get('clients/deletelanguage/{id}', 'ClientDashboard\LanguagesController@deletelanguage');

    //Language Keys

    Route::get('managelangkeys', 'ClientDashboard\LangkeyController@managelangkeys');
    Route::post('savelangkey', 'ClientDashboard\LangkeyController@savelangkey');
    Route::get('editlangkey/{id}', 'ClientDashboard\LangkeyController@editlangkey');
    Route::post('updatelangkey', 'ClientDashboard\LangkeyController@updatelangkey');
    Route::get('deletelangkey/{id}', 'ClientDashboard\LangkeyController@deletelangkey');

    Route::get('clients/managelangkeys', 'ClientDashboard\LangkeyController@managelangkeys');
    Route::post('clients/savelangkey', 'ClientDashboard\LangkeyController@savelangkey');
    Route::get('clients/editlangkey/{id}', 'ClientDashboard\LangkeyController@editlangkey');
    Route::post('clients/updatelangkey', 'ClientDashboard\LangkeyController@updatelangkey');
    Route::get('clients/deletelangkey/{id}', 'ClientDashboard\LangkeyController@deletelangkey');

    //Analytics
    Route::get('manageanalytics', 'ClientDashboard\AnalyticsController@manageanalytics');
    Route::get('clients/manageanalytics', 'ClientDashboard\AnalyticsController@manageanalytics');

    //Profile
    Route::get('profile', 'ClientDashboard\ProfileController@Profile');
    Route::post('client_save', 'ClientDashboard\ProfileController@ProfileSave');
    Route::get('profile-update', 'ClientDashboard\ProfileController@ProfileUpdate');
    Route::get('profile_delete', 'ClientDashboard\ProfileController@ProfileDelete');

    Route::get('clients/profile', 'ClientDashboard\ProfileController@Profile');
    Route::post('clients/client_save', 'ClientDashboard\ProfileController@ProfileSave');
    Route::get('clients/profile-update', 'ClientDashboard\ProfileController@ProfileUpdate');
    Route::get('clients/profile_delete', 'ClientDashboard\ProfileController@ProfileDelete');

    //Gallery
    Route::get('gallery', 'ClientDashboard\GalleryController@Gallery');
    Route::post('gallery_save', 'ClientDashboard\GalleryController@GallerySave');
    Route::get('gallery_delete', 'ClientDashboard\GalleryController@GalleryDelete');

    Route::get('clients/gallery', 'ClientDashboard\GalleryController@Gallery');
    Route::post('clients/gallery_save', 'ClientDashboard\GalleryController@GallerySave');
    Route::get('clients/gallery_delete', 'ClientDashboard\GalleryController@GalleryDelete');

    //FindUs
    Route::get('find-us', 'ClientDashboard\FindUsController@FindUs');
    Route::post('coordinates_save', 'ClientDashboard\FindUsController@CoordinatesSave');
    Route::get('findus_delete', 'ClientDashboard\FindUsController@FindusDelete');
    Route::get('findus_update/{id}', 'ClientDashboard\FindUsController@FindusUpdate');

    Route::get('clients/find-us', 'ClientDashboard\FindUsController@FindUs');
    Route::post('clients/coordinates_save', 'ClientDashboard\FindUsController@CoordinatesSave');
    Route::get('clients/findus_delete', 'ClientDashboard\FindUsController@FindusDelete');
    Route::get('clients/findus_update/{id}', 'ClientDashboard\FindUsController@FindusUpdate');

    //PriceLists
    Route::get('price-list', 'ClientDashboard\PricelistController@PriceLists');
    Route::post('pricelists_save', 'ClientDashboard\PricelistController@PricelistSave');

    Route::get('clients/price-list', 'ClientDashboard\PricelistController@PriceLists');
    Route::post('clients/pricelists_save', 'ClientDashboard\PricelistController@PricelistSave');

    //News
    Route::get('news', 'ClientDashboard\NewsController@News');
    Route::post('news_save', 'ClientDashboard\NewsController@NewsSave');
    Route::get('news_delete', 'ClientDashboard\NewsController@NewsDelete');
    Route::get('update-news/{id}', 'ClientDashboard\NewsController@UpdateNews');

    Route::get('clients/news', 'ClientDashboard\NewsController@News');
    Route::post('clients/news_save', 'ClientDashboard\NewsController@NewsSave');
    Route::get('clients/news_delete', 'ClientDashboard\NewsController@NewsDelete');
    Route::get('clients/update-news/{id}', 'ClientDashboard\NewsController@UpdateNews');

    //Rooms
    Route::get('rooms', 'ClientDashboard\RoomController@Room');
    Route::post('room_save', 'ClientDashboard\RoomController@RoomSave');
    Route::get('room_delete', 'ClientDashboard\RoomController@RoomDelete');
    Route::get('update-room/{id}', 'ClientDashboard\RoomController@UpdateRoom');

    Route::get('clients/rooms', 'ClientDashboard\RoomController@Room');
    Route::post('clients/room_save', 'ClientDashboard\RoomController@RoomSave');
    Route::get('clients/room_delete', 'ClientDashboard\RoomController@RoomDelete');
    Route::get('clients/update-room/{id}', 'ClientDashboard\RoomController@UpdateRoom');

    //Booking
    Route::get('booking', 'ClientDashboard\BookingController@Booking');
    Route::get('booking/{id}', 'ClientDashboard\BookingController@Bookings');
    //oute::post('booking_save', 'ClientDashboard\BookingController@BookingSave');
    Route::get('booking_delete', 'ClientDashboard\BookingController@BookingDelete');
    Route::get('booking_status', 'ClientDashboard\BookingController@BookingStatus');

    Route::get('clients/booking', 'ClientDashboard\BookingController@Booking');
    Route::get('clients/booking/{id}', 'ClientDashboard\BookingController@Bookings');
    //oute::post('booking_save', 'ClientDashboard\BookingController@BookingSave');
    Route::get('clients/booking_delete', 'ClientDashboard\BookingController@BookingDelete');
    Route::get('clients/booking_status', 'ClientDashboard\BookingController@BookingStatus');

    //Coupons
    Route::get('coupons', 'ClientDashboard\CouponsController@Coupons');
    Route::post('coupon_save', 'ClientDashboard\CouponsController@CouponSave');
    Route::get('coupon_delete', 'ClientDashboard\CouponsController@CouponDelete');
    Route::get('update-coupons/{id}', 'ClientDashboard\CouponsController@UpdateCoupon');

    Route::get('clients/coupons', 'ClientDashboard\CouponsController@Coupons');
    Route::post('clients/coupon_save', 'ClientDashboard\CouponsController@CouponSave');
    Route::get('clients/coupon_delete', 'ClientDashboard\CouponsController@CouponDelete');
    Route::get('clients/update-coupons/{id}', 'ClientDashboard\CouponsController@UpdateCoupon');

    //Social
    Route::get('social', 'ClientDashboard\SocialController@Social');
    Route::post('social_save', 'ClientDashboard\SocialController@SocialSave');
    Route::get('social_delete', 'ClientDashboard\SocialController@SocialDelete');
    Route::get('update-social/{id}', 'ClientDashboard\SocialController@UpdateSocial');

    Route::get('clients/social', 'ClientDashboard\SocialController@Social');
    Route::post('clients/social_save', 'ClientDashboard\SocialController@SocialSave');
    Route::get('clients/social_delete', 'ClientDashboard\SocialController@SocialDelete');
    Route::get('clients/update-social/{id}', 'ClientDashboard\SocialController@UpdateSocial');

    //Offers
    Route::get('offers', 'ClientDashboard\OffersController@Offers');
    Route::post('offer_save', 'ClientDashboard\OffersController@OfferSave');
    Route::get('offer_delete', 'ClientDashboard\OffersController@OfferDelete');
    Route::get('update-offer/{id}', 'ClientDashboard\OffersController@UpdateOffer');

    Route::get('clients/offers', 'ClientDashboard\OffersController@Offers');
    Route::post('clients/offer_save', 'ClientDashboard\OffersController@OfferSave');
    Route::get('clients/offer_delete', 'ClientDashboard\OffersController@OfferDelete');
    Route::get('clients/update-offer/{id}', 'ClientDashboard\OffersController@UpdateOffer');

    //Videos
    Route::get('videos', 'ClientDashboard\VideoController@Videos');
    Route::post('video_save', 'ClientDashboard\VideoController@VideoSave');
    Route::get('video_delete', 'ClientDashboard\VideoController@VideoDelete');
    Route::get('update-video/{id}', 'ClientDashboard\VideoController@UpdateVideo');

    Route::get('clients/videos', 'ClientDashboard\VideoController@Videos');
    Route::post('clients/video_save', 'ClientDashboard\VideoController@VideoSave');
    Route::get('clients/video_delete', 'ClientDashboard\VideoController@VideoDelete');
    Route::get('clients/update-video/{id}', 'ClientDashboard\VideoController@UpdateVideo');

    //Messages
    Route::get('messages', 'ClientDashboard\MessagesController@Messages');
    Route::post('message_save', 'ClientDashboard\MessagesController@MessageSave');
    Route::get('message_delete', 'ClientDashboard\MessagesController@MessageDelete');
    Route::get('update-message/{id}', 'ClientDashboard\MessagesController@UpdateMessage');

    Route::get('clients/messages', 'ClientDashboard\MessagesController@Messages');
    Route::post('clients/message_save', 'ClientDashboard\MessagesController@MessageSave');
    Route::get('clients/message_delete', 'ClientDashboard\MessagesController@MessageDelete');
    Route::get('clients/update-message/{id}', 'ClientDashboard\MessagesController@UpdateMessage');

    //Fanwall
    Route::get('fanwall', 'ClientDashboard\FanwallController@Fanwall');
    Route::get('fanwall_status', 'ClientDashboard\FanwallController@FanwallStatus');

    Route::get('clients/fanwall', 'ClientDashboard\FanwallController@Fanwall');
    Route::get('clients/fanwall_status', 'ClientDashboard\FanwallController@FanwallStatus');

    //FeedBack
    Route::get('feedback', 'ClientDashboard\FeedbackController@Feedbacks');
    Route::post('reply_save', 'ClientDashboard\FeedbackController@ReplySave');
    Route::get('feedback_status', 'ClientDashboard\FeedbackController@FeedbackStatus');

    Route::get('clients/feedback', 'ClientDashboard\FeedbackController@Feedbacks');
    Route::post('clients/reply_save', 'ClientDashboard\FeedbackController@ReplySave');
    Route::get('clients/feedback_status', 'ClientDashboard\FeedbackController@FeedbackStatus');

    //PushNotification
    Route::get('push-notification', 'ClientDashboard\PushNotificationController@Notifications');
    Route::post('notification_save', 'ClientDashboard\PushNotificationControllerController@NotificationSave');
    Route::get('notification_status', 'ClientDashboard\PushNotificationController@NotificationStatus');
    Route::get('update-notification/{id}', 'ClientDashboard\PushNotificationControllerController@UpdateNotification');

    Route::get('clients/push-notification', 'ClientDashboard\PushNotificationController@Notifications');
    Route::post('clients/notification_save', 'ClientDashboard\PushNotificationControllerController@NotificationSave');
    Route::get('clients/notification_status', 'ClientDashboard\PushNotificationController@NotificationStatus');
    Route::get('clients/update-notification/{id}', 'ClientDashboard\PushNotificationControllerController@UpdateNotification');

    //Our Teams
    Route::get('our-teams', 'ClientDashboard\OurTeamsController@Teams');
    Route::get('our-teams/{id}', 'ClientDashboard\OurTeamsController@TeamsMore');
    Route::post('ourteam_save', 'ClientDashboard\OurTeamsController@TeamsSave');
    Route::get('ourteam_status', 'ClientDashboard\OurTeamsController@TeamsStatus');
    Route::get('update-ourteam/{id}', 'ClientDashboard\OurTeamsController@UpdateTeams');

    Route::get('clients/our-teams', 'ClientDashboard\OurTeamsController@Teams');
    Route::get('clients/our-teams/{id}', 'ClientDashboard\OurTeamsController@TeamsMore');
    Route::post('clients/ourteam_save', 'ClientDashboard\OurTeamsController@TeamsSave');
    Route::get('clients/ourteam_status', 'ClientDashboard\OurTeamsController@TeamsStatus');
    Route::get('clients/update-ourteam/{id}', 'ClientDashboard\OurTeamsController@UpdateTeams');

    //sorting
    Route::get('sorting', 'ClientDashboard\SortingController@Sorting');

    Route::get('clients/sorting', 'ClientDashboard\SortingController@Sorting');
});

Route::group(['middleware' => ['web', 'auth', 'userroles']], function () {
    
});
