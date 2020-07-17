<?php

namespace App\Tests;

use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase {
    
    private $contact;

    public function setUp()
    {
        $this->contact = new Contact();
        $this->contact->create('Doe', 'John', 'john.doe@mail.com', 'Test', '0323000000');
    }

    public function testLastNameNotEmpty(){
        $this->assertNotEmpty($this->contact->getLastname());
    }

    public function testLastNameEmpty(){
        $this->contact->setLastName('');
        $this->assertEmpty($this->contact->getLastname());
    }

    public function testLastNameFormat(){
        $this->assertIsString($this->contact->getLastname());
    }

    public function testFirstNameNotEmpty(){
        $this->assertNotEmpty($this->contact->getFirstname());
    }

    public function testFirstNameEmpty(){
        $this->contact->setFirstname('');
        $this->assertEmpty($this->contact->getFirstname());
    }

    public function testFirstNameFormat(){
        $this->assertIsString($this->contact->getFirstname());
    }

    public function testEmailNotEmpty(){
        $this->assertNotEmpty($this->contact->getEmail());
    }

    public function testEmailEmpty(){
        $this->contact->setEmail('');
        $this->assertEmpty($this->contact->getEmail());
    }

    public function testEmailFormat(){
        $this->assertIsString($this->contact->getEmail());
    }

    public function testEmailValid(){
        $this->assertRegExp('/^.+\@\S+\.\S+$/', $this->contact->getEmail());
    }

    public function testEmailInvalid(){
        $this->contact->setEmail('john.die@mail');
        $this->assertNotRegExp('/^.+\@\S+\.\S+$/', $this->contact->getEmail());
    }

    public function testTagNotEmpty(){
        $this->assertNotEmpty($this->contact->getTag());
    }

    public function testTagEmpty(){
        $this->contact->setTag('');
        $this->assertEmpty($this->contact->getTag());
    }

    public function testTagFormat(){
        $this->assertIsString($this->contact->getTag());
    }

    public function testPhoneNumberFormat(){
        $this->assertIsString($this->contact->getPhoneNumber());
    }

    public function testValidPhoneNumber(){
        $this->assertRegExp('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\0-9]*$/', $this->contact->getPhoneNumber());

        $this->contact->setPhoneNumber('+33323000000');
        $this->assertRegExp('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\0-9]*$/', $this->contact->getPhoneNumber());

        $this->contact->setPhoneNumber('03-23-00-00-00');
        $this->assertRegExp('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\0-9]*$/', $this->contact->getPhoneNumber());
    }

    public function testInvalidPhoneNumber(){
        $this->contact->setPhoneNumber('03230000XX');
        $this->assertNotRegExp('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\0-9]*$/', $this->contact->getPhoneNumber());
    }
}
