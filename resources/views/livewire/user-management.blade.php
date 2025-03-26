<div class="rounded-2xl border border-gray-200 bg-white dark:border-neutral-700 dark:bg-white/[0.03]"
    wire:poll.keep-alive>
    <div class="px-5 py-4 sm:px-6 sm:py-5">
        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
            User Management
        </h3>
    </div>
    <div class="border-t border-gray-100 p-5 dark:border-neutral-700 sm:p-6">
        <!-- Table Four -->
        <div
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-neutral-700 dark:bg-white/[0.03]">
            <div class="flex flex-col gap-5 px-6 mb-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                        Users
                    </h3>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                    {{-- <form>
                        <div class="relative">
                            <span class="absolute -translate-y-1/2 pointer-events-none top-1/2 left-4">
                                <svg class="fill-gray-500 dark:fill-gray-400" width="20" height="20"
                                    viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.04199 9.37381C3.04199 5.87712 5.87735 3.04218 9.37533 3.04218C12.8733 3.04218 15.7087 5.87712 15.7087 9.37381C15.7087 12.8705 12.8733 15.7055 9.37533 15.7055C5.87735 15.7055 3.04199 12.8705 3.04199 9.37381ZM9.37533 1.54218C5.04926 1.54218 1.54199 5.04835 1.54199 9.37381C1.54199 13.6993 5.04926 17.2055 9.37533 17.2055C11.2676 17.2055 13.0032 16.5346 14.3572 15.4178L17.1773 18.2381C17.4702 18.531 17.945 18.5311 18.2379 18.2382C18.5308 17.9453 18.5309 17.4704 18.238 17.1775L15.4182 14.3575C16.5367 13.0035 17.2087 11.2671 17.2087 9.37381C17.2087 5.04835 13.7014 1.54218 9.37533 1.54218Z"
                                        fill="" />
                                </svg>
                            </span>
                            <input type="text" placeholder="Search..."
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-10 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-4 pl-[42px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden xl:w-[300px] dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                        </div>
                    </form> --}}
                    <flux:input as="button" placeholder="Search..." icon="magnifying-glass" kbd="⌘K" />
                    <div>
                        <button
                            class="text-theme-sm shadow-theme-xs inline-flex h-10 items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                            <svg class="stroke-current fill-white dark:fill-gray-800" width="20" height="20"
                                viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.29004 5.90393H17.7067" stroke="" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17.7075 14.0961H2.29085" stroke="" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M12.0826 3.33331C13.5024 3.33331 14.6534 4.48431 14.6534 5.90414C14.6534 7.32398 13.5024 8.47498 12.0826 8.47498C10.6627 8.47498 9.51172 7.32398 9.51172 5.90415C9.51172 4.48432 10.6627 3.33331 12.0826 3.33331Z"
                                    fill="" stroke="" stroke-width="1.5" />
                                <path
                                    d="M7.91745 11.525C6.49762 11.525 5.34662 12.676 5.34662 14.0959C5.34661 15.5157 6.49762 16.6667 7.91745 16.6667C9.33728 16.6667 10.4883 15.5157 10.4883 14.0959C10.4883 12.676 9.33728 11.525 7.91745 11.525Z"
                                    fill="" stroke="" stroke-width="1.5" />
                            </svg>

                            Filter
                        </button>
                    </div>

                    <flux:modal.trigger class="mt-4" name="edit-profile">
                        <flux:button>Add User</flux:button>
                    </flux:modal.trigger>


                    <flux:modal name="edit-profile" variant="flyout">
                        <form wire:submit="addUser()">
                            <div class="space-y-6">
                                <div>
                                    <flux:heading size="lg">Add User</flux:heading>
                                    <flux:text class="mt-2">Add another User.</flux:text>
                                </div>
                                {{-- <flux:input wire:model.live="schoolID" type="number" label="School ID"
                                    placeholder="School ID" /> --}}
                                <flux:input.group label="School ID" wire:model="schoolID">
                                    {{-- <flux:input.group.prefix>STUD-</flux:input.group.prefix> --}}

                                    <flux:input wire:model.live='password' required placeholder="0000-0000" />
                                </flux:input.group>
                                <flux:input wire:model="name" required label="Name" placeholder="Name" />
                                <flux:input wire:model="email" required label="Email" placeholder="Email" />
                                <flux:input wire:model="password" type="password" label="Password" />
                                <flux:input wire:model="ipAddress" label="Ip Address" />

                                <div class="flex">
                                    <flux:spacer />

                                    <flux:button wire:submit type="submit" variant="primary">Add</flux:button>
                                </div>
                            </div>
                        </form>
                    </flux:modal>
                </div>
            </div>

            <div class="max-w-full overflow-x-auto custom-scrollbar">
                <table class="min-w-full">
                    <!-- table header start -->
                    <thead class="border-gray-100 border-y bg-gray-50 dark:border-neutral-700 dark:bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div x-data="{ checked: false }" class="flex items-center gap-3">
                                        <div @click="checked = !checked"
                                            class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px]"
                                            :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' :
                                                'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700'">
                                            <svg :class="checked ? 'block' : 'hidden'" width="14" height="14"
                                                viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white"
                                                    stroke-width="1.94437" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div>
                                            <span
                                                class="block font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                School ID
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        User
                                    </p>
                                </div>
                            </th>
                            <th class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Email
                                    </p>
                                </div>
                            </th>
                            <th class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        IP Address
                                    </p>
                                </div>
                            </th>
                            <th class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Last Login
                                    </p>
                                </div>
                            </th>
                            <th class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Status
                                    </p>
                                </div>
                            </th>
                            <th class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Action
                                    </p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <!-- table header end -->

                    <!-- table body start -->
                    @foreach ($users as $user)
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                            <tr>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div x-data="{ checked: false }" class="flex items-center gap-3">
                                            <div @click="checked = !checked"
                                                class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px]"
                                                :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' :
                                                    'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700'">
                                                <svg :class="checked ? 'block' : 'hidden'" width="14"
                                                    height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white"
                                                        stroke-width="1.94437" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div>
                                                <span
                                                    class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                                                    {{ $user->schoolID }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <span
                                                    class="text-theme-sm mb-0.5 block font-medium text-gray-700 dark:text-gray-400">
                                                    {{ $user->name }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                            {{ $user->email }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                            {{ $user->ipaddress ?? 'Not Available' }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                            @if ($user->status == 'Online')
                                                Active
                                            @else
                                                {{ \Carbon\Carbon::parse($user->last_login_ip)->diffForHumans() }}
                                            @endif
                                            {{-- {{ $user->created_at->diffForHumans() }} --}}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <p
                                            class="bg-success-50 text-theme-xs text-success-600 dark:bg-success-500/15 dark:text-success-500 rounded-full px-2 py-0.5 font-medium">
                                            @if ($user->status == 'Online')
                                                <span
                                                    class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1 mb-.75"></span>
                                                {{ $user->status }}
                                            @else
                                                <span
                                                    class="inline-block w-2 h-2 bg-red-500 rounded-full mr-1 mb-.75"></span>
                                                {{ $user->status }}
                                                {{-- {{ \Carbon\Carbon::parse($user->last_login_ip)->diffForHumans() }} --}}
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="flex items-center justify-center">

                                        <flux:modal.trigger wire:click="edit({{ $user->id }})" name="edit-profile{{ $user->id }}">
                                            <a class="cursor-pointer">
                                                <flux:icon icon="pencil-square" class="ml-2" />
                                            </a>
                                        </flux:modal.trigger>

                                        <form wire:submit="update()">
                                        <flux:modal name="edit-profile{{ $user->id }}" variant="flyout">
                                                <div class="space-y-6">
                                                    <div>
                                                        <flux:heading size="lg">Edit User</flux:heading>
                                                        <flux:text class="mt-2">Edit a Student User.</flux:text>
                                                    </div>
                                                    <flux:input.group label="School ID" wire:model.change="schoolID">
                                                        <flux:input required value="{{ $user->schoolID }}" />
                                                    </flux:input.group>
                                                    {{-- <input type="text"value="{{ $user->id }}" wire:model="id"> --}}
                                                    <flux:input.group label="Name" wire:model="name">
                                                        <flux:input required
                                                            placeholder="Name" value="{{ $user->name }}" />
                                                    </flux:input.group>
                                                    <flux:input.group label="Email" wire:model="email" >
                                                        <flux:input
                                                            placeholder="Email" value="{{ $user->email }}" />
                                                    </flux:input.group>
                                                    {{-- <flux:input.group label="Password" wire:model="password">
                                                        <flux:input type="{{ $pass }}" value='{{ $user->password }}'/>
                                                    </flux:input.group>
                                                    <flux:checkbox wire:click="togglePassword"
                                                    :label="__('Show Password')" /> --}}
                                                    <div class="flex">
                                                        <flux:spacer />

                                                        <flux:button wire:submit type="submit" variant="primary">Update
                                                        </flux:button>
                                                    </div>
                                                </div>
                                            </flux:modal>
                                        </form>


                                        <flux:modal.trigger name="delete-profile{{ $user->id }}">
                                            <a class="cursor-pointer">
                                                <flux:icon icon="trash" class="ml-2" />
                                            </a>
                                        </flux:modal.trigger>

                                        <flux:modal name="delete-profile{{ $user->id }}" class="min-w-[22rem]">
                                            <div class="space-y-6">
                                                <div>
                                                    <flux:heading size="lg">Delete project?</flux:heading>

                                                    <flux:text class="mt-2">
                                                        <p>You're about to delete this project.</p>
                                                        <p>This action cannot be reversed.</p>
                                                    </flux:text>
                                                </div>

                                                <div class="flex gap-2">
                                                    <flux:spacer />

                                                    <flux:modal.close>
                                                        <flux:button variant="ghost">Cancel</flux:button>
                                                    </flux:modal.close>

                                                    <flux:button wire:click="delete({{ $user->id }})"
                                                        class="cursor-pointer" type="submit" variant="danger">Delete
                                                        project
                                                    </flux:button>
                                                </div>
                                            </div>
                                        </flux:modal>


                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    <!-- table body end -->
                </table>
            </div>
        </div>
        <!-- Table Four -->
    </div>
</div>
