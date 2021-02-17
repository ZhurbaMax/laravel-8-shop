    <div class="form-group">
        <label for="exampleFormControlSelect1">Filter brand</label></br>
        @foreach ($brands as $brand )
            <input type="checkbox" name="brand[]" value="{{ $brand }}"
                   @if(request()->brand)
                       @foreach(request()->brand as $brandOLd)
                            @if($brand == $brandOLd)checked @endif
                       @endforeach
                   @endif
            > {{ $brand }} </br>
        @endforeach
    </div>

