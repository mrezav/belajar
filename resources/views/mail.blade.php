@extends('template')

@section('title')
	Daftar Siswa
@stop

@section('main')
@if (\Session::has('success'))
    <div class="alert alert-success" id="pesan">
    	{!! \Session::get('success') !!}
    </div>
@endif
<form action="{{ url('send') }}" method="POST" class="form-horizontal">
	{{ csrf_field() }}
	<div class="form-group">
		<label class="control-label col-sm-4" for="emailTujuan">To :</label>
		<div class="col-md-4">
			<input type="email" class="form-control" name="emailTujuan" id="emailTujuan" required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="subjek">Subjek :</label>
		<div class="col-md-4">
			<input type="text" class="form-control" name="subjek" id="subjek" required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="penerima">Nama Penerima :</label>
		<div class="col-md-4">
			<input type="text" class="form-control" name="penerima" id="penerima" required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="penerima">Hasil :</label>
		<div class="col-md-4">
			<select class="form-control" name="hasil">
				<!-- <option value="" selected="selected" disabled>--Pilih--</option> -->
				<option value="lulus">Lulus</option>
				<option value="lulus">Tidak Lulus</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-4 col-md-offset-4">
			<center><button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i> Kirim</button></center>
		</div>
	</div>
</form>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$('#pesan').fadeOut(3000);
	})
</script>