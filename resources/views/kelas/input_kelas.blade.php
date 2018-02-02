@extends('template')

@section('title')
	Daftar Kelas
@endsection

@section('main')
<form action="{{ url('kelas/insert_kelas') }}" method="POST">
	{{ csrf_field() }}
	<div class="form-group">
		<label>Nama Kelas</label>
		<input type="text" name="nama_kelas" placeholder="Nama Kelas" class="form-control" required>
	</div>
	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btn-primary">
	</div>
</form>
@endsection

@section('footer')
	@include('footer')
@stop