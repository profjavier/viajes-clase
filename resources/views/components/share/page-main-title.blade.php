<div class="bg-white rounded-lg py-1 px-3 shadow-lg mb-4">
    <h1 class="text-slate-600 text-2xl font-semibold tracking-widest"
        style="font-family: 'Caveat', cursive; text-shadow: 4px 4px 4px #aaa;">
        {{ $titleOption }}
    </h1>
    <h3 class="text-slate-600 italic tracking-widest">{{$subtitleOption}}</h3>
</div>

{{--Fuente caveat de google--}}
@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Ephesis&family=Syne+Tactile&display=swap" rel="stylesheet">
    {{--Aplicamos con: font-family: 'Caveat', cursive;--}}
@endpush
