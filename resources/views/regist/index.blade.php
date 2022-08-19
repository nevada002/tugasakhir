@extends('layout.fixedfootermainlayout')
@section('content')
<!-- Memilih Role -->
<div class="container">
    {{-- <div class="card border-0 mt-5" style="max-width:auto;"> --}}
      <div class="card-body">
        <h1 class="card-title text-center mt-5">Daftar</h1>
        <div class="row">
          <div class="col"></div>
          <div class="col">
            <h4> Role</h4>
          </div>
          <div class="col"></div>
          <div class="col"></div>
        </div>
        <div class="row mt-4 ">
          <div class="col-sm"></div>
          <div class="col form-check form-check-inline">
            <button type="button" class="btn btn-primary" style="background: none; border: none;" data-bs-toggle="modal" data-bs-target="#Agen">
              <input class="form-check-input" type="radio" name="agen" id="user" value="option1">
              <label class ="form-check-label text-dark"  for="user"><strong>Agen</strong></label>
            </button>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="Agen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Registrasi Agen</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/login">
                    <div class="col mt-auto mb-3 ">
                      <input type="text" class="form-control border-0" id="exampleFormControlInput1" placeholder="Nama Agen">
                    </div>
                    <div class="col mt-auto mb-3 ">
                      <input type="text" class="form-control border-0" id="exampleFormControlInput1" placeholder="Alamat">
                    </div>
                    <div class="col mb-3 ">
                      <input type="email" class="form-control border-0" id="exampleFormControlInput1" placeholder="E-mail">
                    </div>
                    <div class="col mb-3">
                      <input type="password" class="form-control border-0" id="exampleFormControlInput1" placeholder="Kata Sandi">
                    </div>
                    <div class="col mb-3">
                      <input type="password" class="form-control border-0" id="exampleFormControlInput1" placeholder="Ulangi Kata Sandi">
                    </div>
                    <!-- Akhir Pendaftaraan -->
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background: none; border: none;">
                    <div class="col mt-4 text-dark ">Sudah memiliki akun?<a href="/login">Login</a></div>Login
                  </button>
                  <a href="/login"><button type="submit" class="btn btn-primary">Daftar</button></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm form-check form-check-inline">
            <button type="button" class="btn btn-primary" style="background: none; border: none;" data-bs-toggle="modal" data-bs-target="#CustomerService">
              <input class="form-check-input" type="radio" name="cs" id="cs" value="cs">
              <label class="form-check-label text-dark" for="cs"><strong> Service</strong></label>
            </button>
          </div>
          <div class="modal fade" id="CustomerService" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Registrasi Customer Service</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="dashboard.php">
                    <div class="col mt-auto mb-3 ">
                      <input type="text" class="form-control border-0" id="exampleFormControlInput1" placeholder="Nama Lengkap">
                    </div>
                    <div class="col mb-3 ">
                      <input type="email" class="form-control border-0" id="exampleFormControlInput1" placeholder="E-mail">
                    </div>
                    <div class="col mb-3">
                      <input type="password" class="form-control border-0" id="exampleFormControlInput1" placeholder="Kata Sandi">
                    </div>
                    <div class="col mb-3">
                      <input type="password" class="form-control border-0" id="exampleFormControlInput1" placeholder="Ulangi Kata Sandi">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background: none; border: none;">
                    <div class="col mt-4 text-dark ">Sudah memiliki akun?<a href="loginadmin.php">Login</a></div>Login
                  </button>
                  <a href="loginadmin.php"><button type="submit" class="btn btn-primary">Daftar</button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm"></div>
        </div>

        <div class="row mt-1 ">
          <div class="col-sm"></div>
          <div class="col-sm form-check form-check-inline">
            <button type="button" class="btn btn-primary" style="background: none; border: none;" data-bs-toggle="modal" data-bs-target="#PenandaTangan">
              <input class="form-check-input" type="radio" name="pt" id="pt" value="pt">
              <label class="form-check-label text-dark" for="pt"><strong>Penanda Tangan</strong></label>
            </button>
          </div>

          <div class="modal fade" id="PenandaTangan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Registrasi Penanda Tangan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="dashboard.php">
                    <div class="col mt-auto mb-3 ">
                      <input type="text" class="form-control border-0" id="exampleFormControlInput1" placeholder="Nama Lengkap">
                    </div>
                    <div class="col mb-3 ">
                      <input type="email" class="form-control border-0" id="exampleFormControlInput1" placeholder="E-mail">
                    </div>
                    <div class="col mb-3">
                      <input type="password" class="form-control border-0" id="exampleFormControlInput1" placeholder="Kata Sandi">
                    </div>
                    <div class="col mb-3">
                      <input type="password" class="form-control border-0" id="exampleFormControlInput1" placeholder="Ulangi Kata Sandi">
                    </div>
                    <select class="form-select border-0" aria-label="Default select example">
                      <option selected>-Pilih-</option>
                      <option value="1">Supervisor Perencanaan Pemanduan & Penundaan</option>
                      <option value="2">Supervisor Aneka Usaha</option>
                      <option value="3">Manager Properti</option>
                      <option value="4">Manager Komersial</option>
                      <option value="5">Manager Adm. Kepanduan, Komunikasi & Prasarana Pemanduan</option>
                      <option value="6">Manager Sistem Infomasi</option>
                      <option value="7">Manager Perbendaharaan</option>
                    </select>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background: none; border: none;">
                    <div class="col mt-4 text-dark ">Sudah memiliki akun?<a href="/login">Login</a></div>Login
                  </button>
                  <a href="loginadmin.php"><button type="submit" class="btn btn-primary">Daftar</button></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm form-check form-check-inline">
            <button type="button" class="btn btn-primary" style="background: none; border: none;" data-bs-toggle="modal" data-bs-target="#PihakVerifikasi">
              <input class="form-check-input" type="radio" name="pv" id="pv" value="pv">
              <label class="form-check-label text-dark" for="pv"><strong>Pihak Verifikasi</strong></label>
            </button>
          </div>
          <div class="modal fade" id="PihakVerifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Registrasi Pihak Verifikasi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="dashboard.php">
                    <div class="col mt-auto mb-3 ">
                      <input type="text" class="form-control border-0" id="exampleFormControlInput1" placeholder="Nama Lengkap">
                    </div>
                    <div class="col mb-3 ">
                      <input type="email" class="form-control border-0" id="exampleFormControlInput1" placeholder="E-mail">
                    </div>
                    <div class="col mb-3">
                      <input type="password" class="form-control border-0" id="exampleFormControlInput1" placeholder="Kata Sandi">
                    </div>
                    <div class="col mb-3">
                      <input type="password" class="form-control border-0" id="exampleFormControlInput1" placeholder="Ulangi Kata Sandi">
                    </div>
                    <select class="form-select border-0" aria-label="Default select example">
                      <option selected>-Pilih-</option>
                      <option value="1">Supervisor Perencanaan Pemanduan & Penundaan</option>
                      <option value="2">Supervisor Aneka Usaha</option>
                      <option value="3">Manager Properti</option>
                      <option value="4">Manager Komersial</option>
                      <option value="5">Manager Adm. Kepanduan, Komunikasi & Prasarana Pemanduan</option>
                      <option value="6">Manager Sistem Infomasi</option>
                      <option value="7">Manager Perbendaharaan</option>
                    </select>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background: none; border: none;">
                    <div class="col mt-4 text-dark ">Sudah memiliki akun?<a href="/login">Login</a></div>Login
                  </button>
                  <a href="loginadmin.php"><button type="submit" class="btn btn-primary">Daftar</button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Memilih Role -->

@endsection