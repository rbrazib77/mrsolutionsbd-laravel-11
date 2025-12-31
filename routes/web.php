<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\{BannerSectionController,OurServiceSectionController,SettingController,SocialMediaController,VisitorController,AdminLoginHistoryController,ContactMessageController,WorkingPhotoCategoryController,WorkingPhotoController,WorkingVideoController,ClientController,AboutSectionController,WhyChooseUsController,OurMissionController,OurVisionController,ActivityForCustomerController,FaqController,SeoSettingController,PrivacyPolicyController,MenuController};

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Frontend\FrontendController;

use Illuminate\Support\Facades\Route;



Route::middleware(['web'])->group(function () {
     Route::get('/', [FrontendController::class, 'index'])->name('/');
     Route::get('/about-us', [FrontendController::class, 'about'])->name('about');
     Route::get('/services', [FrontendController::class, 'services'])->name('services');
     Route::get('/gallery', [FrontendController::class, 'gallery'])->name('gallery');
     Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact');
     Route::post('/contact/message', [ContactMessageController::class, 'submit'])->name('contact.message.submit');
     Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
     Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy.policy');
});


Route::prefix('admin')->middleware(['auth', 'verified'])->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin login Routes
Route::prefix('admin')->name('admin.')->middleware('guest')->group(function () {
    Route::get('/solutions/sk/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/solutions/sk/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::get('/sk/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/sk/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');


});

//Admin Logout Route
 Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

//Admin Profile Routes
Route::prefix('admin')->middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('profile.store');
    Route::post('/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');
    Route::get('/user/list', [AdminController::class, 'UserList'])->name('admin.user.list');
    Route::get('/new/user', [AdminController::class, 'NewUser'])->name('new.user');
    Route::post('/new/user/create', [AdminController::class, 'NewUserCreate'])->name('new.user.create');
    Route::get('/users/destroy/{id}', [AdminController::class, 'destroy'])->name('user.destroy');
});

//Menus Routes
Route::prefix('admin/menu')->middleware(['auth'])->group(function () {
    Route::get('index', [MenuController::class, 'MenuIndex'])->name('admin.menu.index');
    Route::get('create', [MenuController::class, 'MenuCreate'])->name('admin.menu.create');
    Route::post('store', [MenuController::class, 'MenuStore'])->name('admin.menu.store');
    Route::post('update/{id}', [MenuController::class, 'MenuUpdate'])->name('admin.menu.update');
    Route::get('destroy/{id}', [MenuController::class, 'MenuDelete'])->name('admin.menu.destroy');
    Route::get('active-deactive/{id}', [MenuController::class, 'toggleMenu'])->name('admin.menu.active.deactive');
});


//Banner Section Routes
Route::prefix('admin/banner')->middleware(['auth'])->group(function () {
    Route::get('index', [BannerSectionController::class, 'BannerIndex'])->name('admin.banner.index');
    Route::get('create', [BannerSectionController::class, 'BannerCreate'])->name('admin.banner.create');
    Route::post('store', [BannerSectionController::class, 'BannerStore'])->name('admin.banner.store');
    Route::post('update/{id}', [BannerSectionController::class, 'BannerUpdate'])->name('admin.banner.update');
    Route::get('destroy/{id}', [BannerSectionController::class, 'BannerDelete'])->name('admin.banner.destroy');
    Route::get('active-deactive/{id}', [BannerSectionController::class, 'toggleBannerSection'])->name('admin.banner.active.deactive');
});


//Website Setting  Routes
Route::prefix('admin/setting')->middleware(['auth'])->group(function () {
    Route::get('website/index', [SettingController::class, 'WebsiteIndex'])->name('admin.website.index');
    Route::post('website/update/{id}', [SettingController::class, 'WebsiteUpdate'])->name('admin.website.update');
});

//Social Media  Routes
Route::prefix('admin/social/media')->middleware(['auth'])->group(function () {
    Route::get('index', [SocialMediaController::class, 'SocialMediaIndex'])->name('admin.social.media.index');
    Route::get('create', [SocialMediaController::class, 'SocialMediaCreate'])->name('admin.social.media.create');
    Route::post('store', [SocialMediaController::class, 'SocialMediaStore'])->name('admin.social.media.store');
     Route::post('update/{id}', [SocialMediaController::class, 'SocialMediaUpdate'])->name('admin.social.media.update');
    Route::get('destroy/{id}', [SocialMediaController::class, 'SocialMediaDelete'])->name('admin.social.media.destroy');
    Route::get('active-deactive/{id}', [SocialMediaController::class, 'toggleSocialMedia'])->name('admin.social.media.active.deactive');
});

//Visitors Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/user-activity/list', [VisitorController::class, 'index'])->name('admin.user-activity.index');
     Route::get('/user-activity/{id}', [VisitorController::class, 'destroy'])->name('admin.user-activity.destroy');
});

