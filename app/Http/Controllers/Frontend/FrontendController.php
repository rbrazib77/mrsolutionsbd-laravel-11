<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerSection;
use App\Models\WorkingPhotoCategory;
use App\Models\WorkingPhoto;
use App\Models\WebsiteSetting;
use App\Models\OurServiceSection;
use App\Models\WorkingVideo;
use App\Models\Client;
use App\Models\AboutSection;
use App\Models\WhyChooseUsFeature;
use App\Models\WhyChooseUsSection;
use App\Models\OurMission;
use App\Models\OurVision;
use App\Models\ActivityForCustomer;
use App\Models\Faq;
use App\Models\PrivacyPolicy;



class FrontendController extends Controller
{
    public function index(){
        $pageName = 'home';
        $banner = BannerSection::where('status', 1)->orderBy('order', 'asc')->get();
        $setting =WebsiteSetting::first();
        $ourServices=OurServiceSection::where('status', 1)->limit(6)->orderBy('sort_order')->get();
        $totalServices = OurServiceSection::where('status', 1)->count();
        $workingPhotoCategory=WorkingPhotoCategory::where('status', true)->orderBy('sort_order')->get();
        $workingPhoto=WorkingPhoto::where('status', true)->orderBy('sort_order')->get();
        $videos=WorkingVideo::where('status', 1)->orderBy('sort_order')->get();
        $clients = Client::where('status', 1)->orderBy('sort_order', 'asc')->get();
         return view("frontend.index",compact('banner','workingPhotoCategory','workingPhoto','setting','ourServices','totalServices','videos','clients','pageName'));
    }

    public function about(){
        $pageName = 'about';
        $pageTitle = "About Us";
        $about =AboutSection::where('status', 1)->first();
        $whyChooseUsHeading =WhyChooseUsSection::first();
        $whyChooseUsFeature=WhyChooseUsFeature::where('status', 1)->orderBy('sort_order')->get();
        $mission =OurMission::where('status', 1)->first();
        $vision =OurVision::where('status', 1)->first();
        $clients = Client::where('status', 1)->orderBy('sort_order', 'asc')->get();
        return view('frontend.about',compact('pageTitle','whyChooseUsFeature','whyChooseUsHeading','about','mission','vision','clients','pageName'));
    }
    public function services(){
        $pageName = 'services';
        $pageTitle = "Services";
        $ourServices=OurServiceSection::where('status', 1)->orderBy('sort_order')->get();
        $activitys=ActivityForCustomer::where('status', 1)->orderBy('sort_order')->get();
        return view('frontend.services',compact('pageTitle','ourServices','activitys','pageName'));
    }

    public function gallery(){
        $pageName = 'gallery';
        $pageTitle = "Gallery";
        $workingPhotoCategory=WorkingPhotoCategory::where('status', true)->orderBy('sort_order')->get();
        $workingPhoto=WorkingPhoto::where('status', true)->orderBy('sort_order')->get();
        $videos=WorkingVideo::where('status', 1)->orderBy('sort_order')->get();
        return view('frontend.gallery',compact('pageTitle','workingPhotoCategory','workingPhoto','videos','pageName'));
    }
   
    
    public function contact(){
         $pageName = 'contact';
         $pageTitle = "Contact Us";
         $setting =WebsiteSetting::first();
        return view('frontend.contact',compact('pageTitle','setting','pageName'));
    }

      public function faq(){
         $pageName = 'faq';
         $pageTitle = "FAQ";
         $faqs=Faq::where('status', 1)->orderBy('sort_order')->get();
        return view('frontend.faq',compact('pageTitle','faqs','pageName'));
    }

     public function privacyPolicy(){
         $pageName = 'privacy-policy';
         $pageTitle = "Privacy Policy";
         $privacy=PrivacyPolicy::where('status', 1)->orderBy('sort_order')->get();
        return view('frontend.privacyPolicy',compact('pageTitle','pageName','privacy'));
    }

    

    
}
