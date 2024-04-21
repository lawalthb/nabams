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
            <input type="text" class="input-form" value="{{$about->text}}" name="text" >
            @error('text')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
            <br/>
            
            <h1>Text: </h1>
            <textarea id="body"  name="body" rows="5" class="form-textarea"  required></textarea>
           
            @error('body')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
            <br />
            <h1>About Image: </h1>
            <input type="file" class="form-control" name="image" >
            <input type="hidden" value="{{$about->image}}" name="old_image" >

            <br />
            <h1>Custom Content: </h1>
           
           <div id="editor2" cols="30" rows="20">{!!$about->custom!!}</div>
           <input type="hidden" id="quill_html2" name="custom"></input>
           @error('custom')
                   <p class="error_msg">{{ $message }}</p>
                   @enderror
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


<script>
       
    
    var toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['blockquote', 'code-block'],

                [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                [{ 'direction': 'rtl' }],                         // text direction

                [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                [ 'link', 'image', 'video', 'formula' ],          // add's image support
                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                [{ 'font': [] }],
                [{ 'align': [] }],

                ['clean']                                         // remove formatting button
            ];

        var quill = new Quill('#editor2', {
            modules: {
                toolbar: toolbarOptions
            },

            theme: 'snow'
        });
        quill.on('text-change', function(delta, oldDelta, source) {
        document.getElementById("quill_html2").value = quill.root.innerHTML;
    });
    </script>
    
</x-layout.default>