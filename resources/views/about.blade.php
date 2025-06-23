<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doha Oryx</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>


    <div class="top-bar position-relative">
        <i class="fa-solid fa-x" id="top-close"></i>
        <div class="container ">

            <p> Qatar Launches New Luxury Beach Resorts. Plan Your Dream Vacation Today !</p>
        </div>
    </div>


    <!-- banner -->
    <section class="main-banner position-relative home-sub-banner">
        
        <header>
            <nav class="navbar navbar-expand-lg p-0">
                <div class="container">
                    <a class="navbar-brand p-0" href="#">
                        <div class="logo"><img src="{{asset('assets/media/logo.svg')}}" alt=""></div>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto ">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Flights</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Hotels</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Activities</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Packages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Qatar Calendar</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    More
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>

                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <span><img src="{{asset('assets/media/lang.svg')}}" alt=""></span> En
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span><img src="{{ asset('assets/media/User.svg')}}" alt=""></span></a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
        </header>
       
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="swiper-image position-relative">
                        <img src="{{ asset('assets/media/about-q.png')}}" />
                       
                    </div>

                </div>
            


            </div>


        </div>
    </section>
    <!-- banner end -->

    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
              
                <li class="breadcrumb-item active" aria-current="page">about qatar</li>
              </ol>
        </div>
      </nav>


      <section class="about-detail position-relative">
        <div class="brown ico-l">
            <img src="{{ asset('assets/media/b-r.png')}}" alt="">
        </div>
        <div class="container">
            <div class="abt-d-title">
                <h2 class="title">
                    About <span> Qatar</span>
                </h2>
                <p>Welcome to Qatar, a country that epitomizes a unique balance between tradition and modernity. Qatar boasts a rich cultural heritage and an ambitious future outlook, making it an exceptional destination for tourism, business, and investment.</p>
            </div>
            <div class="qatar-img">
                <img src="{{ asset('assets/media/qatar.png')}}" alt="">
            </div>
        </div>
      </section>
      <section class="q-climate position-relative">
        <div class="brown ico-r">
            <img src="{{ asset('assets/media/b-l.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row g-5">
                <div class="col-6">
                    <h2 class="title">
                        Qatar's Climate: Sunlit Serenity
                    </h2>
                    <p>Qatar is located on a peninsula that stretches 563 kilometers along the western coast of the Arabian Gulf. It borders Saudi Arabia to the south and is close to Bahrain, the United Arab Emirates, and Iran. Qatar is characterized by its flat, arid desert landscape and its sunny, dry climate year-round. Temperatures range from 17°C in winter to over 40°C in summer, with light and limited rainfall between October and March.
                    </p>
                </div>
                <div class="col-6">
                    <div class="desert">
                        <img src="{{ asset('assets/media/dessert.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
      </section>



    <section class="sub">
        <div class="sub-area text-center">
            <p>Subscribe to our newsletter and be the first to see all of our best deals and offers!</p>
            <div class="email-inp">
                <input type="text">
                <button class="join">
                    <span>Join >></span>
                </button>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>