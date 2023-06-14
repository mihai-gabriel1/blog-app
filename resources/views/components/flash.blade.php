@if (session()->has('success'))
    <div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 5000)"
         x-show="show"
         x-transition:enter="transition-opacity ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed bottom-1 right-1 bg-blue-500 text-white py-2 px-4 m-1 rounded-xl border text-sm">
        <p>{{ session()->get('success') }}</p>
    </div>
@endif
