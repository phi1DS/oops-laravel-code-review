<form action="{{ route('backend.posts.quick_update', $post->id) }}" method="POST" class="d-inline quick-edit-form">
    @csrf
    @method('PATCH')
    <input type="text" name="name" value="{{ $post->name }}" class="form-control form-control-sm d-inline-block" style="width: 150px;">
    <button type="submit" class="btn btn-sm btn-primary">Save</button>
</form>