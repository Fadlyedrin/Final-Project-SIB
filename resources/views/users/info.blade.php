@extends('layout.main')
@section('title', 'Info Sekolah')

@section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="fw-bold text-center">Info Terkini</h2>
            </div>
            @foreach ($infos as $info)
                <div class="col-4 my-3">
                    <div class="card card-info">
                        <a href="{{ route('detailInfo', ['info' => $info->id]) }}"><img src="{{ asset($info->gambarInfo->first()->gambar) }}" width="370" height="210" class="card-img-top object-fit-cover"
                                alt="image-info" /></a>
                        <div class="card-body">
                            <h3 class="fw-medium">{{ $info->judul }}</h3>
                            <p>{{ $info->created_at->diffForHumans() }}</p>
                            <p class="text-secondary" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                {{ $info->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
