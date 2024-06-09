<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SupervisorUser;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    
    public function propose_topic(){
      
$topic_found =  Project::where('user_id', auth()->id())->count();
        return view('projects.create' , compact('topic_found'));
    }

    public function approved_topic(){
      
        $approved_topic =  Project::where('user_id', auth()->id())->first();
    
        $supervisor_name =  SupervisorUser::with('supervisor')->where('user_id', auth()->id())->first();
      //dd($approved_topic );

                return view('projects.approved_topic' , compact('approved_topic', 'supervisor_name'));
            }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'topic1' => 'required|string|max:200',
            'topic2' => 'required|string|max:200',
            'topic3' => 'required|string|max:200',
          
        ]);
        // Create and save the user
        $user = Project::create([
            'topic1' => $validatedData['topic1'],
            'topic2' => $validatedData['topic2'],
            'topic3' => $validatedData['topic3'],
            'user_id' => auth()->id(),
            'level' => auth()->user()->level,
         
        ]);

        session()->flash('success', 'Propose topics submitted successfully.');
        return view('analytics');
    }

    public function topics_list(){
        return view('projects.pick_level');
    }

    public function picked_level(Request $request){

           // dd($request->level);
           $member_topics = Project::with('user')->where('level', $request->level)->paginate(100);
        

         
        return view('projects.pick_topic', compact('member_topics'));
    }


    public function store_picked(Request $request){
$member_id  =  $request->member_id ;
 $checked_num = $request->checked_num;
 $project_id = $request->project_id;
 $project = Project::find($project_id);
 if ($project) {
    $project->user_id = $member_id;
   $project->approve_num = $checked_num;
    $project->save();
    $response = [
        'message' => 'Project updated successfully!',
    ];

    return response()->json($response, 200);
} else {
   
    $response = [
        'message' => 'Project not found!',
    ];

    return response()->json($response, 404);
}
       
    }




public function give_topic(Request $request){
   
     $supervisor_topic = $request->supervisor_topic;
     $project_id = $request->project_id;
     $project = Project::find($project_id);
     if ($project) {
      // dd($supervisor_topic);
       $project->supervisor_topic = $supervisor_topic;
        $project->save();
        $response = [
            'message' => 'Project updated successfully!',
        ];
    
        return response()->json($response, 200);
    } else {
       
        $response = [
            'message' => 'Project not found!',
        ];
    
        return response()->json($response, 404);
    }
           
        }



        public function set_level(Request $request){

            // dd($request->level);
         
            $members  = User::whereHas('transactions', function ($query) {
                $query->where('status', 'Success'); // Assuming 'successful' indicates a successful transaction
            })->where('level', $request->level)->paginate(100);
 
          
         return view('projects.set_topic', compact('members'));
     }


     public function set_topic(Request $request){
 
        $supervisor_topic = $request->supervisor_topic;
        $member_id = $request->member_id;
        $project = Project::where('user_id', $member_id)->first();
        if ($project) {
         // dd($supervisor_topic);
          $project->supervisor_topic = $supervisor_topic;
           $project->save();
           $response = [
               'message' => 'Project updated successfully!',
           ];
       
           return response()->json($response, 200);
       } else {
          
        $new_project = Project::create([
            'user_id' =>$member_id ,
            'supervisor_topic' => $request->supervisor_topic,
            'level' => $request->level,
            'approve_num' => 4
        ]);


           $response = [
               'message' => ' New project recorded',
           ];
       
           return response()->json($response, 202);
       }
              
           }
    
    }
