@if(session('success') || session('error'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 4000)"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"

        class="fixed top-5 right-5 z-[250] w-[90%] max-w-sm "
    >
        <div
            class="rounded-2xl shadow-lg px-6 py-4 text-white"
            :class="{
                'bg-green-600': '{{ session('success') }}',
                'bg-red-600': '{{ session('error') }}'
            }"
        >
            <div class="flex items-center justify-between">
                <span class="font-medium text-sm md:text-base">
                    {{ session('success') ?? session('error') }}
                </span>
                <button @click="show = false" class="ml-3 text-white">
                    ✕
                </button>
            </div>
        </div>
    </div>
@endif
