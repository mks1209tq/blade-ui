<div class="flex justify-left m-6 border-2 border-gray-200">
        <!-- Navigation Links -->
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
    </div>
                    
    @if (Auth::user()->is_admin)    
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Issues') }}
            </x-nav-link>
        </div>
    @endif
                    
    @if (Auth::user()->is_admin || Auth::user()->is_verifier)
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Verify') }}
            </x-nav-link>
        </div>
    @endif

    @if (Auth::user()->is_admin)
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Admin Panel') }}
            </x-nav-link>
    </div>
    @endif
</div>