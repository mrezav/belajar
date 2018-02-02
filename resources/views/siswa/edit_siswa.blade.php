@extends('template')

@section('main')
<h2>Halaman Edit Siswa</h2>
<form method="POST" action="{{ url('update_siswa') }}" enctype="multipart/form-data">
{{ csrf_field() }}

<input type="hidden" name="id" value="{{ $siswa->id }}">
	<div class="form-group">
		<label class="control-label" for="nama">Nama</label>
		<input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}">
		@if($errors->has('nama'))
			<div class="alert alert-danger">
				{{ $errors->first('nama') }}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label class="control-label" for="alamat">Alamat</label>
		<textarea name="alamat" id="alamat" class="form-control">{{ $siswa->alamat }}</textarea>
		@if($errors->has('alamat'))
			<div class="alert alert-danger">
				{{ $errors->first('alamat') }}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label class="control-label" for="tgl_lahir">Tanggal Lahir</label>
		<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{ $tanggal = date('Y-m-d', strtotime($siswa->tgl_lahir)) }}">
		@if($errors->has('tgl_lahir'))
			<div class="alert alert-danger">
				{{ $errors->first('tgl_lahir') }}
			</div>
		@endif
	</div>
	<div class="form-group">
		@if($siswa->jenis_kelamin == 'L')
			<label><input checked="checked" type="radio" name="jenis_kelamin" value="L"> Laki-laki</label><br>
			<label><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
		@elseif($siswa->jenis_kelamin == 'P')
			<label><input type="radio" name="jenis_kelamin" value="L"> Laki-laki</label><br>
			<label><input checked="" type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
		@else
			<label><input type="radio" name="jenis_kelamin" value="L"> Laki-laki</label><br>
			<label><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
		@endif

		@if($errors->has('jenis_kelamin'))
			<div class="alert alert-danger">
				{{ $errors->first('jenis_kelamin') }}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label for="telepon">Nomor Telepon</label>
		<input type="text" name="nomor_telepon" id="telepon" class="form-control" value="{{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon : '' }}">
		@if($errors->has('nomor_telepon'))
			<div class="alert alert-danger">
				{{ $errors->first('nomor_telepon')}}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label for="kelas">Kelas</label>
		@if(count($list_kelas) > 0)
		<select name="id_kelas" id="kelas" class="form-control">
			@foreach($list_kelas as $id => $kelas)
				@if($id == $siswa->id_kelas)
					<option value="{{ $id }}" selected="selected">{{ $kelas }}</option>
				@else
					<option value="{{ $id }}">{{ $kelas }}</option>
				@endif
			@endforeach
		</select>
		@endif
		@if($errors->has('id_kelas'))
			<div class="alert alert-danger">
				{{ $errors->first('id_kelas')}}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label for="kelas">Hobi : </label>
		@if(count($list_hobi) > 0)
			@foreach($list_hobi as $id => $hobi_siswa)
				<span class="checkbox">
					@if(in_array($id,$chk_id_hobi))
						<label><input type="checkbox" name="hobi_siswa[]" value="{{ $id }}" checked="checked">{{ $hobi_siswa }}</label>
					@else
						<label><input type="checkbox" name="hobi_siswa[]" value="{{ $id }}">{{ $hobi_siswa }}</label>
					@endif
				</span>
			@endforeach
		@endif
		@if($errors->has('hobi_siswa'))
			<div class="alert alert-danger">
				{{ $errors->first('hobi_siswa')}}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label for="foto">Foto</label><br>
		<img src="../../uploads/{{ $siswa->foto }}" width="80px">
		<input type="file" name="foto" id="foto">
		@if($errors->has('foto'))
			<div class="alert alert-danger">
				{{ $errors->first('foto') }}
			</div>
		@endif
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="submit" value="Simpan">
	</div>
</form>
@stop

@section('footer')
	@include('footer')
@stop