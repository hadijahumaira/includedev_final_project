@extends('layout.admin')
@push('css')
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fullcalendar/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i><i
                                    class="fas fa-pencil-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah Tugas</span>
                                <span class="info-box-number">
                                    {{ $jumlahtugas }}
                                    <small>File</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clipboard-list"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah ToDo List</span>
                                <span class="info-box-number">{{ $jumlahtodolist }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-spinner fa"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah Doing List</span>
                                <span class="info-box-number">{{ $jumlahdoinglist }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah Done List</span>
                                <span class="info-box-number">{{ $jumlahdonelist }}</span>
                            </div>
                            <!-- /.info-box-content -->

                        </div>

                    </div>

                    <!--/. container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
              <div class="row">
                  
                  <!-- /.col -->
                  <div class="col-md-12">
                      <div class="card card-primary">
                          <div class="card-body p-0">
                              <!-- THE CALENDAR -->
                              <div id="calendar"></div>
                          </div>
                          <!-- /.card-body -->
                      </div>

                      <div id="modal-view-event" class="modal modal-top fade calendar-modal">
                          <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                  <div class="modal-body">
                                      <h4 class="h4">
                                          <span class="event-icon weight-400 mr-3"></span><span
                                              class="event-title"></span>
                                      </h4>
                                      <div class="event-body">
                                        <form action="updatecalendar" method="POST" enctype="multipart/form-data">
                                          @csrf
                                          <input type="hidden" name="id" id="idevent">
                                          <div class="mb-3">
                                              <label for="exampleInputEmail1" class="form-label">Title</label>
                                              <input type="text" name="nama" class="form-control" id="title">
                                          </div>
                                          <div class="mb-3">
                                              <label for="exampleInputEmail1" class="form-label">Status</label>
                                              <select class="form-select form-control" name="status" id="status">
                                                  <option value="ToDo">ToDo</option>
                                                  <option value="Doing">Doing</option>
                                                  <option value="Done">Done</option>
              
                                              </select>
                                          </div>
                                          <div class="mb-3">
                                              <label for="exampleInputEmail1" class="form-label">Deadline</label>
                                              <input type="date" name="deadline" class="form-control" id="deadline">
                                          </div>
                                          <button type="submit" class="btn btn-primary">UPDATE</button>
                                        </form>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <form action="deletecalendar" method="post">
                                        @csrf
                                        <input type="hidden" name="id" id="idcalendar">
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                      </form>
                                      <button type="button" class="btn btn-primary"
                                          data-dismiss="modal">
                                          Close
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- /.card -->
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
    </div>
@endsection

@push('scripts')
    <!-- jQuery UI -->
    <script src="{{ asset('template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template/plugins/fullcalendar/main.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if (Session::has('success'))
          toastr.success("{{ Session::get('success') }}");
        @endif
        $(function() {
            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;

            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'today',
                    center: 'title',
                    right: 'prev,next'
                },
                themeSystem: 'bootstrap',
                //Random default events
                events: [
                    @foreach ($data as $row)
                        @if ($row->status == 'ToDo')
                            @php $color = '#0073b7'; @endphp
                        @elseif ($row->status == 'Doing')
                            @php $color = '#f39c12'; @endphp
                        @elseif ($row->status == 'Done')
                            @php $color = '#00a65a'; @endphp
                        @endif 
                        {
                          id: "{{ $row->id }}",
                          title: "{{ $row->nama }}",
                          extendedProps: {
                            status: "{{ $row->status }}",
                            deadline: "{{ date('Y-m-d', strtotime($row->deadline)) }}"
                          },
                          start: "{{ $row->deadline }}",
                          backgroundColor: "{{ $color }}",
                          borderColor: "{{ $color }}",
                          allDay: true
                        },
                    @endforeach
                ],
                eventClick: function(info) {
                  var deadline = info.event.extendedProps.deadline;
                  $('#idevent').val(info.event.id);
                  $('#idcalendar').val(info.event.id);
                  $('#title').val(info.event.title);
                  $('#status').val(info.event.extendedProps.status);
                  $('#deadline').val(deadline);
                  $('#modal-view-event').modal();
                }
            });

            calendar.render();

        })
    </script>
@endpush