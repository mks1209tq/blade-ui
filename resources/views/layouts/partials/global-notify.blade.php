   <!-- Global notification live region, render this permanently at the end of the document -->
   <div aria-live="assertive" class="pointer-events-auto fixed right-0 top-4 z-50 flex w-full max-w-sm px-4 sm:px-6"
        x-data="{ show: {{ session('success') || session('error') ? 'true' : 'false' }} }"
        x-init="setTimeout(() => show = false, 5000)"
        
        x-cloak
        >
        <div class="w-full"
        x-show="show"   
        x-transition:enter="transform ease-out duration-800 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-800"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
            <div class="pointer-events-auto w-full overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="shrink-0">
                            @if(session('success'))
                            <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            @endif
                            @if(session('error'))
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-red-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            @endif
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            @if(session('success'))
                                <p class="text-sm font-medium text-gray-900">Success!</p>
                                <p class="mt-1 text-sm text-gray-500">{{ session('success') }}</p>
                            @endif
                            @if(session('error'))
                                <p class="text-sm font-medium text-gray-900">Error!</p>
                                <p class="mt-1 text-sm text-gray-500">{{ session('error') }}</p>
                            @endif
                        </div>
                        <div class="ml-4 flex shrink-0">
                            <button type="button" @click="show = false" class="pointer-events-auto inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of global notification -->