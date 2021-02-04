    <div class="form-group">
        <label for="exampleFormControlSelect1">Filter brand</label></br>
        @foreach ($brands as $brand )
            <input type="checkbox" name="brand[]" value="{{ $brand->brand }}"> {{ $brand->brand }} </br>
        @endforeach
    </div>
