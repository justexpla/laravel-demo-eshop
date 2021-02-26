@foreach($items as $item)
    <a href="{{ $item['link'] }}" class="list-group-item list-group-item-action">
        {{ $item['name'] }}
    </a>
@endforeach
