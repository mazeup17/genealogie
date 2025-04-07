<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Person extends Model
{
    /**
     * @var int|mixed|string|null
     */
    protected $table = 'people';

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'death_date',
        // Ajoutez d'autres champs selon votre structure de base de données
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function children()
    {
        return $this->belongsToMany(Person::class, 'relationships', 'parent_id', 'child_id')
            ->withTimestamps();
    }


    public function parents()
    {
        return $this->belongsToMany(Person::class, 'relationships', 'child_id', 'parent_id')
            ->withTimestamps();
    }
}

