@extends("layouts.app-main")

@section("content")

    <x-share.page-main-header/>

    <x-share.page-main-title
        titleOption="VIAJES PROGRAMADOS"
        subtitleOption="Aqui tienes tu próxima aventura. ¡Anímate!"
    />

    <div class="px-8 mx-auto py-4">
        <div class="w-full mx-auto bg-white shadow-lg p-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                @foreach($viajes as $viaje)
                    <div class="bg-cyan-400">
                        <div class="relative">
                            <img src="{{$viaje->foto}}">
                            <div class="absolute bottom-0 right-0 p-2 border
                                        border-teal-400 bg-teal-700 text-white">
                                {{$viaje->precio}}€
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{$viajes->links()}}
    </div>



@endsection
