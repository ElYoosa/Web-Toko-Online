@extends('backend.v_layouts.app')
@section('content')
<!-- contentAwal -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body border-top">
                <h5 class="card-title"> {{$judul}}</h5>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading"> Selamat Datang, {{ Auth::user()->nama }}</h4>
                    Aplikasi Toko Online dengan hak akses yang anda miliki sebagai
                    <b>
                        @if (Auth::user()->role ==1)
                        Super Admin
                        @elseif(Auth::user()->role ==0)
                        Admin
                        @endif
                    </b>
                    ini adalah halaman utama dari aplikasi Web Programming. Studi Kasus Toko Online.
                    <hr>
                    <p class="mb-0">Kuliah..? BSI Aja !!!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body border-top">
                <div class="row">
  <!-- column -->
  <div class="col-lg-6">
    <!-- Latest Posts Card -->
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Latest Posts</h4>
      </div>
      <div class="comment-widgets scrollable">
        <!-- Comment Row -->
        <div class="d-flex flex-row comment-row m-t-0">
          <div class="p-2">
            <img src="assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle">
          </div>
          <div class="comment-text w-100">
            <h6 class="font-medium">James Anderson</h6>
            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.</span>
            <div class="comment-footer">
              <span class="text-muted float-right">April 14, 2016</span>
              <button type="button" class="btn btn-cyan btn-sm">Edit</button>
              <button type="button" class="btn btn-success btn-sm">Publish</button>
              <button type="button" class="btn btn-danger btn-sm">Delete</button>
            </div>
          </div>
        </div>
        <!-- Additional comments omitted for brevity -->
      </div>
    </div>

    <!-- To Do List Card -->
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">To Do List</h4>
        <div class="todo-widget scrollable" style="height:450px;">
          <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
            <li class="list-group-item todo-item" data-role="task">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck">
                <label class="custom-control-label todo-label" for="customCheck">
                  <span class="todo-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                  <span class="badge badge-pill badge-danger float-right">Today</span>
                </label>
              </div>
              <ul class="list-style-none assignedto">
                <li class="assignee"><img class="rounded-circle" width="40" src="assets/images/users/1.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="Steave"></li>
                <li class="assignee"><img class="rounded-circle" width="40" src="assets/images/users/2.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="Jessica"></li>
                <li class="assignee"><img class="rounded-circle" width="40" src="assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="Priyanka"></li>
                <li class="assignee"><img class="rounded-circle" width="40" src="assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="Selina"></li>
              </ul>
            </li>
            <!-- Additional To Do items omitted for brevity -->
          </ul>
        </div>
      </div>
    </div>

    <!-- Progress Box Card -->
    <div class="card">
      <div class="card-body">
        <h4 class="card-title m-b-0">Progress Box</h4>
        <div class="m-t-20">
          <div class="d-flex no-block align-items-center">
            <span>81% Clicks</span>
            <div class="ml-auto">
              <span>125</span>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 81%" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <!-- Additional Progress sections omitted for brevity -->
      </div>
    </div>

    <!-- News Updates Card -->
    <div class="card">
      <div class="card-body">
        <h4 class="card-title m-b-0">News Updates</h4>
      </div>
      <ul class="list-style-none">
        <li class="d-flex no-block card-body">
          <i class="fa fa-check-circle w-30px m-t-5"></i>
          <div>
            <a href="#" class="m-b-0 font-medium p-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
            <span class="text-muted">dolor sit amet, consectetur adipiscing</span>
          </div>
          <div class="ml-auto">
            <div class="text-right">
              <h5 class="text-muted m-b-0">20</h5>
              <span class="text-muted font-16">Jan</span>
            </div>
          </div>
        </li>
        <!-- Additional News items omitted for brevity -->
      </ul>
    </div>
  </div>
  <!-- end col-lg-6 -->
</div>

            </div>
        </div>
    </div>
</div>


<!-- contentAkhir -->
@endsection