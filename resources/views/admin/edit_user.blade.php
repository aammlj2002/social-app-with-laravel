<x-adminlayout>
    <form class="card p-3" action="{{route("update_user", $user->id)}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="username" value="{{$user->name}}">
            @error('username')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}">
            @error('email')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Is Admin?</label>
            <input type="checkbox" name="is_admin" {{$user->is_admin ? "checked" : ""}}>
        </div>
        <div class="form-group">
            <label>Is premium?</label>
            <input type="checkbox" name="is_premium" {{$user->is_premium ? "checked" : ""}}>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Update</button>
    </form>
</x-adminlayout>