<?php
declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TuerenControllerTest extends WebTestCase
{
    public function testTuerenPageIsSuccessful(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/tueren');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Türen');
    }
}
