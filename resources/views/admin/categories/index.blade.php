@extends('layouts.app')

@section('content')
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">

                    {{-- notifications --}}
                    @if (Session::has('set_flashdata'))
                        {{ Session::get('set_flashdata') }}
                    @endif



                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-th-list"></i>
                            <h3>Liste des utilisateurs</h3>
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-success pull-right mt-sm" style="margin-right: 3em; line-height: 18px;" role="button" aria-pressed="true">Ajouter</a>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">date modification</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categeries as $c)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $c->name_cat }}</td>
                                        <td>{{ $c->updated_at }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ Route('admin.users.edit', $c->id_cat) }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">Modifer</a>
                                            <a href="{{ Route('admin.users.destroy', $c->id_cat) }}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /widget-content -->
                    </div>
                    <!-- /widget -->
                </div>
                <!-- /span12 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>
<!-- /main -->
@endsection
