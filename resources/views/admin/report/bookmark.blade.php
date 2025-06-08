@extends('admin.layout.app')
@section('title', 'Admin - KafeKotaKita')
@section('content')
    <div class="header bg-primary pb-6">

        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Laporan Bookmark</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Manajemen Laporan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bookmark</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="py-4 px-3">
                        <h3 class="mb-0">Filter Laporan</h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><strong>Tahun</strong></label>
                                        <select class="form-control" id="tahunFilter">
                                            <option>2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><strong>Bulan</strong></label>
                                        <select class="form-control" id="bulanFilter">
                                            @foreach ($bulan as $key => $namaBulan)
                                                <option value="{{ $key }}">{{ $namaBulan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-items-end">
                                    <button class="btn btn-primary" id="filterButton"> Filter</button>
                                    <button class="btn btn-primary" onclick="exportAllToExcel()"> Export Excel</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">

                        <div class="card">
                            <div class="py-4 px-3">
                                <h3 class="mb-0">Top Kafe Terfavorit</h3>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Rank</th>
                                                    <th scope="col">Nama Kafe</th>
                                                    <th scope="col">Total Bookmark</th>
                                                </tr>
                                            </thead>
                                            <tbody id="dataTopKafe">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">

                        <div class="card">
                            <div class="py-4 px-3">
                                <h3 class="mb-0">Top User Teraktif</h3>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Rank</th>
                                                    <th scope="col">Nama User</th>
                                                    <th scope="col">Total Bookmark</th>
                                                </tr>
                                            </thead>
                                            <tbody id="dataTopUser">


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tahunFilter = document.getElementById('tahunFilter');
        const bulanFilter = document.getElementById('bulanFilter');
        const filterButton = document.getElementById('filterButton');
        const tableTopUser = document.getElementById('dataTopUser');
        const tableTopKafe = document.getElementById('dataTopKafe');

        filterButton.addEventListener('click', function() {
            const tahun = tahunFilter.value;
            const bulan = bulanFilter.value;

            if (!tahun || !bulan) {
                alert('Silakan pilih tahun dan bulan terlebih dahulu');
                return;
            }

            // Show loading
            filterButton.disabled = true;
            filterButton.innerText = 'Loading...';

            fetch(`/api/bookmark/reportByPeriode?tahun=${tahun}&bulan=${bulan}`)
                .then(response => response.json())
                .then(data => {
                    tableTopUser.innerHTML = '';
                    tableTopKafe.innerHTML = '';

                    if (data.top_kafe.length === 0 && data.top_users.length === 0) {
                        alert('Data Tidak Ditemukan');
                    }

                    // Render both tables and prepare data for export
                    renderTopUsers(data);
                    renderTopKafe(data);
                })
                .catch(err => {
                    console.error('Gagal fetch:', err);
                    alert('Gagal memuat data');
                })
                .finally(() => {
                    filterButton.disabled = false;
                    filterButton.innerText = 'Cari';
                });
        });

        function renderTopUsers(data) {
            const tableTopUser = document.getElementById('dataTopUser');
            tableTopUser.innerHTML = '';
            const excelData = [
                ['No', 'Nama', 'Total Bookmarks']
            ];

            data.top_users.forEach((item, index) => {
                const no = index + 1;
                const nama = item.user.nama;
                const periode = `${data.filters.bulan}/${data.filters.tahun}`;
                const total = item.total_bookmarks;

                const row = document.createElement('tr');
                row.innerHTML = `
          <td>${no}</td>
          <td>${nama}</td>
          <td>${total}</td>
        `;
                tableTopUser.appendChild(row);

                excelData.push([no, nama, total]);
            });

            window.lastExportedTopUsers = excelData;
        }

        function renderTopKafe(data) {
            const tableTopKafe = document.getElementById('dataTopKafe');
            tableTopKafe.innerHTML = '';
            const excelData = [
                ['No', 'Nama Kafe', 'Total Bookmarks']
            ];

            data.top_kafe.forEach((item, index) => {
                const no = index + 1;
                const namaKafe = item.kafe.nama;
                const total = item.total_bookmarks;

                const row = document.createElement('tr');
                row.innerHTML = `
          <td>${no}</td>
          <td>${namaKafe}</td>
          <td>${total}</td>
        `;
                tableTopKafe.appendChild(row);

                excelData.push([no,  namaKafe,  total]);
            });

            window.lastExportedTopKafe = excelData;
        }

        window.exportAllToExcel = function() {
            const topUsers = window.lastExportedTopUsers;
            const topKafe = window.lastExportedTopKafe;
            const tahun = tahunFilter.value;
            const bulan = bulanFilter.value;

            if ((!topUsers || topUsers.length <= 1) && (!topKafe || topKafe.length <= 1)) {
                alert('Tidak ada data untuk diekspor!');
                return;
            }

            const wb = XLSX.utils.book_new();

            if (topUsers && topUsers.length > 1) {
                const wsUsers = XLSX.utils.aoa_to_sheet(topUsers);
                XLSX.utils.book_append_sheet(wb, wsUsers, 'Top Users');
            }

            if (topKafe && topKafe.length > 1) {
                const wsKafe = XLSX.utils.aoa_to_sheet(topKafe);
                XLSX.utils.book_append_sheet(wb, wsKafe, 'Top Kafe');
            }
            const today = new Date();
            const dateString = today.toISOString().split('T')[0]; 
            XLSX.writeFile(wb, `${dateString}_Laporan_Bookmark_Periode_${bulan}_${tahun}.xlsx`);
        };

    });
</script>
