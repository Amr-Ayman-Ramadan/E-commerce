@extends("layout.dashboard.app")

@section("title","Roles")

@section("content")
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Roles</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.roles.index') }}">Roles</a>
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
                            <a class="dropdown-item" href="{{ route('dashboard.roles.create') }}"><i class="la la-plus"></i> Create Role</a>
                            <a class="dropdown-item" href="{{ route('dashboard.roles.index') }}"><i class="la la-list"></i> View Roles</a>
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
                            <h4 class="card-title">Roles Management</h4>
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
                                            <th>Role Name</th>
                                            <th>Permissions</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $role->getTranslation('role', app()->getLocale()) }}</td>
                                                <td>
                                                    @foreach((array)($role->permissions ?? []) as $permission)
                                                        @if(is_string($permission))
                                                            <span class="badge badge-primary">{{ $permission }}</span>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ $role->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('dashboard.roles.edit', $role) }}" class="btn btn-sm btn-info">
                                                            <i class="la la-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('dashboard.roles.delete', $role) }}" method="POST" style="display: inline-block">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                                <i class="la la-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
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
            </div>
        </div>
    </div>
@endsection
