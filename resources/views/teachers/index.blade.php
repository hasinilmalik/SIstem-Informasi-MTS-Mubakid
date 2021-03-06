@extends('layouts.app')
@section('content')
    <x-datatables />

    <div class="mb-2 d-flex justify-content-between">
        <a href="{{ route('teachers.create') }}" class="btn btn-outline-info btn-sm btn-flat">
            <i class="fas fa-plus"></i> Tambah
        </a>

    </div>
    <table id="datatable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($teachers as $item)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <th>{{ $item->name }}</th>
                    <th>
                        <div class="btn-group">
                            @if (request()->is('student/status/baru'))
                                <a href="{{ route('teachers.verify', $item->id) }}" data-toggle="tooltip"
                                    title="Verifikasi" type="button" class="btn btn-default"> <i class="fas fa-check"></i>
                                </a>
                            @endif
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('teachers.show', $item->id) }}" class="dropdown-item">Detail</a>
                                <a class="dropdown-item" href="{{ route('teachers.edit', $item->id) }}">Edit</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('teachers.destroy', $item->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm"
                                        data-toggle="tooltip" title='Delete'> <i class="fas fa-trash"></i> Hapus</button>
                                </form>
                            </div>
                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- @include('layouts.partials.confirm') --}}
    {{-- @include('teachers.create') --}}
@endsection
