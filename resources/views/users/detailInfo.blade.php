@extends('layout.main')
@section('title', 'Info Sekolah')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center" style="margin-top: 50px">
                <h1>Detail Info</h1>
            </div>
            <div class="col-6 mt-5 ">
                <img src="{{ asset($info->gambarInfo->first()->gambar) }}" class="object-fit-cover" width="635" height="570" alt="" />
            </div>
            <div class="col-6 mt-5">
                <h4 class="fw-bold">{{ $info->judul }}</h4>
                <P class="mb-5">{{ $info->created_at->diffForHumans() }}</P>
                <p>{!! nl2br(e($info->deskripsi)) !!}</p>

                <a class="text-light text-decoration-none" href="{{ route('info', ['sekolah' => $sekolah->id]) }}">
                    <button class="btn btn-dark fw-bold px-5">Info Terkini Lain di Sekolah Ini <i class="bi bi-arrow-right"></i></button></a>
            </div>
        </div>
    </div>
@endsection
