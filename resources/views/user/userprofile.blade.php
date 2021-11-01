<x-pagelayout>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            <h1 class="h2">User Profile</h1>
            @if (Session("success"))
                <div class="alert alert-success">{{Session("success")}}</div>
            @endif
            @if (Session("error"))
                <div class="alert alert-danger">{{Session("error")}}</div>
            @endif
            <form class="card p-3" action="{{route("post_userProfile")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" value="{{auth()->user()->name}}" name="username">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" value="{{auth()->user()->email}}" name="email">
                </div>
                <div class="form-group">
                    <label>Old password</label>
                    <input type="password" class="form-control" name="old_password">
                </div>
                <div class="form-group">
                    <label>New password</label>
                    <input type="password" class="form-control" name="new_password">
                </div>
                <div class="form-group">
                    <label class="btn btn-info" for="photo">Update Photo</label>
                    <input type="file" id="photo" class="d-none" name="image">
                    <img class="d-block" width="100%" src="{{asset("images/profiles/". auth()->user()->image)}}" alt="profile image">
                </div>
                <button type="submit" class="btn btn-primary mb-3">Update Profile</button>
            </form>
        </div>
    </div>
</div>
</x-pagelayout>