@extends('layout.main-penjual')

@section('container')
    <div id="wrapper">
        <!-- Sidebar -->
        @include('partials.penjual-sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('partials.penjual-navbar')
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Menu</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Menu</li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="text-align: center">Nama Menu</th>
                                                <th style="text-align: center">Harga Menu</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($menu as $key => $x)
                                                <tr>
                                                    <td style="text-align: center">{{ $x->name_menu }}</td>
                                                    <td style="text-align: center">@rupiah($x->price)</td>
                                                    <td style="text-align: center">
                                                        <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                                            data-target="#detailModal{{ $x->id }}">Detail</a>&emsp;
                                                        <a href="{{ route('menu.edit.view', ['id' => $x->id]) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>&emsp;
                                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal"
                                                            data-target="#hapusModal{{ $x->id }}">Hapus</a>
                                                        <div class="modal fade" id="detailModal{{ $x->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabelLogout">Detail Menu
                                                                            {{ $x->name_menu }}</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table class="table align-items-center table-flush">
                                                                            <tr>
                                                                                <td colspan="2"
                                                                                    style="text-align: center"><img
                                                                                        src="{{ asset('menu/' . $x->picture) }}"
                                                                                        alt=""></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>nama menu</th>
                                                                                <th>harga menu</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>{{ $x->name_menu }}</td>
                                                                                <td>{{ $x->price }}</td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-outline-primary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <a href="{{ route('menu.edit.view', ['id' => $x->id]) }}"
                                                                            class="btn btn-primary">Edit</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="hapusModal{{ $x->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Apakah Anda Yakin Ingin Menghapus Menu
                                                                            '<strong>{{ $x->name_menu }}</strong>' ini?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-outline-primary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <form
                                                                            action="{{ route('menu.delete.process', ['id' => $x->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Hapus</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" style="text-align: center">tidak terdapat menu.
                                                        apakah anda ingin menambahkan menu?<a
                                                            href="{{ route('menu.add.view') }}">yes</a></td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
