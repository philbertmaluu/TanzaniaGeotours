<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Tanzania Geotourism</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="{{ asset('admin/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">


  <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
</head>
<body>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url('dashboard')}}" class="logo d-flex align-items-center">
        <img src="{{ asset('admin/assets/img/logo.png') }}" alt="">
        <span class="d-none d-lg-block">GeotourismTZ</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown"></li><!-- End Profile Nav -->
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void()">
        <i class="bi bi-airplane-engines"></i>
          <span>Bookings</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{ url('/attractions') }}">
        <i class="bi bi-binoculars"></i>
          <span>GEO attractions</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-heading">User Magement</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void()">
        <i class="bi bi-person-circle"></i>
          <span>Users</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      


      <li class="nav-heading">Settings</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void()">
        <i class="bi bi-gear-wide-connected"></i>
          <span>Permissions</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void()">
        <i class="bi bi-file-earmark-person-fill"></i>
          <span>Roles</span>
        </a>
      </li><!-- End Login Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Create Attraction</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()">Attraction</a></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <form method="POST" action="{{ route('attractions.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                  <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                  </div>
                @endif
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                  <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                  </div>
                @endif
              </div>
              
              <div class="form-group">
                    <label for="photos">{{ trans('cruds.shop.fields.photos') }}</label>
                    <div id="photos-dropzone" class="dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}">
                        <div class="dz-message needsclick">
                            Drop files here or click to upload.<br>
                            <span class="note needsclick">(This is just a demo dropzone. Selected files are not actually uploaded.)</span>
                        </div>
                    </div>
                    @if($errors->has('photos'))
                        <div class="invalid-feedback">
                            {{ $errors->first('photos') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.shop.fields.photos_helper') }}</span>
                </div>
              
              <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address') }}">
                    <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') ?? '0' }}">
                    <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') ?? '0' }}">

                    @if($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                </div>
              
              <div class="form-group">
                <label for="map"></label>
                <div id="map" style="height: 400px;"></div>
              </div>


              <div class="form-group">
              <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <!-- Vendor JS Files -->
  <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('admin/assets/js/main.js') }}"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script> -->
  <!-- Google Maps API -->
  <!-- Include Google Maps API with Places library -->
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>

<script>
function initialize() {
    var map;
    var input = document.getElementById('address'); // Make sure 'address' matches your HTML input ID
    var defaultLatLng = { lat: -6.7924, lng: 39.2083 }; // Default center coordinates

    // Initialize map centered on default coordinates
    map = new google.maps.Map(document.getElementById('map'), {
        center: defaultLatLng,
        zoom: 10,
    });

    // Initialize marker on map
    var marker = new google.maps.Marker({
        position: defaultLatLng,
        map: map,
        draggable: true,
        title: "Drag me!",
    });

    // Initialize autocomplete for input field
    var autocomplete = new google.maps.places.Autocomplete(input);

    // When a place is selected from autocomplete, update map and marker
    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }

        // If place has geometry, update map and marker position
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Zoom in to specific level
        }

        marker.setPosition(place.geometry.location);

        // Update latitude and longitude inputs
        document.getElementById('latitude').value = place.geometry.location.lat();
        document.getElementById('longitude').value = place.geometry.location.lng();
    });

    // Allow marker to be draggable and update location input on drag
    google.maps.event.addListener(marker, 'dragend', function (evt) {
        document.getElementById('latitude').value = evt.latLng.lat().toFixed(6);
        document.getElementById('longitude').value = evt.latLng.lng().toFixed(6);
    });

    // Update marker position and location input when map is clicked
    google.maps.event.addListener(map, 'click', function (evt) {
        marker.setPosition(evt.latLng);
        document.getElementById('latitude').value = evt.latLng.lat().toFixed(6);
        document.getElementById('longitude').value = evt.latLng.lng().toFixed(6);
    });
}

</script>


</body>
</html>
