<div class="grid justify-items-center mt-9">
    <form wire:submit.prevent="submit">

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Name
            </label>
            <input type="text" wire:model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">

            @error('name')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Description
            </label>
            <input type="text" wire:model="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            @error('description')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Commitment Period
            </label>
            <input type="number" wire:model="commitment_period" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            @error('commitment_period')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Sell Limit
            </label>
            <input type="number" wire:model="sell_limit" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            @error('sell_limit')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Credits
            </label>
            <input type="number" wire:model="credits" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            @error('credits')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <span class="block w-full rounded-md shadow-sm">
                <button type="button" wire:click.prevent="store()" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md">
                    Create Package
                </button>
            </span>
        </div>
    </form>
</div>