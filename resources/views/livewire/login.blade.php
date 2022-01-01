<div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <section class="hero container max-w-screen-lg mx-auto pb-10">
        <img class="mx-auto" width="150" src="https://horseandcountry.tv/wp-content/themes/hctv/img/hc_logo_header.png">
    </section>
    <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
        <div>
            @if (session()->has('error'))
            <div role="alert" class="mb-10">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Error
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>{{ session('error') }}</p>
                </div>
            </div>
            @endif

            <form wire:submit.prevent="submit">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input required wire:model.lazy="email" id="email" name="email" type="email" autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md " />
                    </div>

                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input required wire:model.lazy="password" id="password" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md" />
                    </div>

                    @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="button" wire:click.prevent="login()" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Sign in
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>