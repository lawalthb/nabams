<x-layout.default>

<link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="/assets/js/quill.js"></script>

  <div x-data="invoiceList">
    <script src="/assets/js/simple-datatables.js"></script>
    <div x-data="sales">
      <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
          <a href="javascript:;" class="text-primary hover:underline">Website</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
          <span>Edit About Section</span>
        </li>


      </ul>

      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">

          <form method="post" action="{{route('admin.website.update.about')}}" enctype="multipart/form-data">
            @csrf
            <h1>Title: </h1>
            <input type="text" class="form-control" value="{{$about->text}}" name="text" >
            @error('text')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
            <br/>
            
            <h1>Text: </h1>
           
            <div id="editor1" cols="30" rows="10">{!!$about->body!!}</div>
            <input type="hidden" id="quill_html" name="body"></input>
            @error('body')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
            <br />
            <h1>About Image: </h1>
            <input type="file" class="form-control" name="image" >
            <input type="hidden" value="{{$about->image}}" name="old_image" >

            <br />
            <button type="submit" class="bbt">Update About</button>


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

  

    <!-- script -->
    <script>
        var quill = new Quill('#editor1', {
            theme: 'snow',
            
        });
        quill.on('text-change', function(delta, oldDelta, source) {
        document.getElementById("quill_html").value = quill.root.innerHTML;
    });
        var toolbar = quill.container.previousSibling;
        toolbar.querySelector('.ql-picker').setAttribute('title', 'Font Size');
        toolbar.querySelector('button.ql-bold').setAttribute('title', 'Bold');
        toolbar.querySelector('button.ql-italic').setAttribute('title', 'Italic');
        toolbar.querySelector('button.ql-link').setAttribute('title', 'Link');
        toolbar.querySelector('button.ql-underline').setAttribute('title', 'Underline');
        toolbar.querySelector('button.ql-clean').setAttribute('title', 'Clear Formatting');
        toolbar.querySelector('[value=ordered]').setAttribute('title', 'Ordered List');
        toolbar.querySelector('[value=bullet]').setAttribute('title', 'Bullet List');
    </script>
    
</x-layout.default>