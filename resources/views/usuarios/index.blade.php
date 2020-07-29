
@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Lista de usuarios</div>

                  <div class="card-body">
                      @role('super-admin')
                      <div class="row justify-content-end pb-4">
                          <a href="{{url('/usuarios/create')}}" class="btn btn-success">Nuevo Usuario</a>
                      </div>
                      @endrole
                      <table class="table">
                        <thead>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Acciones</th>
                        </thead>
                        <tbody>
                          @foreach ($users as $usuario)
                            <tr>
                              <td>{{ $usuario->name }}</td>
                              <td>{{ $usuario->email }}</td>
                              <td> {{ $usuario->roles->implode('name',',') }} </td>
                              <td>
                                @role('editor')
                                <a href="{{ url('usuarios/'.$usuario->id).'/edit' }}" class="btn btn-primary">Editar</a>
                                @endrole
                                @role('super-admin')
                                @include('usuarios.delete',['usuario' => $usuario])
                                @endrole
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
@endsection
