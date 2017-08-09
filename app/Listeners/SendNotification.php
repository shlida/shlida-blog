<?php

namespace App\Listeners;

use App\User;
use App\Notification;
use App\Events\CreatedPost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotification
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  CreatedPost  $event
	 * @return void
	 */
	public function handle(CreatedPost $event)
	{
		$users = User::select('id')->where('id', '!=', $event->post->user_id)->get();

		foreach ($users as $user) {
			$notifications[] = [
				'post_id' => $event->post->id,
				'user_id' => $user->id,
				'readed' => 0
			];
		}

		Notification::insert($notifications);

		return;
	}
}
