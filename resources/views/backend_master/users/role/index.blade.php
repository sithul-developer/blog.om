@extends('backend_master.index')
@section('content')
    <section>

        <div class="pagetitle">
            <h1>Form Layouts</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Layouts</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @can('role view')
            <a href=" {{ url('/panel/dashboard/role/create') }}">
                <button type="submit" class="btn btn-secondary btn-md mb-2  "
                    style="font-size: 15px;
        font-weight: bold;
        "><i class="bi bi-plus-circle me-2 "
                        onclick="this.classList.toggle('button--loading')"></i> Add Role</button></a>
        @endcan

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" style="overflow-x:auto;">
                            <!-- Table with stripped rows -->
                            <table class="table table-hover  table-bordered  mt-3">
                                <thead class="table-secondary	">
                                    <tr>
                                        <th scope="row">No</th>
                                        <th>Role_Name</th>
                                        <th>Permission</th>
                                        {{--        <th>Status</th> --}}
                                        <th>Create_at</th>
                                        <th>Update_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($roles as $role)
                                        <tr>
                                            <td class="col">{{ $role->id }}</td>
                                            <td class="col">{{ $role->name }}</td>
                                            <td class="col">
                                                @foreach ($role->permissions as $permission)
                                                    <span class="badge bg-secondary">{{ $permission->name }}</span>
                                                @endforeach


                                            </td>

                                            {{--  <td class="col">
                                            @if (!empty($role->user_type == 0))
                                                <span class="tag tag-success badge bg-success "> User </span>
                                            @else
                                                <span class="tag tag-success badge bg-success "> Admin</span>
                                            @endif
                                        </td> --}}
                                            {{-- <td class="col">
                                            @if (!empty($role->status == 0))
                                                <span class="tag tag-success badge bg-primary"> Active </span>
                                            @else
                                                <span class="tag tag-success badge bg-danger "> Inactive</span>
                                            @endif
                                        </td> --}}
                                            <td class="col">{{ $role->created_at->format('d-M-Y-h:i A') }}</td>
                                            <td class="col">
                                                {{ Carbon\Carbon::parse($role->update_at)->format('d-M-Y-h:i A') }}</td>
                                            <td class="col">

                                                <div class="btn-group" role="group" aria-label="Basic outlined example">


                                                    <a href="{{ url('/panel/dashboard/role/edit/' . $role->id) }}"><i
                                                            class="bi bi-pencil-square  btn btn-sm btn-outline-success btn-outline-success"></i>
                                                    </a>



                                                    <button type="submit" value="{{ $role->id }}" id="btnDelete"
                                                        class="btn btn-sm btn-outline-danger "
                                                        style="border-radius: 5px ;margin: 0px 6px 0px 5px;" <a
                                                        href="" value="{{ $role->id }}"></a><i
                                                            class="bi bi-trash"></i>
                                                    </button>
                                                    <a href="{{ url('/panel/dashboard/role/view/' . $role->id) }}"><i
                                                            class="bi bi-eye    btn btn-sm btn-outline-success btn-outline-success"></i>
                                                    </a>
                                                </div>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                            @include('backend_master.users.role.modal')

                        </div>
                    </div>
                </div>

            </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $(document).on('click', '#btnDelete ', function() {
                    var role = $(this).val();
                    $('#deletetModal').modal('show')
                    $('#deleteid').val(role);
                });
            });
        </script>

        <style>
            th {
                font-size: 0.80rem;
                font-family: Krasar, sans-serif;
            }

            td {
                font-size: 0.85rem;
                font-family: Krasar, sans-serif;
            }

            .form-label {
                font-family: Krasar, sans-serif;
                font-size: 16px;
            }

            .form-control {
                padding: .575rem .75rem;
                font-size: 0.85rem;

            }

            .form-select {

                padding: .575rem 2.25rem 0.585rem .75rem;
                font-size: 0.85rem;

            }

            .button {
                position: relative;
                padding: 8px 16px;
                background: #009579;
                border: none;
                outline: none;
                border-radius: 2px;
                cursor: pointer;
            }

            .button:active {
                background: #007a63;
            }

            .button__text {
                font: bold 20px "Quicksand", san-serif;
                color: #ffffff;
                transition: all 0.2s;
            }

            .button--loading .button__text {
                visibility: hidden;
                opacity: 0;
            }

            .button--loading::after {
                content: "";
                position: absolute;
                width: 16px;
                height: 16px;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                margin: auto;
                border: 4px solid transparent;
                border-top-color: #ffffff;
                border-radius: 50%;
                animation: button-loading-spinner 1s ease infinite;
            }

            @keyframes button-loading-spinner {
                from {
                    transform: rotate(0turn);
                }

                to {
                    transform: rotate(1turn);
                }
            }
        </style>
    </section>
@endsection
