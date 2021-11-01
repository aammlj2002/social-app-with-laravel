
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{route("home")}}">Social App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link {{request()->path()=== "/" ? "active" : ""}}" href="{{route("home")}}">Home</a>
                </div>
                <div class="navbar-nav">
                    <a class="nav-item nav-link {{request()->path()=== "user/create" ? "active" : ""}}" href="{{route("createPost")}}">Create Post</a>
                </div>
                @can('admin')
                <div class="navbar-nav">
                    <a class="nav-item nav-link {{request()->path()=== "admin/index" || request()->path()=== "admin/manage_premium_users" || request()->path()=== "admin/contact_messages" ? "active" : ""}}" href="{{route("admin.home")}}">Admin Control</a>
                </div>
                @endcan
                <div class="navbar-nav">
                    <a class="nav-item nav-link {{request()->path()=== "user/contactus" ? "active" : ""}}" href="{{route("contactUs")}}">Contact Us</a>
                </div>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item avatar dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset("images/profiles/". auth()->user()->image)}}" class="rounded-circle z-depth-0" alt="avatar image" height="40px" width="40px"> 
                            <span>{{auth()->user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
                            <a class="dropdown-item" href="{{route("userProfile")}}">Edit Profile</a>
                            <a class="dropdown-item" href="{{route("logout")}}">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>