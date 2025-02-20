@extends('layouts.main')

@section('content')

<div id="content">

  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
 
    <form class="form-inline">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
    </form>
 
    <ul class="navbar-nav ml-auto">
      <div class="topbar-divider d-none d-sm-block"></div>
    
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
          <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
        </a>
     
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- End of Topbar -->
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Pasien</h1>
    <p class="mb-4">Daftar pasien anda</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pasien Anda
          <span>
            <a href="{{ route('dokter.create') }}" class="btn btn-primary ml-4 font-weight-bold">
              + Tambah Pasien
            </a>
          </span>
        </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Pasien</th>
                <th>Alamat Pasien</th>
                <th>Tanggal Berobat</th>
                <th>Keluhan</th>
                <th>Nama Dokter</th>
                <th>Obat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Nama Pasien</th>
                <th>Alamat Pasien</th>
                <th>Tanggal Berobat</th>
                <th>Keluhan</th>
                <th>Nama Dokter</th>
                <th>Obat</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($pasiens as $p)
             
              <tr>
                <td>{{ $p->nama_pasien }}</td>
                <td>{{ $p->alamat_pasien }}</td>
                <td>{{ $p->tgl_datang }}</td>
                <td>{{ $p->keluhan_pasien }}</td>
                <td>{{ $p->dokter->nama_dokter }}</td>
                <td>{{ $p->nama_obat }}</td>
                <td>
                  <span>
                    <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-warning">
                      Edit
                    </a>
                  </span>
                  <span>
                    <a href="{{ route('pasien.show', $p->id) }}" class="btn btn-success">
                      Info
                    </a>
                  </span>
                  <form action="{{ route('pasien.destroy', $p->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <span><button onclick="return confirm('Are you sure?')" class="btn btn-danger d-block"
                        type="submit">Hapus</button></span>
                  </form>
                </td>
              </tr>
              @endforeach
           
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection