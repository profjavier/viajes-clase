@props(['form'=>'mainForm', 'titleOption', 'subtitleOption'=>'','action'])

<div class="bg-white rounded-lg py-1 px-3 shadow-lg my-4">
    <div class="flex justify-between">
        <div>
            <h1 class="text-red-600 text-2xl font-semibold">{{ $titleOption }}</h1>
            <h3 class="text-red-600 italic">{{$subtitleOption}}</h3>
        </div>
        @if (isset($action))
            @switch($action)
                @case('create')
                    <button type="submit" form="{{$form}}"
                            class="bg-orange-600 py-1 px-4 rounded-lg">
                        <i class="fa-solid fa-plus fa-xl text-white"></i>
                    </button>
                    @break
                @case('store')
                    <button type="submit" form="{{$form}}"
                            class="bg-indigo-600 py-1 px-4 rounded-lg">
                        <i class="fa-solid fa-floppy-disk fa-xl text-white"></i>
                    </button>
                    @break
            @endswitch
        @endif
    </div>
</div>
