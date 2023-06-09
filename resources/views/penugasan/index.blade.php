@extends('layouts.apps')
@section('content')



<div class="container mt-5">

    <div class="mb-2">



        <!-- Button trigger modal -->
        @auth
        @if (Auth::user()->id == '3')
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah Penugasan
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Penugasan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div x-data="{nasabah: '', nasabahs: []}">
                            <form action="penugasan" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="user_id">Nama Pegawai</label>
                                    <select id="user_id" class="form-select" name="user_id">
                                        <option selected>Pilih Nama Pegawai</option>
                                        @foreach ($user as $gawai)
                                        <option value="{{  $gawai->id }}">{{ $gawai->name }}

                                        </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="nama_nasabah_id">Nama Nasabah</label>
                                    <select id="nama_nasabah_id" class="form-select" aria-label="Default select"
                                        name="nama_nasabah_id">
                                        <option selected>Pilih Nama Pegawai</option>
                                        @foreach ($nasabah as $sabah)
                                        <option value="{{  $sabah->id }}">{{ $sabah->nama }}

                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="deskripsi"
                                        name="deskripsi" style="height: 100px"></textarea>
                                    <label for="deskripsi">Deskripsi</label>
                                </div>









                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" onclick="swal(' Good job!', 'Penugasan Selesai Dibuat' , 'success' )"
                            class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endauth


    </div>


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nomor Kredit</th>
                <th scope="col">Nama Nasabah</th>
                <th scope="col">Cabang</th>
                <th scope="col">Action</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($penugasan as $task)

            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $task->nasabah->nomor_kredit }} </td>
                <td>{{ $task->nasabah->nama_nasabah }} </td>
                <td>{{ $task->nasabah->cabang }} </td>
                {{-- <td><a href="{{ route('/penugasan', ['id' => $pegawai->id]) }}">Input Laporan</a></td> --}}
                <td>

                    <a href="{{ route('penugasan.submit', $task->id) }}">
                        <span class="badge bg-primary">Laporan</span>
                    </a>
                </td>

                <td>
                    @if($task->status == 'belum dikunjungi')
                    <span class="badge bg-warning">{{ $task->status }}</span>
                    @else
                    <span class="badge bg-primary">{{ $task->status }}</span>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>


</div>



@endsection

@push('scripts1')


@push('name')

@endpush




@endpush