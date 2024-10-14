@props(['on'])

    {{-- <div x-data="{ shown: false, timeout: null }"
        x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
        x-show.transition.out.opacity.duration.1500ms="shown"
        x-transition:leave.opacity.duration.1500ms
        style="display: none;"
        role="alert" tabindex="-1" aria-labelledby="hs-solid-color-success-label"
        {{ $attributes->merge(['class' => 'bg-teal-500 text-sm text-white rounded-lg p-2']) }}>
        {{ $slot->isEmpty() ? 'Saved.' : $slot }}
    </div> --}}


<div class="bg-teal-50 border-t-2 border-teal-500 rounded-lg p-4 dark:bg-teal-800/30" role="alert" tabindex="-1" aria-labelledby="hs-bordered-success-style-label"
    x-data="{ shown: false, timeout: null }"
    x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
    x-show.transition.out.opacity.duration.1500ms="shown"
    x-transition:leave.opacity.duration.1500ms
    style="display: none;"
    role="alert" tabindex="-1" aria-labelledby="hs-solid-color-success-label"
    {{ $attributes->merge(['class' => 'bg-teal-500 text-sm text-white rounded-lg p-2']) }}
    >
    <div class="flex">
      <div class="shrink-0">
        <!-- Icon -->
        <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-400">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
            <path d="m9 12 2 2 4-4"></path>
          </svg>
        </span>
        <!-- End Icon -->
      </div>
      <div class="ms-3">
        <h3 id="hs-bordered-success-style-label" class="text-gray-800 font-semibold dark:text-white">
          Success!
        </h3>
        <p class="text-sm text-gray-700 dark:text-neutral-400">
            {{ $slot->isEmpty() ? 'Saved.' : $slot }}
        </p>
      </div>
    </div>
</div>
