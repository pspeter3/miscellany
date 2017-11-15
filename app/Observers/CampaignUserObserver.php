<?php

namespace App\Observers;

use App\CampaignUser;
use App\Services\ImageService;
use App\Services\StarterService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Stevebauman\Purify\Facades\Purify;

class CampaignUserObserver
{
    /**
     * @param CampaignUser $campaignUser
     */
    public function saving(CampaignUser $campaignUser)
    {
        
    }

    /**
     * @param CampaignUser $campaignUser
     */
    public function saved(CampaignUser $campaignUser)
    {
    }

    /**
     * @param CampaignUser $campaignUser
     */
    public function created(CampaignUser $campaignUser)
    {

    }

    /**
     * @param CampaignUser $campaignUser
     */
    public function creating(CampaignUser $campaignUser)
    {
    }

    /**
     * @param CampaignUser $campaignUser
     */
    public function deleted(CampaignUser $campaignUser)
    {
    }
}