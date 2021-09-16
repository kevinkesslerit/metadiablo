@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Users Settings</div>
                    <div class="card-body">
                    <div class="text-center row">
                    <div class="col d-flex justify-content-center">
                        {{ $userList->links() }}
                        <a class="btn btn-primary mb-3 ml-3" href="#" role="button"><i class="fas fa-user-plus"></i> Create User</a>
                        </div>
                    </div>

            <div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="shadow-sm table mb-0 table-sm table-striped table-hover mx-auto table-dark">
  <thead>
    <tr class="small">
    <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">update&nbsp;&nbsp;delete&nbsp;&nbsp;ban</th>
      <th scope="col">title</th>
      <th scope="col">role flag</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($userList as $user)
        @if ((int)base64_decode($user->access) & (int)1)
            <tr class="bg-danger">
                <th scope="row">{{ $user->id }}</th>
                <td><a href="{{ route('profileView', ['id' => $user->id,'name' => $user->name]) }}" class="font-weight-bold text-dark">{{ $user->name }}</a></td>
                <td>
                <a href="#" class="text-dark"><i class="fas fa-user-edit fa-lg"></i></a>&nbsp;&nbsp;
                <a href="#" class="text-dark"><i class="fas fa-user-times fa-lg"></i></a>&nbsp;&nbsp;
                <a href="#" class="text-dark"><i class="fas fa-gavel fa-lg"></i></a>
                </td>
                <td>{{ $user->title }}</td>
                <td>{{ base64_decode($user->access) }}</td>
            </tr>
        @elseif ((int)base64_decode($user->access) & (int)2)
        <tr class="bg-primary">
                <th scope="row">{{ $user->id }}</th>
                <td><a href="{{ route('profileView', ['id' => $user->id,'name' => $user->name]) }}" class="font-weight-bold text-dark">{{ $user->name }}</a></td>
                <td>
                <a href="#" class="text-dark"><i class="fas fa-user-edit fa-lg"></i></a>&nbsp;&nbsp;
                <a href="#" class="text-dark"><i class="fas fa-user-times fa-lg"></i></a>&nbsp;&nbsp;
                <a href="#" class="text-dark"><i class="fas fa-gavel fa-lg"></i></a>
                </td>
                 <td>{{ $user->title }}</td>
                 <td>{{ base64_decode($user->access) }}</td>
            </tr>
        @else
        <tr>
                <th scope="row">{{ $user->id }}</th>
                <td><a href="{{ route('profileView', ['id' => $user->id,'name' => $user->name]) }}">{{ $user->name }}</a></td>
                <td>
                <a href="#"><i class="fas fa-user-edit fa-lg"></i></a>&nbsp;&nbsp;
                <a href="#"><i class="fas fa-user-times fa-lg"></i></a>&nbsp;&nbsp;
                <a href="#"><i class="fas fa-gavel fa-lg"></i></a>
                </td>
                <td>{{ $user->title }}</td>
                <td>{{ base64_decode($user->access) }}</td>
            </tr>
        @endif
    @endforeach
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
</div>
@endsection
