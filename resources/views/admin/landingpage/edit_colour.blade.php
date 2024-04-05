<x-layout.default>


  <div x-data="invoiceList">
    <script src="/assets/js/simple-datatables.js"></script>
    <div x-data="sales">
      <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
          <a href="javascript:;" class="text-primary hover:underline">Website</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
          <span>Edit colour page</span>
        </li>


      </ul>

      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">

          <form method="post" action="{{route('admin.website.update.colour')}}">
            @csrf
            <h1>Fill Colour: </h1>
            <input type="color" class=" colour" value="{{$fill->colour}}" name="fill_colour">
            <input type="hidden" value="{{$fill->id}}" name="fill_id">
            <h1>Main Background: </h1>
            <input type="color" class=" colour" value="{{$main->colour}}" name="main_background">
            <input type="hidden" value="{{$main->id}}" name="main_id">
            <h1>Text Colour: </h1>
            <input type="color" class=" colour" value="{{$text->colour}}" name="text">
            <input type="hidden" value="{{$text->id}}" name="text_id">
            <br />
            <button type="submit" class="bbt">Update Colours</button>


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