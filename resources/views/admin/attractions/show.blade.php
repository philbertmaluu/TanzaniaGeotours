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
      <h1>View Attraction</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()">Attraction</a></li>
          <li class="breadcrumb-item active">View</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        <div class="card">
          
          

      
                <div class="card-header">
                    
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                           
                        </div>
                        <table class="table  table-striped">
                            <tbody>

                                <tr>
                                   
                                       <div id="map" style="height: 400px;"></div>
                                   

                                </tr>
                                
                                
                                <tr>
                                    <th>
                                        {{ trans('cruds.shop.fields.id') }}
                                    </th>
                                    <td>
                                    ATTR{{ $shop->id }}2024
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shop.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $shop->name }}
                                    </td>
                                </tr>
                                <tr>
                                   
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shop.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $shop->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shop.fields.photos') }}
                                    </th>
                                    <td>
                                        @foreach($shop->photos as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shop.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $shop->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shop.fields.active') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $shop->active ? 'checked' : '' }}>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('attractions') }}">
                                Back to attractions
                            </a>
                        </div>
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
    var defaultLatLng = { lat: {{ $shop->latitude }}, lng: {{ $shop->longitude }} }; // Use actual latitude and longitude values

    // Initialize map centered on attraction's location
    map = new google.maps.Map(document.getElementById('map'), {
        center: defaultLatLng,
        zoom: 15,  // Adjust zoom level as needed
    });

    // Initialize marker on map
    var marker = new google.maps.Marker({
        position: defaultLatLng,
        map: map,
        title: "{{ $shop->name }}",  // Tooltip text for the marker
    });
}

</script>


</body>
</html>
