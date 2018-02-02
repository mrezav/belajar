@extends('template')

@section('title')
	Detail Siswa
@stop

@section('main')
	
<div class="col-md-8 col-md-offset-2">
	<table class="table table-hover">
		<tr>
			<th>Nama </th>
			<td>: {{ $data->nama }}</td>			
			<td rowspan="6">
				<img src="../uploads/{{ $data->foto }}" width="250px">
			</td>
		</tr>
		<tr>
			<th>Kelas</th>
			<td>: {{ $data->kelas->nama_kelas }}</td>
		</tr>
		<tr>
			<th>Alamat </th>
			<td>: {{ $data->alamat }}</td>
		</tr>
		<tr>
			<th>Tanggal Lahir</th>
			<td>: {{ $tgl = date('d F Y',strtotime($data->tgl_lahir)) }}</td>
		</tr>
		<tr>
			<th>Jenis Kelamin</th>
			@if($data->jenis_kelamin == 'L')
			<td>: Laki-laki</td>
			@else
			<td>: Perempuan</td>
			@endif
		</tr>
		<tr>
			<th>No Telepon</th>
			<td>: {{ !empty($data->telepon->nomor_telepon) ? $data->telepon->nomor_telepon : ' - '  }}</td>
		</tr>
		<tr>
			<th>Hobi </th>
			<td>: 
			@foreach($data->hobi as $row)
			<span>{{ $row['nama_hobi'] }}</span>,
			@endforeach
			</td>
		</tr>
		<tr>
			<th>Usia</th>
			<td>: {{ $data->tgl_lahir->age }}</td>
		</tr>
		
	</table>
</div>

@stop

@section('footer')
	@include('footer')
@stop