<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HelpingMaterial extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'title',
            'type',
            'url',
            'subject_ref_id',
        ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_ref_id', 'id');
    }
}
