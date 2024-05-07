<x-layout.default>

<link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="/assets/js/quill.js"></script>

  <div x-data="invoiceList">
    <script src="/assets/js/simple-datatables.js"></script>
    <div x-data="sales">
      <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
          <a href="javascript:;" class="text-primary hover:underline">Transactions</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
          <span>Clear Member that paid Due money by Cash</span>
        </li>


      </ul>

      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">
        @if(session()->has('success'))


<span class="flex items-center p-3.5 rounded text-primary bg-primary-light dark:bg-primary-dark-light">
  <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Success!</strong>{{ session('success') }}</span>
  <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">

  </button>
</span>



@endif
          <form method="post" action="{{route('admin.collect.cash')}}" >
            @csrf
          
            
            <h1>Enter Member Emails (comma-separated): </h1>
            <textarea name="emails" id="emails" rows="5" class="form-textarea"  required></textarea>
           
            @error('emails')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
                 
         
        


            <button type="submit" class="bbt">Clear Member</button>


          </form>
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

        .colour {

          -webkit-appearance: none;
          -moz-apperance: none;
          apperance: none;
          width: 100px;
          height: 50px;
          background-color: transparent;
          border: none;
          cursor: pointer;
        }

        .colour::-webkit-color-swatch {
          boder-radius: 15px;
          border: none;
        }

        .colour::-moz-color-swatch {
          border-radius: 15px;
          border: none;

        }
      </style>
      <div class="invoice-table">

      </div>


    </div>

  </div>
  </div>

  
    
</x-layout.default>