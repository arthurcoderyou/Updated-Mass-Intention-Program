<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-6 sm:px-6  mx-auto">
    <!-- Card -->
    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
            <!-- Header -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
              <div>
                <h2 class="text-xl font-semibold text-black dark:text-neutral-200">
                  Users
                </h2>
                <p class="text-sm text-black dark:text-neutral-400">
                  Listing of users
                </p>
              </div>

              <div>
                <div class="inline-flex gap-x-2">
                  {{-- <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-black shadow-sm
                  hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="#">
                    View all
                  </a> --}}


                  <div class="max-w-sm space-y-3">

                    <input type="text" wire:model.live="search"
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Search">


                </div>

                <div class="max-w-sm space-y-3">

                    <select wire:model.live="sort_by"
                    class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <option selected="">Sort by</option>
                        <option value="name_asc">Name Ascending</option>
                        <option value="name_desc">Name Descending</option>
                        <option value="email_asc">Email Ascending</option>
                        <option value="email_desc">Email Descending</option>
                        <option value="created_asc">Latest Created</option>
                        <option value="created_desc">Oldest Created</option>
                        <option value="updated_asc">Latest Updated</option>
                        <option value="updated_desc">Oldest Updated</option>
                    </select>


                </div>

                <div class="max-w-24 w-auto space-y-3">

                    <select wire:model.live="record_count"
                    class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <option selected value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="500">500</option>
                    </select>


                </div>
                  {{-- <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                  href="{{ route('user.create') }}">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    Create
                  </a> --}}
                </div>
              </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
              <thead class="bg-gray-50 divide-y divide-gray-200 dark:bg-neutral-800 dark:divide-neutral-700">
                <tr>
                  <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                    <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                      Name
                    </span>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                    <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                      Email
                    </span>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                    <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                      Email Verified
                    </span>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                    <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                      Role
                    </span>
                  </th>


                  <th scope="col" class="px-6 py-3 text-end border-s border-gray-200 dark:border-neutral-700">
                    <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                      Action
                    </span>
                  </th>
                </tr>
              </thead>

              <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                @if(!empty($users) && count($users) > 0)
                    @foreach ($users as $user)
                        @if($user->hasRole("Super Admin") && !(Auth::user()->hasRole('Super Admin')))
                            @continue
                        @endif


                        <tr>

                            <td class="h-px w-auto whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-black dark:text-neutral-200">{{ $user->name }}</span>
                                </div>
                            </td>

                            <td class="h-px w-auto whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-black dark:text-neutral-200">{{ $user->email }}</span>
                                </div>
                            </td>

                            <td class="h-px w-auto whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-black dark:text-neutral-200">
                                        @if(!empty($user->email_verified_at))
                                            <div>
                                                <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                                                        <path d="m9 12 2 2 4-4"></path>
                                                    </svg>
                                                    Verified
                                                </span>
                                            </div>

                                        @else
                                            <div>
                                                <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                                                        <path d="M12 9v4"></path>
                                                        <path d="M12 17h.01"></path>
                                                    </svg>
                                                    Not Verified
                                                </span>
                                            </div>
                                        @endif

                                    </span>
                                </div>
                            </td>

                            <td class="h-px w-auto whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-black dark:text-neutral-200">{{ !empty($user->roles->first()->name) ? $user->roles->first()->name : '' }} </span>
                                </div>
                            </td>

                            <td class="h-px w-auto whitespace-nowrap text-end">
                                <div class="px-6 py-2">
                                    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('user edit'))
                                    <a type="button" href="{{ route('user.edit',['user' => $user->id]) }}"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Edit
                                    </a>
                                    @endif

                                    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('user delete'))
                                    <a href="javascript:void(0)"
                                    onclick="confirm('Are you sure, you want to delete this record?') || event.stopImmediatePropagation()"
                                    wire:click.prevent="deleteUser({{ $user->id }})"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none"  >
                                        Delete
                                    </a>
                                    @endif




                                </div>
                            </td>


                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="h-px w-auto whitespace-nowrap" colspan="3">
                            <div class="px-6 py-2">
                                <span class="text-sm text-black dark:text-neutral-200">No records found</span>
                            </div>
                        </td>
                    </tr>
                @endif
              </tbody>
            </table>
            <!-- End Table -->

            <!-- Footer -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">

              {{ $users->links() }}
            </div>
            <!-- End Footer -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->
  </div>
  <!-- End Table Section -->
