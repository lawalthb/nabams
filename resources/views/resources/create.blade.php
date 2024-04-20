<x-layout.default>



  <div x-data="invoiceList" >
   
  @if(session()->has('success'))


<span class="flex items-center p-3.5 rounded text-primary bg-primary-light dark:bg-primary-dark-light">
  <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Success!</strong>{{ session('success') }}</span>
  <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">

  </button>
</span>



@endif


@if ($errors->any())
    <div >
       
            @foreach ($errors->all() as $error)
            <span class="flex items-center p-3.5 rounded text-danger bg-primary-light dark:bg-primary-dark-light">
  <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Error!</strong>{{ $error }}</span>
  <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">

  </button>
              
            @endforeach
        
    </div>
@endif

    <div x-data="sales">
      <ul class="flex space-x-4 rtl:space-x-reverse">
        <li>
          <a href="javascript:;" class="text-primary hover:underline">Election</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
          <span>Add Resources</span>
        </li>


      </ul>
      <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">

        <b style="font-size:larger;">Create Resource</b>
        <hr  ><br />
    <form action="{{ route('resources.store') }}" method="post"  enctype="multipart/form-data">
      @csrf
    <div>
            <label for="ctnSelect1">Select Category </label>
            <select  name="category_id" id="category_id" class="form-select text-white-dark" required>
                <option>Choose Category</option>
                
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
       
        <div>
        <label for="ctnSelect1">Title: </label>
       
        <input type="text" id="title"  name="title" class="form-input" required />
            
       
        </div>
        <div>
            <label for="ctnTextarea">Description</label>
            <textarea id="description"  name="description" rows="3" class="form-textarea"  required></textarea>
        </div>
       
        <div>
            <label for="ctnFile">File</label>
            <input id="ctnFile" name="file_path" type="file" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" required />
        </div>
        <div>
        <label for="ctnSelect1">Price (₦):</label>
       
        <input type="number" id="price" placeholder="leave blank, if is free"  name="price" class="form-input"  />
            
       
        </div>
        <button type="submit" class="btn btn-primary mt-6">Submit</button>
    </form>
    
        </div>

      </div>



    </div>
    </div>
  </div>
  </div>
  <script>
   
    var academic_session = document.getElementById('academic_session');
    var position_id = document.getElementById('position_id');

    // Function to populate positions
    function fillPosition() {
        
        position_id.innerHTML = '';

        var id = academic_session.value;

       
        fetch('/admin/candidates/getPositionBySession?id=' + id)
            .then(response => response.json())
            .then(data => {
               
                data.forEach(function(positions) {
                    var option = document.createElement('option');
                    option.value = positions.id;
                    option.textContent = positions.name;
                    position_id.appendChild(option);
                });
            });
    }

    fillPosition();
    academic_session.addEventListener('change', function() {
        fillPosition();
    });
</script>

  
    </x-layout.default>