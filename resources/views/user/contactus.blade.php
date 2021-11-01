<x-pagelayout>
<div class="container my-3">
    <h2>Contact Us</h2>
    <div class="row">
        <div class="col-md-6">
            {{-- map --}}
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44078.671811403656!2d98.59087141411916!3d12.446991338401476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30fbb04dd43ed2db%3A0x4d1bccdd01a793d3!2z44Of44Oj44Oz44Oe44O8IOODmeOCpA!5e0!3m2!1sja!2sjp!4v1632544248871!5m2!1sja!2sjp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="col-md-6">
            <form class="card p-3" action="{{route("post_contact_us")}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username">
                    @error('username')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>message</label>
                    <textarea class="form-control" rows="5" name="message"></textarea>
                    @error('message')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-3">send message</button>
            </form>
        </div>
    </div>
</div>
</x-pagelayout>