@props(['clientes'])

<div>
    <table class="w-full bg-white shadow-lg">
        <thead>
        <tr class="border-b-2 border-orange-500 py-4 uppercase">
            <th class="py-2">Nif</th>
            <th class="py-2 text-left">Nombre</th>
            <th class="py-2 w-32">Alta</th>
            <th class="py-2 w-32">Foto</th>
            <th class="py-2 w-32">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr class="even:bg-gray-100 odd:bg-white">
                <td class="py-1 px-2 text-center">{{$cliente->nif}}</td>
                <td class="py-1 px-2">
                     {{$cliente->apellido1}} {{$cliente->apellido2}}, {{$cliente->nombre}}
                </td>
                <td class="py-1 px-2 text-center">
                    {{date('d/m/Y',strtotime($cliente->created_at))}}
                </td>
                <td class="py-1 px-2 text-center align-middle">
                    @if (!empty($cliente->foto))
{{--                        <img--}}
{{--                            title="{{$cliente->nombre}} {{$cliente->apellido1}} {{$cliente->apellido2}}"--}}
{{--                            class="object-scale-down h-10 w-10 mx-auto"--}}
{{--                            src="{{ route('download.image.cliente',$cliente->id) }}"--}}
{{--                        >--}}
                        <img
                            title="{{$cliente->nombre}} {{$cliente->apellido1}} {{$cliente->apellido2}}"
                            class="object-scale-down h-10 w-10 mx-auto"
                            src="{{ route('show.image',['type'=>'cliente','id'=>$cliente->id]) }}"
                        >
                    @else
                        <img
                            title="{{$cliente->nombre}} {{$cliente->apellido1}} {{$cliente->apellido2}}"
                            class="object-scale-down h-10 w-10 mx-auto"
                            src="{{asset('images/imagen_no_disponible.png')}}">
                    @endif
                </td>
                <td class="py-1 px-2 text-center">
                    <a href="{{route('admin.clientes.show',$cliente->id)}}" >
                        <x-buttons.button-table action="show"/>
                    </a>
                    <a href="{{route('admin.clientes.edit',$cliente->id)}}">
                        <x-buttons.button-table action="update"/>
                    </a>
                    <x-share.confirm-delete
                        :id="$cliente->id"
                        :url="route('admin.clientes.destroy',$cliente->id)"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $clientes->links() }}
</div>
