@extends('layout.admin')
@section('title', 'Edit Data Sekolah')

@section('content')

<div class="container-fluid z-0">
    <div class="row">
        <div
            class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto col-lg-10 px-md-4 py-4"
        >
            <h2 class="fw-medium h2"><u>Edit Data Sekolah</u></h2>
        </div>
        <div class="col-lg-9 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
            <form>
                <div class="image-form d-flex gap-3">
                    <div>
                        <label for="" class="form-label">Logo</label>
                        <div class="mb-4 d-flex justify-content-center">
                            <img
                                id="selectedImage"
                                src="assets/inputfoto.png"
                                alt="example placeholder"
                                style="width: 300px"
                            />
                        </div>
                        <div class="d-flex justify-content-center">
                            <div
                                data-mdb-ripple-init
                                class="btn btn-primary btn-rounded"
                            >
                                <label
                                    class="form-label text-white m-1"
                                    for="customFile1"
                                    >Choose file</label
                                >
                                <input
                                    type="file"
                                    class="form-control d-none"
                                    id="customFile1"
                                    onchange="displaySelectedImage(event, 'selectedImage')"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="" class="form-label">Foto Sekolah</label>
                        <div class="mb-4 d-flex justify-content-center">
                            <img
                                id="selectedImage2"
                                src="assets/inputfoto.png"
                                alt="example placeholder"
                                style="width: 300px"
                            />
                        </div>
                        <div class="d-flex justify-content-center">
                            <div
                                data-mdb-ripple-init
                                class="btn btn-primary btn-rounded"
                            >
                                <label
                                    class="form-label text-white m-1"
                                    for="customFile2"
                                    >Choose file</label
                                >
                                <input
                                    type="file"
                                    class="form-control d-none"
                                    id="customFile2"
                                    onchange="displaySelectedImage(event, 'selectedImage2')"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-3">
                    <label for="namasekolah" class="form-label"
                        >Nama Sekolah</label
                    >
                    <input
                        type="email"
                        class="form-control border border-dark"
                        id="namasekolah"
                        aria-describedby="emailHelp"
                    />
                </div>

                <div class="d-flex gap-1 justify-content-between">
                    <div class="mb-3 col-5">
                        <label for="emailsekolah" class="form-label"
                            >Email
                        </label>
                        <input
                            type="email"
                            class="form-control border border-dark"
                            id="emailsekolah"
                            aria-describedby="emailHelp"
                        />
                    </div>

                    <div class="mb-3 col-5">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input
                            type="number"
                            class="form-control border border-dark"
                            id="telepon"
                        />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input
                        type="password"
                        class="form-control border border-dark"
                        id="telepon"
                    />
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea
                        class="form-control border border-dark"
                        placeholder=""
                        id="deskripsi"
                        rows="5"
                    ></textarea>
                </div>

                <div class="d-flex gap-1 justify-content-between">
                    <div class="mb-3 col-5">
                        <label for="visi" class="form-label">Visi </label>
                        <textarea
                            class="form-control border border-dark"
                            placeholder=""
                            id="visi"
                            rows="5"
                        ></textarea>
                    </div>

                    <div class="mb-3 col-5">
                        <label for="misi" class="form-label">Misi</label>
                        <textarea
                            class="form-control border border-dark"
                            placeholder=""
                            id="misi"
                            rows="5"
                        ></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection