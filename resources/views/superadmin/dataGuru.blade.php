@extends('layout.admin')
@section('title', 'Data Sekolah')

@section('content')

    <div class="container-fluid z-0">
        <div class="row">
            <div class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto  px-md-4 py-4">
                <h2 class="fw-medium h2"><u>Data Guru (Superadmin)</u></h2>
            </div>

            <div class="col-lg-8 col-md-7 offset-lg-2 offset-md-3 d-flex">
                <div class="form-search ">
                    <form class="d-flex" role="search" onsubmit="return false;">
                        <input class="form-control me-2" id="search" type="search" placeholder="Cari data" aria-label="Search">
                        <button class="btn" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
                <div>
                    <a href="{{ route('tambahDataGuruSuperadmin') }}"><button class="btn ms-4 text-light fw-medium py-2" style="font-size: 20px; background-color:var(--tertiary-color)">Tambah Data +</button></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 mt-4 ps-5">
                <!-- error message -->
                @if (session('delete_error'))
                    <div class="alert alert-danger">{{ session('delete_error') }}</div>
                @endif
                <table class="table table-striped table-hover" id="datatable-guru">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Nama Sekolah</th>
                            <th class="text-center">Pendidikan</th>
                            <th class="text-center">Kepegawaian</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        {{-- datatable --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Yakin ingin menghapus data pengguna ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .dt-search {
        display: none;
    }
</style>
@push('scripts')
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#datatable-guru').DataTable({
                paging: true,
                responsive: true, 
                searching: true,
                lengthMenu: [10, 20, 50, 100],
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('getDatatableGuruSuperadmin') }}',
                    type: "GET",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'nama_sekolah',
                        name: 'nama_sekolah'
                    },
                    {
                        data: 'pendidikan',
                        name: 'pendidikan'
                    },
                    {
                        data: 'kategori_kepegawaian',
                        name: 'kategori_kepegawaian'
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'jabatan',
                        name: 'jabatan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            var editUrl = "{{ route('editDataGuruSuperadmin', ['guru' => ':id']) }}".replace(':id', row.id);
                            return `
                                <a href="${editUrl}"><button class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil"></i></button></a>
                                <button class="btn btn-sm btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-guru-id="${row.id}"><i class="bi bi-trash-fill"></i></button>
                            `;
                        }
                    }
                ]
            });

            $('#search').on('keyup', function() {
                var value = $(this).val();
                table.column(1).search(value).draw();
            });

            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var guruId = button.data('guru-id');
                var modal = $(this);
                var actionUrl = "{{ route('deleteDataGuruSuperadmin', ['guru' => ':id']) }}".replace(':id', guruId);
                modal.find('#deleteForm').attr('action', actionUrl);
            });
        });
    </script>
@endpush
