<div class="form-group {{ $class }}">
    <label for="{{ $labelNameId }}">{{ $title }}</label>
    <select name="{{ $labelNameId }}" id="{{ $labelNameId }}" class="form-item">
        @foreach ($options as $key => $option)
            <option value="{{ $option }}" @if ($key == 0) selected @endif>{{ $option }}</option>
        @endforeach
    </select>
</div>
