@csrf
<div class="form-material">

    <label class="mb-1" for="title">Name</label>
    <input type="text" class="form-control" id="name" name="name" required value="{{ $data->name}}">

    <div class="form-group">
        <label for="">Facebook url</label>
        <input type="text" name="facebook" id="facebook" value="{{ $data->facebook }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Twitter url</label>
        <input type="text" name="twitter" id="twitter" value="{{ $data->twitter }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Instagram url</label>
        <input type="text" name="instagram" id="instagram" value="{{ $data->instagram }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Linkedin url</label>
        <input type="text" name="linkedin" id="linkedin" value="{{ $data->linkedin }}" class="form-control">
    </div>

    <label class="mb-1" for="icon">Image</label>
    <input type="file" name="image" id="image" class="form-control">
    <input type="hidden" name="imagespan" value="{{ $data->image }}">

    <input type="hidden" name="id" value="{{ $data->id }}">
</div>
