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

    <div class="grid justify-items-center mt-9">
        <form wire:submit.prevent="submit">
            <input type="hidden" wire:model="userId" value="{{$userId}}">
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Package
                </label>
                <select wire:model="packageId" class="flex w-full shadow appearance-none border rounded py-2 px-3 text-gray-700">
                    <option value=""> Select Package </option>
                    @foreach($packages as $package)
                    <option value="{{ $package->id }}">{{ $package->name }} - {{$package->credits}} Credits</option>
                    @endforeach
                </select>
                @error('packageId')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Months
                </label>
                <input type="number" placeholder="Number of Months" wire:model="months" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                @error('months')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <span class="block w-full rounded-md shadow-sm">
                    <button type="button" wire:click.prevent="assignPackage()" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md">
                        Assign Package
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>

​