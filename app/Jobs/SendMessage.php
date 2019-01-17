<?php
/**
 * Created by PhpStorm.
 * User: nikola
 * Date: 1/17/19
 * Time: 10:51 AM
 */
namespace App\Listeners;

use App\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMessage implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * The name of the connection the job should be sent to.
     *
     * @var string|null
     */
    public $connection = 'database';

    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $queue = 'chat';

    /**
     * Handle the event.
     *
     * @param  \App\Events\MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        dd($event);
    }

    /**
     * Handle a job failure.
     *
     * @param  \App\Events\MessageSent  $event
     * @param  \Exception  $exception
     * @return void
     */
    public function failed(MessageSent $event, $exception)
    {
        dd($event, $exception);
    }
}