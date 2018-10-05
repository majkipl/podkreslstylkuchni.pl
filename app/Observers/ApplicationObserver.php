<?php

namespace App\Observers;

use App\Models\Application;
use App\Services\ApplicationService;

class ApplicationObserver
{
    private $applicationService;
    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    /**
     * Handle the application "created" event.
     *
     * @param Application $application
     * @return void
     */
    public function created(Application $application)
    {
        $this->applicationService->sendMail(
            $application->email,
            ['id' => $application->id, 'token' => $application->token]
        );
    }

    /**
     * Handle the application "updated" event.
     *
     * @param Application $application
     * @return void
     */
    public function updated(Application $application)
    {
        //
    }

    /**
     * Handle the application "deleted" event.
     *
     * @param Application $application
     * @return void
     */
    public function deleted(Application $application)
    {
        //
    }

}
