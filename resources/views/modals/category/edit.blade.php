@csrf
@php
    $parentCategory = \App\Models\Category::where("type","blog")->whereNull("parentid")->get();
@endphp
<div class="form-material">
    <label class="mb-1" for="name">Name</label>
    <input type="text" class="form-control _js_keyup_slug" id="name" name="name" required value="{{ $category->name }}">

    <label class="mb-1" for="slug">Slug</label>
    <input type="text" name="slug" id="slug" class="form-control slug" readonly value="{{ $category->slug }}">

    <div class="form-group">
        <label for="parentid">Parent Category</label>
        <select name="parentid" id="parentid" class="form-control">
            <option value="">-- select an option -- </option>
            @foreach($parentCategory as $parent)
                <option value="{{ $parent->id }}" @if($parent->id == $category->parentid) selected @endif>{{ $parent->name }}</option>
            @endforeach
        </select>
    </div>
    <label class="my-1" for="description">Description</label>
    <textarea class="form-control" id="description" cols="30" rows="2" name="description">{{ $category->description }}</textarea>
    <input type="hidden" name="type" value="{{ $category->type }}">
    <input type="hidden" name="id" value="{{ $category->id }}"/>
</div>
