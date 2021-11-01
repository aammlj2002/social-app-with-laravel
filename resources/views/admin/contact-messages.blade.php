<x-adminlayout>
<h2>Contact Messages</h2>
@if (Session("message"))
    <div class="alert alert-success">{{Session("message")}}</div>
@endif
<table class="table table-hover">
    <thead class="bg-primary text-light">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Messages</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($messages as $message)
        <tr>
            <td>{{$message->id}}</td>
            <td>{{$message->username}}</td>
            <td>{{$message->email}}</td>
            <td>{{$message->message}}</td>
            <td><a href="{{route("admin.edit_contact_messages", $message->id)}}" class="btn btn-warning btn-sm">Edit</a></td>
            <td><a href="{{route("admin.delete_contact_messages", $message->id)}}" class="btn btn-danger btn-sm">Remove</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</x-adminlayout>