<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Task::where('user_id', '=', Auth::user()->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $task = new Task($request->toArray());
        $task->user_id = Auth::user()->id;
        $task->saveOrFail();
        return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Task::where('user_id', '=', Auth::user()->id)->where('id', '=', $id)->firstOrFail();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::where('user_id', '=', Auth::user()->id)->where('id', '=', $id)->firstOrFail();
        $task->fill($request->toArray());
        $task->saveOrFail();
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $task = Task::where('user_id', '=', Auth::user()->id)->where('id', '=', $id)->firstOrFail();
        $task->delete();
    }
}
