<?php

namespace App\Models;

use App\Traits\CalendarDateTrait;
use App\Traits\CampaignTrait;
use App\Traits\ExportableTrait;
use App\Traits\VisibleTrait;

class Quest extends MiscModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'campaign_id',
        'quest_id',
        'name',
        'slug',
        'type',
        'entry',
        'is_private',
        'character_id',
        'is_completed',

        // calendar date
        'calendar_id',
        'calendar_year',
        'calendar_month',
        'calendar_day',
    ];

    /**
     * Entity type
     * @var string
     */
    protected $entityType = 'quest';

    /**
     * Fields that can be filtered on
     * @var array
     */
    protected $filterableColumns = [
        'name',
        'type',
        'quest_id',
        'tag_id',
        'character_id',
        'is_completed',
        'is_private',
    ];

    /**
     * Nullable values (foreign keys)
     * @var array
     */
    public $nullableForeignKeys = [
        'character_id',
        'quest_id',
        'calendar_id'
    ];

    /**
     * Traits
     */
    use CampaignTrait, VisibleTrait, ExportableTrait, CalendarDateTrait;

    /**
     * Searchable fields
     * @var array
     */
    protected $searchableColumns  = ['name', 'type', 'entry'];

    /**
     * Foreign relations to add to export
     * @var array
     */
    protected $foreignExport = [
        'locations',
        'characters',
        'items',
        'organisations',
    ];

    /**
     * Parent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quest()
    {
        return $this->belongsTo('App\Models\Quest', 'quest_id', 'id');
    }

    /**
     * @return mixed
     */
    public function shortDescription()
    {
        return $this->name;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locations()
    {
        return $this->hasMany('App\Models\QuestLocation', 'quest_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function characters()
    {
        return $this->hasMany('App\Models\QuestCharacter', 'quest_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function items()
    {
        return $this->hasMany('App\Models\QuestItem', 'quest_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organisations()
    {
        return $this->hasMany('App\Models\QuestOrganisation', 'quest_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quests()
    {
        return $this->hasMany('App\Models\Quest', 'quest_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function character()
    {
        return $this->belongsTo('App\Models\Character');
    }

    /**
     * Detach children when moving this entity from one campaign to another
     */
    public function detach()
    {
        foreach ($this->locations as $child) {
            $child->delete();
        }
        foreach ($this->characters as $child) {
            $child->delete();
        }
        foreach ($this->items as $child) {
            $child->delete();
        }
        foreach ($this->organisations as $child) {
            $child->delete();
        }
        foreach ($this->quests as $quest) {
            $quest->quest_id = null;
            $quest->save();
        }
        return parent::detach();
    }

    /**
     * @return array
     */
    public function menuItems($items = [])
    {
        $campaign = $this->campaign;

        $count = $this->characters()->acl()->count();
        if ($campaign->enabled('characters')) {
            $items['characters'] = [
                'name' => 'quests.show.tabs.characters',
                'route' => 'quests.characters',
                'count' => $count
            ];
        }
        $count = $this->locations()->acl()->count();
        if ($campaign->enabled('locations')) {
            $items['locations'] = [
                'name' => 'quests.show.tabs.locations',
                'route' => 'quests.locations',
                'count' => $count
            ];
        }
        $count = $this->items()->acl()->count();
        if ($campaign->enabled('items')) {
            $items['items'] = [
                'name' => 'quests.show.tabs.items',
                'route' => 'quests.items',
                'count' => $count
            ];
        }
        $count = $this->organisations()->acl()->count();
        if ($campaign->enabled('organisations')) {
            $items['organisations'] = [
                'name' => 'quests.show.tabs.organisations',
                'route' => 'quests.organisations',
                'count' => $count
            ];
        }
        return parent::menuItems($items);
    }
}
