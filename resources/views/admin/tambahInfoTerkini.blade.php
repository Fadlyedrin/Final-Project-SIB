@extends('layout.admin')
@section('title', 'Tambah Info Terkini')

@section('content')

<div class="container-fluid z-0">
    <div class="row">
        <div
            class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto col-lg-10 px-md-4 py-4"
        >
            <h2 class="fw-medium h2"><u>Tambah Info Terkini</u></h2>
        </div>
        <div class="col-lg-9 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
            <form method="" class="w-75">
                    <div>
                        <label for="selectedImage3" class="form-label">Image</label>
                        <div class="mb-4 d-flex">
                            <img
                                id="selectedImage3"
                                src="assets/inputfoto.png"
                                alt="info terkini"
                                style="width: 300px"
                            />
                        </div>
                        <div class="d-flex">
                            <div
                                data-mdb-ripple-init
                                class="btn btn-primary btn-rounded"
                            >
                                <label
                                    class="form-label text-white m-1"
                                    for="customFile3"
                                    >Choose file</label
                                >
                                <input
                                    type="file"
                                    class="form-control d-none"
                                    id="customFile3"
                                    onchange="displaySelectedImage(event, 'selectedImage3')"
                                />
                            </div>
                        </div>
                    </div>
                <div class="mb-3 mt-3 w-50">
                        <label for="judul" class="form-label">Judul</label>
                        <input
                            type="text"
                            class="form-control border border-dark"
                            id="judul"
                        />
                    </div>
                <div class="mb-3 mt-3 w-50">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea
                            class="form-control border border-dark"
                            placeholder=""
                            id="deskripsi"
                            rows="5"
                        ></textarea>
                    </div>

                <div class="mb-3 mt-3">
                    <label for="Kategori" class="form-label">Kategori</label>
                    <div class="dropdown ">
                    
                    <button class="btn btn-transparent border border-3 dropdown-toggle" type="button" data-bs-toggle="dropdown" id="kategori-dropdown" aria-expanded="false">
                        Select One
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="kategori-dropdown">
                        <li><a class="dropdown-item" href="#" >Prestasi</a></li>
                        <li><a class="dropdown-item" href="#">PPDB</a></li>
                        <li><a class="dropdown-item" href="#">Event Sekolah</a></li>
                    </ul>
                    </div>
                </div>
                
                <div class="d-flex justify-content-end my-4 w-50">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection