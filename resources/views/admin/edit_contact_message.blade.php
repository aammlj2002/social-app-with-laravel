<x-adminlayout>
    <form class="card p-3" action="{{route("update_message", $message->id)}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" value="{{$message->username}}">
            @error('username')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{$message->email}}">
            @error('email')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>message</label>
            <textarea class="form-control" rows="5" name="message">{{$message->message}}</textarea>
            @error('message')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-3">Update message</button>
    </form>
</x-adminlayout>