<x-pagelayout>
    {{-- background image --}}
    <header></header>
    <div class="container">
        <h1 class="mt-3">All Posts</h1>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4 my-3">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{asset("images/posts/". $post["image"])}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$post["title"]}}</h5>
                        <p>posted by {{$post->user->name}}</p>
                        <a href="{{route("get_posts", $post["id"])}}" class="btn btn-primary">See more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div>
            {{$posts->links()}}
        </div>
        {{-- pagination bar --}}
    </div>
</x-pagelayout>