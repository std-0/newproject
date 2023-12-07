@extends('layouts.app')

@section('title', 'Home ')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <img class="mySlides w-100"
                    src="https://contentstatic.techgig.com/photo/88751917/7-programming-languages-every-beginner-should-explore.jpg?35120"
                    alt="image">
                <img class="mySlides w-100" src="https://www.dignited.com/wp-content/uploads/2022/08/top10lan.jpg"
                    alt="img">
                <img class="mySlides w-100" src="https://orange-plan.net/wp-content/uploads/2023/04/top11.png" alt="#">
                
            </div>
            <div class="col-lg-10"></div>
            <p class="w-100">We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>
            </div>
        </div>
    </div>
</section>
<script>
    // Automatic Slideshow - change image every 3 seconds
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) { myIndex = 1 }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 3000);
    }
</script>

@endsection