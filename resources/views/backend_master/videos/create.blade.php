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
            <div class="col-lg-12">
                <div class="card m-0 pt-3">
                    <div class="card-body">
                        <form action="{{ route('videos.store') }}" method="POST" class="row g-3 needs-validation"
                            novalidate enctype="multipart/form-data" >
                            {{ csrf_field() }}

                            <div class="col-6">
                                <label for="NameCategory" class="form-label">Title<span
                                        class="text-danger ">*</span></label>
                                <input type="text" value="{{ old('title') }}" name="title" id="title"
                                    placeholder="Enter Title"
                                    class="form-control @error('title') is-invalid @enderror has-validation " required>
                                @if ($errors->has('title'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-6">
                                <label for="NameCategory" class="form-label">Status<span
                                        class="text-danger ">*</span></label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckDefault"
                                      checked>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Active</label>



                                </div>
                                @if ($errors->has('course_name'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('course_name') }}
                                    </div>
                                @endif
                            </div>


                            <div class="col-6">
                                <label for="NameCategory" class="form-label">Courses Name<span
                                        class="text-danger ">*</span></label>

                                <select class="form-select" name='course_name' value="{{ old('course_name') }}"
                                    id="validationCustom04" value="{{ old('course_name') }}" required>
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('courses_name'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('courses_name') }}
                                    </div>
                                @endif
                            </div>


                            <div class="col-6">
                                <label for="NameCategory" class="form-label">Image<span
                                        class="text-danger ">*</span></label>
                                <input type="file" value="{{ old('videos ') }}" name="videos" id="videos"
                                    placeholder="Course Category"
                                    class="form-control @error('videos') is-invalid @enderror has-validation "
                                    onchange="readURL(this);" required>
                                <div class="img_slider">
                                    <img id="blah" src="{{ asset('./media/image slider.png') }}" alt="your image"
                                        style="width: 150p; height: 150px; position:absolute  " />
                                </div>
                                @if ($errors->has('image'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('image') }}
                                    </div>
                                @endif
                            </div>


                            <div class="col-6">
                                <label for="validationCustom04" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea value="{{ old('description') }}" name="description" id="description" placeholder="Description"
                                    class="form-control @error('description') is-invalid @enderror has-validation " style="height: 100px" required></textarea>

                                @if ($errors->has('description'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>

                            <div class="modal-footer">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-secondary  btn-sm"><a
                                            href="{{ url('panel/dashboard/course_category') }}"
                                            style="color:whitesmoke "><i class="bi bi-arrow-clockwise"
                                                style="margin-right: 10px " class="spinner-border"></i>Back To Lists
                                        </a></button>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save "
                                            style="margin-right: 10px "></i>Save</button>
                                </div>
                            </div>
                        </form>
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


        ///
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }

        }
        //

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

        label {
            font-size: 0.85rem;
            font-family: Krasar, sans-serif;
        }
    </style>
@endsection
