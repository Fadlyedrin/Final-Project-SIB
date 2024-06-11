@extends('layout.admin')
@section('title', 'Data Info Terkini')

@section('content')

    <div class="container-fluid z-0">
        <div class="row">
            <div class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto  px-md-4 py-4">
                <h2 class="fw-medium h2"><u>Data Info Terkini</u></h2>
            </div>

            <div class="col-lg-8 col-md-7 offset-lg-2 offset-md-3  d-flex">
                <div class="form-search ">
                    <form class="d-flex" role="search" onsubmit="return false;">
                        <input class="form-control me-2" id="search" type="search" placeholder="Cari data" aria-label="Search">
                        <button class="btn" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
                @if (Auth::user()->sekolah)
                    <div>
                        <a href="{{ route('tambahDataInfo') }}"><button class="btn ms-4 text-light fw-medium py-2" style="font-size: 20px; background-color:var(--tertiary-color)">Tambah Data
                                +</button></a>
                    </div>
                @else
                    <div>
                        <button class="btn ms-4 text-light fw-medium py-2" style="font-size: 20px; background-color:var(--tertiary-color)" disabled>Tambah Data +</button>
                    </div>
                @endif
                
            </div>
            <div class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 mt-4 ps-5">
                <!-- error message -->
                @if (session('delete_error'))
                    <div class="alert alert-danger">{{ session('delete_error') }}</div>
                @endif
                <table class="table table-striped table-hover" id="datatable-info">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">No.</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Nama Sekolah</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <div class="d-flex justify-content-end" style="float: right;">
                            <select class="form-select form-control mb-3" aria-label="Default select example" name="kategori" id="kategori">
                                <option value="" selected>Pilih Kategori</option>
                                <option value="event">Event</option>
                                <option value="ppdb">PPDB</option>
                                <option value="prestasi">Prestasi</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
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
            var table = $('#datatable-info').DataTable({
                paging: true,
                responsive: true,
                searching: true,
                lengthMenu: [10, 20, 50, 100],
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('getDatatableInfo') }}',
                    type: "GET",
                    data: function(data) {
                        data.kategori = $("#kategori").val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'nama_sekolah',
                        name: 'nama_sekolah'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            var editUrl = "{{ route('editDataInfo', ['info' => ':id']) }}".replace(':id', row.id);
                            return `
                                <a href="${editUrl}"><button class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil"></i></button></a>
                                <button class="btn btn-sm btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-info-id="${row.id}"><i class="bi bi-trash-fill"></i></button>
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
                var infoId = button.data('info-id');
                var modal = $(this);
                var actionUrl = "{{ route('deleteDataInfo', ['info' => ':id']) }}".replace(':id', infoId);
                modal.find('#deleteForm').attr('action', actionUrl);
            });

            $('#kategori').on('change', function() {
                table.ajax.reload();
            });
        });
    </script>
@endpush