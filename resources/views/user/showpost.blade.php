<x-pagelayout>
    <div class="container py-3" style="max-width:500px">
        <img src="{{asset("images/posts/". $post->image)}}" alt="post image" width="100%">
        <h2 class="card-title mt-3">{{$post["title"]}}</h2>
        <p class="card-text">{{$post["content"]}}</p>
        @can('admin_premium_user', $post->id)
        <a href="{{route("edit_post_form", $post->id)}}" class="btn btn-warning">Eidt post</a>
        <a href="{{route("delete_post", $post->id)}}" class="btn btn-danger">Delete post</a>
        @endcan
    </div>
</x-pagelayout>
