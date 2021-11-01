<x-pagelayout>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            <h1 class="h2">New Post</h1>
            <form class="card p-3" action="{{route("post")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" rows="5" name="content"></textarea>
                </div>
                <div class="form-group">
                    <label class="btn btn-info" for="photo">Upload Photo</label>
                    <input type="file" id="photo" class="d-none" name="image">
                </div>
                <button type="submit" class="btn btn-primary mb-3" >Add Post</button>
            </form>
        </div>
    </div>
</div>
</x-pagelayout>