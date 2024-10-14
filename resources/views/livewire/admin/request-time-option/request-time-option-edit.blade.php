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
                    Edit Request time option
                </h2>
            </div>
            <!-- End Col -->


            <div class="sm:col-span-3">
                <label for="days_of_the_week" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
                Day <span class="text-red-500">*</span>
                </label>
            </div>
            <!-- End Col -->



            <div class="sm:col-span-9">
                <ul class="flex flex-col sm:flex-row">

                    @if(!empty($DaysOfTheWeek) && count($DaysOfTheWeek) > 0 )


                            <div class="grid sm:grid-cols-4  lg:grid-cols-8 gap-2">
                                <label for="select_all" class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                    <span class="text-sm text-black dark:text-neutral-400">Select All</span>
                                    <input wire:click="selectAll($event.target.checked)" type="checkbox" value="select_all" class="shrink-0 ms-auto mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                    id="select_all">
                                </label>

                                    @foreach ($DaysOfTheWeek as $day)
                                        <label for="{{ $day->name }}" class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                            <span class="text-sm text-black dark:text-neutral-400">{{ $day->name }}</span>
                                            <input wire:model="day" type="checkbox" value="{{ $day->id }}" class="shrink-0 ms-auto mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                            id="{{ $day->name }}">
                                        </label>
                                    @endforeach


                            </div>

                    @endif


                </ul>

                @error('day')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror

            </div>
            <!-- End Col -->





            <div class="sm:col-span-3">
                <label for="time" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
                Time <span class="text-red-500">*</span>
                </label>
            </div>
            <!-- End Col -->

            <div class="sm:col-span-3">
                <input id="time" type="time" name="time" wire:model="time"
                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600

                ">

                @error('time')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror

            </div>
            <!-- End Col -->



            <div class="sm:col-span-3">
                <label for="name" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
                  Status <span class="text-red-500">*</span>
                </label>
              </div>
              <!-- End Col -->


              <div class="sm:col-span-3">
                <select id="status" name="status" wire:model="status"
                class="py-2 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <option value="">Select Status</option>
                    <option value="1">Enabled</option>
                    <option value="0">Disabled</option>
                </select>

                @error('status')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror

              </div>
              <!-- End Col -->




        </div>
        <!-- End Section -->



        <a href="{{ route('request_time_options.index') }}" class="w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
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
