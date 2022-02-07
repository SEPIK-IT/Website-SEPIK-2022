<?php

namespace App\Rules;

use App\Models\UniversityCache;
use Illuminate\Contracts\Validation\Rule;

class CheckMaxUniversity implements Rule
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
    public function passes($attribute, $value): bool
    {
        $maxRegistrant = [
            'Universitas Kristen Petra' => 1200,
            'Universitas Surabaya' => 300,
            'Universitas Ciputra' => 300,
            'Universitas Katolik Widya Mandala' => 300,
        ];

        $cachedValue = UniversityCache::where('name', $value)->first();

        if(!$cachedValue->exists()){
            return false;
        }

        return ($cachedValue->registrant + 1) <= $maxRegistrant[$value];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Universitas ini sudah mencapai batas pendaftaran!';
    }
}
