<x-layout.default>


  <div x-data="invoiceList">
    <script src="/assets/js/simple-datatables.js"></script>
    <div x-data="sales">
      <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
          <a href="javascript:;" class="text-primary hover:underline">Website</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
          <span>Edit Registration Section</span>
        </li>


      </ul>

      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">

          <form method="post" action="{{route('admin.website.update.registration')}}">
            @csrf
            <h1>Title: </h1>
            <input type="text" class="form-control" value="{{$reg->title}}" name="title" required>

            <br/>
            
            <h1>Instruction and current fee: </h1>
            <input type="text" value="{{$reg->text}}" name="text" required>

            

            <br />
            <button type="submit" class="bbt">Update Registration</button>


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