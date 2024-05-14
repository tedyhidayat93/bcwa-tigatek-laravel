
@extends('layouts.app')

@section('content')
    @include('pages.cpanel.user_management.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            @include('layouts.components.app.alerts')
            <div class="row">
                <div class="col-md-2">
                    @include('pages.cpanel.user_management.components.side-menu')
                </div>

                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0 mt-1">
                                <i class="fas fa-key p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
                                Assign permission to role : <b class="text-teal"> {{ $role->name }} </b>
                            </h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ url('cpanel/user-management/roles/'.$role->id.'/give-permissions') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <h6>Chose Permission</h6>
                                    <div class="custom-control custom-checkbox my-3">
                                        <input class="custom-control-input" id="checkAll" type="checkbox" />
                                        <label class="custom-control-label" for="checkAll">Check/Uncheck All</label>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-4">
                                        @foreach ($permissions as $groupName => $groupedPermissions)
                                            <div class="col p-3">
                                                <div class="card shadow-sm h-100 rounded bg-white border permission-group card-deck">
                                                    <div class="card-body p-3 ">
                                                        <strong class="text-capitalize text-warning mb-2">{{ $groupName }}</strong>
                                                        @foreach ($groupedPermissions as $permission)
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input permission-checkbox"
                                                                    id="{{ $permission->id }}"
                                                                    type="checkbox"
                                                                    name="permission[]"
                                                                    value="{{ $permission->name }}"
                                                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                                                />
                                                                <label for="{{ $permission->id }}" class="custom-control-label">{{ $permission->name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="mb-3 mt-3">
                                    <a href="{{ url('cpanel/user-management/roles') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil checkbox master untuk check/uncheck all
        var checkAllCheckbox = document.getElementById('checkAll');

        // Ambil semua checkbox dengan kelas permission-checkbox
        var checkboxes = document.querySelectorAll('.permission-checkbox');

        // Periksa status semua checkbox saat halaman dimuat
        var allChecked = true;
        checkboxes.forEach(function(checkbox) {
            if (!checkbox.checked) {
                allChecked = false;
            }
        });
        checkAllCheckbox.checked = allChecked;

        // Tambahkan event listener untuk checkbox master
        checkAllCheckbox.addEventListener('change', function() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = checkAllCheckbox.checked; // Set semua checkbox sesuai status checkbox master
            });
        });

        // Tambahkan event listener untuk setiap checkbox
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var allChecked = true;
                checkboxes.forEach(function(checkbox) {
                    if (!checkbox.checked) {
                        allChecked = false;
                    }
                });

                // Jika semua checkbox dicentang, centang checkbox master; jika tidak, uncheck checkbox master
                checkAllCheckbox.checked = allChecked;
            });
        });
    });
</script>
@endsection
