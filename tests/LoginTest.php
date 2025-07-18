<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testValidateCredentials(): void
    {
        $hash = password_hash('mypassword', PASSWORD_DEFAULT);
        $this->assertTrue(password_verify('mypassword', $hash));
        $this->assertFalse(password_verify('wrong', $hash));
    }
}
