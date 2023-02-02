@csrf
<div class="form-material">
    <label class="mb-1" for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" required value="{{ $data->title}}">

    <label class="mb-1" for="icon">Icon</label>
    <input type="file" name="image" id="image" class="form-control">
    <input type="hidden" name="imagespan" value="{{ $data->icon }}">

    <label class="my-1" for="description">Description</label>
    <textarea class="form-control" id="description" cols="30" rows="2" name="description">{{ $data->content }}</textarea>

    <input type="hidden" name="id" value="{{ $data->id }}">
</div>
