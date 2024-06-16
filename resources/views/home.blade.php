@extends('layouts.main')

@section('content')
@php
use Illuminate\Support\Str;
@endphp

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content-box1 content-single">
                <article class="post-8 page type-page status-publish hentry">
                    <header>
                        <h1 style="color: #012A70;" class="entry-title">{{ request()->filled('search') || request()->filled('category') ? 'Search results' : 'Geotourism Attractions' }}</h1></header>
                    <div class="entry-content entry-summary">
                        <div class="geodir-search-container geodir-advance-search-default" data-show-adv="default">
                            <form class="geodir-listing-search gd-search-bar-style" name="geodir-listing-search" action="{{ route('home') }}" method="get">
                                <div class="geodir-loc-bar">
                                    <div class="clearfix geodir-loc-bar-in">
                                        <div class="geodir-search">
                                           
                                            <div class='gd-search-input-wrapper gd-search-field-search'> <span class="geodir-search-input-label"><i class="fas fa-search gd-show"></i><i class="fas fa-times geodir-search-input-label-clear gd-hide" title="Clear field"></i></span>
                                                <input class="search_text gd_search_text" name="search" value="{{ old('search', request()->input('search')) }}" type="text" placeholder="Your search ends here" aria-label="Search for" autocomplete="off" />
                                            </div>
                                            <button style="background-color: #4154F1;" class="geodir_submit_search" data-title="fas fa-search" aria-label="fas fa-search"><i class="fas fas fa-search" aria-hidden="true"></i><span class="sr-only">Search</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="geodir-loop-container">
                            <ul class="geodir-category-list-view clearfix gridview_onethird geodir-listing-posts geodir-gridview gridview_onethird">
                                @foreach($shops as $shop)
                                    <li class="gd_place type-gd_place status-publish has-post-thumbnail">
                                        <div class="gd-list-item-left ">
                                            <div class="geodir-post-slider">
                                                <div class="geodir-image-container geodir-image-sizes-medium_large">
                                                    <div class="geodir-image-wrapper">
                                                        <ul class="geodir-post-image geodir-images clearfix">
                                                            <li>
                                                                <a href='{{ route('shop', $shop->id) }}'>
                                                                @php
                                                                    
                                                                    $thumbnailUrl = Str::replaceFirst('localhost', '127.0.0.1:8001', $shop->thumbnail);
                                                                @endphp
                                                                @if(Str::startsWith($thumbnailUrl, ['http://', 'https://']))
                                                                    <img src="{{ $thumbnailUrl }}" width="1440" height="960" class="geodir-lazy-load align size-medium_large" />
                                                                @else
                                                                    <img src="{{ asset('storage/' . $thumbnailUrl) }}" width="1440" height="960" class="geodir-lazy-load align size-medium_large" />
                                                                @endif
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gd-list-item-right ">
                                            <div class="geodir-post-title">
                                                <h2 style="color: #012A70;" class="geodir-entry-title"> <a href="{{ route('shop', $shop->id) }}" title="View: {{ $shop->name }}">{{ $shop->name }}</a></h2></div>
                                            @foreach($shop->categories as $category)
                                                <div class="gd-badge-meta gd-badge-alignleft" title="{{ $category->name }}">
                                                    <div class="gd-badge" style="background-color:#4154F1;color:#ffffff;"><i class="fas fa-certificate"></i> <span class='gd-secondary'>{{ $category->name }}</span></div>
                                                </div>
                                            @endforeach
                                          
                                            <div class="geodir-post-content-container">
                                                <div class="geodir_post_meta  geodir-field-post_content" style='max-height:120px;overflow:hidden;'>{{ $shop->description }} <a href='{{ route('shop', $shop->id) }}' class='gd-read-more  gd-read-more-fade'>Read more...</a></div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="clear"></div>
                        </div>
                        {{ $shops->appends(request()->query())->links('partials.pagination') }}
                    </div>
                    <footer class="entry-footer"></footer>
                </article>
            </div>
        </div>
    </div>
</div>


  <!-- About Section -->
  <section id="about" class="about section">

