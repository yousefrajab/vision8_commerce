@extends('site.master')


@section('title', 'About | ' . config('app.name'))

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">About Us</h1>
                        <ol class="breadcrumb">
                            <li><a href="index-2.html">Home</a></li>
                            <li class="active">about us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-responsive" src="images/about/about.jpg">
                </div>
                <div class="col-md-6">
                    <h2 class="mt-40">About Our Shop</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius enim, accusantium repellat ex autem
                        numquam iure officiis facere vitae itaque.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam qui vel cupiditate exercitationem, ea
                        fuga est velit nulla culpa modi quis iste tempora non, suscipit repellendus labore voluptatem dicta
                        amet?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam qui vel cupiditate exercitationem, ea
                        fuga est velit nulla culpa modi quis iste tempora non, suscipit repellendus labore voluptatem dicta
                        amet?</p>
                    <a href="contact.html" class="btn btn-main mt-20">Download Company Profile</a>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-md-3 text-center">
                    <img src="images/about/awards-logo.png">
                </div>
                <div class="col-md-3 text-center">
                    <img src="images/about/awards-logo.png">
                </div>
                <div class="col-md-3 text-center">
                    <img src="images/about/awards-logo.png">
                </div>
                <div class="col-md-3 text-center">
                    <img src="images/about/awards-logo.png">
                </div>
            </div>
        </div>
    </section>


    <section class="team-members ">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h2>Team Members</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle" src="images/team/team-1.jpg">
                        <h4>Jonathon Andrew</h4>
                        <p>Founder</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle" src="images/team/team-2.jpg">
                        <h4>Adipisci Velit</h4>
                        <p>Developer</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle" src="images/team/team-3.jpg">
                        <h4>John Fexit</h4>
                        <p>Shop Manager</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle" src="images/team/team-1.jpg">
                        <h4>John Fexit</h4>
                        <p>Shop Manager</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="section video-testimonial bg-1 overly-white text-center mt-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Video presentation</h2>
                    <a class="play-icon" href="https://www.youtube.com/watch?v=oyEuk8j8imI&amp;rel=0"
                        data-toggle="lightbox">
                        <i class="tf-ion-ios-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>



    </div>
    </div>
    </section>


    <!--
          Start Call To Action
          ==================================== -->
    <section class="call-to-action bg-gray section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="title">
                        <h2>SUBSCRIBE TO NEWSLETTER</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, <br> facilis numquam impedit ut
                            sequi. Minus facilis vitae excepturi sit laboriosam.</p>
                    </div>
                    <div class="col-lg-6 col-md-offset-3">
                        <div class="input-group subscription-form">
                            <input type="text" class="form-control" placeholder="Enter Your Email Address">
                            <span class="input-group-btn">
                                <button class="btn btn-main" type="button">Subscribe Now!</button>
                            </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->

                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->

    <section class="section instagram-feed">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h2>View us on instagram</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="instagram-slider" id="instafeed"
                        data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn">
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
