<x-layout.default>


  <div x-data="invoiceList">
    <script src="/assets/js/simple-datatables.js"></script>
    <div x-data="sales">
      <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
          <a href="javascript:;" class="text-primary hover:underline">Website</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
          <span>Edit Contact Section</span>
        </li>


      </ul>

      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

          <form method="post" action="{{route('admin.website.update.contact')}}">
            @csrf
            <h1>Text: </h1>
            <input type="text" class="form-control" value="{{$contact->text}}" name="text" >

            <br/>
            
            <h1>Email 1: </h1>
            <input type="text" class="form-control" value="{{$contact->email1}}" name="email1" required>

            <br/>
            
            <h1>Email 2: </h1>
            <input type="text" class="form-control" value="{{$contact->email2}}" name="email2" required>

            <br/>

            <h1>Phone 1: </h1>
            <input type="text" class="form-control" value="{{$contact->phone1}}" name="phone1" required>

            <br/>
            
            <h1>Phone 2: </h1>
            <input type="text" class="form-control" value="{{$contact->phone2}}" name="phone2" required>

            <br/>

            <h1>Address: </h1>
            <input type="text" class="form-control" value="{{$contact->address}}" name="address" required>

            <br/>
            

           

            

            <br />
            <button type="submit" class="bbt">Update Contact</button>


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