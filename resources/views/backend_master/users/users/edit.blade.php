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

            <div class="col-lg-6">

                <div class="card m-0 pt-3">
                    <div class="card-body">

                        <form class="row g-3 needs-validation" method="post"
                            action="{{ url('panel/dashboard/users/update/' . $users->id) }}" novalidate method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-12">
                                <label for="yourName" class="form-label">User Name <span
                                        class="text-danger ">*</span></label>

                                <input type="text" value="{{ $users->name }}" name="name" id="yourName"
                                    class="form-control @error('name') is-invalid @enderror " required>


                                @if ($errors->has('name'))
                                    <div class="text-danger text-left" style="font-size:14px">
                                        {{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="col-12">
                                <label for="yourEmail" class="form-label">Email <span class="text-danger ">*</span></label>

                                <input type="email" value="{{ $users->email }}" name="email" id="yourEmail"
                                    class="form-control  @error('email') is-invalid @enderror has-validation " required>


                                @if ($errors->has('email'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="col-12">
                                <label for="validationCustom04" class="form-label">Role <span
                                        class="text-danger">*</span></label>

                                <select class="form-select" name='role' id="validationCustom04" required>

                                    {{--    @foreach ($users->roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach --}}
                                    value="">
                                    @foreach ($users->roles as $role)
                                        <option selected="" disabled="" value="{{ $role->id }}">
                                            {{ $role->name }}</option>
                                    @endforeach
                                    </option>
                                    @foreach ($roles as $role)
                                        <option
                                            {{ Form::checkbox('role[]', $role->id, in_array($role->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                            {{ $role->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('user_type'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('user_type') }}</div>
                                @endif
                            </div>
                            <div class="modal-footer " style="border: 0px">
                                <div class="text-left">

                                    <button type="submit" class="btn btn-secondary  btn-sm"><a
                                            href="{{ route('user.index') }}" style="color:whitesmoke "><i
                                                class="bi bi-arrow-clockwise" style="margin-right: 10px "
                                                class="spinner-border"></i>Backe to List </a></button>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save "
                                            style="margin-right: 10px "></i>Update</button>

                                </div>

                            </div>

                        </form>
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
            $(document).on('click', '#btn_store ', function() {
                $('#store_Modal').modal('show')
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#btn_show ', function() {
                var users_id = $(this).val();
                /*   alert(category_id) */
                $('#Show_Modal').modal('show')
                $('#update_id').val(users_id);
            });
        });
    </script>

    <style>
        th {
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
