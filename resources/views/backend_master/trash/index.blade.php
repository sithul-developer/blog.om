@extends('backend_master.index')
@section('content')
    <section>
        <nav class="pb-2" style="display: flex">
            <button type="submit" class="btn  btn-outline-secondary      btn-md mb-2  " style="font-size: 15px;"> Trash of
                Manage
            </button>
            <form class="search-form d-flex align-items-center" method="POST" action="#"
                style="position: absolute; right: 28px;}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Searah everthing"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i> </span>
                </div>
            </form>
        </nav>

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Accordion</h5>

              <!-- Default Accordion -->
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Trash of Video
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body" style="overflow-x:auto;">

                                <h5 class="card-title"> <span>Trash of Video </span></h5>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col"id="col">No</th>
                                            <th scope="col"id="col">Videos</th>
                                            <th scope="col"id="col">Create_at</th>
                                            <th scope="col"id="col">Update_at</th>
                                            <th scope="col"id="col">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($videos as $item)
                                        <tbody>
                                            <tr>
                                                <td class="col">{{ $item->id }}</td>
                                                <td class="col">{{ $item->title }}</td>

                                                <td class="col">
                                                    {{ $item->created_at->format('d/M/Y') }}
                                                </td>
                                                <td class="col">
                                                    {{ Carbon\Carbon::parse($item->update_at)->format('d/M/Y') }}
                                                </td>
                                                <td class="col">
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">


                                                        <form method="POST"
                                                            action="{{ route('trash.destroy_video', ['id' => $item->id]) }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger btn-sm" role="button"
                                                                type="submit"><i
                                                                class="bi bi-trash"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>

                                @include('backend_master.course_cate.modal')

                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Trash of Courese #2
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body" style="overflow-x:auto;">

                                <h5 class="card-title"> <span>Trash of Courese </span></h5>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col"id="col">No</th>
                                            <th scope="col"id="col">Name</th>
                                            <th scope="col"id="col">Create_at</th>
                                            <th scope="col"id="col">Update_at</th>
                                            <th scope="col"id="col">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($courses as $item)
                                        <tbody>
                                            <tr>
                                                <td class="col">{{ $item->id }}</td>
                                                <td class="col"> <img src="{{ $item->getImage() }}" width="50px" height="50px" alt=""></td>
                                                <td class="col">{{ $item->name }}</td>
                                                <td class="col" >
                                                    {{ $item->created_at->format('d/M/Y') }}
                                                </td>
                                                <td class="col">
                                                    {{ Carbon\Carbon::parse($item->update_at)->format('d/M/Y') }}
                                                </td>
                                                <td class="col">
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        {{--   <button type="submit" value="{{ $item->id }}" id="btnDelete"
                                                            class="btn btn-sm btn-outline-danger "
                                                            style="border-radius: 5px ;margin: 0px 6px 0px 5px;" <a
                                                            href="" value="{{ $item->id }}"></a><i
                                                                class="bi bi-trash"></i>
                                                        </button> --}}

                                                        <form method="POST"
                                                            action="{{ route('trash.destroy_course', ['id' => $item->id]) }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger btn-sm" role="button"
                                                                type="submit"><i
                                                                class="bi bi-trash"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                <!-- End Table with stripped rows -->


                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Trash of Category #3
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body" style="overflow-x:auto;">
                                <h5 class="card-title"> <span>Trash of Category </span></h5>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col"id="col">No</th>
                                            <th scope="col"id="col">Name</th>
                                            <th scope="col"id="col">Create_at</th>
                                            <th scope="col"id="col">Update_at</th>
                                            <th scope="col"id="col">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($category as $item)
                                        <tbody>
                                            <tr>
                                                <td class="col">{{ $item->id }}</td>
                                                <td class="col">{{ $item->name }}</td>
                                                <td class="col" style="display: flex">
                                                    {{ $item->created_at->format('d/M/Y') }}
                                                </td>
                                                <td class="col">
                                                    {{ Carbon\Carbon::parse($item->update_at)->format('d/M/Y') }}
                                                </td>
                                                <td class="col">
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        {{--   <button type="submit" value="{{ $item->id }}" id="btnDelete"
                                                            class="btn btn-sm btn-outline-danger "
                                                            style="border-radius: 5px ;margin: 0px 6px 0px 5px;" <a
                                                            href="" value="{{ $item->id }}"></a><i
                                                                class="bi bi-trash"></i>
                                                        </button> --}}

                                                        <form method="POST"
                                                            action="{{ route('trash.destroy', ['id' => $item->id]) }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger btn-sm" role="button"
                                                                type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                @include('backend_master.course_cate.modal')
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div><!-- End Default Accordion Example -->

            </div>
          </div>

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
            thead {
                border: 1px solid #f2f2f2;
                padding: 10px;
            }

            .col {
                text-align: center;
            }

            #col {
                padding: 20px
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
