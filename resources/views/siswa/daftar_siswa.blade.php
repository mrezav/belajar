@extends('template')

@section('title')
	Daftar Siswa
@stop

@section('main')
	<table class="table table-bordered table-hover table-striped">
		<thead align="center" style="font-weight:bold">
			<tr>
				<td>Foto</td>
				<td>Nama</td>
				<td>Tanggal Lahir</td>
				<td widtd="10%">Jenis Kelamin</td>
				<td>Nomor Telepon</td>
				<td widtd="22%">Aksi</td>
			</tr>
		</thead>
		<tbody align="center">
		@foreach($siswa_list as $row)
			<tr>
				<td><img src="uploads/{{ $row->foto }}" height="80px" width="80px"></td>
				<td>{{ $row->nama }}</td>
				<td>{{ $tgl = date('d F Y',strtotime($row->tgl_lahir)) }}</td>
				@if($row->jenis_kelamin == 'L')
				<td>Laki-laki</td>
				@elseif($row->jenis_kelamin == 'P')
				<td>Perempuan</td>
				@else
				<td> - </td>
				@endif
				<td>{{ !empty($row->telepon->nomor_telepon) ? $row->telepon->nomor_telepon : '-' }} </td>
				<td><a class="btn btn-info btn-sm" href="{{ url('siswa/edit/'.$row->id) }}"><i class="glyphicon glyphicon-pencil"></i> Ubah</a> | <a class="btn btn-danger btn-sm" href="{{ url('delete_siswa/'.$row->id) }}" onclick="return confirm('Yakin akan menghapus ?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a> | <a href="{{ url('siswa/'.$row->id) }}" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-list"></i> Detail</a> </td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<a class="btn btn-info" href="{{ url('siswa/input') }}"><i class="glyphicon glyphicon-plus"></i> Input Siswa</a>
	<center>
		<div class="pagination">
			{{ $siswa_list->links() }}
		</div>	
	</center>
	<br>
@endsection

@section('footer')
	@include('footer')
@stop