<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          @if(Auth::user()->foto == 'null')
          <img src="{{ asset('img/avatar.png')}}" alt="image profile" class="avatar-img rounded-circle">
          @else
          <img src="{{ Storage::url(Auth::user()->foto)}}" alt="image profile" class="avatar-img rounded-circle">
          @endif
        </div>
        <div class="info">
          <a href="{{route('User.viewprofil')}}" aria-expanded="true">
            <span>
              {{Auth::user()->nama}}
              <span class="user-level">{{Auth::user()->tipe_user}}</span>
            </span>
          </a>
          <div class="clearfix"></div>
        </div>
      </div>
      <ul class="nav nav-primary">
        <li class="nav-item @yield('statusdashboard')">
          <a href="{{route('dashboard')}}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item @yield('statustipepegawai')">
          <a href="{{route('tipePegawai.index')}}">
            <i class="fas fa-laptop"></i>
            <p>Data Aset IT</p>
          </a>
        </li>
        <li class="nav-item @yield('statustipepegawai')">
          <a href="{{route('tipePegawai.index')}}">
            <i class="fas fa-user-edit"></i>
            <p>Monitoring</p>
          </a>
        </li>
        <li class="nav-item @yield('statuskaryawan')">
          <a data-toggle="collapse" href="#base">
            <i class="fas fa-arrows-alt-h"></i>
            <p>Mutasi</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="base">
            <ul class="nav nav-collapse">
              <li class="@yield('statusdatakaryawan')">
                <a href="{{ route('Karyawan.index')}}">
                  <span class="sub-item">Data Mutasi</span>
                </a>
              </li>
              <li class="@yield('statusdatakeluarga')">
                <a href="{{route('Keluarga.index')}}">
                  <span class="sub-item">Memo Mutasi</span>
                </a>
              </li>
              <li class="@yield('statusdatasertifikasi')">
                <a href="{{route('Sertifikasi.index')}}">
                  <span class="sub-item">Berita Acara</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item @yield('statustipepegawai')">
          <a href="{{route('tipePegawai.index')}}">
            <i class="fas fa-print"></i>
            <p>Cetak Label</p>
          </a>
        </li>
        <li class="nav-item @yield('statustipepegawai')">
          <a href="{{route('tipePegawai.index')}}">
            <i class="fas fa-keyboard"></i>
            <p>Jenis Barang</p>
          </a>
        </li>
        <li class="nav-item @yield('statusdivisi')">
          <a href="{{route('dataDivisi.index')}}">
            <i class="fas fa-users"></i>
            <p>Daftar Divisi</p>
          </a>
        </li>
        <li class="nav-item @yield('statusdaftarpegawai')">
          <a href="{{route('penanggungJawab.index')}}">
            <i class="fas fa-user-edit"></i>
            <p>Daftar Pegawai</p>
          </a>
        </li>
        @if (Auth::user()->tipe_user == 'superadmin')
        <li class="nav-item @yield('statusadmin')">
          <a href="{{route('admin.index')}}">
            <i class="fas fa-user-shield"></i>
            <p>Admin</p>
          </a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</div>