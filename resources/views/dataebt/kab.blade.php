<option value="">Pilih Kota/Kab</option>
@foreach ($tasks as $task)
<option value="{{ $task->id_kabupaten }}">{{ $task->nama_kabupaten }}</option>
@endforeach