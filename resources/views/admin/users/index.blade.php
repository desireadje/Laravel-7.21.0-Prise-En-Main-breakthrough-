@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Liste des utilisateurs</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Adresse email</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $key->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $key->email }}">{{ $key->email }}</a>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="{{ Route('admin.users.edit', $key->id) }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">Modifer</a>
                                            <a href="{{ Route('admin.users.destroy', $key->id) }}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
