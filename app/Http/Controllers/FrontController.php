<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\CompanyAbout;
use App\Models\CompanyStatistic;
use App\Models\HeroSection;
use App\Models\OurPrinciple;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $hero = HeroSection::latest('id')->first();
        $principles = OurPrinciple::take(3)->get();
        $statistics = CompanyStatistic::take(4)->get();
        $products = Product::take(3)->get();
        $teams = OurTeam::take(7)->get();
        $testimonials = Testimonial::take(10)->get();

        return view('front.index', compact('hero', 'statistics', 'principles', 'products', 'teams', 'testimonials'));
    }

    public function products()
    {
        $products = Product::get();

        return view('front.products', compact('products'));
    }

    public function teams()
    {
        $teams = OurTeam::get();
        $statistics = CompanyStatistic::take(4)->get();

        return view('front.teams', compact('teams', 'statistics'));
    }

    public function about()
    {
        $abouts = CompanyAbout::take(2)->get();
        $statistics = CompanyStatistic::take(4)->get();

        return view('front.about', compact('statistics', 'abouts'));
    }

    public function appointment()
    {
        $products = Product::get();
        $testimonials = Testimonial::take(10)->get();

        return view('front.appointment', compact('testimonials', 'products'));
    }

    public function storeAppointment(StoreAppointmentRequest $request)
    {
        DB::transaction(function () use($request) {
            $validated = $request->validated();

            $newAppointment =  Appointment::create($validated);
        });

        return redirect()->back();
    }
}