//Admin Login-Logout Histories Routes
Route::prefix('admin/login-logout')->middleware(['auth'])->group(function () {
    Route::get('/histories', [AdminLoginHistoryController::class, 'index'])->name('admin.histories.index');
    Route::get('/histories/destroy/{id}', [AdminLoginHistoryController::class, 'destroy'])->name('admin.histories.destroy');
});

//contact Message Routes
Route::prefix('admin/contact/message')->middleware(['auth'])->group(function () {
   Route::get('index', [ContactMessageController::class, 'index'])->name('contact.message.index');
  Route::get('details/{id}', [ContactMessageController::class, 'details'])->name('contact.message.details');
 Route::get('destroy/{id}', [ContactMessageController::class, 'destroy'])->name('contact.message.destroy');

});

//Our Services Section Routes
Route::prefix('admin/our-service/section')->middleware(['auth'])->group(function () {
    Route::get('index', [OurServiceSectionController::class, 'index'])->name('admin.our.service.index');
    Route::get('create', [OurServiceSectionController::class, 'create'])->name('admin.our.service.create');
    Route::post('store', [OurServiceSectionController::class, 'store'])->name('admin.our.service.store');
    Route::post('update/{id}', [OurServiceSectionController::class, 'update'])->name('admin.our.service.update');
    Route::get('destroy/{id}', [OurServiceSectionController::class, 'destroy'])->name('admin.our.service.destroy');
    Route::get('details/{id}', [OurServiceSectionController::class, 'details'])->name('admin.our.service.details');
    Route::get('active-deactive/{id}', [OurServiceSectionController::class, 'toggleActiveDeactive'])->name('admin.our.service.active.deactive');
});


