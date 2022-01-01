@include('includes.header')

<div class="grid grid-cols-6 gap-3">
    <div>
        @include('includes.menu')
    </div>
    <div class="col-span-4">@livewire('packages')</div>
</div>

@include('includes.footer')