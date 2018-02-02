@extends('template')

@section('title')
	Daftar Kelas
@endsection

@section('main')
<form action="{{ url('update_kelas') }}" method="POST">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{ $data->id }}">
	<div class="form-group">
		<label>Nama Kelas</label>
		<input type="text" name="nama_kelas" value="{{ $data->nama_kelas }}" class="form-control" required>
	</div>
	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btn-primary">
	</div>
</form>
@endsection

@section('footer')
	@include('footer')
@stop