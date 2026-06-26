<?php

use Ramsey\Uuid\Uuid;

if(!function_exists('get_uuid')) {
    /**
     * Gerador de UUID (Universally Unique Identifier)
     * 
     * @return string The generated UUID
     */
    function get_uuid(): string
    {
        return Uuid::uuid4()->toString();
    }
}