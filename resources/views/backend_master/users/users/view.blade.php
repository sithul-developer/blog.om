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
                        {{ csrf_field() }}
                        <div class="col-12">
                            <label for="yourName" class="form-label">User Name <span class="text-danger ">*</span></label>
                            <input type="text" value="{{ $users->name }}" name="name" id="yourName"
                                class="form-control @error('name') is-invalid @enderror " required>
                        </div>
                        <div class="col-12">
                            <label for="yourEmail" class="form-label">Email <span class="text-danger ">*</span></label>
                            <input type="email" value="{{ $users->email }}" name="email" id="yourEmail"
                                class="form-control  @error('email') is-invalid @enderror has-validation " required>
                        </div>
                        <div class="col-12">
                            <label for="validationCustom04" class="form-label">Role <span
                                    class="text-danger">*</span></label>

                            <select class="form-select"name='user_type' value='{{ $users->user_type }}'
                                id="validationCustom04" required>

                                @foreach ($users->roles as $role)
                                    <option option {{ $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('user_type'))
                                <div class="text-danger text-left " style="font-size:14px">
                                    {{ $errors->first('user_type') }}</div>
                            @endif
                        </div>
                        <div class="modal-footer mt-3 " style="border: 0px">
                            <div class="text-left">
                                <button type="submit" class="btn btn-secondary  btn-sm"><a
                                        href="{{ url('/panel/dashboard/users') }}" style="color:whitesmoke "><i
                                            class="bi bi-arrow-clockwise" style="margin-right: 10px "
                                            class="spinner-border"></i>Back to List </a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
