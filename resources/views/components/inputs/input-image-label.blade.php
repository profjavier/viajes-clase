@props(['id', 'name', 'label', 'item', 'readonly'=>false])

<div class="w-full">
    @isset($label)
        <label for="{{$id}}" class="text-xs block font-bold text-blue-900 mr-2 p-1">{{$label}}</label>
    @endisset

    @if($readonly)
        @if (!empty($item))
            <img
                src="{{ route('show.image',['type'=>'cliente','id'=>$item->id]) }}"
            >
        @else
            <img src="{{asset('images/imagen_no_disponible.png')}}">
        @endif
    @else
        <div class="text-center">
            <input
                   id="image-{{$id}}" @isset($name)  name="{{$name}}" @endisset type="file">
            <img id="previewImage"
                 @if (!empty($item))
                     src="{{ route('show.image',['type'=>'cliente','id'=>$item->id]) }}"
                @endif
            >
        </div>
    @endif
    @error("$name")
    <div class="block px-2 italic text-xs text-red-500 font-s text-left">
        {!!  $message !!}
    </div>
    @enderror
</div>

@push('scripts')
    <script>
        document.getElementById('image-{{$id}}').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImage = document.getElementById('previewImage');
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush

