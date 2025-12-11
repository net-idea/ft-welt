<?php
declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FensterControllerTest extends WebTestCase
{
    public function testFensterPageIsSuccessful(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/fenster');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Fenster');
    }

    public function testFensterPageContainsRelevantContent(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/tueren');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Türen');
    }

    public function testPlanungMontagePageContainsRelevantContent(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/planung-montage');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Planung & Montage');
    }
}
