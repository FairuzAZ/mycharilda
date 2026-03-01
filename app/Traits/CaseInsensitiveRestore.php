<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

trait CaseInsensitiveRestore
{
    /**
     * @param Builder $query
     * @param string $column
     * @param string $value
     * @param bool $withTrashed
     * @return Builder
     */
    public function scopeWhereInsensitive(
        Builder $query,
        string $column,
        string $value,
        bool $withTrashed = false
    ): Builder {
        if ($withTrashed && in_array(SoftDeletes::class, class_uses_recursive($this))) {
            $query->withTrashed();
        }

        return $query->whereRaw("LOWER({$column}) = ?", [mb_strtolower(trim($value))]);
    }

    /**
     * @param string $column
     * @param string $value
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public static function restoreIfExists(string $column, string $value)
    {
        $record = self::whereInsensitive($column, $value, true)->first();

        if ($record && method_exists($record, 'trashed') && $record->trashed()) {
            $record->restore();
            return $record;
        }

        return null;
    }
}
