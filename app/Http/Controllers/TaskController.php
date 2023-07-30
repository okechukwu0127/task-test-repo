<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $task = Post::all();
        return Inertia::render('Task/Index', ['task' => $task]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Task/Create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ])->validate();

        Post::create($request->all());

        return redirect()->route('task.index');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Post $post)
    {
        return Inertia::render('Task/Edit', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ])->validate();

        Post::find($id)->update($request->all());
        return redirect()->route('task.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('task.index');
    }
}
