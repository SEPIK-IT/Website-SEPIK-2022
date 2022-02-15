<?php

namespace App\Rules;

use App\Models\ZoomSessionCache;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class MaxZoomSession implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $sessions = [
            '2022-02-19 10:00:00' => 129,
            '2022-02-19 17:00:00' => 130,
            '2022-02-20 10:00:00' => 64,
            '2022-02-20 17:00:00' => 60,
            '2022-02-21 18:00:00' => 40,
        ];

        $time = ZoomSessionCache::where('session_time', Carbon::parse($value));

        if (!$time->exists()) return false;

        return ($time->first()->registrant + 1) <= $sessions[$value];

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Anda tidak bisa memilih waktu interview ini karena jadwalnya sudah penuh.';
    }
}
