<x-layout.default>


  <div x-data="invoiceList">

    @if(session()->has('success'))


    <span class="flex items-center p-3.5 rounded text-primary bg-primary-light dark:bg-primary-dark-light">
      <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Success!</strong>{{ session('success') }}</span>
      <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">

      </button>
    </span>



    @endif
    <div x-data="sales">
      <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
          <a href="javascript:;" class="text-primary hover:underline">Website</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
          <span>Template</span>
        </li>


      </ul>


      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">


        </div>

      </div>

      <style>
        .bbt {
          background-color: blue;
          border: none;
          color: white;
          padding: 10px 15px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }
      </style>

      <div class="invoice-table">

        <form method="get" action="{{route('admin.website.edit')}}">
          @csrf
          <select name="page_to_edit">
            <option>Select Section to update</option>
            <option>Edit Colour</option>
            <option>Edit Topbar</option>
            <option>Edit Header</option>

            <option>Edit Slider</option>
            <option>Edit Mission_Vission</option>
            <option>Edit Call To Action</option>

            <option>Edit About</option>

            <option>Edit Counter</option>

            <option>Edit Benefit</option>
            <option>Edit Resources</option>
            <option>Edit Registration</option>
            <option>Edit Events</option>
            <option>Edit Testimonial</option>
            <option>Edit Excos</option>
            <option>Edit Gallery</option>
            <option>Edit Contact</option>



          </select>
          <button type="submit" class="bbt">Open</button>
        </form>
      </div>

      @foreach (range(1, 12) as $index)
      <img src="{{ asset('website/association' . $index . '.png') }}" alt="Image {{ $index }}">
      @endforeach
    </div>

  </div>
  </div>



</x-layout.default>