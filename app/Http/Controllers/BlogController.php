<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Events\CreatedPost;

class BlogController extends Controller
{
	public function __construct()
	{
		$this->myUser = [
			'id' => 1,
			'username' => 'user1',
			'email' => 'email@abc.com'
		];
	}

	public function listing($id = 'all')
	{
		$post = new Post();
		$post = $post->with('user');

		if ($id != 'all') {
			$post = $post->byUser($id);
		}

		$post = $post->get();

		$isOwner = ($id == $this->myUser['id']) ? true : false;

		$data = [
			'data' => $post,
			'isOwner' => $isOwner
		];

		return view('blog.list', $data);
	}

	public function show($id)
	{
		$post = new Post();
		$post = $post->with('user')->find($id);

		$data = [
			'data' => $post
		];

		return view('blog.show', $data);
	}

	public function create()
	{
		return view('blog.create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required',
			'description' => 'required'
		]);

		$request->request->add(['user_id' => $this->myUser['id']]);
		$post = Post::create($request->all());

		event(new CreatedPost($post));

		return redirect()->route('blog.list', ['id' => $this->myUser['id']]);
	}

	public function edit($id)
	{
		$post = new Post();
		$post = $post->find($id);

		$data = [
			'data' => $post
		];

		return view('blog.edit', $data);
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title' => 'required',
			'description' => 'required',
		]);

		$post = new Post;
		$post = $post->find($id);
		$post->title = $request->title;
		$post->description = $request->description;
		$post->save(); //eloquent update

		return redirect()->route('blog.list', ['id' => $this->myUser['id']]);
	}

	public function destroy($id)
	{
		$post = new Post;
		$post = $post->find($id);
		$post->delete(); //soft delete

		return redirect()->route('blog.list', ['id' => $this->myUser['id']]);
	}
}
