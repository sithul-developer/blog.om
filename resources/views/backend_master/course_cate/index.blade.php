@extends('backend_master.index')
@section('content')
    <section>

        {{--   <div class="pagetitle">
            <h1>Form Layouts</h1>
            <nav >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Layouts</li>
                </ol>
            </nav>
        </div> --}}
        <nav class="pb-2" style="display: flex">
          {{--   @can('role view') --}}
                <a href=" {{ url('/panel/dashboard/course_category/create') }}">
                    <button type="submit" class="btn  btn-outline-secondary      btn-md mb-2  " style="font-size: 15px;"><i
                            class="bi bi-plus-circle me-2 " onclick="this.classList.toggle('button--loading')"></i> Add
                        Category</button>
                </a>
        {{--     @endcan --}}
            <form class="search-form d-flex align-items-center" method="POST" action="#"
            style="position: absolute; right: 28px;">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Searah everthing"
                    aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i> </span>
            </div>
        </form>
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" style="overflow-x:auto;">
                            <h5 class="card-title"> <span>All of Category </span></h5>
                            <table class="table  table-hover striped ">
                                <thead>
                                    <tr>
                                        <th scope="col" id="col">No</th>
                                        <th scope="col" id="col">Category</th>
                                        <th scope="col" id="col">Description </th>
                                        {{--  <th>Status</th> --}}
                                        <th scope="col" id="col">Create_at</th>
                                        <th scope="col" id="col">Update_at</th>
                                        <th scope="col" id="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($course_category as $course_category)
                                        <tr>
                                            <td class="col" id="column">{{ $course_category->id }}</td>
                                            <td class="col" id="column">{{ $course_category->name }}</td>
                                            <td class="col" id="column">{{ $course_category->description }}</td>
                                            <td class="col" id="column">{{ $course_category->created_at->format('d/M/Y') }}
                                            </td>
                                            <td class="col" id="column">
                                                {{ Carbon\Carbon::parse($course_category->update_at)->format('d/M/Y') }}
                                            </td>
                                            <td class="col" id="column" >

                                                <div class="btn-group" role="group" aria-label="Basic outlined example">


                                                    <a
                                                        href="{{ url('/panel/dashboard/course_category/edit/' . $course_category->id) }}"><i
                                                            class="bi bi-pencil-square  btn btn-sm btn-outline-success btn-outline-success"></i>
                                                    </a>



                                                    <button type="submit" value="{{ $course_category->id }}" id="btnDelete"
                                                        class="btn btn-sm btn-outline-danger "
                                                        style="border-radius: 5px ;margin: 0px 6px 0px 5px;" <a
                                                        href="" value="{{ $course_category->id }}"></a><i
                                                            class="bi bi-trash"></i>
                                                    </button>
                                                    <a
                                                        href="{{ url('/panel/dashboard/course_category/view/' . $course_category->id) }}"><i
                                                            class="bi bi-eye    btn btn-sm btn-outline-success btn-outline-success"></i>
                                                    </a>
                                                </div>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                            @include('backend_master.course_cate.modal')

                        </div>
                    </div>
                </div>

            </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $(document).on('click', '#btnDelete ', function() {
                    var Courses_Category = $(this).val();
                    $('#deletetModal').modal('show')
                    $('#deleteid').val(Courses_Category);
                });
            });
        </script>

        <style>
             #column{
                color: #707070
            }
            thead {
                border: 1px solid #f2f2f2;
                padding: 10px;
            }

            .col {
                text-align: center;

            }

            #col {
                padding: 20px;
                color: #565454

            }

            th {
                font-size: 0.80rem;
                font-family: Krasar, sans-serif;
                text-align: center;


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
                /*   padding: .575rem .75rem; */
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
