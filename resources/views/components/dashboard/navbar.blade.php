@props(['user' => null, 'onMenuClick' => null])

<header class="h-16 bg-white/80 backdrop-blur-md border-b border-gray-100 px-4 md:px-8 flex items-center justify-between sticky top-0 z-50">
    <!-- Sisi Kiri: Logo & Menu Mobile -->
    <div class="flex items-center gap-4">
        @if($onMenuClick)
        <button
            @click="{{ $onMenuClick }}"
            class="md:hidden p-2 text-gray-500 hover:bg-gray-100 rounded-xl transition-all active:scale-95"
        >
        @else
        <button
            class="md:hidden p-2 text-gray-500 hover:bg-gray-100 rounded-xl transition-all active:scale-95"
        >
        @endif
            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <div class="flex flex-col">
            <span class="text-lg font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent hidden md:flex items-center">
                Sistem Absen
            </span>
            <p class="text-[10px] text-gray-400 font-medium tracking-wider uppercase hidden md:block">Overview v.2.4</p>
        </div>
    </div>

    <!-- Sisi Kanan: Profil -->
    <div class="flex items-center gap-2 md:gap-5">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="flex items-center gap-3 p-1 pr-3 hover:bg-gray-50 rounded-2xl transition-all group">
                    <div class="relative">
                        <div class="w-10 h-10 bg-gradient-to-tr from-blue-600 to-violet-500 rounded-xl flex items-center justify-center shadow-blue-200 shadow-lg group-hover:rotate-3 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
                    </div>

                    <div class="text-left hidden sm:block">
                        <p class="text-sm font-semibold text-gray-800 leading-tight">{{ $user ? $user->name : 'John Doe' }}</p>
                        <p class="text-[11px] text-gray-500 font-medium">{{ $user ? $user->email : 'john.doe@example.com' }}</p>
                    </div>
                    <svg class="w-3.5 h-3.5 text-gray-400 hidden sm:block group-hover:translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('dashboard')">
                    <i class="fas fa-home mr-2"></i>Dashboard
                </x-dropdown-link>
                <x-dropdown-link :href="route('profile.edit')">
                    <i class="fas fa-user mr-2"></i>Profil
                </x-dropdown-link>
                <div class="border-t border-gray-200 my-1"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</header>
