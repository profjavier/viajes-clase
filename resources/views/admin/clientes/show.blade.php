@extends("layouts.app-admin")

@section("content")

    <x-share.page-admin-title
        action="store"
        titleOption="CLIENTES"
        subtitleOption="Consulta de clientes"
    />

{{--    <form id="mainForm"--}}
{{--          action="{{route('admin.clientes.store')}}"--}}
{{--          method="post"--}}
{{--          enctype="multipart/form-data">--}}
{{--        @csrf--}}
        <x-admin-clientes.form :cliente="$cliente" readonly/>
{{--    </form>--}}

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p-4">
            <div class="tracking-wide font-semibold text-lg">LISTADO DE CLIENTES</div>
            <x-admin-clientes.list :clientes="$clientes"/>
        </div>
    </div>




@endsection
