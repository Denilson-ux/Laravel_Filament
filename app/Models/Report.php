<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'reporter_id',
        'title',
        'content',
    ];

    // Un reporte pertenece a un estudiante
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    // Un reporte pertenece a un profesor (quien lo reportó)
    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }
}