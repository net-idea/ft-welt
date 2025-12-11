<?php
declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testContactPageIsSuccessful(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/kontakt');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'So treten Sie mit uns in Kontakt');
    }

    public function testContactFormIsPresent(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/kontakt');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form');
        $this->assertSelectorExists('input[name*="name"]');
        $this->assertSelectorExists('input[name*="email"]');
        $this->assertSelectorExists('textarea[name*="message"]');
    }

    public function testContactFormSubmissionWithInvalidData(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/kontakt');

        $form = $crawler->selectButton('Nachricht senden')->form([
            'form_contact[name]'    => '',
            'form_contact[email]'   => 'invalid-email',
            'form_contact[message]' => 'Test',
            'form_contact[consent]' => false,
        ]);

        $client->submit($form);

        // Should stay on the same page with errors
        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('.is-invalid, .form-error');
    }
}
