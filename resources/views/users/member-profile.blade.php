<x-layout.default>

  <div>
    <ul class="flex space-x-2 rtl:space-x-reverse">
      <li>
        <a href="javascript:;" class="text-primary hover:underline">Member</a>
      </li>
      <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
        <span>Profile Edit</span>
      </li>
    </ul>

    <div class="pt-5">
      <div class="flex items-center justify-between mb-5">
        <h5 class="font-semibold text-lg dark:text-white-light">Edit</h5>
      </div>
      <div x-data="{ tab: 'home' }">
        <ul class="sm:flex font-semibold border-b border-[#ebedf2] dark:border-[#191e3a] mb-5 whitespace-nowrap overflow-y-auto">
          <li class="inline-block">
            <a href="javascript:;" class="flex gap-2 p-4 border-b border-transparent hover:border-primary hover:text-primary" :class="{ '!border-primary text-primary': tab == 'home' }" @click="tab='home'">

              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                <path opacity="0.5" d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z" stroke="currentColor" stroke-width="1.5" />
                <path d="M12 15L12 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
              </svg>
              Bio Data
            </a>
          </li>

          <li class="inline-block">
            <a href="javascript:;" class="flex gap-2 p-4 border-b border-transparent hover:border-primary hover:text-primary" :class="{ '!border-primary text-primary': tab == 'preferences' }" @click="tab='preferences'">

              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5" />
                <ellipse opacity="0.5" cx="12" cy="17" rx="7" ry="4" stroke="currentColor" stroke-width="1.5" />
              </svg>
              Change Password
            </a>
          </li>

        </ul>
        <template x-if="tab === 'home'">
          <div>

            @if(session()->has('success'))
            <script>
              showAlert(` {{ session('success') }}`);
            </script>



            @endif
            <form class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md p-4 mb-5 bg-white dark:bg-[#0e1726]" action="{{route('member.update.profile', $user->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              <h6 class="text-lg font-bold mb-5">General Information</h6>
              <div class="flex flex-col sm:flex-row">
                <div class="ltr:sm:mr-4 rtl:sm:ml-4 w-full sm:w-2/12 mb-5">
                  <img src="   {{ asset($user->image) }}" alt="image" class="w-20 h-20 md:w-32 md:h-32 rounded-full object-cover mx-auto" />


                </div>

                <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-5">
                  <div>
                    <label for="name">First name</label>
                    <input id="firstname" name="firstname" type="text" value="{{$user->firstname}}" class="form-input" required />
                    @error('firstname')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
                  </div>
                  <div>
                    <label for="profession">Last Name</label>
                    <input id="lastname" name="lastname" value="{{$user->lastname}}" type="text" class="form-input" />
                    @error('lastname')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
                  </div>
                  <div>
                    <label for="profession">Nick Name</label>
                    <input id="nickname" name="nickname" value="{{$user->nickname}}" type="text" class="form-input" />
                    @error('nickname')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
                  </div>
                  <div>
                    <label for="country">Level</label>
                    <select id="level" class="form-select text-white-dark" name="level">

                      <option {{ $user->level == 'ND 1' ? 'selected' : '' }}>ND 1</option>
                      <option {{ $user->level == 'ND 2' ? 'selected' : '' }}>ND 2</option>
                      <option {{ $user->level == 'ND 3' ? 'selected' : '' }}>ND 3</option>
                      <option {{ $user->level == 'HND 1' ? 'selected' : '' }}>HND1</option>
                      <option {{ $user->level == 'HND 2' ? 'selected' : '' }}>HND 2</option>
                      <option {{ $user->level == 'HND 3' ? 'selected' : '' }}>HND 3</option>
                      <option {{ $user->level == 'Graduate' ? 'selected' : '' }}>Graduate</option>
                    </select>
                    @error('level')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
                  </div>
                  <div>
                    <label for="address">Matric No</label>
                    <input id="matno" type="text" name="matno" value="{{$user->matno}}" class="form-input" />
                    @error('matno')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
                  </div>
                  <div>
                    <label for="location">Phone</label>
                    <input id="phone" type="text" name="phone" value="{{$user->phone}}" class="form-input" />
                    @error('phone')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
                  </div>
                  <div>
                    <label for="phone">Date Of Birth</label>
                    <input id="dob" type="date" name="dob" value="{{$user->dob}}" class="form-input" />
                    @error('dob')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
                  </div>

                  <div>
                    <label for="web">Profile Picture</label>
                    <input id="image" type="file" name="image" class="form-input" />
                  </div>
                  <div class="col-span-2">
                    <label for="email">Other Info about me</label>
                    <textarea class="form-input" name="bio" rows="3">{{$user->bio}}</textarea>
                    @error('bio')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="sm:col-span-2 mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </form>
            @if(session()->has('success'))
            <script>
              showAlert(` {{ session('success') }}`);
            </script>

            @endif
            <form class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md p-4 bg-white dark:bg-[#0e1726]">
              <h6 class="text-lg font-bold mb-5">Social</h6>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="flex">
                  <div class="bg-[#eee] flex justify-center items-center rounded px-3 font-semibold dark:bg-[#1b2e4b] ltr:mr-2 rtl:ml-2">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                      <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                      </path>
                      <rect x="2" y="9" width="4" height="12">
                      </rect>
                      <circle cx="4" cy="4" r="2"></circle>
                    </svg>
                  </div>
                  <input type="text" placeholder="Linkedin" class="form-input" />
                </div>
                <div class="flex">
                  <div class="bg-[#eee] flex justify-center items-center rounded px-3 font-semibold dark:bg-[#1b2e4b] ltr:mr-2 rtl:ml-2">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                      <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                      </path>
                    </svg>
                  </div>
                  <input type="text" placeholder="Twitter  (X)" class="form-input" />
                </div>
                <div class="flex">
                  <div class="bg-[#eee] flex justify-center items-center rounded px-3 font-semibold dark:bg-[#1b2e4b] ltr:mr-2 rtl:ml-2">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                      <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                      </path>
                    </svg>
                  </div>
                  <input type="text" placeholder="Facebook" class="form-input" />
                </div>
                <div class="flex">
                  <div class="bg-[#eee] flex justify-center items-center rounded px-3 font-semibold dark:bg-[#1b2e4b] ltr:mr-2 rtl:ml-2">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.5 7.25C2.08579 7.25 1.75 7.58579 1.75 8C1.75 8.41421 2.08579 8.75 2.5 8.75V7.25ZM22 7.25H2.5V8.75H22V7.25Z" fill="#1C274C" />
                      <path d="M10.5 2.5L7 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                      <path d="M17 2.5L13.5 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                      <path d="M15 14.5C15 13.8666 14.338 13.4395 13.014 12.5852C11.6719 11.7193 11.0008 11.2863 10.5004 11.6042C10 11.9221 10 12.7814 10 14.5C10 16.2186 10 17.0779 10.5004 17.3958C11.0008 17.7137 11.6719 17.2807 13.014 16.4148C14.338 15.5605 15 15.1334 15 14.5Z" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                      <path d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                    </svg>

                  </div>
                  <input type="text" placeholder="YouTube" class="form-input" />
                </div>
              </div>
            </form>
          </div>
        </template>

        <template x-if="tab === 'preferences'">
          <form class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md p-4 mb-5 bg-white dark:bg-[#0e1726]" action="{{ route('update.password') }}" method="post">
            @csrf
            <h6 class="text-lg font-bold mb-5">Change Password</h6>
            <div class="flex flex-col sm:flex-row">
              <div class="ltr:sm:mr-4 rtl:sm:ml-4 w-full sm:w-2/12 mb-5">
                <img src="   {{ asset($user->image) }}" alt="image" class="w-20 h-20 md:w-32 md:h-32 rounded-full object-cover mx-auto" />


              </div>

              <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                  <label for="name">Email</label>
                  <input id="Email" name="email" type="text" value="{{$user->email}}" class="form-input" required readonly />

                </div>
                <div>
                  <label for="profession">Current Password</label>
                  <input id="current_password" name="current_password" value="" type="password" class="form-input" />
                  @error('current_password')
                  <p class="error_msg">{{ $message }}</p>
                  @enderror
                </div>
                <div>
                  <label for="profession">New Password</label>
                  <input id="password" name="password" type="password" class="form-input" />
                  @error('password')
                  <p class="error_msg">{{ $message }}</p>
                  @enderror
                </div>

                <div>
                  <label for="address">Confirm New Password</label>
                  <input type="password" name="password_confirmation" class="form-input" />
                  @error('password_confirmation')
                  <p class="error_msg">{{ $message }}</p>
                  @enderror
                </div>




                <div class="sm:col-span-2 mt-3">
                  <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
              </div>
            </div>
          </form>
        </template>

      </div>
    </div>
  </div>


  <!-- script -->
  <script>
    async function showAlert(msg) {
      const toast = window.Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        padding: '2em',
        customClass: 'sweet-alerts',
      });
      toast.fire({
        icon: 'success',
        title: msg,
        padding: '2em',
        customClass: 'sweet-alerts',
      });
    }
  </script>
  <script>
    // @if(Session::has('message'))
    // alert(5);
    // switch (type) {
    //     case 'info':
    //         toastr.info(" {{ Session::get('message') }} ");
    //         break;

    //     case 'success':
    //         toastr.success(" {{ Session::get('message') }} ");
    //         break;

    //     case 'warning':
    //         toastr.warning(" {{ Session::get('message') }} ");
    //         break;

    //     case 'error':
    //         toastr.error(" {{ Session::get('message') }} ");
    //         break;
    // }
    // @endif
  </script>


</x-layout.default>