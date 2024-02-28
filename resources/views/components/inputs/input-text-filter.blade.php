@props(['name','label', 'readonly'=>false])
@php($id='filtro-'.uniqid())

<div class="w-full relative p-1">

    @isset($label)
        <label for="{{$id}}" class="text-xs  font-bold text-teal-700 mr-2 p-1 absolute -top-2 left-1">{{$label}}</label>
    @endisset

    <input id="{{$id}}" type="text"
           name="{{$name}}"
           @if($readonly) readonly @endif
           {{ $attributes->merge(['class' => 'w-full px-2 py-1 border
            border-emerald-300 focus:border-teal-500 focus:ring
            focus:ring-orange-200 rounded']) }}>

</div>
