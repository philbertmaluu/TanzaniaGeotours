@include('includes.header')

<body>

 @include('includes.head')

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

<!-- @can('shop_create')
                    <div style="margin-bottom: 10px;" class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">
                                Create Attractions
                            </a>
                        </div>
                    </div>
                @endcan -->

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Geo Attractions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Attractions</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
              

                
                    <div style="margin-bottom: 10px;" class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-success" href="{{ url("/attractions/create") }}">
                               Create Attractions
                            </a>
                        </div>
                    </div>
               

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Attractions</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead>
                                    <tr>
                                        <th width="10">#</th>
                                        
                                        <th>{{ trans('cruds.shop.fields.name') }}</th>
                                        <th>{{ trans('cruds.shop.fields.photos') }}</th>
                                        <th>{{ trans('cruds.shop.fields.address') }}</th>
                                        <th>{{ trans('cruds.shop.fields.active') }}</th>
                                        <th>{{ trans('global.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($shops as $key => $shop)
                                    <tr>
                                        <td>ATTR{{ $key + 1 }}2024</td>
                                       
                                        <td>{{ $shop->name ?? '' }}</td>
                                        <td>
                                            @foreach($shop->photos as $photo)
                                            <a href="{{ $photo->getUrl() }}" target="_blank">
                                                <img src="{{ $photo->getUrl('thumb') }}" width="50px" height="50px">
                                            </a>
                                            @endforeach
                                        </td>
                                        <td>{{ $shop->address ?? '' }}</td>
                                        <td>
                                            <input type="checkbox" disabled="disabled" {{ $shop->active ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                           
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.shops.show', $shop->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                           

                                            
                                            <a class="btn btn-xs btn-info" href="{{ route('attractions.destroy', $shop->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                           
                                            <form action="{{ route('attractions.destroy', $shop->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                          
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="ExtralargeModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Geotourism Attraction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="POST" action="{{ route('admin.shops.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                                <label for="floatingName">Your Name</label>
                            </div>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shop.fields.name_helper') }}</span>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingEmail" placeholder="Your Email">
                                <label for="floatingEmail">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea style="height: 100px;" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                                <label for="floatingTextarea">Address</label>
                            </div>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shop.fields.description_helper') }}</span>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <label for="floatingEmail">Photos</label>
                                <div class="needsclick dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}" id="photos-dropzone"></div>
                            </div>
                            @if($errors->has('photos'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photos') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shop.fields.photos_helper') }}</span>
                        </div>

                        <div class="mt-5">

                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.shop.fields.address') }}</label>
                            <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address') }}">
                            <input type="hidden" name="latitude" id="address-latitude" value="{{ old('latitude') ?? '0' }}" />
                            <input type="hidden" name="longitude" id="address-longitude" value="{{ old('longitude') ?? '0' }}" />
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
                                <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 ? 'checked' : '' }}>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Map Initialization Script -->
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize&language=en&region=GB" async defer></script>
<script>
   function initialize() {
    var map;
    var defaultCenter = { lat: -34.397, lng: 150.644 }; // Default center if no data

    map = new google.maps.Map(document.getElementById('address-map'), {
        center: defaultCenter,
        zoom: 8
    });

    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function () {
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17); // Why 17? Because it looks good.
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        document.getElementById('address-latitude').value = place.geometry.location.lat();
        document.getElementById('address-longitude').value = place.geometry.location.lng();
    });

    // Ensure map resizes correctly within the modal
    $('#ExtralargeModal').on('shown.bs.modal', function () {
        google.maps.event.trigger(map, 'resize');
        map.setCenter(defaultCenter); // Center map to default or existing center
    });
}


</script>

<script>
var uploadedPhotosMap = {}
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
            var files = {!! json_encode($shop->photos) !!};
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
            var message = response; // dropzone sends its own error messages in string
        } else {
            var message = response.errors.file;
        }
        file.previewElement.classList.add('dz-error');
        var _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]');
        var _results = [];
        for (var _i = 0, _len = _ref.length; _i < _len; _i++) {
            var node = _ref[_i];
            _results.push(node.textContent = message);
        }
        return _results;
    }
};
</script>



@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('shop_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.shops.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Shop:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>


@endsection



 @include('includes.footer')