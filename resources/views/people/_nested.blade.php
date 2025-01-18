<ul>
    @foreach($people as $person)
        <li>
            {{ $person->name }}
            @if($person->children->isNotEmpty())
                @include('people._nested', ['people' => $person->children])
            @endif
        </li>
    @endforeach
</ul>
