@extends('template')

@section('main')
<h2>Halaman Input Siswa</h2>
<form method="POST" action="{{ url('insert_siswa') }}" enctype="multipart/form-data">
{{csrf_field()}}
	<div class="form-group">
		<label class="control-label" for="nama">Nama : </label>
		<input type="text" name="nama" id="nama" class="form-control" value="{{old('nama') }}">
		@if($errors->has('nama'))
			<div class="alert alert-danger">
				{{ $errors->first('nama') }}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label class="control-label" for="alamat">Alamat : </label>
		<textarea name="alamat" id="alamat" class="form-control">{{ old('alamat') }}</textarea>
		@if($errors->has('alamat'))
			<div class="alert alert-danger">
				{{ $errors->first('alamat') }}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label class="control-label" for="tgl_lahir">Tanggal Lahir : </label>
		<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{old('tgl_lahir') }}">
		@if($errors->has('tgl_lahir'))
			<div class="alert alert-danger">
				{{ $errors->first('tgl_lahir') }}
			</div>
		@endif		
	</div>
	<div class="form-group">
		<label>Jenis Kelamin : </label><br>
		<label><input type="radio" name="jenis_kelamin" value="L"> Laki-laki</label> &nbsp;
		<label><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
		@if($errors->has('jenis_kelamin'))
			<div class="alert alert-danger">
				{{ $errors->first('jenis_kelamin') }}
			</div>
		@endif		
	</div>
	<div class="form-group">
		<label for="telepon">Nomor Telepon : </label>
		<input type="text" maxlength="12" name="nomor_telepon" id="telepon" class="form-control" value="{{ old('nomor_telepon') }}">
		@if($errors->has('nomor_telepon'))
			<div class="alert alert-danger">
				{{ $errors->first('nomor_telepon')}}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label for="kelas">Kelas : </label>
		@if(count($list_kelas) > 0)
		<select name="id_kelas" id="kelas" class="form-control">
			<option selected="selected" value="">Pilih Kelas</option>
			@foreach($list_kelas as $id => $kelas)
				<option value="{{ $id }}">{{ $kelas }}</option>
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
			@foreach($list_hobi as $id => $hobi)
				<span class="checkbox">
					<label><input type="checkbox" name="hobi[]" value="{{ $id }}">{{ $hobi }}</label>
				</span>
			@endforeach
		@endif
		@if($errors->has('hobi'))
			<div class="alert alert-danger">
				{{ $errors->first('hobi')}}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label for="foto">Foto : </label>
		<input type="file" id="foto" name="foto" value="{{ old('foto') }}">
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