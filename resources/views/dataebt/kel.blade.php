<option value="">Pilih Kelurahan</option>
@foreach ($tasks as $task)
<option value="{{ $task->id_kelurahan }}">{{ $task->nama_kelurahan }}</option>
@endforeach