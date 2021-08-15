<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;

class BoardController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Board::with('user')->get();
        return view('board.index', ['items' => $items]);
    }

    public function add() {
        return view('board.create');
    }

    public function create(Request $request) {
        $this->validate($request, Board::$rules);
        $board = new Board;
        $form = $request->all();
        unset($form['_token']);
        $board->fill($form)->save();
        return redirect('/');
    }

    public function edit(Request $request) {
        $post = Board::find($request->post_id);
        return view('board.edit', ['post' => $post]);
    }

    public function update(Request $request) {
        $post = Board::find($request->post_id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect('/');
    }

    public function delete(Request $request) {
        Board::where('id', $request->post_id)->delete();
        return redirect('/');
    }

    public function return() {
        return redirect('/');
    }
}
