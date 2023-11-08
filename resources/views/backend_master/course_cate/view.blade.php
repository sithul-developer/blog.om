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

            <div class="col-lg-7">
                <div class="card m-0 pt-3">
                    <div class="card-body">
                        <div class="col-12">
                            <label for="NameCategory" class="form-label">Course Category<span
                                    class="text-danger ">*</span></label>
                            {{-- <input type="text" value="{{ $course_category->category }}" name="category" id="category"
                                placeholder="Course Category"
                                class="form-control @error('category') is-invalid @enderror has-validation " required> --}}
                        </div>

                        <div class="col-12 pt-3">
                            <label for="validationCustom04" class="form-label">Description <span
                                    class="text-danger">*</span></label>
                            <textarea value="{{ $course_category->description }}" name="description" id="description" placeholder="description"
                                class="form-control @error('description') is-invalid @enderror has-validation " style="height: 100px" required> {{ $course_category->description }}</textarea>
                            @if ($errors->has('description'))
                                <div class="text-danger text-left " style="font-size:14px">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>

                        <div class="modal-footer">
                            <div class="text-left">
                                <button type="submit" class="btn btn-secondary  btn-sm mt-3"> <a
                                        href="{{ url('panel/dashboard/course_category') }}" style="color:whitesmoke "><i
                                            class="bi bi-arrow-clockwise" style="margin-right: 10px "
                                            class="spinner-border"></i>Back To Lists </a></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


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
