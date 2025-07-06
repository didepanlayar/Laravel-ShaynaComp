@extends('front.layouts.app')

@section('title', 'Products')

@section('content')
    <div id="header" class="bg-[#F6F7FA] relative">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            <!-- Navbar -->
            @include('front.layouts.navbar')
            <!-- End Navbar -->
            <div class="flex flex-col gap-[50px] items-center py-20">
                <div class="breadcrumb flex items-center justify-center gap-[30px]">
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
                    <span class="text-cp-light-grey">/</span>
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Products</p>
                </div>
                <h2 class="font-bold text-4xl leading-[45px] text-center">
                    We Might Best Choice <br />
                    Want to Make World Better
                </h2>
            </div>
        </div>
    </div>
    <div id="Products" class="container max-w-[1130px] mx-auto flex flex-col gap-20 mt-20">
        @forelse ($products as $product)    
            <div class="product flex flex-wrap justify-center items-center gap-[60px] even:flex-row-reverse">
                <div class="w-[470px] h-[550px] flex shrink-0 overflow-hidden">
                    <img src="{{ Storage::url($product->thumbnail) }}" class="w-full h-full object-contain" alt="thumbnail" />
                </div>
                <div class="flex flex-col gap-[30px] py-[50px] h-fit max-w-[500px]">
                    <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">{{ $product->tagline }}</p>
                    <div class="flex flex-col gap-[10px]">
                        <h2 class="font-bold text-4xl leading-[45px]">{{ $product->name }}</h2>
                        <p class="leading-[30px] text-cp-light-grey">{{ $product->about}}</p>
                    </div>
                    <a href="{{ route('front.appointment') }}" class="bg-cp-dark-blue p-[14px_20px] w-fit rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Book Appointment</a>
                </div>
            </div>
        @empty
            <p>{{ __('No data yet') }}</p>
        @endforelse
    </div>
    <div id="Clients" class="container max-w-[1130px] mx-auto flex flex-col justify-center text-center gap-5 mt-20">
        <h2 class="font-bold text-lg">Trusted by 500+ Top Leaders Worldwide</h2>
        <div class="logo-container flex flex-wrap gap-5 justify-center">
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-54.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-52.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-55.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-44.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-51.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-55.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-52.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-54.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-51.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
        </div>
    </div>
@endsection