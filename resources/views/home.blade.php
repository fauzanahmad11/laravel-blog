@extends('layouts.main')
@section('top-container')
<div id="home-carousel" class="carousel slide carousel-fade" data-bs-interval="4000" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1593643946890-b5b85ade6451?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1078&q=80" class="d-block w-100" alt="...">
            <div class="carousel-caption d-block">
                <h1>First slide label</h1>
                <p>Some representative placeholder content for the first slide.</p>
                <a href="#our-partner" class="btn btn-y-main">Get Started</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1593429858901-f2faa1f3b416?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" class="d-block w-100" alt="...">
            <div class="carousel-caption d-block">
                <h1>Second slide label</h1>
                <p>Some representative placeholder content for the first slide.</p>
                <a href="#our-partner" class="btn btn-y-main">Get Started</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1593642634402-b0eb5e2eebc9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=869&q=80" class="d-block w-100" alt="...">
            <div class="carousel-caption d-block">
                <h1>Third slide label</h1>
                <p>Some representative placeholder content for the first slide.</p>
                <a href="#our-partner" class="btn btn-y-main">Get Started</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('container')
    <section class="our-partner row">
        <div class="col-12 col-md-3 d-flex align-items-center justify-content-center py-4">
            <img src="{{ url('img/partner/Emirates_Airlines.png') }}" alt="" class="img-fluid">
        </div>
        <div class="col-12 col-md-3 d-flex align-items-center justify-content-center py-4">
            <img src="{{ url('img/partner/palms-casino.png') }}" alt="" class="img-fluid">
        </div>
        <div class="col-12 col-md-3 d-flex align-items-center justify-content-center py-4">
            <img src="{{ url('img/partner/universal-studios.png') }}" alt="" class="img-fluid">
        </div>
        <div class="col-12 col-md-3 d-flex align-items-center justify-content-center py-4">
            <img src="{{ url('img/partner/visa.png') }}" alt="" class="img-fluid">
        </div>
    </section>
@endsection
@section('bottom-container')
    <section class="author-header text-center" id="our-partner">
        <h1 class="mt-5">Our Author</h1>
        <p>the author are so talented. they have so many <br> experience on their job role</p>
    </section>
    <section class="author-content mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card shadow py-4 mt-3">
                        <img src="https://source.unsplash.com/400x400?man" width="120" height="120" class="rounded-circle mx-auto shadow" alt="">
                        <div class="card-body text-center">
                            <h5 class="card-title mt-2"><i class="bi bi-patch-check-fill"></i> Fauzan Ahmad</h5>
                            <button class="btn-love mx-auto">
                                <span class="me-1"><i class="bi bi-suit-heart-fill text-white"></i></span>
                                120
                                Likes
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card shadow py-4 mt-3">
                        <img src="https://source.unsplash.com/400x400?women" width="120" height="120" class="rounded-circle mx-auto shadow" alt="">
                        <div class="card-body text-center">
                            <h5 class="card-title mt-2"><i class="bi bi-patch-check-fill"></i> Muthia The Kerr</h5>
                            <button class="btn-love mx-auto">
                                <span class="me-1"><i class="bi bi-suit-heart-fill text-white"></i></span>
                                10
                                Likes
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card shadow py-4 mt-3">
                        <img src="https://source.unsplash.com/400x400?person" width="120" height="120" class="rounded-circle mx-auto shadow" alt="">
                        <div class="card-body text-center">
                            <h5 class="card-title mt-2"><i class="bi bi-patch-check-fill"></i> Fauzan Ahmad</h5>
                            <button class="btn-love mx-auto">
                                <span class="me-1"><i class="bi bi-suit-heart-fill text-white"></i></span>
                                120
                                Likes
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card shadow py-4 mt-3">
                        <img src="https://source.unsplash.com/400x400?person" width="120" height="120" class="rounded-circle mx-auto shadow" alt="">
                        <div class="card-body text-center">
                            <h5 class="card-title mt-2"><i class="bi bi-patch-check-fill"></i> Fauzan Ahmad</h5>
                            <button class="btn-love mx-auto">
                                <span class="me-1"><i class="bi bi-suit-heart-fill text-white"></i></span>
                                120
                                Likes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="-header text-center mt-5">
        <h1 class="mt-5">Our Author</h1>
        <p>the author are so talented. they have so many <br> experience on their job role</p>
    </section> --}}
    <section class="explain-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-md-6 text-start">
                    <img src="{{ url('img/rocket.png') }}" width="450" class="img-fluid" alt="">
                </div>
            <div class="col-11 col-md-6">
                    <div class="content-body">
                        <h1 class=" mt-5">Make it happen !</h1>
                        <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quod neque vitae consectetur? Quisquam maiores dolorum sit delectus vitae corrupti, aperiam perferendis quas. Tenetur, quos, dolorem, ullam placeat quod deleniti ab doloremque excepturi corrupti sint ducimus alias accusantium beatae maiores?</p>
                        <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quod neque vitae consectetur? Quisquam maiores dolorum sit delectus vitae corrupti, aperiam perferendis quas. Tenetur, quos, dolorem, ullam placeat quod deleniti ab doloremque excepturi corrupti sint ducimus alias accusantium beatae maiores?</p>
                        <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quod neque vitae consectetur? Quisquam maiores dolorum sit delectus vitae corrupti, aperiam perferendis quas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="explain-content d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 text-end">
                    <div class="content-body">
                        <h1 class=" mt-5">We cover <br> All your movement</h1>
                        <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quod neque vitae consectetur? Quisquam maiores dolorum sit delectus vitae corrupti, aperiam perferendis quas. Tenetur, quos, dolorem, ullam placeat quod deleniti ab doloremque excepturi corrupti sint ducimus alias accusantium beatae maiores?</p>
                        <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quod neque vitae consectetur? Quisquam maiores dolorum sit delectus vitae corrupti, aperiam perferendis quas. Tenetur, quos, dolorem, ullam placeat quod deleniti ab doloremque excepturi corrupti sint ducimus alias accusantium beatae maiores?</p>
                        <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quod neque vitae consectetur? Quisquam maiores dolorum sit delectus vitae corrupti, aperiam perferendis quas.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-end">
                    <img src="{{ url('img/globe.png') }}" width="450" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection