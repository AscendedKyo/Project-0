            <li class="sidebar-title">Menu</li>

            <li
                class="sidebar-item  ">
                <a href="{{ url('/developer/dashboard') }}" class='sidebar-link'>
                    <i class="fa-regular fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li
                class="sidebar-item  ">
                <a href="{{ url('/developer/profile') }}" class='sidebar-link'>
                    <i class="fa-regular fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="sidebar-title">Master Data</li>
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa-solid fa-users-rectangle"></i>
                    <span>Data Kepegawaian</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ url('/developer/karyawan') }}">Data Karyawan</a>
                    </li>
                </ul>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ url('/developer/mahasiswa') }}">Data Absensi Karyawan</a>
                    </li>
                </ul>
            </li>
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa-solid fa-toolbox"></i>
                    <span>Data SarPras</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ url('/developer/ruangan') }}">Data Ruangan</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ url('/developer/inventaris-ruangan') }}">Data Inventaris Ruangan</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ url('/developer/inventaris-barang') }}">Data Inventaris Barang</a>
                    </li>
                </ul>
            </li>
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa-solid fa-school"></i>
                    <span>Data Perkuliahan</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ url('/developer/mahasiswa') }}">Data Mahasiswa</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ url('/developer/kelas') }}">Data Kelas</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ url('/developer/prodi') }}">Data Prodi</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ url('/developer/matakuliah') }}">Data Mata Kuliah</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ url('/developer/jadwalkuliah') }}">Data Jadwal Kuliah</a>
                    </li>
                </ul>
            </li>