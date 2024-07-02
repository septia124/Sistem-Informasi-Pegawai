@extends('layouts.induk')
@section('konten')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
    </div>
  </div>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Pegawai</h6>
            </div>
            <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"></i>
            </button>
              <div class="table-responsive">
                <div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" role="grid" aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0"> 
                  <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 162px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Foto</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 248px;" aria-label="Position: activate to sort column ascending">NIP</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 116px;" aria-label="Office: activate to sort column ascending">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 116px;" aria-label="Office: activate to sort column ascending">Pendidikan</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 116px;" aria-label="Office: activate to sort column ascending">Jabatan</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 116px;" aria-label="Office: activate to sort column ascending">No.Telp</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 116px;" aria-label="Office: activate to sort column ascending">Aksi</th>
                    </thead>
                  <tfoot>
                  </tfoot>
                  <tbody>
                  @foreach($pegawai as $p)
                  <tr role="row" class="odd">
                      <td class="sorting_1"><img src="foto/{{$p->foto}}" width="100px"/></td>
                      <td>{{$p->nip}}</td>
                      <td>{{$p->nama}}</td>
                      <td>{{$p->pendidikan}}</td>
                      <td>{{$p->Jabatan}}</td>
                      <td>{{$p->no_telp}}</td>
                      <td><a class="btn btn-secondary" href="/pegawai/profile/{{$p->id_peg}}"><i class="fa fa-list"></i></a> 
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit{{$p->id_peg}}"><i class="fa fa-edit"></i></button>
                      <button type="button" class="btn btn-danger mt-1" data-toggle="modal" data-target="#ModalDelete{{$p->id_peg}}"><i class="fa fa-trash"></i></button>
                     </td>
                  </tr>


<!-- modal edit -->

<div class="modal fade" id="ModalEdit{{$p->id_peg}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <!-- form -->
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
      <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home{{$p->id_peg}}" role="tab" aria-controls="home{{$p->id_peg}}" aria-selected="true">Home</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home{{$p->id_peg}}" role="tabpanel" aria-labelledby="home-tab{{$p->id_peg}}">
  <form action="/pegawai/edit/{{$p->id_peg}}" method="post" enctype="multipart/form-data">
  {{csrf_field()}}

    <!-- Start tab 1 -->
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNip">NIP</label>
      <input type="number" class="form-control" value="{{$p->nip}}" id="inputNip"  name="nip"  required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputNama">Nama</label>
      <input type="text" class="form-control" value="{{$p->nama}}" id="inputNama"  name="nama" required>
    </div>
  </div>
  <div class="form-group col-md-6">
  <label for="inputTgl">No.Telp</label>
  <input type="number" id="inputTgl" name="no_telp" value="{{$p->no_telp}}" class="form-control">
  </div>
  </div>

<div class="form-row">
<div class="form-group col-md-6">
  <label for="inputStatus">User</label>
  <select name="user" id="inputUser" class="form-control" required>
  <option>---</option>
  @foreach($user as $u)
  <option value="{{$u->id}}" @if ($p->id_user == $u->id) selected @endif >{{$u->name}}</option>
  @endforeach
  </select>
  </div>
  <div class="form-group col-md-6">
  <label for="inputFoto">Foto</label>
  <input type="file" class="form-control" name="foto" id="inputFoto">
  </div>
  </div>
  <!-- Tab 1 end -->

  </div>
  <div class="tab-pane fade" id="profile{{$p->id_peg}}" role="tabpanel" aria-labelledby="profile-tab{{$p->id_peg}}">
  
  <!-- Tab 2 -->
  <div class="form-row">
<div class="form-group col-md-6">
<label for="pendidikan">Pendidikan</label>
                        <select name="pendidikan" id="pendidikan" class="form-control" required>
                            <option value="">Pilih Pendidikan</option>
                            @foreach($pendidikan as $p)
                                <option value="{{ $p->kode_pdd }}">{{ $p->pendidikan }}</option>
                            @endforeach
  </select>
  </div>

<div class="form-group col-md-8">
<label for="jabatan">Jabatan</label>
                        <select name="jbts" id="jabatan" class="form-control" required>
                            <option value="">Pilih Jabatan</option>
                            @foreach($jbts as $j)
                                <option value="{{ $j->kode_jbts }}">{{ $j->nama_jabatan }}</option>
                            @endforeach
  </select>
  </div>

  <!-- end tab 3 -->
  </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah</button></form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
@foreach($pegawai as $p)
<div class="modal fade" id="ModalDelete{{$p->id_peg}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin ingin menghapus?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="/pegawai/hapus/{{$p->id_peg}}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- End Modal Delete -->
@endforeach

</tbody>
</table>
</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form -->
        <form action="/pegawai/tambah/proses" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputNip">NIP</label>
              <input type="number" class="form-control" id="inputNip" name="nip" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputNama">Nama</label>
              <input type="text" class="form-control" id="inputNama" name="nama" required>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="inputTgl">No.Telp</label>
            <input type="number" id="inputTgl" name="no_telp" class="form-control">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputStatus">User</label>
              <select name="user" id="inputUser" class="form-control" required>
                <option>---</option>
                @foreach($user as $u)
                <option value="{{$u->id}}">{{$u->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="inputFoto">Foto</label>
              <input type="file" class="form-control" name="foto" id="inputFoto" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="pendidikan">Pendidikan</label>
                        <select name="pendidikan" id="pendidikan" class="form-control" required>
                            <option value="">Pilih Pendidikan</option>
                            @foreach($pendidikan as $p)
                                <option value="{{ $p->kode_pdd }}">{{ $p->pendidikan }}</option>
                            @endforeach
              </select>
            </div>
            <div class="form-group col-md-8">
            <label for="jabatan">Jabatan</label>
                        <select name="jbts" id="jabatan" class="form-control" required>
                            <option value="">Pilih Jabatan</option>
                            @foreach($jbts as $j)
                                <option value="{{ $j->kode_jbts }}">{{ $j->nama_jabatan }}</option>
                            @endforeach
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- end modal -->
                      </div>
              </div>
            </div>
          </div>
</div>


          @endsection