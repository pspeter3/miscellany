<?php

namespace App\Models;

use App\Facades\CampaignLocalization;
use App\Traits\CampaignTrait;
use App\Traits\VisibleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class ConversationMessage extends MiscModel
{
    //
    protected $fillable = [
        'conversation_id',
        'created_by',
        'character_id',
        'user_id',
        'message',
    ];

    /**
     * Fields that can be filtered on
     * @var array
     */
    protected $filterableColumns = [
        'conversation_id',
        'created_at',
        'created_by',
    ];

    /**
     * We want to use the dice_roll entity type for permissions
     * @var string
     */
    protected $entityType = 'conversation_messages';

    /**
     * Who created this entry
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Who created this entry
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function character()
    {
        return $this->belongsTo('App\Models\Character', 'character_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conversation()
    {
        return $this->belongsTo('App\Models\Conversation', 'conversation_id');
    }

    /**
     * @return string
     */
    public function target()
    {
        return (!empty($this->character_id) ? Conversation::TARGET_CHARACTERS :
            (!empty($this->user_id) ? Conversation::TARGET_USERS : null));
    }

    /**
     * @return string
     */
    public function author()
    {
        if (!empty($this->user_id)) {
            return $this->user;
        } elseif (!empty($this->character_id)) {
            return $this->character;
        }
        return null;
    }

    /**
     * @param $query
     * @param null $oldestId
     * @param null $newestId
     */
    public function scopeDefault($query, $oldestId = null, $newestId = null)
    {
        $query->with(['user', 'character'])
            ->latest()
            ->take(20);

        if (!empty($oldestId)) {
            $query->where('id', '<', $oldestId);
        } elseif (!empty($newestId)) {
            $query->where('id', '>', $newestId);
        }
    }


    /**
     * Used by the API to get models updated since a previous date
     * @param $query
     * @param $lastSync
     * @return mixed
     */
    public function scopeLastSync($query, $lastSync)
    {
        if (empty($lastSync)) {
            return $query;
        }
        return $query->where('updated_at', '>', $lastSync);
    }
}
