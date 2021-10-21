<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Returning all data in th databse
        return Task::orderBy('created_at', 'asc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Recieving user input and store them in databse

        //inputs are not empty or null
        $this->validate($request, [ 
            'title' => 'required',
            'description' => 'required',
        ]);

        $task = new Task;
        //retrieving user inputs (title)
        $task->title = $request->input('title'); 
        //retrieving user inputs (description)
        $task->description = $request->input('description'); 
        //storing values as an object 
        $task->save(); 
        //returns the stored value if the operation was successful
        return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieving values of specific object
        return Task::findorFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Updating existing values in database

        // the new values should not be null
        $this->validate($request, [ 
            'title' => 'required',
            'description' => 'required',
        ]);

        // uses the id to search values that need to be updated.
        $task = Task::findorFail($id); 
        //retrieves user input (title)
        $task->title = $request->input('title'); 
        //retrieves user input (description)
        $task->description = $request->input('description');
        //saves the values in the database. The existing data is overwritten.
        $task->save();
        // retrieves the updated object from the database
        return $task; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Deleting values in databse

         //searching for object in database using ID
        $task = Task::findorFail($id);
        //deletes the object
        if($task->delete()){ 
            //shows a message when the delete operation was successful.
            return 'deleted successfully'; 
      }
    }
}
