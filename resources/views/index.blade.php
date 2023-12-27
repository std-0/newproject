@extends('layouts.app')

@section('title', 'Home ')

@section('content')
<section>
    <div class="container">
     
        <div class="row">
        {{-- @include('partials.article_list') --}}
            <div class="col-lg-10">
                <img class="mySlides w-100" src="https://orange-plan.net/wp-content/uploads/2023/04/top11.png" alt="#">
            </div>
            <div class="col-lg-10"></div>
            <p class="w-100">We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>
            </div>
        </div>
    </div>
</section>


@endsection