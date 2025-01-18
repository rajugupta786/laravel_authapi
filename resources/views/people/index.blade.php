
<ul>
@foreach($people as $person)
    <li>
        {{ $person->name }}
        @if($person->children->isNotEmpty())
            <ul>
                @foreach($person->children as $child)
                    <li>
                        {{ $child->name }}
                        @if($child->children->isNotEmpty())
                            @include('people._nested', ['people' => $child->children])
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach
</ul>
