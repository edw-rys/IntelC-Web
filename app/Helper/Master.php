<?php

use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

if (! function_exists('createNewRandomPassword')) {
    /**
     * Create New Password Helper
     *
     * @param $maxLength
     * @return string
     */
    function createNewRandomPassword($maxLength = null): string
    {
        $generator = new ComputerPasswordGenerator();
        $generator->setLength($maxLength ?? 8)
            ->setNumbers(true)
            ->setUppercase(true)
            ->setSymbols(false);

        return $generator->generatePassword();
    }
}
