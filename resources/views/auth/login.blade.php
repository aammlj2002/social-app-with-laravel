<x-authlayout>
<div class="row mt-5">
    <div class="col-md-4 offset-4">
        <form class="card p-3" action="{{route("post_login")}}" method="POST">
            @csrf
            <h1 class="h2 text-center">Login</h1>
            @if (Session("error"))
                <div class="alert alert-danger">{{Session("error")}}</div>
            @endif
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email">
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
            <a href="#" class="text-center mb-3 text-primary">Forgot password?</a>
            <button type="submit" class="btn btn-primary mb-3">Login</button>
            <p class="text-center">Not a member? <a href="{{route("register")}}" class="text-primary">Sign up</a></p>
        </form>
    </div>
</div>
</x-authlayout>