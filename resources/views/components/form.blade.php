@props([
    'submit',
    'action',
    'method' => 'POST',
    'fields' => [],
    'formHeading' => '',
    'animationBtn' => '',
    'simpleBtn' => '',
])

<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}" {{ $attributes }}>
    @csrf
    @unless (in_array($method, ['GET', 'POST']))
        @method($method)
    @endunless

    @if ($formHeading)
        <h2 class="font-bold text-3xl text-center dark:text-white capitalize mb-6">{{ $formHeading }}</h2>
    @endif

    @foreach ($fields as $field)
        <div class="relative z-0 w-full mb-5 group">
            <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" id="{{ $field['id'] }}"
                placeholder="{{ $field['placeholder'] }}"
                @if ($field['value']) value="{{ $field['value'] }}" @endif
                @if ($field['class']) class="{{ $field['class'] }}" @endif />

            @if ($field['type'] != 'hidden')
                <label for="{{ $field['id'] }}"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 capitalize">{{ $field['label'] }}</label>

                @error($field['name'])
                    <p class="text-red-600" style="text-shadow:3px 5px 4px black">{{ $message }}</p>
                @enderror
            @endif
        </div>
    @endforeach


    {{ $slot }}


    @if ($animationBtn)
        <div class="flex items-center justify-center w-full h-full button mt-4">
            <button value="{{ $animationBtn }}" type="submit"
                class="relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group">
                <span
                    class="w-48 h-48 rounded rotate-[-40deg] bg-purple-600 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
                <span
                    class="relative w-full text-left text-black transition-colors duration-300 ease-in-out group-hover:text-white capitalize">{{ $animationBtn }}</span>
            </button>
        </div>
    @endif

    @if ($simpleBtn)
        <input type="submit" value="{{ $simpleBtn }}" class="cursor-pointer">
    @endif
</form>