<div class="container" data-aos="fade-up">
    <div class="row gx-0">

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
            data-aos-delay="200">
            <div class="content">
                <h3>Who We Are</h3>
                <h2>Expedita voluptas omnis cupiditate totam eveniet nobis sint iste. Dolores est repellat
                    corrupti reprehenderit.</h2>
                <p>
                    Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor
                    consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit voluptatum nam
                    et est corrupti.
                </p>
                <div class="text-center text-lg-start">
                    <a href="#"
                        class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Read More</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('dash/assets/img/about.png') }}" class="img-fluid" alt="">
        </div>

    </div>
</div>

</section><!-- /About Section -->


 <!-- Values Section -->
 <section id="values" class="values section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
    <h2>Our Values</h2>
    <p>What we value most<br></p>
</div><!-- End Section Title -->

<div class="container">

    <div class="row gy-4">

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
                <img src="assets/img/values-1.png" class="img-fluid" alt="">
                <h3>Ad cupiditate sed est odio</h3>
                <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.
                </p>
            </div>
        </div><!-- End Card Item -->

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
                <img src="assets/img/values-2.png" class="img-fluid" alt="">
                <h3>Voluptatem voluptatum alias</h3>
                <p>Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit non.
                </p>
            </div>
        </div><!-- End Card Item -->

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
                <img src="assets/img/values-3.png" class="img-fluid" alt="">
                <h3>Fugit cupiditate alias nobis.</h3>
                <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.
                </p>
            </div>
        </div><!-- End Card Item -->

    </div>

</div>

</section><!-- /Values Section -->

 <!-- Services Section -->
 <section id="services" class="services section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
    <h2>Services</h2>
    <p>Check Our Services<br></p>
</div><!-- End Section Title -->

<div class="container">

    <div class="row gy-4">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-cyan position-relative">
                <i class="bi bi-activity icon"></i>
                <h3>Nesciunt Mete</h3>
                <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores
                    iure perferendis tempore et consequatur.</p>
                <a href="#" class="read-more stretched-link"><span>Read More</span> <i
                        class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-orange position-relative">
                <i class="bi bi-broadcast icon"></i>
                <h3>Eosle Commodi</h3>
                <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum
                    hic non ut nesciunt dolorem.</p>
                <a href="#" class="read-more stretched-link"><span>Read More</span> <i
                        class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
                <i class="bi bi-easel icon"></i>
                <h3>Ledo Markt</h3>
                <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id
                    voluptas adipisci eos earum corrupti.</p>
                <a href="#" class="read-more stretched-link"><span>Read More</span> <i
                        class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-red position-relative">
                <i class="bi bi-bounding-box-circles icon"></i>
                <h3>Asperiores Commodi</h3>
                <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga
                    sit provident adipisci neque.</p>
                <a href="#" class="read-more stretched-link"><span>Read More</span> <i
                        class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item item-indigo position-relative">
                <i class="bi bi-calendar4-week icon"></i>
                <h3>Velit Doloremque.</h3>
                <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed
                    animi at autem alias eius labore.</p>
                <a href="#" class="read-more stretched-link"><span>Read More</span> <i
                        class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item item-pink position-relative">
                <i class="bi bi-chat-square-text icon"></i>
                <h3>Dolori Architecto</h3>
                <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure.
                    Corrupti recusandae ducimus enim.</p>
                <a href="#" class="read-more stretched-link"><span>Read More</span> <i
                        class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

    </div>

</div>

</section><!-- /Services Section -->

<!-- Contact Section -->
<section id="contact" class="contact section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p>Contact Us</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

        <div class="col-lg-6">

            <div class="row gy-4">
                <div class="col-md-6">
                    <div class="info-item" data-aos="fade" data-aos-delay="200">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Address</h3>
                        <p>Makongo Street</p>
                        <p>Dar es salaam, Tanzania</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item" data-aos="fade" data-aos-delay="300">
                        <i class="bi bi-telephone"></i>
                        <h3>Call Us</h3>
                        <p>+255 653 495 586</p>
                        <p>+255 653 495 586</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item" data-aos="fade" data-aos-delay="400">
                        <i class="bi bi-envelope"></i>
                        <h3>Email Us</h3>
                        <p>ecgaula@gmail.com</p>
                        <p>ecgaula@gmail.com</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item" data-aos="fade" data-aos-delay="500">
                        <i class="bi bi-clock"></i>
                        <h3>Open Hours</h3>
                        <p>Monday - Friday</p>
                        <p>9:00AM - 05:00PM</p>
                    </div>
                </div><!-- End Info Item -->

            </div>

        </div>

        <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                data-aos-delay="200">
                <div class="row gy-4">

                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Your Name"
                            required="">
                    </div>

                    <div class="col-md-6 ">
                        <input type="email" class="form-control" name="email" placeholder="Your Email"
                            required="">
                    </div>

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="subject" placeholder="Subject"
                            required="">
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control" name="message" rows="6" placeholder="Message"
                            required=""></textarea>
                    </div>

                    <div class="col-md-12 text-center">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>

                        <button type="submit">Send Message</button>
                    </div>

                </div>
            </form>
        </div><!-- End Contact Form -->

    </div>

