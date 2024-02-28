<div
    x-data="{ isVisible: true }"
    x-init="setTimeout(() => { isVisible = false; }, 10000)"
    x-show="isVisible"
    class="absolute z-100 bg-opacity-75"
>
    @if(session('alert-success'))
        <div
            class="cursor-pointer bg-green-400 border-l-8
            border-green-800 text-white p-4" role="alert">
            {{session('alert-success')}}
        </div>
    @endif
    @if(session('alert-error'))
        <div
            x-data="{ isVisibleError: true }"
            @click="isVisibleError = false"
            x-show="isVisibleError"
            class="cursor-pointer bg-red-400 border-l-8
                border-red-800 text-white p-4" role="alert">
            {{session('alert-error')}}
        </div>
    @endif
    @if(session('alert-warning'))
        <div
            class="cursor-pointer bg-orange-400 border-l-8
    border-orange-800 text-white p-4" role="alert">
            {{session('alert-warning')}}
        </div>
    @endif
    @if(session('alert-info'))
        <div
            class="cursor-pointer bg-blue-400 border-l-8
    border-blue-800 text-white p-4" role="alert">
            {{session('alert-info')}}
        </div>
    @endif
</div>
