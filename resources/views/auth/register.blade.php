<x-authlayout>
<div class="row mt-5">
    <div class="col-md-4 offset-4">
        <form class="card p-3" action="{{route("post_register")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="h2 text-center">Register</h1>
            @if (Session("error"))
                <p class="alert alert-danger">{{Session("error")}}</p>
            @endif
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username" value="{{old("username")}}">
                @error('username')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{old("email")}}">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Comfirm Password</label>
                <input type="password" class="form-control" placeholder="Comfirm Password" name="password_confirmation">
                @error('password_confirmation')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="image" class="btn btn-info">Upload Profile Photo</label>
                <input type="file" class="d-none" id="image" name="image" value="{{old("image")}}">
                @error('image')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-3">Sign up</button>
            <p class="text-center">Already member? <a href="{{route("login")}}" class="text-primary">Sign in</a></p>
        </form>
    </div>
</div>
</x-authlayout>