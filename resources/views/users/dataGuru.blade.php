@extends('layout.main')
@section('title', 'Data Guru')

@section('content')
    <div class="container" style="margin-top: 50px; height: 100%">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="fw-bold text-center">Data Guru</h2>
            </div>
            @if ($gurus->isEmpty())
                <div class="col-12 text-center" style="height: 220px">
                    <p>Data guru belum ada</p>
                </div>
            @else
                @foreach ($gurus as $guru)
                    <div class="col-3 my-3">
                        <div class="card card-info text-center">
                            <img src="{{ asset($guru->gambar ?? 'assets/gambarinfo2.png') }}" width="240" height="210" class="card-img-top object-fit-cover" alt="image-guru" />
                            <div class="card-body">
                                <h5 class="fw-medium">{{ $guru->nama }}</h5>
                                <p class="text-secondary mt-4 overflow-hidden">
                                    {{ $guru->kategori_kepegawaian }} - {{ $guru->jabatan }}
                                </p>
                                <p class="text-secondary my-2 overflow-hidden">
                                    {{ $guru->pendidikan }} - {{ $guru->status }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
