@props(['action'=>''])

@switch($action)
    @case('show')
        <button class="bg-cyan-400 hover:bg-cyan-100 w-6 rounded">
            <i class="fa-solid fa-eye text-white"></i>
        </button>
        @break
    @case('update')
        <button class="bg-indigo-600 hover:bg-indigo-400 text-white w-6 rounded">
            <i class="fa-solid fa-pen-to-square"></i>
        </button>
        @break
    @case('delete')
        <button class="bg-red-600 hover:bg-red-400 text-white w-6 rounded">
            <i class="fa-solid fa-trash"></i>
        </button>
        @break
@endswitch
