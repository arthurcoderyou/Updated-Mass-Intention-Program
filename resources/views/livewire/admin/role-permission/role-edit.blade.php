<!-- Card Section -->
<div class="max-w-[85rem] px-4 py-6 sm:px-6  mx-auto">
    <div wire:loading style="color: #64d6e2" class="la-ball-clip-rotate-multiple la-3x preloader">
        <div></div>
        <div></div>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
      <form wire:submit="save">
        <!-- Section -->
        <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
          <div class="sm:col-span-12">
            <h2 class="text-lg font-semibold text-black dark:text-neutral-200">
                Edit Role
            </h2>
          </div>
          <!-- End Col -->



          <div class="sm:col-span-3">
            <label for="name" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
              Role Name <span class="text-red-500">*</span>
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-9">
            <input id="name" type="text" name="name" wire:model="name"
            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600

            ">

            @error('name')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror

          </div>
          <!-- End Col -->


        </div>
        <!-- End Section -->



        <a href="{{ route('roles.index') }}" class="w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
            Cancel
        </a>
        <button type="submmit" class="w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          Update
        </button>
      </form>
    </div>
    <!-- End Card -->
  </div>
  <!-- End Card Section -->
