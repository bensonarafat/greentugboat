@csrf
<div class="form-material">
    <label class="mb-1" for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" required value="{{ $data->title }}">
    <div class="form-group">
        <label for="sort">Sort</label>
        <input type="number" name="sort" id="sort" value="{{ $data->icon }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Content</label>
        <textarea name="content" id="" cols="30" rows="10" class="form-control">{{ $data->content }}</textarea>
    </div>

    <input type="hidden" name="id" value="{{ $data->id }}">
</div>
