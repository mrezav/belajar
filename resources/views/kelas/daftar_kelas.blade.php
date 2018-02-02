@extends('template')

@section('title')
	Daftar Kelas
@endsection

@section('main')

@if(Session::has('success'))
<div class="alert alert-success">
	{!! Session::get('success') !!}
</div>
@endif
<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kelas</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($kelas as $key => $value)
		<tr>
			<td>{{ $key+1 }}</td>
			<td>{{ $value->nama_kelas }}</td>
			<td><a href="{{ url('kelas/edit_kelas/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a> | <a href="{{ url('kelas/delete_kelas/'.$value->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ?')">Delete</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
<a href="{{ url('kelas/input_kelas') }}" class="btn btn-success">Input Kelas</a>
@endsection

@section('footer')
	@include('footer')
@stop

<script>
	$(document).ready(function(){
		$('.alert').fadeOut(3000);
	})
</script>