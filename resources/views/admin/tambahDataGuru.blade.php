@extends('layout.admin')
@section('title', 'Tambah Data Guru')

@section('content')

<div class="container-fluid z-0">
    <div class="row">
        <div
            class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto col-lg-10 px-md-4 py-4"
        >
            <h2 class="fw-medium h2"><u>Tambah Data Guru</u></h2>
        </div>
        <div class="col-lg-9 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
            <form method="" class="w-75">
                    <div>
                        <label for="selectedImage3" class="form-label">Foto</label>
                        <div class="mb-4 d-flex">
                            <img
                                id="selectedImage3"
                                src="assets/inputfoto.png"
                                alt="gambar guru"
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
                <div class="d-flex gap-1 justify-content-between mt-3">
                    <div class="mb-3 col-5 ">
                        <label for="namaguru" class="form-label"
                            >Nama Guru
                        </label>
                        <input
                            type="text"
                            class="form-control border border-dark"
                            id="namaguru"
                        />
                    </div>

                    <div class="mb-3 col-5 ">
                        <label for="status" class="form-label">Status</label>
                        <input
                            type="text"
                            class="form-control border border-dark"
                            id="status"
                        />
                    </div>
                </div>
                <div class="d-flex gap-1 justify-content-between mt-3">
                    <div class="mb-3 col-5 ">
                        <label for="jabatan" class="form-label"
                            >Jabatan
                        </label>
                        <input
                            type="text"
                            class="form-control border border-dark"
                            id="jabatan"
                        />
                    </div>

                    <div class="mb-3 col-5 ">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <input
                            type="text"
                            class="form-control border border-dark"
                            id="pendidikan"
                        />
                    </div>
                </div>
                <div class="mb-3 mt-3">
                        <label for="kepegawaian" class="form-label">Status Kepegawaian</label>
                        <input
                            type="text"
                            class="form-control border border-dark"
                            id="kepegawaian"
                        />
                    </div>
                
                <div class="d-flex justify-content-end my-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection