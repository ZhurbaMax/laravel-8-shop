<form method="get" action="/filter-brand">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleFormControlSelect1">Filter brand</label></br>
        @foreach ($brands as $brand )
            <input type="checkbox" name="brand[]" value="{{ $brand->brand }}"> {{ $brand->brand }} </br>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>
