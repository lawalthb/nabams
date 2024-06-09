<html>
    <head>
        <title>Pick Topic</title>
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
        <table >
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Matric No.</th>
                <th>Topic 1</th>
                <th>Topic 2</th>
                <th>Topic 3</th>
                <th>Action</th>
            </tr>
           @foreach ( $member_topics as $key => $member_topic )
           <tr>
             <form>
                    <td>{{ $member_topics->firstItem() + $key }}</td>
                    <td>{{$member_topic->user->firstname}} {{$member_topic->user->lastname}}</td>
                    <td>{{$member_topic->user->matno}}</td>
                    <td><input type="radio" name="approve" @php
                        if($member_topic->approve_num == 1){
                            echo  "checked";
                        }
                    @endphp onclick="pick_member_topic({{$member_topic->user_id}}, 1, {{$member_topic->id}})" /> {{$member_topic->topic1}}</td>
                    <td><input type="radio" name="approve" onclick="pick_member_topic({{$member_topic->user_id}}, 2, {{$member_topic->id}})"  @php
                        if($member_topic->approve_num == 2){
                            echo  "checked";
                        }
                    @endphp
                    /> {{$member_topic->topic2}}</td>
                    <td><input type="radio" name="approve" onclick="pick_member_topic({{$member_topic->user_id}}, 3, {{$member_topic->id}})"  @php
                        if($member_topic->approve_num == 3){
                            echo  "checked";
                        }
                    @endphp
                     /> {{$member_topic->topic3}}</td>
                    <td id="result{{$member_topic->id}}"><a href="#" onclick="give_topic{{$member_topic->id}}()" >Give Topic </a> | Reject 
                    <script>
function give_topic{{$member_topic->id}}() {
  let topic;
  let given_topic = prompt("Topic for {{$member_topic->user->firstname}} {{$member_topic->user->lastname}} :", "");
  if (given_topic == null || given_topic == "") {
    topic = "No Topic given.";
  } else {
    $.ajax({
    url: '/project/give_topic/', 
    type: 'GET', 
    data: {
      member_id: {{$member_topic->user_id}},
      project_id:  {{$member_topic->id}},
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

  }
  document.getElementById("result{{$member_topic->id}}").innerHTML = topic;
}
</script>
                    </td>
                </form>
            </tr>
           @endforeach
            
        </table>
        <script>
            function pick_member_topic(member_id, checked_num, project_id){
         

  $.ajax({
    url: '/project/store_picked/', 
    type: 'GET', 
    data: {
      member_id: member_id,
      checked_num: checked_num,
      project_id: project_id,
    },
    dataType: 'json', 
    success: function(response) {
      console.log(response); 
  
    },
    error: function(error) {
      console.error(error); 
    }
  });

            }
           
        </script>
    </body>
</html>