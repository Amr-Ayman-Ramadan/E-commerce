@extends("layout.dashboard.app")

@section("title","Countries")

@push('styles')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #28a745;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #28a745;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 24px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endpush

@section("content")
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Countries</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Countries
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="dropdown float-md-right">
                        <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"
                                type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton">
                            <a class="dropdown-item" href="{{ route('dashboard.countries.index') }}"><i class="la la-list"></i> View Countries</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('dashboard.index') }}"><i class="la la-home"></i> Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Countries Management</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead class="bg-primary white">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Phone Code</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($counties as $country)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $country->name ?? 'N/A' }}</td>
                                                <td>{{ $country->phone_code }}</td>
                                                <td>
                                                    <span class="badge badge-{{ $country->is_active == 'active' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($country->is_active) }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <label class="switch">
                                                        <input type="checkbox"
                                                               class="status-toggle"
                                                               data-country-id="{{ $country->id }}"
                                                            {{ $country->is_active === 'active' ? 'checked' : '' }}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No countries found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.status-toggle').change(function() {
                const checkbox = $(this);
                const countryId = checkbox.data('country-id');
                const isActive = checkbox.is(':checked');

                checkbox.prop('disabled', true);

                $.ajax({
                    url: "{{ route('dashboard.countries.changeStatus', ':country') }}".replace(':country', countryId),
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        showNotification('success', response.message || 'Status updated successfully!');

                        const statusBadge = checkbox.closest('tr').find('.badge');
                        if (isActive) {
                            statusBadge.removeClass('badge-danger').addClass('badge-success').text('Active');
                        } else {
                            statusBadge.removeClass('badge-success').addClass('badge-danger').text('Inactive');
                        }

                        checkbox.prop('disabled', false);
                    },
                    error: function(xhr) {
                        checkbox.prop('checked', !isActive);
                        checkbox.prop('disabled', false);

                        showNotification('error', xhr.responseJSON?.message || 'Failed to update status!');
                    }
                });
            });

            function showNotification(type, message) {
                const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
                const alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                <strong>${type === 'success' ? 'Success!' : 'Error!'}</strong> ${message}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        `;

                $('.card-body .alert').remove();

                $('.card-body').prepend(alertHtml);

                setTimeout(function() {
                    $('.alert').fadeOut('slow', function() {
                        $(this).remove();
                    });
                }, 3000);
            }
        });
    </script>
@endpush
