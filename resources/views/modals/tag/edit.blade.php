@csrf
<div class="form-material">
    <label class="mb-1" for="name">Name</label>
    <input type="text" class="form-control _js_keyup_slug" id="name" name="name" required value="{{ $tag->name }}">

    <label class="mb-1" for="slug">Slug</label>
    <input type="text" name="slug" id="slug" class="form-control slug" readonly value="{{ $tag->slug }}">

    <input type="hidden" name="id" value="{{ $tag->id }}"/>
</div>
