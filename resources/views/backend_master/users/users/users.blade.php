@extends('backend_master.index')
@section('content')
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
    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Table with stripped rows</h5>
                        <!-- Table with stripped rows -->
                        <table class="table table-hover   table-bordered">
                            <thead class="table-secondary	">
                                <tr>
                                    <th scope="row">No</</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>User_type</th>
                                    <th>Create At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        <td class="col">#</td>
                                        <td class="col">{{ $user->name }}</td>
                                        <td class="col">{{ $user->email }}</td>
                                        <td class="col">{{ $user->user_type }}</td>
                                        <td class="col">{{ $user->created_at->format('d-M-Y-h:i A') }}</td>
                                        <td class="col">
                                            <button type="button" class="btn btn-sm btn-outline-success"><a
                                                    href=""></a><i class="bi bi-pencil-square"></i></button>
                                            <button type="button" value="{{$user->id}}" id="btn_dalete" class="btn btn-sm btn-outline-danger "  data-bs-toggle="modal" data-bs-target="#disabledAnimation"><i
                                                    class="bi bi-trash-fill"></i></button>

                                        </td>
                                    </tr>

                            @include('backend_master.users.users.modal')
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>

            <div class="col-lg-4">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vertical Form</h5>

                        <!-- Vertical Form -->
                        <form class="row g-3 needs-validation" method="post" action="{{ route('user.store') }}" novalidate>
                            {{ csrf_field() }}

                            <div class="col-12">
                                <label for="yourName" class="form-label">User Name <span
                                        class="text-danger ">*</span></label>

                                <input type="text" value="{{ old('name') }}" name="name" id="yourName"
                                    class="form-control @error('name') is-invalid @enderror " required>
                                <div class="invalid-feedback">
                                    Please provide a valid name.
                                </div>

                                @if ($errors->has('name'))
                                    <div class="text-danger text-left" style="font-size:14px">
                                        {{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="col-12">
                                <label for="yourEmail" class="form-label">Email <span class="text-danger ">*</span></label>

                                <input type="email" value="{{ old('email') }}" name="email" id="yourEmail"
                                    class="form-control  @error('email') is-invalid @enderror has-validation " required>
                                <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>

                                @if ($errors->has('email'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" name="password" id="app_number"
                                    class="form-control  @error('password') is-invalid @enderror has-validation "
                                    id="yourPassword" value="{{ old('password') }}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid password.
                                </div>

                                @if ($errors->has('password'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="validationCustom04" class="form-label">Role <span
                                        class="text-danger">*</span></label>

                                <select class="form-select"name='user_type' id="validationCustom04" required>
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="0">Users</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Teacher</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid Choose.
                                </div>
                                @if ($errors->has('user_type'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('user_type') }}</div>
                                @endif
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary btn-md"><i class="bi bi-save "
                                        style="margin-right: 10px "></i>Save</button>
                                <button type="submit" class="btn btn-secondary"><a
                                        href="{{ url('/panel/dashboard/user') }}" style="color:whitesmoke "><i
                                            class="bi bi-arrow-clockwise"
                                            style="margin-right: 10px " class="spinner-border"></i>Cancel </a></button>


                            </div>
                        </form>
                        <!-- Vertical Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#btn_dalete ', function() {
                var users_id = $(this).val();
                   /*   alert(category_id) */
                $('#deletetModal').modal('show')
                $('#delete_id').val(users_id);
            });
        });

        $(document).ready(function() {
            $(".close").click(function() {
                $("#Message").hide();
            });

        });
    </script>

    <style>
        th{
            font-size: 0.90rem;
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
    </style>
@endsection
