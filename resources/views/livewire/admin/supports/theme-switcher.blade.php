<ul class="switcher">
    @foreach($themes as $theme)
        <li wire:click="getTheme('Theme', '{{ $theme }}')" id="{{$theme}}"></li>
    @endforeach
</ul>


