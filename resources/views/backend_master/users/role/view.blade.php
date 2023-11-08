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

                            <div class="col-12">
                                <label for="NameRole" class="form-label">Name Role <span
                                        class="text-danger ">*</span></label>
                                <input type="text" value="{{ $roles->name }}" name="role" id="role"
                                    placeholder="ame role"
                                    class="form-control @error('role') is-invalid @enderror has-validation " required>

                                @if ($errors->has('role'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('role') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="validationCustom04" class="form-label">Permisson <span
                                        class="text-danger">*</span></label>


                                @foreach ($roles->permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name='permission'
                                            value="{{ $permission->id }}" id="" checked>
                                        <label class="form-check-label" for="{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                            <div class="modal-footer">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-secondary  btn-sm"><a
                                            href="{{ url('/panel/dashboard/role') }}" style="color:whitesmoke "><i
                                                class="bi bi-arrow-clockwise" style="margin-right: 10px "
                                                class="spinner-border"></i>Back To Lists </a></button>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save "
                                            style="margin-right: 10px "></i>Save</button>
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
