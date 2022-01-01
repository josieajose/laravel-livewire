    <div>
        <div class="grid grid-cols-6 gap-3 my-7">
            <div>
                <button onclick="Livewire.emit('openModal', 'create-user')" class="h-10 px-4 m-2  text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">New User</button>
            </div>
            <div class="col-span-5">
                @if (session()->has('message'))
                <div role=" alert" class="mb-10 ">
                    <div class="border mt-1 border-green-400 rounded bg-green-100 px-4 py-2 text-green-700">
                        <p>{{ session('message') }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Purchased Credit
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Packages
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($users as $user)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $user->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $user->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $user->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Balance</div>
                                        <div class="text-sm text-gray-500"> {{ $user->purchased_credits }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $user->userPackages->count() }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <button wire:click='$emit("openModal", "change-user-status", {{ json_encode(["userId" => $user->id]) }})' class="bg-white text-xs hover:bg-gray-100  {{ $user->enabled==1 ? 'text-red-800' : 'text-green-800' }} font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                            {{ $user->enabled==1 ? 'Disable User' : 'Enable User' }}
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <button wire:click='$emit("openModal", "assign-package", {{ json_encode(["userId" => $user->id]) }})' class="bg-purple-900 text-xs  text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                            Assign Package
                                        </button>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>