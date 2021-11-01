<x-adminlayout>
<h2>Manage Premium Users</h2>
@if (Session("message"))
  <div class="alert alert-success">
      {{Session("message")}}
  </div>
@endif
<table class="table table-hover">
    <thead class="bg-primary text-light">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">isAdmin</th>
        <th scope="col">isPremium</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><b>{{$user->is_admin ? "Yes" : "No"}}</b></td>
            <td><b>{{$user->is_premium ? "Yes" : "No"}}</b></td>
            <td><a href="{{route("edit_user", $user->id)}}" class="btn btn-warning btn-sm">Edit</a></td>
            <td><a href="{{route("delete_user", $user->id)}}" class="btn btn-danger btn-sm">Remove</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</x-adminlayout>