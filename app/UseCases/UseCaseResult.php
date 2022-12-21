<?php

namespace App\UseCases;

final class UseCaseResult
{

    public function __construct(
        public bool  $isSuccess,
        public array $content
    )
    {

    }
}
