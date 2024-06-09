<html>
    <head>
        <title>Set Topic</title>
        <style>
            table {
  width: 100%;  /* Set table width to 100% */
}
table, th, td {
  border: 1px solid #ddd;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}


            </style>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    </head>
    <body>
        Set topic
        <table >
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Matric No.</th>
                <th>Topic</th>
                
                <th>Action</th>
            </tr>
           @foreach ( $members as $member )
           <tr>
            
                    <td>{{ $member->id }}</td>
                    <td>{{$member->firstname}} {{$member->lastname}}</td>
                    <td>{{$member->matno}}</td>
                    
                    
                    <td id="row{{ $member->id }}"><textarea   name="supervisor_topic{{ $member->id }}" id="supervisor_topic{{ $member->id }}" style="width:500px"></textarea> <button  id="supervisor_topic{{ $member->id }}" onclick="set_topic{{$member->id}}()"  >Submit</button>
                    <script>
function set_topic{{$member->id}}(){
  let topic;
  
  let given_topic = document.getElementById("supervisor_topic{{ $member->id }}").value;
  if (given_topic == null || given_topic == "") {
   alert('Topic can not be empty');
  } else {
    $.ajax({
    url: '{{route('admin.project.set_topic')}}', 
    type: 'GET', 
    data: {
      member_id: {{$member->id}},
    level: '{{$member->level}}',
      supervisor_topic:  given_topic,
    },
    dataType: 'json', 
    success: function(response) {
      console.log(response); 
  
    },
    error: function(error) {
      console.error(error); 
    }
  });
  
    topic = "Approved Topic is:  " + given_topic ;
    document.getElementById("row{{$member->id}}").innerHTML = topic;
  }
 
}
</script>
                    </td>
               
            </tr>
           @endforeach
            
        </table>
        
    </body>
</html>