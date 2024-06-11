@extends('layout.admin')
@section('title', 'Data Sekolah')

@section('content')
<div class="container-fluid z-0">
    <div class="row">
        <div class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto col-lg-10 px-md-4 py-4">
          <h2 class="fw-medium h2"><u>Data Sekolah</u></h2>
        </div>
        @if(Auth::user()->sekolah)
            <div class="col-lg-7 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
                <a href="{{ route('editDataSekolah', ['sekolah' => Auth::user()->sekolah->id]) }}" class="fw-bold text-decoration-none" style="font-size: 23px">
                    <img src="{{ asset('assets/edit.png') }}" class="me-3" alt="">Edit Data Sekolah
                </a>    
            </div>
            <div class="col-lg-7 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
                <a href="" class="fw-bold text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 23px">
                    <img src="{{ asset('assets/delete.png') }}" class="me-2" alt="">
                    Hapus Data Sekolah
                </a>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Yakin Ingin Menghapus Data?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form id="deleteForm" method="POST" action="{{ route('deleteDataSekolah', ['sekolah' => Auth::user()->sekolah->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-lg-7 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
                <a href="{{ route('tambahDataSekolah') }}" class="fw-bold text-decoration-none" style="font-size: 23px">
                    <img src="{{ asset('assets/tambah.png') }}" class="me-3" alt="">Tambah Data Sekolah
                </a>    
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', function() {
                const deleteForm = document.getElementById('deleteForm');
                deleteForm.submit();
            });
        });
    });
</script>
@endpush
