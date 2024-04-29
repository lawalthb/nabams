<ul class="perfect-scrollbar relative font-semibold space-y-0.5 h-[calc(100vh-80px)] overflow-y-auto overflow-x-hidden  p-4 py-0" x-data="{ activeDropdown: null }">
  <h2 class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] -mx-4 mb-1">

    <svg class="w-4 h-5 flex-none hidden" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
    <span>Welcome Admin</span>
  </h2>
  <li class="menu nav-item">
    <a href="/sales">
      <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'dashboard' }" @click="activeDropdown === 'dashboard' ? activeDropdown = null : activeDropdown = 'dashboard'">
        <div class="flex items-center">

          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 22H21" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3 11C3 10.0572 3 9.58579 3.29289 9.29289C3.58579 9 4.05719 9 5 9C5.94281 9 6.41421 9 6.70711 9.29289C7 9.58579 7 10.0572 7 11V17C7 17.9428 7 18.4142 6.70711 18.7071C6.41421 19 5.94281 19 5 19C4.05719 19 3.58579 19 3.29289 18.7071C3 18.4142 3 17.9428 3 17V11Z" stroke="#1C274C" stroke-width="1.5" />
            <path d="M10 7C10 6.05719 10 5.58579 10.2929 5.29289C10.5858 5 11.0572 5 12 5C12.9428 5 13.4142 5 13.7071 5.29289C14 5.58579 14 6.05719 14 7V17C14 17.9428 14 18.4142 13.7071 18.7071C13.4142 19 12.9428 19 12 19C11.0572 19 10.5858 19 10.2929 18.7071C10 18.4142 10 17.9428 10 17V7Z" stroke="#1C274C" stroke-width="1.5" />
            <path d="M17 4C17 3.05719 17 2.58579 17.2929 2.29289C17.5858 2 18.0572 2 19 2C19.9428 2 20.4142 2 20.7071 2.29289C21 2.58579 21 3.05719 21 4V17C21 17.9428 21 18.4142 20.7071 18.7071C20.4142 19 19.9428 19 19 19C18.0572 19 17.5858 19 17.2929 18.7071C17 18.4142 17 17.9428 17 17V4Z" stroke="#1C274C" stroke-width="1.5" />
          </svg>


          <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
        </div>

      </button>
    </a>
  </li>







  <li class="menu nav-item">
    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'transactions' }" @click="activeDropdown === 'transactions' ? activeDropdown = null : activeDropdown = 'transactions'">
      <div class="flex items-center">

        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M2 14C2 10.2288 2 8.34315 3.17157 7.17157C4.34315 6 6.22876 6 10 6H14C17.7712 6 19.6569 6 20.8284 7.17157C22 8.34315 22 10.2288 22 14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14Z" stroke="#1C274C" stroke-width="1.5" />
          <path d="M16 6C16 4.11438 16 3.17157 15.4142 2.58579C14.8284 2 13.8856 2 12 2C10.1144 2 9.17157 2 8.58579 2.58579C8 3.17157 8 4.11438 8 6" stroke="#1C274C" stroke-width="1.5" />
          <path d="M12 17.3333C13.1046 17.3333 14 16.5871 14 15.6667C14 14.7462 13.1046 14 12 14C10.8954 14 10 13.2538 10 12.3333C10 11.4129 10.8954 10.6667 12 10.6667M12 17.3333C10.8954 17.3333 10 16.5871 10 15.6667M12 17.3333V18M12 10V10.6667M12 10.6667C13.1046 10.6667 14 11.4129 14 12.3333" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
        </svg>

        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Transactions</span>
      </div>
      <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'transactions' }">

        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </button>
    <ul x-cloak x-show="activeDropdown === 'transactions'" x-collapse class="sub-menu text-gray-500">
      <li>
        <a href="{{route('admin.transactions')}}">All List</a>
      </li>
      <li>
        <a href="{{route('admin.transactions')}}">Registrations</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Elections</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Contests</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Resources</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Tickets</a>
      </li>
    </ul>
  </li>



  <li class="menu nav-item">
    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'resources' }" @click="activeDropdown === 'resources' ? activeDropdown = null : activeDropdown = 'resources'">
      <div class="flex items-center">

        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4 8C4 5.17157 4 3.75736 4.87868 2.87868C5.75736 2 7.17157 2 10 2H14C16.8284 2 18.2426 2 19.1213 2.87868C20 3.75736 20 5.17157 20 8V16C20 18.8284 20 20.2426 19.1213 21.1213C18.2426 22 16.8284 22 14 22H10C7.17157 22 5.75736 22 4.87868 21.1213C4 20.2426 4 18.8284 4 16V8Z" stroke="#1C274D" stroke-width="1.5" />
          <path d="M19.8978 16H7.89778C6.96781 16 6.50282 16 6.12132 16.1022C5.08604 16.3796 4.2774 17.1883 4 18.2235" stroke="#1C274D" stroke-width="1.5" />
          <path d="M8 7H16" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round" />
          <path d="M8 10.5H13" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round" />
          <path d="M13 16V19.5309C13 19.8065 13 19.9443 12.9051 20C12.8103 20.0557 12.6806 19.9941 12.4211 19.8708L11.1789 19.2808C11.0911 19.2391 11.0472 19.2182 11 19.2182C10.9528 19.2182 10.9089 19.2391 10.8211 19.2808L9.57889 19.8708C9.31943 19.9941 9.18971 20.0557 9.09485 20C9 19.9443 9 19.8065 9 19.5309V16.45" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round" />
        </svg>


        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Resources</span>
      </div>
      <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'resources' }">

        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </button>
    <ul x-cloak x-show="activeDropdown === 'resources'" x-collapse class="sub-menu text-gray-500">
      <li>
        <a href="{{route('resources.create')}}">Add New</a>
      </li>

      <li>
        <a href="{{route('resources.index')}}">All</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Free</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Paid For</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Categories</a>
      </li>

    </ul>
  </li>




  <li class="menu nav-item">
    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'election' }" @click="activeDropdown === 'election' ? activeDropdown = null : activeDropdown = 'election'">
      <div class="flex items-center">

        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M19.8706 12.3884L19.1249 12.3082V12.3082L19.8706 12.3884ZM19.6872 14.0931L20.4329 14.1733V14.1733L19.6872 14.0931ZM4.3128 14.0931L3.5671 14.1733L4.3128 14.0931ZM4.12945 12.3884L4.87514 12.3082L4.12945 12.3884ZM8.76006 10.934L9.41507 11.2993L8.76006 10.934ZM10.5495 7.7254L9.89453 7.36008L10.5495 7.7254ZM13.4505 7.7254L12.7954 8.09071L13.4505 7.7254ZM15.2399 10.934L15.895 10.5686V10.5686L15.2399 10.934ZM16.0038 11.9592L15.7015 12.6456L15.7015 12.6456L16.0038 11.9592ZM17.4705 11.2451L16.9412 10.7138L17.4705 11.2451ZM16.4533 12.0219L16.3506 11.2789L16.3506 11.2789L16.4533 12.0219ZM6.5295 11.2451L6.0002 11.7765L6.5295 11.2451ZM7.5467 12.0219L7.64943 11.2789L7.64943 11.2789L7.5467 12.0219ZM7.99621 11.9592L8.29846 12.6456L8.29846 12.6456L7.99621 11.9592ZM5.71208 20.1532L6.21228 19.5943H6.21228L5.71208 20.1532ZM18.2879 20.1532L17.7877 19.5943L18.2879 20.1532ZM18.8645 9.98013L19.432 9.48982L18.8645 9.98013ZM12.9077 6.78265L12.5668 6.11457L12.9077 6.78265ZM11.0923 6.78265L11.4332 6.11457L11.0923 6.78265ZM19.1249 12.3082L18.9415 14.0129L20.4329 14.1733L20.6163 12.4686L19.1249 12.3082ZM13.0879 20.25H10.9121V21.75H13.0879V20.25ZM5.0585 14.0129L4.87514 12.3082L3.38375 12.4686L3.5671 14.1733L5.0585 14.0129ZM9.41507 11.2993L11.2046 8.09072L9.89453 7.36008L8.10504 10.5686L9.41507 11.2993ZM12.7954 8.09071L14.5849 11.2993L15.895 10.5686L14.1055 7.36008L12.7954 8.09071ZM14.5849 11.2993C14.7467 11.5893 14.8956 11.8582 15.0399 12.0638C15.1885 12.2753 15.3911 12.5089 15.7015 12.6456L16.306 11.2728C16.3619 11.2973 16.3524 11.3226 16.2675 11.2018C16.1784 11.0749 16.0727 10.8873 15.895 10.5686L14.5849 11.2993ZM16.9412 10.7138C16.6825 10.9715 16.529 11.1231 16.4082 11.2208C16.2931 11.3139 16.2906 11.2872 16.3506 11.2789L16.556 12.7648C16.8918 12.7184 17.1507 12.5495 17.3517 12.3869C17.547 12.2289 17.7642 12.0112 17.9998 11.7765L16.9412 10.7138ZM15.7015 12.6456C15.9698 12.7637 16.2657 12.8049 16.556 12.7648L16.3506 11.2789C16.3353 11.281 16.3199 11.2789 16.306 11.2728L15.7015 12.6456ZM6.0002 11.7765C6.23578 12.0112 6.453 12.2289 6.64834 12.3869C6.84933 12.5495 7.10824 12.7184 7.44397 12.7648L7.64943 11.2789C7.70944 11.2872 7.7069 11.3139 7.5918 11.2208C7.47104 11.1231 7.31753 10.9715 7.05879 10.7138L6.0002 11.7765ZM8.10504 10.5686C7.92732 10.8873 7.82158 11.0749 7.7325 11.2018C7.64765 11.3226 7.63814 11.2973 7.69395 11.2728L8.29846 12.6456C8.60887 12.5089 8.81155 12.2753 8.96009 12.0638C9.10441 11.8583 9.2533 11.5893 9.41507 11.2993L8.10504 10.5686ZM7.44397 12.7648C7.73429 12.8049 8.03016 12.7637 8.29846 12.6456L7.69395 11.2728C7.68011 11.2789 7.66466 11.281 7.64943 11.2789L7.44397 12.7648ZM10.9121 20.25C9.47421 20.25 8.46719 20.2486 7.69857 20.1502C6.9509 20.0545 6.52851 19.8774 6.21228 19.5943L5.21187 20.712C5.84173 21.2758 6.60137 21.522 7.50819 21.6381C8.39406 21.7514 9.51399 21.75 10.9121 21.75V20.25ZM3.5671 14.1733C3.71526 15.5507 3.83282 16.8999 4.03322 17.994C4.1343 18.5459 4.26178 19.0659 4.43833 19.5172C4.61339 19.9648 4.8549 20.3925 5.21187 20.712L6.21228 19.5943C6.0962 19.4904 5.96405 19.3 5.83525 18.9708C5.70795 18.6454 5.60138 18.2299 5.50868 17.7238C5.32149 16.7018 5.21246 15.4443 5.0585 14.0129L3.5671 14.1733ZM18.9415 14.0129C18.7875 15.4443 18.6785 16.7018 18.4913 17.7238C18.3986 18.2299 18.292 18.6454 18.1647 18.9708C18.036 19.3 17.9038 19.4904 17.7877 19.5943L18.7881 20.712C19.1451 20.3925 19.3866 19.9648 19.5617 19.5172C19.7382 19.0659 19.8657 18.5459 19.9668 17.994C20.1672 16.8999 20.2847 15.5507 20.4329 14.1733L18.9415 14.0129ZM13.0879 21.75C14.486 21.75 15.6059 21.7514 16.4918 21.6381C17.3986 21.522 18.1583 21.2758 18.7881 20.712L17.7877 19.5943C17.4715 19.8774 17.0491 20.0545 16.3014 20.1502C15.5328 20.2486 14.5258 20.25 13.0879 20.25V21.75ZM10.75 5C10.75 4.30964 11.3096 3.75 12 3.75V2.25C10.4812 2.25 9.25 3.48122 9.25 5H10.75ZM12 3.75C12.6904 3.75 13.25 4.30964 13.25 5H14.75C14.75 3.48122 13.5188 2.25 12 2.25V3.75ZM20.75 9C20.75 9.41421 20.4142 9.75 20 9.75V11.25C21.2426 11.25 22.25 10.2426 22.25 9H20.75ZM19.25 9C19.25 8.58579 19.5858 8.25 20 8.25V6.75C18.7574 6.75 17.75 7.75736 17.75 9H19.25ZM20 8.25C20.4142 8.25 20.75 8.58579 20.75 9H22.25C22.25 7.75736 21.2426 6.75 20 6.75V8.25ZM4 9.75C3.58579 9.75 3.25 9.41421 3.25 9H1.75C1.75 10.2426 2.75736 11.25 4 11.25V9.75ZM3.25 9C3.25 8.58579 3.58579 8.25 4 8.25V6.75C2.75736 6.75 1.75 7.75736 1.75 9H3.25ZM4 8.25C4.41421 8.25 4.75 8.58579 4.75 9H6.25C6.25 7.75736 5.24264 6.75 4 6.75V8.25ZM20 9.75C19.997 9.75 19.994 9.74998 19.991 9.74995L19.9736 11.2498C19.9824 11.2499 19.9912 11.25 20 11.25V9.75ZM20.6163 12.4686C20.6646 12.0187 20.707 11.6258 20.7302 11.298C20.753 10.9769 20.7616 10.6689 20.7256 10.4003L19.2389 10.5995C19.2536 10.7093 19.2553 10.8908 19.234 11.192C19.2131 11.4865 19.1743 11.8486 19.1249 12.3082L20.6163 12.4686ZM19.991 9.74995C19.7681 9.74737 19.5689 9.64827 19.432 9.48982L18.2969 10.4704C18.703 10.9405 19.3032 11.2421 19.9736 11.2498L19.991 9.74995ZM19.432 9.48982C19.3181 9.35799 19.25 9.18789 19.25 9H17.75C17.75 9.56143 17.9566 10.0765 18.2969 10.4704L19.432 9.48982ZM17.9998 11.7765C18.6773 11.1017 19.0262 10.7616 19.2584 10.6183L18.4705 9.34191C18.0506 9.60109 17.547 10.1103 16.9412 10.7138L17.9998 11.7765ZM4.75 9C4.75 9.18789 4.68188 9.35799 4.56799 9.48982L5.70307 10.4704C6.0434 10.0765 6.25 9.56143 6.25 9H4.75ZM7.05879 10.7138C6.45296 10.1103 5.94936 9.60109 5.52946 9.34191L4.7416 10.6183C4.97377 10.7616 5.32273 11.1017 6.0002 11.7765L7.05879 10.7138ZM4.56799 9.48982C4.4311 9.64827 4.23192 9.74737 4.00904 9.74995L4.02639 11.2498C4.69676 11.2421 5.29701 10.9405 5.70307 10.4704L4.56799 9.48982ZM4.00904 9.74995C4.00602 9.74998 4.00301 9.75 4 9.75V11.25C4.00881 11.25 4.01761 11.2499 4.02639 11.2498L4.00904 9.74995ZM4.87514 12.3082C4.82571 11.8486 4.78687 11.4865 4.76601 11.192C4.74467 10.8908 4.74636 10.7093 4.76107 10.5995L3.27435 10.4003C3.23837 10.6689 3.24701 10.9769 3.26976 11.298C3.29298 11.6258 3.33535 12.0187 3.38375 12.4686L4.87514 12.3082ZM13.25 5C13.25 5.48504 12.9739 5.90689 12.5668 6.11457L13.2485 7.45073C14.1381 6.99685 14.75 6.07053 14.75 5H13.25ZM12.5668 6.11457C12.3975 6.20095 12.2056 6.25 12 6.25V7.75C12.448 7.75 12.873 7.6423 13.2485 7.45073L12.5668 6.11457ZM14.1055 7.36008C13.8992 6.9902 13.7138 6.65746 13.5437 6.3852L12.2716 7.1801C12.4176 7.41372 12.5828 7.70948 12.7954 8.09071L14.1055 7.36008ZM12 6.25C11.7944 6.25 11.6025 6.20095 11.4332 6.11457L10.7515 7.45073C11.127 7.6423 11.552 7.75 12 7.75V6.25ZM11.4332 6.11457C11.0261 5.90689 10.75 5.48504 10.75 5H9.25C9.25 6.07053 9.86186 6.99685 10.7515 7.45073L11.4332 6.11457ZM11.2046 8.09072C11.4172 7.70948 11.5824 7.41372 11.7284 7.1801L10.4563 6.3852C10.2862 6.65746 10.1008 6.9902 9.89453 7.36008L11.2046 8.09072Z" fill="#1C274C" />
          <path opacity="0.5" d="M5 17.5H19" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
        </svg>

        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Election</span>
      </div>
      <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'election' }">

        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </button>
    <ul x-cloak x-show="activeDropdown === 'election'" x-collapse class="sub-menu text-gray-500">
      <li>
        <a href="{{route('admin.positions.index')}}">Positions</a>
      </li>
      <li>
        <a href="{{route('admin.candidates.index')}}">Aspirants</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Vote</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Live Results</a>
      </li>

    </ul>
  </li>

  <li class="menu nav-item">
    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'contest' }" @click="activeDropdown === 'contest' ? activeDropdown = null : activeDropdown = 'contest'">
      <div class="flex items-center">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M20.9752 12.1852L20.2361 12.0574L20.9752 12.1852ZM20.2696 16.265L19.5306 16.1371L20.2696 16.265ZM6.93777 20.4771L6.19056 20.5417L6.93777 20.4771ZM6.12561 11.0844L6.87282 11.0198L6.12561 11.0844ZM13.995 5.22142L14.7351 5.34269V5.34269L13.995 5.22142ZM13.3323 9.26598L14.0724 9.38725V9.38725L13.3323 9.26598ZM6.69814 9.67749L6.20855 9.10933H6.20855L6.69814 9.67749ZM8.13688 8.43769L8.62647 9.00585H8.62647L8.13688 8.43769ZM10.5181 4.78374L9.79208 4.59542L10.5181 4.78374ZM10.9938 2.94989L11.7197 3.13821V3.13821L10.9938 2.94989ZM12.6676 2.06435L12.4382 2.77841L12.4382 2.77841L12.6676 2.06435ZM12.8126 2.11093L13.042 1.39687L13.042 1.39687L12.8126 2.11093ZM9.86195 6.46262L10.5235 6.81599V6.81599L9.86195 6.46262ZM13.9047 3.24752L13.1787 3.43584V3.43584L13.9047 3.24752ZM11.6742 2.13239L11.3486 1.45675V1.45675L11.6742 2.13239ZM3.9716 21.4707L3.22439 21.5353L3.9716 21.4707ZM3 10.2342L3.74721 10.1696C3.71261 9.76945 3.36893 9.46758 2.96767 9.4849C2.5664 9.50221 2.25 9.83256 2.25 10.2342H3ZM20.2361 12.0574L19.5306 16.1371L21.0087 16.3928L21.7142 12.313L20.2361 12.0574ZM13.245 21.25H8.59635V22.75H13.245V21.25ZM7.68498 20.4125L6.87282 11.0198L5.3784 11.149L6.19056 20.5417L7.68498 20.4125ZM19.5306 16.1371C19.0238 19.0677 16.3813 21.25 13.245 21.25V22.75C17.0712 22.75 20.3708 20.081 21.0087 16.3928L19.5306 16.1371ZM13.2548 5.10015L12.5921 9.14472L14.0724 9.38725L14.7351 5.34269L13.2548 5.10015ZM7.18773 10.2456L8.62647 9.00585L7.64729 7.86954L6.20855 9.10933L7.18773 10.2456ZM11.244 4.97206L11.7197 3.13821L10.2678 2.76157L9.79208 4.59542L11.244 4.97206ZM12.4382 2.77841L12.5832 2.82498L13.042 1.39687L12.897 1.3503L12.4382 2.77841ZM10.5235 6.81599C10.8354 6.23198 11.0777 5.61339 11.244 4.97206L9.79208 4.59542C9.65573 5.12107 9.45699 5.62893 9.20042 6.10924L10.5235 6.81599ZM12.5832 2.82498C12.8896 2.92342 13.1072 3.16009 13.1787 3.43584L14.6307 3.05921C14.4252 2.26719 13.819 1.64648 13.042 1.39687L12.5832 2.82498ZM11.7197 3.13821C11.7548 3.0032 11.8523 2.87913 11.9998 2.80804L11.3486 1.45675C10.8166 1.71309 10.417 2.18627 10.2678 2.76157L11.7197 3.13821ZM11.9998 2.80804C12.1345 2.74311 12.2931 2.73181 12.4382 2.77841L12.897 1.3503C12.3873 1.18655 11.8312 1.2242 11.3486 1.45675L11.9998 2.80804ZM14.1537 10.9842H19.3348V9.4842H14.1537V10.9842ZM4.71881 21.4061L3.74721 10.1696L2.25279 10.2988L3.22439 21.5353L4.71881 21.4061ZM3.75 21.5127V10.2342H2.25V21.5127H3.75ZM3.22439 21.5353C3.2112 21.3828 3.33146 21.25 3.48671 21.25V22.75C4.21268 22.75 4.78122 22.1279 4.71881 21.4061L3.22439 21.5353ZM14.7351 5.34269C14.8596 4.58256 14.8241 3.80477 14.6307 3.0592L13.1787 3.43584C13.3197 3.97923 13.3456 4.54613 13.2548 5.10016L14.7351 5.34269ZM8.59635 21.25C8.12244 21.25 7.72601 20.887 7.68498 20.4125L6.19056 20.5417C6.29852 21.7902 7.3427 22.75 8.59635 22.75V21.25ZM8.62647 9.00585C9.30632 8.42 10.0392 7.72267 10.5235 6.81599L9.20042 6.10924C8.85404 6.75767 8.3025 7.30493 7.64729 7.86954L8.62647 9.00585ZM21.7142 12.313C21.9695 10.8365 20.8341 9.4842 19.3348 9.4842V10.9842C19.9014 10.9842 20.3332 11.4959 20.2361 12.0574L21.7142 12.313ZM3.48671 21.25C3.63292 21.25 3.75 21.3684 3.75 21.5127H2.25C2.25 22.1953 2.80289 22.75 3.48671 22.75V21.25ZM12.5921 9.14471C12.4344 10.1076 13.1766 10.9842 14.1537 10.9842V9.4842C14.1038 9.4842 14.0639 9.43901 14.0724 9.38725L12.5921 9.14471ZM6.87282 11.0198C6.8474 10.7258 6.96475 10.4378 7.18773 10.2456L6.20855 9.10933C5.62022 9.61631 5.31149 10.3753 5.3784 11.149L6.87282 11.0198Z" fill="#1C274C" />
        </svg>

        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Contest</span>
      </div>
      <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'contest' }">

        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </button>
    <ul x-cloak x-show="activeDropdown === 'contest'" x-collapse class="sub-menu text-gray-500">
      <li>
        <a href="{{route('admin.contest.positions.index')}}">Category</a>
      </li>
      <li>
        <a href="{{route('admin.contest.candidates.index')}}">Contestants</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Vote</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Live Results</a>
      </li>

    </ul>
  </li>



  <li class="menu nav-item">
    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'admins' }" @click="activeDropdown === 'admins' ? activeDropdown = null : activeDropdown = 'admins'">
      <div class="flex items-center">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="9" cy="6" r="4" stroke="#1C274C" stroke-width="1.5" />
          <path d="M15 9C16.6569 9 18 7.65685 18 6C18 4.34315 16.6569 3 15 3" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
          <ellipse cx="9" cy="17" rx="7" ry="4" stroke="#1C274C" stroke-width="1.5" />
          <path d="M18 14C19.7542 14.3847 21 15.3589 21 16.5C21 17.5293 19.9863 18.4229 18.5 18.8704" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
        </svg>


        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Manage Users</span>
      </div>
      <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'admins' }">

        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </button>
    <ul x-cloak x-show="activeDropdown === 'admins'" x-collapse class="sub-menu text-gray-500">
      <li>
        <a href="{{route('admin.users.index')}}">Members & Admins</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Banned Users</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Inactive Users</a>
      </li>


    </ul>
  </li>


 

  <li class="menu nav-item">
    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'website' }" @click="activeDropdown === 'website' ? activeDropdown = null : activeDropdown = 'website'">
      <div class="flex items-center">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22 3L2 3" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
          <path d="M22 21L2 21" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
          <path d="M20 12C20 10.1144 20 9.17157 19.4142 8.58579C18.8284 8 17.8856 8 16 8L8 8C6.11438 8 5.17157 8 4.58579 8.58579C4 9.17157 4 10.1144 4 12C4 13.8856 4 14.8284 4.58579 15.4142C5.17157 16 6.11438 16 8 16H16C17.8856 16 18.8284 16 19.4142 15.4142C20 14.8284 20 13.8856 20 12Z" stroke="#1C274C" stroke-width="1.5" />
        </svg>


        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Website Managment</span>
      </div>
      <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'website' }">

        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </button>
    <ul x-cloak x-show="activeDropdown === 'website'" x-collapse class="sub-menu text-gray-500">
      <li>
        <a href="{{route('admin.website')}}">Edit Website</a>
      </li>
      <li>
        <a href="{{route('admin.website.setting.index')}}">Settings</a>
      </li>
      <li>
        <a href="{{route('admin.website.setting.maintenance')}}">Maintenaince Mode</a>
      </li>


    </ul>
  </li>



  <li class="menu nav-item">
    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'events' }" @click="activeDropdown === 'events' ? activeDropdown = null : activeDropdown = 'events'">
      <div class="flex items-center">

        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 14.5714L20.5162 5.86382C21.5624 4.79408 20.7999 3 19.2991 3H4.70095C3.20008 3 2.43759 4.79409 3.48381 5.86382L12 14.5714ZM12 14.5714V21M12 21H16.2439M12 21H7.7561M7.47318 9.75H16.5268" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
        </svg>

        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Our Events</span>
      </div>
      <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'events' }">

        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </button>
    <ul x-cloak x-show="activeDropdown === 'events'" x-collapse class="sub-menu text-gray-500">
      <li>
        <a href="{{route('admin.blank')}}">Add New</a>
      </li>

      <li>
        <a href="{{route('admin.blank')}}">Upcoming Events</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Ticket</a>
      </li>
      <li>
        <a href="{{route('admin.blank')}}">Passed Events</a>
      </li>

    </ul>
  </li>




  <!-- <li class="menu nav-item">
    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'article' }" @click="activeDropdown === 'article' ? activeDropdown = null : activeDropdown = 'article'">
      <div class="flex items-center">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M20.082 3.01787L20.1081 3.76741L20.082 3.01787ZM16.5 3.48757L16.2849 2.76907V2.76907L16.5 3.48757ZM13.6738 4.80287L13.2982 4.15375L13.2982 4.15375L13.6738 4.80287ZM3.9824 3.07501L3.93639 3.8236L3.9824 3.07501ZM7 3.48757L7.19136 2.76239V2.76239L7 3.48757ZM10.2823 4.87558L9.93167 5.5386L10.2823 4.87558ZM13.6276 20.0694L13.9804 20.7312L13.6276 20.0694ZM17 18.6335L16.8086 17.9083H16.8086L17 18.6335ZM19.9851 18.2229L20.032 18.9715L19.9851 18.2229ZM10.3724 20.0694L10.0196 20.7312H10.0196L10.3724 20.0694ZM7 18.6335L7.19136 17.9083H7.19136L7 18.6335ZM4.01486 18.2229L3.96804 18.9715H3.96804L4.01486 18.2229ZM2.75 16.1437V4.99792H1.25V16.1437H2.75ZM22.75 16.1437V4.93332H21.25V16.1437H22.75ZM20.0559 2.26832C18.9175 2.30798 17.4296 2.42639 16.2849 2.76907L16.7151 4.20606C17.6643 3.92191 18.9892 3.80639 20.1081 3.76741L20.0559 2.26832ZM16.2849 2.76907C15.2899 3.06696 14.1706 3.6488 13.2982 4.15375L14.0495 5.452C14.9 4.95981 15.8949 4.45161 16.7151 4.20606L16.2849 2.76907ZM3.93639 3.8236C4.90238 3.88297 5.99643 3.99842 6.80864 4.21274L7.19136 2.76239C6.23055 2.50885 5.01517 2.38707 4.02841 2.32642L3.93639 3.8236ZM6.80864 4.21274C7.77076 4.46663 8.95486 5.02208 9.93167 5.5386L10.6328 4.21257C9.63736 3.68618 8.32766 3.06224 7.19136 2.76239L6.80864 4.21274ZM13.9804 20.7312C14.9714 20.2029 16.1988 19.6206 17.1914 19.3587L16.8086 17.9083C15.6383 18.2171 14.2827 18.8702 13.2748 19.4075L13.9804 20.7312ZM17.1914 19.3587C17.9943 19.1468 19.0732 19.0314 20.032 18.9715L19.9383 17.4744C18.9582 17.5357 17.7591 17.6575 16.8086 17.9083L17.1914 19.3587ZM10.7252 19.4075C9.71727 18.8702 8.3617 18.2171 7.19136 17.9083L6.80864 19.3587C7.8012 19.6206 9.0286 20.2029 10.0196 20.7312L10.7252 19.4075ZM7.19136 17.9083C6.24092 17.6575 5.04176 17.5357 4.06168 17.4744L3.96804 18.9715C4.9268 19.0314 6.00566 19.1468 6.80864 19.3587L7.19136 17.9083ZM21.25 16.1437C21.25 16.8295 20.6817 17.4279 19.9383 17.4744L20.032 18.9715C21.5062 18.8793 22.75 17.6799 22.75 16.1437H21.25ZM22.75 4.93332C22.75 3.47001 21.5847 2.21507 20.0559 2.26832L20.1081 3.76741C20.7229 3.746 21.25 4.25173 21.25 4.93332H22.75ZM1.25 16.1437C1.25 17.6799 2.49378 18.8793 3.96804 18.9715L4.06168 17.4744C3.31831 17.4279 2.75 16.8295 2.75 16.1437H1.25ZM13.2748 19.4075C12.4825 19.8299 11.5175 19.8299 10.7252 19.4075L10.0196 20.7312C11.2529 21.3886 12.7471 21.3886 13.9804 20.7312L13.2748 19.4075ZM13.2982 4.15375C12.4801 4.62721 11.4617 4.65083 10.6328 4.21257L9.93167 5.5386C11.2239 6.22189 12.791 6.18037 14.0495 5.452L13.2982 4.15375ZM2.75 4.99792C2.75 4.30074 3.30243 3.78463 3.93639 3.8236L4.02841 2.32642C2.47017 2.23065 1.25 3.49877 1.25 4.99792H2.75Z" fill="#1C274D" />
          <path d="M12 5.50049V20.5005" stroke="#1C274D" stroke-width="1.5" />
        </svg>


        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Article</span>
      </div>

    </button>

  </li> -->





  <!-- <li class="menu nav-item">
    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'invoice' }" @click="activeDropdown === 'invoice' ? activeDropdown = null : activeDropdown = 'invoice'">
      <div class="flex items-center">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g opacity="0.5">
            <path d="M9 12C9 12.5523 8.55228 13 8 13C7.44772 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11C8.55228 11 9 11.4477 9 12Z" fill="#1C274C" />
            <path d="M13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12Z" fill="#1C274C" />
            <path d="M17 12C17 12.5523 16.5523 13 16 13C15.4477 13 15 12.5523 15 12C15 11.4477 15.4477 11 16 11C16.5523 11 17 11.4477 17 12Z" fill="#1C274C" />
          </g>
          <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22Z" stroke="#1C274C" stroke-width="1.5" />
        </svg>


        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Chat</span>
      </div>

    </button>

  </li> -->

  <li class="menu nav-item">
    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'invoice' }" @click="activeDropdown === 'invoice' ? activeDropdown = null : activeDropdown = 'invoice'">
      <div class="flex items-center">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12" cy="12" r="3" stroke="#1C274C" stroke-width="1.5" />
          <path d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z" stroke="#1C274C" stroke-width="1.5" />
        </svg>



        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Settings</span>
      </div>

    </button>

  </li>



  <!-- <li class="menu nav-item">
    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'invoice' }" @click="activeDropdown === 'invoice' ? activeDropdown = null : activeDropdown = 'invoice'">
      <div class="flex items-center">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9 10C9 8.34315 10.3431 7 12 7C13.6569 7 15 8.34315 15 10V13C15 14.6569 13.6569 16 12 16C10.3431 16 9 14.6569 9 13V10Z" stroke="#1C274C" stroke-width="1.5" />
          <path opacity="0.5" d="M13 10L15 10" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
          <path opacity="0.5" d="M13 13L15 13" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
          <path opacity="0.5" d="M9 10L10 10" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
          <path opacity="0.5" d="M9 13L10 13" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
          <path opacity="0.5" d="M4.15381 16C5.17341 16 5.99996 15.1734 5.99996 14.1538V9.99998C5.99996 6.68628 8.68624 4 11.9999 4C15.3136 4 17.9999 6.68628 17.9999 9.99998V14.1538C17.9999 15.1734 18.8265 16 19.8461 16" stroke="#1C274C" stroke-width="1.5" />
          <path d="M2 12C2 10.8954 2.89543 10 4 10C5.10457 10 6 10.8954 6 12V14C6 15.1046 5.10457 16 4 16C2.89543 16 2 15.1046 2 14V12Z" stroke="#1C274C" stroke-width="1.5" />
          <path d="M18 12C18 10.8954 18.8954 10 20 10C21.1046 10 22 10.8954 22 12V14C22 15.1046 21.1046 16 20 16C18.8954 16 18 15.1046 18 14V12Z" stroke="#1C274C" stroke-width="1.5" />
          <path opacity="0.5" d="M12 16V19" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
        </svg>


        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Discussion board</span>
      </div>

    </button>

  </li> -->



  <!-- <li class="menu nav-item">
    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'invoice' }" @click="activeDropdown === 'invoice' ? activeDropdown = null : activeDropdown = 'invoice'">
      <div class="flex items-center">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path opacity="0.5" d="M18 6.10156C19.3001 6.22944 20.1752 6.51846 20.8284 7.17164C22 8.34322 22 10.2288 22 14.0001C22 17.7713 22 19.6569 20.8284 20.8285C19.6569 22.0001 17.7712 22.0001 14 22.0001H10C6.22876 22.0001 4.34315 22.0001 3.17157 20.8285C2 19.6569 2 17.7713 2 14.0001C2 10.2288 2 8.34322 3.17157 7.17164C3.82475 6.51846 4.69989 6.22944 6 6.10156" stroke="#1C274C" stroke-width="1.5" />
          <path d="M10 6H14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
          <path d="M11 9H13" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
          <path d="M8.1589 11.7991L7.43926 11.1994C6.73152 10.6096 6.37764 10.3147 6.18882 9.91156C6 9.50842 6 9.04778 6 8.1265V7C6 4.64298 6 3.46447 6.73223 2.73223C7.46447 2 8.64298 2 11 2H13C15.357 2 16.5355 2 17.2678 2.73223C18 3.46447 18 4.64298 18 7V8.1265C18 9.04778 18 9.50842 17.8112 9.91156C17.6224 10.3147 17.2685 10.6096 16.5607 11.1994L15.8411 11.7991C14.0045 13.3296 13.0861 14.0949 12 14.0949C10.9139 14.0949 9.99553 13.3296 8.1589 11.7991Z" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
          <path d="M6 10L8.1589 11.7991C9.99553 13.3296 10.9139 14.0949 12 14.0949C13.0861 14.0949 14.0045 13.3296 15.8411 11.7991L18 10" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
        </svg>


        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Feedback</span>
      </div>

    </button>

  </li> -->



  <li class="menu nav-item">
    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'invoice' }" @click="activeDropdown === 'invoice' ? activeDropdown = null : activeDropdown = 'invoice'">
      <div class="flex items-center">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12" cy="6" r="4" stroke="#1C274C" stroke-width="1.5" />
          <path d="M15.5841 20.4366C14.5358 20.7944 13.3099 21 12 21C8.13401 21 5 19.2091 5 17C5 14.7909 8.13401 13 12 13C14.6083 13 16.8834 13.8152 18.0877 15.024" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
          <path d="M18 18.5C18.3905 18.8905 18.6095 19.1095 19 19.5L21 17" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>


        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Profile</span>
      </div>

    </button>

  </li>





  <li class="menu nav-item">
    <a href="#" target="_blank" class="nav-link group">
      <div class="flex items-center">

        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M13.5 2C13.5 2 15.8335 2.21213 18.8033 5.18198C21.7731 8.15183 21.9853 10.4853 21.9853 10.4853" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
          <path d="M14.207 5.53564C14.207 5.53564 15.197 5.81849 16.6819 7.30341C18.1668 8.78834 18.4497 9.77829 18.4497 9.77829" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
          <path d="M15.1007 15.0272L14.5569 14.5107L15.1007 15.0272ZM15.5562 14.5477L16.1 15.0642H16.1L15.5562 14.5477ZM17.9728 14.2123L17.5987 14.8623H17.5987L17.9728 14.2123ZM19.8833 15.312L19.5092 15.962L19.8833 15.312ZM20.4217 18.7584L20.9655 19.2749L20.4217 18.7584ZM19.0011 20.254L18.4573 19.7375L19.0011 20.254ZM17.6763 20.9631L17.7499 21.7095L17.6763 20.9631ZM7.81536 16.4752L8.35915 15.9587L7.81536 16.4752ZM3.00289 6.96594L2.25397 7.00613L2.25397 7.00613L3.00289 6.96594ZM9.47752 8.50311L10.0213 9.01963H10.0213L9.47752 8.50311ZM9.63424 5.6931L10.2466 5.26012L9.63424 5.6931ZM8.37326 3.90961L7.76086 4.3426V4.3426L8.37326 3.90961ZM5.26145 3.60864L5.80524 4.12516L5.26145 3.60864ZM3.69185 5.26114L3.14806 4.74462L3.14806 4.74462L3.69185 5.26114ZM11.0631 13.0559L11.6069 12.5394L11.0631 13.0559ZM15.6445 15.5437L16.1 15.0642L15.0124 14.0312L14.5569 14.5107L15.6445 15.5437ZM17.5987 14.8623L19.5092 15.962L20.2575 14.662L18.347 13.5623L17.5987 14.8623ZM19.8779 18.2419L18.4573 19.7375L19.5449 20.7705L20.9655 19.2749L19.8779 18.2419ZM17.6026 20.2167C16.1676 20.3584 12.4233 20.2375 8.35915 15.9587L7.27157 16.9917C11.7009 21.655 15.9261 21.8895 17.7499 21.7095L17.6026 20.2167ZM8.35915 15.9587C4.48303 11.8778 3.83285 8.43556 3.75181 6.92574L2.25397 7.00613C2.35322 8.85536 3.1384 12.6403 7.27157 16.9917L8.35915 15.9587ZM9.7345 9.32159L10.0213 9.01963L8.93372 7.9866L8.64691 8.28856L9.7345 9.32159ZM10.2466 5.26012L8.98565 3.47663L7.76086 4.3426L9.02185 6.12608L10.2466 5.26012ZM4.71766 3.09213L3.14806 4.74462L4.23564 5.77765L5.80524 4.12516L4.71766 3.09213ZM9.1907 8.80507C8.64691 8.28856 8.64622 8.28929 8.64552 8.29002C8.64528 8.29028 8.64458 8.29102 8.64411 8.29152C8.64316 8.29254 8.64219 8.29357 8.64121 8.29463C8.63924 8.29675 8.6372 8.29896 8.6351 8.30127C8.63091 8.30588 8.62646 8.31087 8.62178 8.31625C8.61243 8.32701 8.60215 8.33931 8.59116 8.3532C8.56918 8.38098 8.54431 8.41512 8.51822 8.45588C8.46591 8.53764 8.40917 8.64531 8.36112 8.78033C8.26342 9.0549 8.21018 9.4185 8.27671 9.87257C8.40742 10.7647 8.99198 11.9644 10.5193 13.5724L11.6069 12.5394C10.1793 11.0363 9.82761 10.1106 9.76086 9.65511C9.72866 9.43536 9.76138 9.31957 9.77432 9.28321C9.78159 9.26277 9.78635 9.25709 9.78169 9.26437C9.77944 9.26789 9.77494 9.27451 9.76738 9.28407C9.76359 9.28885 9.75904 9.29437 9.7536 9.30063C9.75088 9.30375 9.74793 9.30706 9.74476 9.31056C9.74317 9.31231 9.74152 9.3141 9.73981 9.31594C9.73896 9.31686 9.73809 9.31779 9.7372 9.31873C9.73676 9.3192 9.73608 9.31992 9.73586 9.32015C9.73518 9.32087 9.7345 9.32159 9.1907 8.80507ZM10.5193 13.5724C12.0422 15.1757 13.1923 15.806 14.0698 15.9485C14.5201 16.0216 14.8846 15.9632 15.1606 15.8544C15.2955 15.8012 15.4022 15.7387 15.4823 15.6819C15.5223 15.6535 15.5556 15.6266 15.5824 15.6031C15.5959 15.5913 15.6077 15.5803 15.618 15.5703C15.6232 15.5654 15.628 15.5606 15.6324 15.5562C15.6346 15.554 15.6367 15.5518 15.6387 15.5497C15.6397 15.5487 15.6407 15.5477 15.6417 15.5467C15.6422 15.5462 15.6429 15.5454 15.6431 15.5452C15.6438 15.5444 15.6445 15.5437 15.1007 15.0272C14.5569 14.5107 14.5576 14.51 14.5583 14.5093C14.5585 14.509 14.5592 14.5083 14.5596 14.5078C14.5605 14.5069 14.5614 14.506 14.5623 14.5051C14.5641 14.5033 14.5658 14.5015 14.5674 14.4998C14.5708 14.4965 14.574 14.4933 14.577 14.4904C14.583 14.4846 14.5885 14.4796 14.5933 14.4754C14.6028 14.467 14.6099 14.4616 14.6145 14.4584C14.6239 14.4517 14.6229 14.454 14.6102 14.459C14.5909 14.4666 14.5 14.4987 14.3103 14.4679C13.9077 14.4025 13.0391 14.0472 11.6069 12.5394L10.5193 13.5724ZM8.98565 3.47663C7.97206 2.04305 5.94384 1.80119 4.71766 3.09213L5.80524 4.12516C6.32808 3.57471 7.24851 3.61795 7.76086 4.3426L8.98565 3.47663ZM3.75181 6.92574C3.73038 6.52644 3.90425 6.12654 4.23564 5.77765L3.14806 4.74462C2.61221 5.30877 2.20493 6.09246 2.25397 7.00613L3.75181 6.92574ZM18.4573 19.7375C18.1783 20.0313 17.8864 20.1887 17.6026 20.2167L17.7499 21.7095C18.497 21.6357 19.1016 21.2373 19.5449 20.7705L18.4573 19.7375ZM10.0213 9.01963C10.9889 8.00095 11.0574 6.40678 10.2466 5.26012L9.02185 6.12608C9.44399 6.72315 9.37926 7.51753 8.93372 7.9866L10.0213 9.01963ZM19.5092 15.962C20.33 16.4345 20.4907 17.5968 19.8779 18.2419L20.9655 19.2749C22.2704 17.901 21.8904 15.6019 20.2575 14.662L19.5092 15.962ZM16.1 15.0642C16.4854 14.6584 17.086 14.5672 17.5987 14.8623L18.347 13.5623C17.2485 12.93 15.8861 13.1113 15.0124 14.0312L16.1 15.0642Z" fill="#1C274C" />
        </svg>

        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Need Help ?</span>
      </div>
    </a>
  </li>
</ul>