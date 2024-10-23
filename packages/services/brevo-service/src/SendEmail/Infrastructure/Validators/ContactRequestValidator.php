<?php

namespace App\SendEmail\Infrastructure\Validators;

use App\Common\Domain\ValueObject\Email;
use App\Common\Domain\ValueObject\Phone;
use App\SendEmail\Domain\Contact;
use App\SendEmail\Domain\ValueObject\ContactMessage;
use App\SendEmail\Domain\ValueObject\ContactName;
use Symfony\Component\HttpFoundation\Request;

class ContactRequestValidator
{
    public function validate(Request $request): Contact
    {
        $data = json_decode($request->getContent(), true);

        return new Contact(
            new ContactName($data['name']),
            new Email($data['email']),
            new Phone($data['phone']),
            new ContactMessage($data['message']),
        );
    }
}