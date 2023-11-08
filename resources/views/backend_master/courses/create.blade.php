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
                        <div class="row g-3 needs-validation">
                            <form action="{{ route('courses.store') }}" method="POST" class="row g-3 needs-validation"
                                novalidate enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="col-6">
                                    <label for="NameCategory" class="form-label">Course<span
                                            class="text-danger ">*</span></label>
                                    <input type="text" value="{{ old('name') }}" name="name" id="name"
                                        placeholder="Course"
                                        class="form-control @error('name') is-invalid @enderror has-validation " required>
                                    @if ($errors->has('name'))
                                        <div class="text-danger text-left " style="font-size:14px">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
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
                                    <label for="NameCategory" class="form-label">Category<span
                                            class="text-danger ">*</span></label>

                                    <select class="form-select" name="category_id" id="validationCustom04" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        @foreach ($categories as $item)
                                            <option value='{{ $item->id }}'>
                                                {{ $item->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label for="validationCustom04" class="form-label">Description <span
                                            class="text-danger">*</span></label>
                                    <textarea value="{{ old('description') }}" name="description" id="description" placeholder="Description"
                                        class="form-control @error('description') is-invalid @enderror has-validation " required></textarea>
                                    @if ($errors->has('description'))
                                        <div class="text-danger text-left " style="font-size:14px">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <label for="NameCategory" class="form-label">Prices <span
                                            class="text-danger ">*</span></label>
                                    <input type="number" value="{{ old('prices') }}" name="prices" id="prices"
                                        placeholder="Enter Prices"
                                        class="form-control @error('prices') is-invalid @enderror has-validation " required>
                                    @if ($errors->has('prices'))
                                        <div class="text-danger text-left " style="font-size:14px">
                                            {{ $errors->first('prices') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <label for="NameCategory" class="form-label">Image<span
                                            class="text-danger ">*</span></label>
                                    <input type="file" value="{{ old('image') }}" name="image" id="image"
                                        placeholder="Course Category"
                                        class="form-control @error('image') is-invalid @enderror has-validation "
                                        onchange="readURL(this);" required>

                                    @if ($errors->has('image'))
                                        <div class="text-danger text-left " style="font-size:14px">
                                            {{ $errors->first('image') }}
                                        </div>
                                    @endif

                                    <div class="img_slider">
                                        <img id="blah" src="{{ asset('./media/image slider.png') }}" alt="your image"
                                            style="width: 150p; height: 150px;   " />
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <div class="text-left d-flex">
                                        <button class="btn btn-secondary  btn-sm mx-2"><a
                                                href="{{ route('courses.index') }}" style="color:whitesmoke "><i
                                                    class="bi bi-arrow-clockwise" style="margin-right: 10px "
                                                    class="spinner-border"></i>Back To Lists
                                            </a></button>

                                        <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save "a
                                                style="margin-right: 10px "></i>Save</button>
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
                $('#deletetModal').modal('show')
                $('#delete_id').val(users_id);
            });
        });

        /*   $(document).ready(function() {
              $(document).on('click', '#btn_store ', function() {
                  $('#store_Modal').modal('show')
              });
          }); */

        /*  $(document).ready(function() {
             $(document).on('click', '#btn_show ', function() {
                 var users_id = $(this).val();
                 $('#Show_Modal').modal('show')
                 $('#update_id').val(users_id);
             });
         }); */


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
