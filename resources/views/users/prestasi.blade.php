@extends('layout.main')
@section('title', 'Prestasi Sekolah')

@section('content')
    <div class="container vh-100">
        <div class="row" style="margin-top: 50px">
            <div class="col-12 mb-5">
                <h2 class="fw-bold text-center">Galeri Prestasi</h2>
            </div>

            @if ($infos->isEmpty())
                <div class="col-12 text-center" style="height: 220px">
                    <p>Belum ada info prestasi untuk sekolah ini.</p>
                </div>
            @else
                <div class="col-lg-5 col-md-5 mb-4 mb-lg-0">
                    @foreach ($infos as $info)
                        @if ($loop->index % 3 == 0)
                            <a href="{{route('detailPrestasi', ['info'=>$info->id])}}">
                                <img src="{{ asset($info->gambarInfo->first()->gambar) }}" class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" alt="Prestasi Sekolah" width="425" height="470" />
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    @foreach ($infos as $info)
                        @if ($loop->index % 3 == 1)
                            <a href="{{route('detailPrestasi', ['info'=>$info->id])}}">
                                <img src="{{ asset($info->gambarInfo->first()->gambar) }}" class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" alt="Prestasi Sekolah" width="425" height="380" />
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0">
                    @foreach ($infos as $info)
                        @if ($loop->index % 3 == 2)
                            <a href="{{route('detailPrestasi', ['info'=>$info->id])}}">
                                <img src="{{ asset($info->gambarInfo->first()->gambar) }}" class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" alt="Prestasi Sekolah" width="425" height="300" />
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
