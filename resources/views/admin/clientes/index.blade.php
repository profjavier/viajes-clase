@extends("layouts.app-admin")

@section("content")

    <x-share.page-admin-title
        action="create"
        titleOption="CLIENTES"
        subtitleOption="Listado de clientes"
    />

    <form id="mainForm"
          action="{{route('admin.clientes.create')}}"
          method="get">
    </form>

    <x-admin-clientes.filtro/>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p-4">
            <x-admin-clientes.list :clientes="$clientes"/>
        </div>
    </div>

@endsection
