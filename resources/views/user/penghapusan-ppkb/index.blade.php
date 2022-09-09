@extends('layout.mainlayout')
@section('title', 'Penghapusan PPKB')
@section('content')
<div class="row justify-content-sm-center">
    <div class="col-12 col-md-9">
        @if (session()->has('success'))
            <div class="mb-5">
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-5">
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            </div>
        @endif

        <h1 class="text-center mb-3">Form Keluhan Penghapusan PPKB</h1>
        <form action="{{ route('keluhan.penghapusan-ppkb.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="namakapal" class="col-12 col-md-3 col-form-label fw-bold">Nama Kapal</label>
                <div class="col-12 col-md-9">
                    <input type="text" name="namakapal" class="form-control" value="{{ old('namakapal') }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="negara" class="col-12 col-md-3 col-form-label fw-bold">Negara</label>
                <div class="col-12 col-md-9">
                    <input type="text" name="negara" class="form-control" value="{{ old('negara') }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="noppkb" class="col-12 col-md-3 col-form-label fw-bold">No. PPKB / Ke</label>
                <div class="col-12 col-md-9">
                    <input type="text" name="noppkb" class="form-control" value="{{ old('noppkb') }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="service" class="col-12 col-md-3 col-form-label fw-bold">Service Code</label>
                <div class="col-12 col-md-9">
                    <input type="text" name="service" class="form-control" value="{{ old('service') }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="agen" class="col-12 col-md-3 col-form-label fw-bold">Agen / Kode Agen</label>
                <div class="col-12 col-md-9">
                    <input type="text" name="agen" class="form-control" value="{{ old('agen') }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alasan" class="col-12 col-md-3 col-form-label fw-bold">Alasan Penghapusan</label>
                <div class="col-12 col-md-9">
                    <textarea class="form-control" name="alasan" rows="5" required>{{ old('alasan') }}</textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-11"></div>
                <div class="col-sm-1">
                    <button class="btn btn-primary" type="submit">Kirim</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
