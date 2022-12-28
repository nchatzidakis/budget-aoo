<div class="{{ $wrapper_css_class }}">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow rounded overflow-hidden bg-white">
                <div class="px-4 py-5 space-y-6 sm:p-6">
                    <h3>{{ $title }}</h3>
                    <hr />
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
