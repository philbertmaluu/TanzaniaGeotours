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
  <!-- Template Main CSS File -->
  <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
    <img src="{{ asset('admin/assets/img/logo.png') }}" alt="">
        <span class="d-none d-lg-block">GeotourismTZ</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

        <li class="nav-item dropdown">
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">
        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('admin/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
            <span ></span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            <h6>Kevin Anderson</h6>
            <span>Web Designer</span>
            </li>
            <li>
            <hr class="dropdown-divider">
            </li>

            <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
            </a>
            </li>
            <li>
            <hr class="dropdown-divider">
            </li>

            <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
            </a>
            </li>
            <li>
            <hr class="dropdown-divider">
            </li>

            
            <li>
            <hr class="dropdown-divider">
            </li>

            <li>
            <a class="dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
            </a>
            </li>


        </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
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
      <li class="nav-heading">User Management</li>
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
      <h1>Edit Attraction</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()">Attraction</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        <div class="card">
          <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.shop.title_singular') }}
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route("attractions.update", [$shop->id]) }}" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.shop.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $shop->name) }}" required>
                @if($errors->has('name'))
                  <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                  </div>
                @endif
                <span class="help-block">{{ trans('cruds.shop.fields.name_helper') }}</span>
              </div>
              <div class="form-group">
                <label for="description">{{ trans('cruds.shop.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $shop->description) }}</textarea>
                @if($errors->has('description'))
                  <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                  </div>
                @endif
                <span class="help-block">{{ trans('cruds.shop.fields.description_helper') }}</span>
              </div>
              <div class="form-group">
                <label for="photos">{{ trans('cruds.shop.fields.photos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}" id="photos-dropzone">
                </div>
                @if($errors->has('photos'))
                  <div class="invalid-feedback">
                    {{ $errors->first('photos') }}
                  </div>
                @endif
                <span class="help-block">{{ trans('cruds.shop.fields.photos_helper') }}</span>
              </div>
              <div class="form-group">
                <label for="address">{{ trans('cruds.shop.fields.address') }}</label>
                <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $shop->address) }}">
                <input type="hidden" name="latitude" id="address-latitude" value="{{ old('latitude', $shop->latitude) ?? '0' }}" />
                <input type="hidden" name="longitude" id="address-longitude" value="{{ old('longitude', $shop->longitude) ?? '0' }}" />
                @if($errors->has('address'))
                  <div class="invalid-feedback">
                    {{ $errors->first('address') }}
                  </div>
                @endif
                <span class="help-block">{{ trans('cruds.shop.fields.address_helper') }}</span>
              </div>
              <div id="address-map-container" class="mb-2" style="width:100%;height:400px;">
                <div style="width: 100%; height: 100%" id="address-map"></div>
              </div>
              <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                  <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ $shop->active || old('active', 0) === 1 ? 'checked' : '' }}>
                  <label class="form-check-label" for="active">{{ trans('cruds.shop.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                  <div class="invalid-feedback">
                    {{ $errors->first('active') }}
                  </div>
                @endif
                <span class="help-block">{{ trans('cruds.shop.fields.active_helper') }}</span>
              </div>

              <div class="form-group">
                <button class="btn btn-danger" type="submit">
                  {{ trans('global.save') }}
                </button>
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
  <!-- Google Maps API -->
  <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap" async defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

  <!-- Initialize Google Maps and Dropzone -->
  <script>
    var uploadedPhotosMap = {};

    Dropzone.options.photosDropzone = {
      url: '{{ route('admin.shops.storeMedia') }}',
      maxFilesize: 2, // MB
      acceptedFiles: '.jpeg,.jpg,.png,.gif',
      addRemoveLinks: true,
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      params: {
        size: 2,
        width: 4096,
        height: 4096
      },
      success: function (file, response) {
        $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">');
        uploadedPhotosMap[file.name] = response.name;
      },
      removedfile: function (file) {
        file.previewElement.remove();
        var name = '';
        if (typeof file.file_name !== 'undefined') {
          name = file.file_name;
        } else {
          name = uploadedPhotosMap[file.name];
        }
        $('form').find('input[name="photos[]"][value="' + name + '"]').remove();
      },
      init: function () {
        @if(isset($shop) && $shop->photos)
          var files =
            {!! json_encode($shop->photos) !!};
          for (var i in files) {
            var file = files[i];
            this.options.addedfile.call(this, file);
            this.options.thumbnail.call(this, file, file.url);
            file.previewElement.classList.add('dz-complete');
            $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">');
          }
        @endif
      },
      error: function (file, response) {
        if ($.type(response) === 'string') {
          var message = response; // Dropzone sends its own error messages in string
        } else {
          var message = response.errors.file;
        }
        file.previewElement.classList.add('dz-error');
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]');
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          node = _ref[_i];
          _results.push(node.textContent = message);
        }
        return _results;
      }
    };

    // Initialize Google Maps
    function initMap() {
      var latitude = parseFloat('{{ old('latitude', $shop->latitude) ?? '0' }}');
      var longitude = parseFloat('{{ old('longitude', $shop->longitude) ?? '0' }}');

      var map = new google.maps.Map(document.getElementById('address-map'), {
        center: { lat: latitude, lng: longitude },
        zoom: 15
      });

      var marker = new google.maps.Marker({
        position: { lat: latitude, lng: longitude },
        map: map,
        draggable: true // Make marker draggable
      });

      // Update marker position and input fields when marker is dragged
      google.maps.event.addListener(marker, 'dragend', function (event) {
        document.getElementById('address-latitude').value = event.latLng.lat();
        document.getElementById('address-longitude').value = event.latLng.lng();
      });

      // Initialize autocomplete for address input
      var input = document.getElementById('address');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.bindTo('bounds', map);

      // Set initial marker position based on autocomplete selection
      autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
          return;
        }
        if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17); // Zoom in closer for better accuracy
        }
        marker.setPosition(place.geometry.location);
        document.getElementById('address-latitude').value = place.geometry.location.lat();
        document.getElementById('address-longitude').value = place.geometry.location.lng();
      });
    }
  </script>
</body>
</html>