</div>

</section><!-- /Contact Section -->


@endsection

@section('scripts')
<script type='text/javascript' src='https://maps.google.com/maps/api/js?language=en&key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&region=GB'></script>
<script defer>
	function initialize() {
		var mapOptions = {
			zoom: 8,
			minZoom: 6,
			maxZoom: 17,
			zoomControl:true,
			zoomControlOptions: {
  				style:google.maps.ZoomControlStyle.DEFAULT
			},
			center: new google.maps.LatLng({{ $latitude }}, {{ $longitude }}),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			panControl:false,
			mapTypeControl:false,
			scaleControl:false,
			overviewMapControl:false,
			rotateControl:false
	  	}
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var image = new google.maps.MarkerImage("assets/images/pin.png", null, null, null, new google.maps.Size(40,52));
        var places = @json($mapShops);

        for(place in places)
        {
            place = places[place];
            if(place.latitude && place.longitude)
            {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(place.latitude, place.longitude),
                    icon:image,
                    map: map,
                    title: place.name
                });
                var infowindow = new google.maps.InfoWindow();
                google.maps.event.addListener(marker, 'click', (function (marker, place) {
                    return function () {
                        infowindow.setContent(generateContent(place))
                        infowindow.open(map, marker);
                    }
                })(marker, place));
            }
        }
	}
	google.maps.event.addDomListener(window, 'load', initialize);

    function generateContent(place) {
    // Replace 'localhost' with '127.0.0.1:8001' in thumbnail URL if necessary
    var thumbnailUrl = place.thumbnail;
    if (thumbnailUrl.includes('localhost')) {
        thumbnailUrl = thumbnailUrl.replace('localhost', '127.0.0.1:8001');
    }

    var content = `
        <div class="gd-bubble" style="">
            <div class="gd-bubble-inside">
                <div class="geodir-bubble_desc">
                    <div class="geodir-bubble_image">
                        <div class="geodir-post-slider">
                            <div class="geodir-image-container geodir-image-sizes-medium_large ">
                                <div id="geodir_images_5de53f2a45254_189" class="geodir-image-wrapper" data-controlnav="1">
                                    <ul class="geodir-post-image geodir-images clearfix">
                                        <li>
                                            <div class="geodir-post-title">
                                                <h4 class="geodir-entry-title">
                                                    <a href="{{ route('shop', '') }}/${place.id}" title="View: ${place.name}">${place.name}</a>
                                                </h4>
                                            </div>
                                            <a href="{{ route('shop', '') }}/${place.id}">
                                                <img src="${thumbnailUrl}" alt="${place.name}" class="align size-medium_large" width="1400" height="930">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="geodir-bubble-meta-side">
                <div class="geodir-output-location">
                    <div class="geodir-output-location-mapbubble">
                        <div class="geodir_post_meta geodir-field-post_title">
                            <span class="geodir_post_meta_icon geodir-i-text">
                                <i class="fas fa-minus" aria-hidden="true"></i>
                                <span class="geodir_post_meta_title">Place Title: </span>
                            </span>
                            ${place.name}
                        </div>
                        <div class="geodir_post_meta geodir-field-address" itemscope="" itemtype="http://schema.org/PostalAddress">
                            <span class="geodir_post_meta_icon geodir-i-address">
                                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                <span class="geodir_post_meta_title">Address: </span>
                            </span>
                            <span itemprop="streetAddress">${place.address}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;

    return content;
}

</script>
@endsection