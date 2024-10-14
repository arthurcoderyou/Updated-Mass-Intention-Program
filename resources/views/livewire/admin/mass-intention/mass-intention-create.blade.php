<!-- Card Section -->
<div class="max-w-full px-4 py-6 sm:px-6  mx-auto">
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
                Create New Mass intention
            </h2>
          </div>
          <!-- End Col -->



          <div class="sm:col-span-2">
            <label for="contact_name" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
              Contact Name <span class="text-red-500">*</span>
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-4">
            <input id="contact_name" type="text" name="contact_name" wire:model="contact_name"
            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600

            ">

            @error('contact_name')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror

          </div>
          <!-- End Col -->


          <div class="sm:col-span-2">
            <label for="contact_info" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
              Contact Info <span class="text-red-500">*</span>
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-4">
            <input id="contact_info" type="text" name="contact_info" wire:model="contact_info"
            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600

            ">

            @error('contact_info')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror

          </div>
          <!-- End Col -->


          <div class="sm:col-span-2">
            <label for="intention_name" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
              Intention name<span class="text-red-500">*</span>
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-10">
            <input id="intention_name" type="text" name="intention_name" wire:model="intention_name"
            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600

            ">

            @error('intention_name')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror

          </div>
          <!-- End Col -->


          <div class="sm:col-span-2">
            <label for="intention_type" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
              Intention type<span class="text-red-500">*</span>
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-3">
            <select  id="intention_type"  name="intention_type" wire:model="intention_type"
                class="py-2 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option selected value="">Select intention type</option>
                @if(!empty($intention_types) && count($intention_types) > 0)
                    @foreach ($intention_types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach

                @endif

            </select>

            @error('intention_type')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror

          </div>

          <!-- End Col -->


          <div class="sm:col-span-3">
            <input id="other_intention_type" type="text"   name="other_intention_type" wire:model="other_intention_type" placeholder="Enter other intention type"
            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600

            ">

            @error('other_intention_type')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror

          </div>
          <!-- End Col -->




          <div class="sm:col-span-2">
            <label for="priority" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
              Priority<span class="text-red-500">*</span>
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-2">
            <input id="priority" type="number" min="0" name="priority" wire:model="priority" placeholder="0" value="0"
            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600

            ">

            @error('priority')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror

          </div>
          <!-- End Col -->

          <div class="sm:col-span-1">
            <label for="start_date" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
              Start Date <span class="text-red-500">*</span>
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-2">
            <input id="start_date" type="date" name="start_date" wire:model="start_date" wire:change="calculateEndDate()"
            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600

            ">

            @error('start_date')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror

          </div>
          <!-- End Col -->


          <div class="sm:col-span-1">
            <label for="end_date" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
              End Date <span class="text-red-500">*</span>
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-2">

            <div class="hs-tooltip [--placement:top] inline-block">
                <input   type="text" wire:model="end_date" readonly value="{{ !empty($end_date) ? date('d/m/Y', strtotime($this->end_date) ) : '' }}" placeholder="dd/mm/yyyy"
                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:rdboer-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600

                ">
                <span class=" max-w-[20rem] text-wrap hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-2 px-3 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">

                    <div class="text-blue-200">
                        <span class="font-semibold text-white">End Date</span> will be <span class="font-semibold text-white">generated automatically</span> based on your inputs.
                    </div>

                    <div class="m-1">
                        Follow these steps:
                    </div>

                    <div class="m-1 p-1">
                        1. Choose a <span class="bg-white text-blue-500 border border-blue-500 p-1 rounded-md">Start Date</span> (e.g., when the activity begins).
                    </div>

                    <div class="m-1 p-1">
                        2. Enter a <span class="bg-white text-blue-500 border border-blue-500 p-1 rounded-md">Duration</span> (e.g., how long the activity will last).
                    </div>

                    <div class="m-1 p-1">
                        3. Select a <span class="bg-white text-blue-500 border border-blue-500 p-1 rounded-md">Duration Type</span> (day, week, month, or year, depending on how you want to measure the time).
                    </div>




                </span>

            </div>
            @error('end_date')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror

          </div>
          <!-- End Col -->


          <div class="sm:col-span-1">
            <label for="duration" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
              Duration<span class="text-red-500">*</span>
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-2">
            <input id="duration" type="number" min="0" name="duration" wire:model="duration" placeholder="0" wire:change="calculateEndDate()"
            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600

            ">

            @error('duration')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror

          </div>
          <!-- End Col -->


          <div class="sm:col-span-1">
            <label for="duration_type" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
                Type<span class="text-red-500">*</span>
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-2">
            <select  id="duration_type"  name="duration_type" wire:model="duration_type" wire:change="calculateEndDate()"
                class="py-2 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option selected="">Select duration type</option>
                @if(!empty($duration_types) && count($duration_types) > 0)
                    @foreach ($duration_types as $key => $value)
                        <option value="{{ $value }}">{{ ucfirst($value) }}</option>
                    @endforeach

                @endif
            </select>

            @error('duration_type')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror

          </div>
          <!-- End Col -->


          <div class="sm:col-span-12">
            <textarea wire:model="intention_notes" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="2" placeholder="Intention Notes"></textarea>

            @error('intention_notes ')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror

          </div>
          <!-- End Col -->

            <div class="sm:col-span-12">
                <label for="duration_type" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500">
                    Request Time Options<span class="text-red-500">*</span>
                </label>
            </div>
            <!-- End Col -->

            <div class="sm:col-span-12">

                <!-- Table -->
                <table class="min-w-full divide-y my-2 divide-gray-200 dark:divide-neutral-700">
                    <thead class="bg-gray-50 divide-y divide-gray-200 dark:bg-neutral-800 dark:divide-neutral-700">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                            <div class="hs-tooltip [--placement:top]  block">
                                <label for="select_all"  class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                    <input wire:click="selectAll($event.target.checked)"  type="checkbox" value="select_all"
                                    class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="select_all">
                                    <span class="text-sm text-black ms-3 dark:text-neutral-400"> Time</span>
                                </label>


                                <span class=" max-w-[20rem] text-wrap hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-2 px-3 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">

                                    <div class="text-blue-200">
                                        <span class="font-semibold text-white">Click here</span> to <span class="font-semibold text-white">SELECT/DESELECT ALL time options</span> at once.
                                    </div>


                                </span>


                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                            <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                            Days
                            </span>
                        </th>



                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

                        @if (!empty($request_time_options))

                            @foreach ($request_time_options as $option  )


                                <tr>
                                    <td class="h-px w-auto whitespace-nowrap" >
                                        <div class="px-6 py-2">
                                            <span class="text-sm text-black-800 font-bold dark:text-neutral-200">
                                                <label for="time_{{ $option->id }}" class="flex p-3 w-full bg-white border border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                                    <input type="checkbox" value="{{ $option->id }}" wire:model="selected_request_time_options"
                                                    class="shrink-0 mt-0.5 border-blue-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="time_{{ $option->id }}">
                                                    <span class="text-sm text-black-500 font-bold ms-3 dark:text-neutral-400">
                                                        {{ date('h:i A',strtotime($option->time)) }}
                                                    </span>
                                                </label>



                                            </span>
                                        </div>
                                    </td>

                                    <td class="h-px w-auto whitespace-nowrap" >
                                        <div class="px-6 py-2">

                                            <div class="grid sm:grid-cols-7 gap-2">

                                                @if(!empty($option->days) && count($option->days) > 0)
                                                    @foreach ($option->days as $day)
                                                    <span class="inline-flex items-center justify-center  gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium border hover:bg-{{ day_color_converter($day->day->name) }}-800 hover:text-white border-{{ day_color_converter($day->day->name) }}-800 text-{{ day_color_converter($day->day->name) }}-800 dark:border-neutral-200 dark:text-white">
                                                        {{ $day->day->name }}
                                                    </span>

                                                    @endforeach
                                                @endif

                                            </div>

                                        </div>
                                    </td>

                                </tr>

                            @endforeach


                        @else

                            <tr>
                                <td class="h-px w-auto whitespace-nowrap" >
                                    <div class="px-6 py-2">
                                        <span class="text-sm text-black dark:text-neutral-200">No records found</span>
                                    </div>
                                </td>

                            </tr>
                        @endif


                    </tbody>
                </table>
                <!-- End Table -->



                @error('selected_request_time_options')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror

            </div>
            <!-- End Col -->




        </div>
        <!-- End Section -->



        <a href="{{ route('mass_intentions.index') }}" class="w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
            Cancel
        </a>
        <button type="submmit" class="w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          Save
        </button>
      </form>
    </div>
    <!-- End Card -->
  </div>
  <!-- End Card Section -->
