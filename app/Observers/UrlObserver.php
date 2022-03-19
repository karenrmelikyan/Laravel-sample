<?php

namespace App\Observers;

use App\Models\URL;
use App\Services\Notifiers\NotifierInterface;

class UrlObserver
{
    public function __construct(private NotifierInterface $notifier)
    {
        //
    }
    /**
     * Handle the Url "created" event.
     *
     * @param  \App\Models\URL  $url
     * @return void
     */
    public function created(URL $url)
    {
        $this->notifier->sendNotification('You have added a new URL');
    }

    /**
     * Handle the Url "updated" event.
     *
     * @param  \App\Models\URL  $url
     * @return void
     */
    public function updated(URL $url)
    {
        $this->notifier->sendNotification('You have updated URL');
    }

    /**
     * Handle the Url "deleted" event.
     *
     * @param  \App\Models\URL  $url
     * @return void
     */
    public function deleted(URL $url)
    {
        $this->notifier->sendNotification('You have removed URL');
    }

    /**
     * Handle the Url "restored" event.
     *
     * @param  \App\Models\Url  $url
     * @return void
     */
    public function restored(URL $url)
    {
        //
    }

    /**
     * Handle the Url "force deleted" event.
     *
     * @param  \App\Models\URL  $url
     * @return void
     */
    public function forceDeleted(URL $url)
    {
        //
    }
}
