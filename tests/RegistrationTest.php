<?php

use PHPUnit\Framework\TestCase;
use OTPHP\TOTP;

class RegistrationTest extends TestCase
{
    public function testGenerateTotpSecret(): void
    {
        $totp = TOTP::create();
        $secret = $totp->getSecret();
        $this->assertNotEmpty($secret);
        $code = $totp->now();
        $this->assertTrue(TOTP::create($secret)->verify($code));
    }

    public function testPasswordHashing(): void
    {
        $password = 'secret123';
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->assertTrue(password_verify($password, $hash));
    }
}
