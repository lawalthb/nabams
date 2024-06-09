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
     Supervisor name:  {{$supervisor->name}}
        <table >
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Matric No.</th>
                <th>Level</th>
                <th>Topic</th>
                
                
            </tr>
           @foreach ( $supervisor_details as $member )
           <tr>
            
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->user->lastname }} {{ $member->user->firstname }}</td>
                    <td>{{ $member->user->matno }}</td>
                    <td>{{ $member->user->level }}</td>
                    
                    
                    <td id="row{{ $member->id }}"> @if ($member->user->projects->isNotEmpty())
                       
                            @foreach ($member->user->projects as $project)
                               
                                @if($project->approve_num  == 4)
                                    {{ $project->supervisor_topic }}
                                @elseif ($project->approve_num  ==  3)
                                {{ $project->topic3 }}
                                @elseif ($project->approve_num  ==  2)
                                {{ $project->topic2 }}
                                @elseif ($project->approve_num  ==  1)
                                {{ $project->topic1 }}
                                @else
                                No topic yet
                                @endif
                            @endforeach
                        
                    @else
                        <p>No Topic yet</p>
                    @endif
                           </td>
               
            </tr>
           @endforeach
            
        </table>
        
    </body>
</html>