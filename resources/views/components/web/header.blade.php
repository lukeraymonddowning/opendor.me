<nav x-data="{ open: false }" class="sticky top-0 z-10 bg-white shadow">
    <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex relative justify-between h-16">
            <div class="flex absolute inset-y-0 left-0 items-center sm:hidden">
                {{-- Mobile menu toggle --}}
                <button type="button" class="inline-flex justify-center items-center p-2 text-gray-400 rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
                    <span class="sr-only">Toggle main menu</span>
                    <x-fal-bars class="block w-6 h-6" x-show="!open" x-cloak/>
                    <x-fal-times class="block w-6 h-6" x-show="open" x-cloak/>
                </button>
            </div>
            <div class="flex flex-1 justify-center items-center sm:items-stretch sm:justify-start">

                {{-- Logo --}}
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{ url('/') }}" class="w-auto h-8 flex items-center group">
                        <x-fad-door-open class="w-8 h-8 text-indigo-500 group-hover:text-indigo-700"/>
                        <span class="hidden lg:block ml-3 text-lg font-medium group-hover:text-indigo-500">{{ config('app.name') }}</span>
                    </a>
                </div>

                {{-- desktop menu --}}
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a
                        href="{{ route('home') }}"
                        class="
                            inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2
                            @if(request()->is(route('home', [], false)))
                                border-indigo-500 text-gray-900
                            @else
                                border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700
                            @endif
                        ">Home</a>
                </div>
            </div>
            <div class="flex absolute inset-y-0 right-0 items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                @if(auth()->guest())
                <div class="flex-shrink-0">
                    <a href="{{ route('auth.github.redirect') }}" class="inline-flex relative items-center py-2 px-4 text-sm font-medium text-white bg-indigo-600 rounded-md border border-transparent shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <x-fas-sign-in class="mr-2 w-4 h-4"/>
                        Sign-In
                    </a>
                </div>
                @endif
                <x-user-dropdown/>
            </div>
        </div>
    </div>

    {{-- mobile menu --}}
    <div class="sm:hidden" id="mobile-menu" x-show="open" x-cloak>
        <div class="pt-2 pb-4 space-y-1">
            <a
                href="{{ route('home') }}"
                class="
                    block py-2 pr-4 pl-3 text-base font-medium border-l-4
                    @if(request()->is(route('home', [], false)))
                        bg-indigo-50 border-indigo-500 text-indigo-700
                    @else
                        border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700
                    @endif
                "
            >Home</a>
        </div>
    </div>
</nav>
