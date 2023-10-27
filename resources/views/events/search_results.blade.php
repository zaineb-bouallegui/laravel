<!-- events/search_results.blade.php -->
@if ($events->isEmpty())
    <p>No results found.</p>
@else
    <ul>
        @foreach ($events as $event)
            <li>{{ $event->name }}</li>
        @endforeach
    </ul>
@endif
