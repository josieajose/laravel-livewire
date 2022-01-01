<div>
    <div>
        @if (session()->has('error'))
        <div role="alert" class="mb-10 m-5">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Error
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>{{ session('error') }}</p>
            </div>
        </div>

        @endif
        <div class="grid justify-items-center p-10">
            <h1 class="text-lg">{{$package->enabled ? "Disable" : "Enable"}} {{ ucwords($package->name) }} </h1>
            <div class="mt-10">
                <button type="button" wire:click.prevent="changeStatus()" class="flex justify-center px-4 py-2 text-sm font-medium text-white  {{ $package->enabled  ? 'bg-red-600' : 'bg-green-600' }} rounded-md">
                    {{ $package->enabled  ? "Disable" : "Enable" }}
                </button>
            </div>
        </div>
    </div>
</div>