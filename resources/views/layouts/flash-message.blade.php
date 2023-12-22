@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-48 py-3 hidden sm:block">
        <p>
            {{ session('message') }}
        </p>
    </div>
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed bottom-0 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-48 py-3 block sm:hidden">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
