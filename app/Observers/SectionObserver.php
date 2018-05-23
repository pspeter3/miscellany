<?php

namespace App\Observers;

use App\Campaign;
use App\Models\MiscModel;
use App\Models\Section;
use Illuminate\Support\Facades\Session;

class SectionObserver extends MiscObserver
{
    /**
     * @param MiscModel $model
     */
    public function saving(MiscModel $model)
    {
        parent::saving($model);
    }

    /**
     * @param Section $section
     */
    public function deleting(MiscModel $section)
    {
        parent::deleting($section);

        /**
         * We need to keep this, because the tree plugin wants to delete child when deleting the parent. It's stupid.
         */
        // Set all children to no longer have this section
        foreach ($section->allChildren() as $child) {
            $child->child->section_id = null;
            $child->child->save();
        }

        // Update sub sections to clean them  up
        foreach ($section->sections as $child) {
            $child->section_id = null;
            $child->save();
        }

        // Refresh the model to make sure we have new foreign keys?
        $section->refresh();
    }
}
