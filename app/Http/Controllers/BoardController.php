<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BoardRequest;
use Illuminate\Support\Facades\Auth;
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
        return view('board.store');
    }

    public function store(BoardRequest $request) {
        $board = new Board;
        $form = $request->all();
        unset($form['_token']);
        $board->fill($form)->save();
        return redirect('/');
    }

    public function edit($id) {
        $user_id = Auth::user()->id;
        $post = Board::find($id);
        if($user_id !== $post->user_id) {
            abort(404);
        }
        return view('board.edit', ['post' => $post]);
    }

    public function update(BoardRequest $request, $id) {
        $board = Board::find($id);
        $form = $request->all();
        unset($form['_token']);
        $board->fill($form)->save();
        return redirect('/');
    }

    public function delete($id) {
        Board::where('id', $id)->delete();
        return redirect('/');
    }

    public function return() {
        return redirect('/');
    }
}
