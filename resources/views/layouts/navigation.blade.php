{{-- <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <x-application-logo style="width: 128px; height: auto;" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="url('inquiries')" :active="request()->is('inquiries')">
                        {{ __('Inquiries') }}
                    </x-nav-link>
                    @if (auth()->user()->role->value == 'Admin')
                        <x-nav-link :href="url('users')" :active="request()->is('users')">
                            {{ __('Users') }}
                        </x-nav-link>
                    @endif

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="url('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ url('logout') }}">
                            @csrf

                            <x-dropdown-link :href="url('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="url('inquiries')" :active="request()->is('inquiries')">
                {{ __('Inquiries') }}
            </x-responsive-nav-link>
            @if (auth()->user()->role->value == 'Admin')
                <x-responsive-nav-link :href="url('users')" :active="request()->is('users')">
                    {{ __('Users') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="url('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ url('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="url('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}

<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <x-application-logo style="width: 128px; height: auto;" />
        </a>

        <!-- Hamburger for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navigation Links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('inquiries') ? 'active' : '' }}" href="{{ url('inquiries') }}">
                        {{ __('Inquiries') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('qutations') ? 'active' : '' }}" href="{{ url('qutations') }}">
                        {{ __('Quotations') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('reports/tsr') ? 'active' : '' }}"
                        href="{{ url('reports/tsr') }}">
                        {{ __('TSR Reports') }}
                    </a>
                </li>
                @if (auth()->user()->role->value == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="{{ url('users') }}">
                            {{ __('Users') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('projects') ? 'active' : '' }}" href="{{ url('projects') }}">
                            {{ __('Projects') }}
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" id="notifyBtn" style="display: none;">{{ __('Enable Notifications') }}</a>
                </li>
            </ul>

            <!-- Settings Dropdown -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ url('profile') }}">
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ url('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ url('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Responsive Navigation for Mobile -->
<div class="d-lg-none">
    <div class="pt-2 pb-3">
        <a class="nav-link {{ request()->is('inquiries') ? 'active' : '' }}" href="{{ url('inquiries') }}">
            {{ __('Inquiries') }}
        </a>
        <a class="nav-link {{ request()->is('qutations') ? 'active' : '' }}" href="{{ url('qutations') }}">
            {{ __('Quotations') }}
        </a>
        <a class="nav-link {{ request()->is('reports/tsr') ? 'active' : '' }}" href="{{ url('reports/tsr') }}">
            {{ __('TSR Reports') }}
        </a>

        @if (auth()->user()->role->value == 'Admin')
            <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="{{ url('users') }}">
                {{ __('Users') }}
            </a>
        @endif
    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-top">
        <div class="px-4">
            <div class="fw-bold">{{ Auth::user()->name }}</div>
            <div class="text-muted">{{ Auth::user()->email }}</div>
        </div>
        <div class="mt-3">
            <a class="nav-link" href="{{ url('profile') }}">
                {{ __('Profile') }}
            </a>
            <form method="POST" action="{{ url('logout') }}">
                @csrf
                <a class="nav-link" href="{{ url('logout') }}"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </div>
</div>