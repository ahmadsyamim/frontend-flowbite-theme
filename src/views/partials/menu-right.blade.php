@if (Auth::guest())
<div class="inline-flex shadow-sm rounded-md" role="group">
    <a href="{{ route('login') }}"
        class="rounded-l-lg border border-gray-900 bg-transparent text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
        Login
    </a>
    <a href="{{ route('register') }}"
        class="rounded-r-md border border-gray-900 bg-transparent text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
        Register
    </a>
</div>
@else

<button id="dropdownButton" data-dropdown-toggle="dropdown"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2.5 text-center inline-flex items-center"
    type="button">My Account <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
    </svg></button>

<!-- Dropdown menu -->
<div id="dropdown" class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44">
    <ul class="py-1" aria-labelledby="dropdownButton">
        <li>
            <a href="{{ route('voyager-frontend.account') }}"
                class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Update Account</a>
        </li>
        <li>
            @if (Session::has('original_user.id'))
            <a href="#" onclick="document.getElementById('impersonate-form').submit();return false;"
                class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">
                Switch back to {{ Session::get('original_user.name') }}
            </a>
            <form id="impersonate-form"
                action="{{ route('voyager-frontend.account.impersonate', Session::get('original_user.id')) }}"
                method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <a href="#" onclick="document.getElementById('logout-form').submit();return false;"
                class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endif
        </li>
    </ul>
</div>


@endif
