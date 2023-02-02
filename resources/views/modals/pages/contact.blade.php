@csrf
<div class="form-material">
    <label class="mb-1" for="title">City</label>
    <input type="text" class="form-control" id="title" name="title" required value="{{ $data->title }}">

    <label class="mb-1" for="address">address</label>
    <input type="text" class="form-control" id="address" name="address" required value="{{ $data->address }}">

    <label class="mb-1" for="phone">Telephone</label>
    <input type="text" class="form-control" id="phone" name="phone" required value="{{ $data->phone }}">

    <label class="mb-1" for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" required value="{{ $data->email }}">

    <input type="hidden" name="id" value="{{ $data->id }}">
</div>
