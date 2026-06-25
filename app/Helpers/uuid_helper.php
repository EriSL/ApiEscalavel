<?php

use Ramsey\Uuid\Uuid;

if(!function_exists('generate_uuid')) {
    /**
     * Generate a UUID (Universally Unique Identifier)
     *
     * @return string The generated UUID
     */
    function generate_uuid(): string
    {
        return Uuid::uuid4()->toString();
    }
}