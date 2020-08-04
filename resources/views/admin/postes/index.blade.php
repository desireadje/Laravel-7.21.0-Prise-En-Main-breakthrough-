@extends('layouts.app')

@section('content')
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-th-list"></i>
                            <h3>Liste des utilisateurs</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Adresse email</th>
                                        <th scope="col">Roles</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postes as $poste)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $poste->titre }}</td>
                                        <td>
                                            <em>{{ $poste->contenu }}</em>
                                        </td>
                                        <td class="text-nowrap">{{ implode(', ', $poste->roles()->get()->pluck('name')->toArray()) }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ Route('admin.users.edit', $poste->id) }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">Modifer</a>
                                            <a href="{{ Route('admin.users.destroy', $poste->id) }}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">Supprimer</a>
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
