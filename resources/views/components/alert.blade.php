<div
    x-data="{ show: true }"
    x-show="show"
    x-transition
    class="p-4 rounded-xl shadow-md mb-4 border-l-4"
    :class="{
        'bg-green-100 border-green-500 text-green-800': '{{ session('success') }}',
        'bg-red-100 border-red-500 text-red-800': '{{ session('error') }}',
        'bg-yellow-100 border-yellow-500 text-yellow-800': '{{ session('warning') }}',
        'bg-blue-100 border-blue-500 text-blue-800': '{{ session('info') }}',
    }"
    x-init="setTimeout(() => show = false, 5000)"
>
    <div class="flex justify-between items-center">
        <div>
            {{ session('success') ?? session('error') ?? session('warning') ?? session('info') }}
        </div>
        <button @click="show = false" class="ml-4 text-xl font-bold leading-none">&times;</button>
    </div>
</div>
