@extends('backend_master.index')
@section('content')
    <section>



        <nav class="pb-2" style="display: flex">
            {{--     @can('role view') --}}
            <a href=" {{ url('/panel/dashboard/videos/create') }}">
                <button type="submit" class="btn  btn-outline-secondary      btn-md mb-2  " style="font-size: 15px;"><i
                        class="bi bi-plus-circle me-2 " onclick="this.classList.toggle('button--loading')"></i> Add Videos
                </button></a>
            {{--       @endcan --}}

            <form class="search-form d-flex align-items-center" method="POST" action="#"
                style="position: absolute; right: 28px;}">
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

                            <h5 class="card-title"> <span>All of Video</span></h5>
                            <table class="table table-hover   striped">
                                <thead>
                                    <tr>

                                        <th scope="col"id="col">No</th>
                                        <th scope="col"id="col">Videos</th>
                                        <th scope="col"id="col">Course_Name</th>
                                        <th scope="col"id="col">Title</th>
                                        <th scope="col"id="col">Description </th>
                                        <th scope="col"id="col">Status</th>
                                        <th scope="col"id="col">Create_at</th>
                                        <th scope="col"id="col">Update_at</th>
                                        <th scope="col"id="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($videos as $video)
                                    <tbody>
                                        <tr>
                                            <td class="col">{{ $video->id }}</td>
                                            <td scope="row">
                                                <iframe  width="85" height="48" style="border-radius: 5px; " src="{{ $video->videos }}" frameborder="0" allowfullscreen"></iframe>


                                                            </td>
                                                            <td class="col" id="column">{{ $video->course->name ?? 'None' }}</td>

                                                            <td class="col" style=" width:300px" id="column">
                                                                <p class="textSort">{{ $video->title }}</p>
                                                                </td>

                                                            <td class="col" id="column">{{ $video->description }}</td>
                                                            <td class="col" id="column">

                                                                <a href="{{ url('/panel/dashboard/video/' . $video->id) }}" <button
                                                                    class="badge  text-white  btn btn-{{ $video->status ? 'danger' : 'primary' }}">{{ $video->status ? 'Inactive' : 'Active' }}
                                                                    </button> </a>
                                                            </td>

                                                            <td class="col" id="column">
                                                                {{ $video->created_at->format('d/M/Y') }}
                                                            </td>
                                                            <td class="col" id="column">
                                                                {{ Carbon\Carbon::parse($video->update_at)->format('d/M/Y') }}
                                                            </td>
                                                            <td class="col" id="column">

                                                                <div class="btn-group" role="group" aria-label="Basic outlined example">


                                                                    <a href="{{ url('/panel/dashboard/videos/edit/' . $video->id) }}"><i
                                                                            class="bi bi-pencil-square  btn btn-sm btn-outline-success btn-outline-success"></i>
                                                                    </a>



                                                                    <button type="submit" value="{{ $video->id }}" id="btnDelete"
                                                                        class="btn btn-sm btn-outline-danger "
                                                                        style="border-radius: 5px ;margin: 0px 6px 0px 5px;" <a
                                                                        href="" value="{{ $video->id }}"></a><i
                                                                            class="bi bi-trash"></i>
                                                                    </button>

                                                                    <a
                                                                        href="{{ url('/panel/dashboard/course_category/view/' . $video->id) }}"><i
                                                                            class="bi bi-eye    btn btn-sm btn-outline-success btn-outline-success"></i>
                                                                    </a>
                                                                </div>

                                                            </td>
                                                        </tr>

                                                    </tbody>
     @endforeach
                            </table>

                            <!-- End Table with stripped rows -->
                            @include('backend_master.videos.modal')

                        </div>
                    </div>
                </div>

            </div>
        </section>






        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $(document).on('click', '#btnDelete ', function() {
                    var video_id = $(this).val();
                    $('#deletetModal').modal('show')
                    $('#deleteid').val(video_id);
                });
            });

            document.getElementById('myIframe').contentDocument.designMode = 'off';
            document.getElementById('myIframe').contentDocument.body.contentEditable = false;
        </script>

        <style>
            .textSort {
                max-height: 42px;
                width: 200px;
                margin-bottom: 10px;
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                -moz-line-clamp: 2;
                -moz-box-orient: vertical;
                color: #707070 font-size: 0.80rem;

            }
            #myIframe {
                width: 100%;
                height: 48px;
                /* Adjust the height as needed */
            }

            .ytp-watermark {
                display: none !important;
            }

            #column {
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
