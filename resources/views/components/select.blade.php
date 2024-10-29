@props([
    'data' => [],
    'name',
    'selectedData' => []
])
<select {{ $attributes }} name="{{ $name }}">
    @foreach ($data as $item)
        <option value="{{ $item['id'] ?? $item['name'] }}"
        
        @php
            foreach ($selectedData as $key => $value) {
               if (($value->value == $item['name']) && ($value->key_name == $name)) {
                echo "selected";
               }
            }
        @endphp
        
        class="capitalize">
            {{ $item['name'] }}
        </option>
    @endforeach
    {{ $slot }}
</select>
