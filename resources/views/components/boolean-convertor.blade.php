

<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
    @switch($type)
        @case("Activation")
            @switch($value)
                @case(1)
                    <b>فعال</b>
                    @break
                @case(0)
                    <b>غیر فعال</b>
                    @break
            @endswitch
        @break
        @endswitch

</div>
