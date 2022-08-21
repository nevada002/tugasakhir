@extends('layout.fixedfootermainlayout')
@section('content')
    <div class="containe h-100 mb-5">
        <div class="card border-0 mt-5">
            <div class="card-body">
                <h1 class="card-title text-center mt-5">Daftar</h1>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                        <h4>Role</h4>
                    </div>
                </div>
                {{-- Agen --}}
                <div class="row mt-4">
                    <div class="col-lg-5 col-sm-12 col-xs-12 text-center form-check form-check-inline">
                        <button type="button" class="btn btn-primary ms-4" style="background: none; border: none;"
                            data-bs-toggle="modal" data-bs-target="#Agen">
                            <input class="form-check-input" type="radio" name="agen" id="agen">
                            <label class="form-check-label text-dark" for="agen"><strong>Agen</strong></label>
                        </button>
                    </div>

                    <div class="col-lg-5 col-sm-12 col-xs-12 text-center form-check form-check-inline">
                        <button type="button" class="btn btn-primary ms-4" style="background: none; border: none;"
                            data-bs-toggle="modal" data-bs-target="#CustomerService">
                            <input class="form-check-input" type="radio" name="cs" id="cs">
                            <label class="form-check-label text-dark"
                                for="cs"><strong>CustomerService</strong></label>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
