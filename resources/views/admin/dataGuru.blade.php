@extends('layout.admin')
@section('title', 'Data Sekolah')

@section('content')

<div class="container-fluid z-0">
    <div class="row">
        <div class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto  px-md-4 py-4">
          <h2 class="fw-medium h2"><u>Data Guru</u></h2>
        </div>

        <div class="col-lg-8 col-md-7 offset-lg-2 offset-md-3 d-flex">
        <div class="form-search ">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Cari data guru" aria-label="Search">
                <button class="btn" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <div>
            <a href="{{ route('tambahDataGuru') }}"><button class="btn ms-4 text-light fw-medium py-2" style="font-size: 20px; background-color:var(--tertiary-color)">Tambah Data +</button></a>     
        </div>
        </div>
        <div class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 mt-4">
            <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Guru</th>
                <th>Status</th>
                <th>Jabatan</th>
                <th>Pendidikan</th>
                <th>Kategori Kepegawaian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>test</td>
                <td>PNS</td>
                <td>Guru</td>
                <td>IPA</td>
                <td>Tenaga Pendidik</td>
                <td>
                    <a href="{{ route('editDataGuru') }}"><button  class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil"></i></button></a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><button class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button></a>
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
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>test</td>
                <td>PNS</td>
                <td>Guru</td>
                <td>IPA</td>
                <td>Tenaga Pendidik</td>
                <td>
                    <a href="{{ route('editDataGuru') }}"><button  class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil"></i></button></a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><button class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button></a>
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
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>test</td>
                <td>PNS</td>
                <td>Guru</td>
                <td>IPA</td>
                <td>Tenaga Pendidik</td>
                <td>
                    <a href="{{ route('editDataGuru') }}"><button  class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil"></i></button></a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><button class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button></a>
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
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>test</td>
                <td>PNS</td>
                <td>Guru</td>
                <td>IPA</td>
                <td>Tenaga Pendidik</td>
                <td>
                    <a href="{{ route('editDataGuru') }}"><button  class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil"></i></button></a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><button class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button></a>
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
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                </td>
            </tr>
        </tbody>
    </table>
        </div>
    </div>
</div>
@endsection