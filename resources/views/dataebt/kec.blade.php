<option value="">Pilih Kecamatan</option>
@foreach ($tasks as $task)
<option value="{{ $task->id_kecamatan }}">{{ $task->nama_kecamatan }}</option>
@endforeach