//Working Photo Category Button  Routes
Route::prefix('admin/working-photo-category/section')->middleware(['auth'])->group(function () {
    Route::get('index', [WorkingPhotoCategoryController::class, 'index'])->name('admin.category.index');
    Route::get('create', [WorkingPhotoCategoryController::class, 'create'])->name('admin.category.create');
    Route::post('store', [WorkingPhotoCategoryController::class, 'store'])->name('admin.category.store');
    Route::post('update/{id}', [WorkingPhotoCategoryController::class, 'update'])->name('admin.category.update');
    Route::get('destroy/{id}', [WorkingPhotoCategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::get('active-deactive/{id}', [WorkingPhotoCategoryController::class, 'toggleActiveDeactive'])->name('admin.category.active.deactive');
});

//Working Photo  Routes
Route::prefix('admin/working-photo/section')->middleware(['auth'])->group(function () {
    Route::get('index', [WorkingPhotoController::class, 'index'])->name('admin.working-photo.index');
    Route::get('create', [WorkingPhotoController::class, 'create'])->name('admin.working-photo.create');
    Route::post('store', [WorkingPhotoController::class, 'store'])->name('admin.working-photo.store');
    Route::post('update/{id}', [WorkingPhotoController::class, 'update'])->name('admin.working-photo.update');
    Route::get('destroy/{id}', [WorkingPhotoController::class, 'destroy'])->name('admin.working-photo.destroy');
    Route::get('active-deactive/{id}', [WorkingPhotoController::class, 'toggleActiveDeactive'])->name('admin.working-photo.active.deactive');
});

//Working Videos  Routes
Route::prefix('admin/working-videos/section')->middleware(['auth'])->group(function () {
    Route::get('index', [WorkingVideoController::class, 'index'])->name('admin.working-video.index');
    Route::get('create', [WorkingVideoController::class, 'create'])->name('admin.working-video.create');
    Route::post('store', [WorkingVideoController::class, 'store'])->name('admin.working-video.store');
    Route::post('update/{id}', [WorkingVideoController::class, 'update'])->name('admin.working-video.update');
    Route::get('destroy/{id}', [WorkingVideoController::class, 'destroy'])->name('admin.working-video.destroy');
    Route::get('active-deactive/{id}', [WorkingVideoController::class, 'toggleActiveDeactive'])->name('admin.working-video.active.deactive');
});

//Clients Routes
Route::prefix('admin/client/section')->middleware(['auth'])->group(function () {
    Route::get('index', [ClientController::class, 'index'])->name('admin.client.index');
    Route::get('create', [ClientController::class, 'create'])->name('admin.client.create');
    Route::post('store', [ClientController::class, 'store'])->name('admin.client.store');
    Route::post('update/{id}', [ClientController::class, 'update'])->name('admin.client.update');
    Route::get('destroy/{id}', [ClientController::class, 'destroy'])->name('admin.client.destroy');
    Route::get('active-deactive/{id}', [ClientController::class, 'toggleActiveDeactive'])->name('admin.client.active.deactive');
});

//About Section Routes
Route::prefix('admin/about-section')->middleware(['auth'])->group(function () {
    Route::get('index', [AboutSectionController::class, 'index'])->name('admin.about-section.index');
    Route::post('update/{id}', [AboutSectionController::class, 'update'])->name('admin.about-section.update');
});


//Why-choose-us Section Routes
Route::prefix('admin/why-choose-us-section')->middleware(['auth'])->group(function () {
    Route::get('heading', [WhyChooseUsController::class, 'HeadingIndex'])->name('admin.why-choose-us.heading');
    Route::post('heading/update/{id}', [WhyChooseUsController::class, 'HeadingUpdate'])->name('admin.why-choose-us.heading.update');
    Route::get('index', [WhyChooseUsController::class, 'index'])->name('admin.why-choose-us.index');
    Route::get('create', [WhyChooseUsController::class, 'create'])->name('admin.why-choose-us.create');
    Route::post('store', [WhyChooseUsController::class, 'store'])->name('admin.why-choose-us.store');
    Route::post('update/{id}', [WhyChooseUsController::class, 'update'])->name('admin.why-choose-us.update');
    Route::get('destroy/{id}', [WhyChooseUsController::class, 'destroy'])->name('admin.why-choose-us.destroy');
    Route::get('details/{id}', [WhyChooseUsController::class, 'details'])->name('admin.why-choose-us.details');
    Route::get('active-deactive/{id}', [WhyChooseUsController::class, 'toggleActiveDeactive'])->name('admin.why-choose-us.active.deactive');
});

//Our Mission Section Routes
Route::prefix('admin/our-mission-section')->middleware(['auth'])->group(function () {
    Route::get('index', [OurMissionController::class, 'index'])->name('admin.our-mission.index');
    Route::post('update/{id}', [OurMissionController::class, 'update'])->name('admin.our-mission.update');
});

//Our Vision Section Routes
Route::prefix('admin/our-vision-section')->middleware(['auth'])->group(function () {
    Route::get('index', [OurVisionController::class, 'index'])->name('admin.our-vision.index');
    Route::post('update/{id}', [OurVisionController::class, 'update'])->name('admin.our-vision.update');
});

//Activity For Customer Section Routes
Route::prefix('admin/activity-section')->middleware(['auth'])->group(function () {
    Route::get('index', [ActivityForCustomerController::class, 'index'])->name('admin.activity.index');
    Route::get('create', [ActivityForCustomerController::class, 'create'])->name('admin.activity.create');
    Route::post('store', [ActivityForCustomerController::class, 'store'])->name('admin.activity.store');
    Route::post('update/{id}', [ActivityForCustomerController::class, 'update'])->name('admin.activity.update');
    Route::get('destroy/{id}', [ActivityForCustomerController::class, 'destroy'])->name('admin.activity.destroy');
    Route::get('details/{id}', [ActivityForCustomerController::class, 'details'])->name('admin.activity.details');
    Route::get('active-deactive/{id}', [ActivityForCustomerController::class, 'toggleActiveDeactive'])->name('admin.activity.active.deactive');
});

// Faq Section Routes
Route::prefix('admin/faq')->middleware(['auth'])->group(function () {
    Route::get('index', [FaqController::class, 'index'])->name('admin.faq.index');
    Route::get('create', [FaqController::class, 'create'])->name('admin.faq.create');
    Route::post('store', [FaqController::class, 'store'])->name('admin.faq.store');
    Route::post('update/{id}', [FaqController::class, 'update'])->name('admin.faq.update');
    Route::get('destroy/{id}', [FaqController::class, 'destroy'])->name('admin.faq.destroy');
    Route::get('details/{id}', [FaqController::class, 'details'])->name('admin.faq.details');
    Route::get('active-deactive/{id}', [FaqController::class, 'toggleActiveDeactive'])->name('admin.faq.active.deactive');
});


// Seo Setting Routes
Route::prefix('admin/seo-setting')->middleware(['auth'])->group(function () {
    Route::get('index', [SeoSettingController::class, 'index'])->name('admin.seo.index');
    Route::post('update/{id}', [SeoSettingController::class, 'update'])->name('admin.seo.update');
});
 

//Privacy Policy Routes
Route::prefix('admin/privacy-policy')->middleware(['auth'])->group(function () {
    Route::get('index', [PrivacyPolicyController::class, 'index'])->name('admin.privacy-policy.index');
    Route::get('create', [PrivacyPolicyController::class, 'create'])->name('admin.privacy-policy.create');
    Route::post('store', [PrivacyPolicyController::class, 'store'])->name('admin.privacy-policy.store');
    Route::post('update/{id}', [PrivacyPolicyController::class, 'update'])->name('admin.privacy-policy.update');
    Route::get('destroy/{id}', [PrivacyPolicyController::class, 'destroy'])->name('admin.privacy-policy.destroy');
    Route::get('details/{id}', [PrivacyPolicyController::class, 'details'])->name('admin.privacy-policy.details');
    Route::get('active-deactive/{id}', [PrivacyPolicyController::class, 'toggleActiveDeactive'])->name('admin.privacy-policy.active.deactive');
});



Route::fallback(function () {
    abort(404);
});









