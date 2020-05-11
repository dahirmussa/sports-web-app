<?php namespace App\Tests;
use App\Tests\AcceptanceTester;
use Codeception\Example;

class HomePageCest
{
    /**
     * @example(url="/", heading="Home page")
     * @example(url="/about", heading="About page")
     */
    public function homePageContent(AcceptanceTester $I , Example $example)
    {
        $I->amOnPage($example['url']);
        $I->see($example['heading'], 'h1');
    }
    /**
     * @example(url="/", linkText="home")
     * @example(url="/about", linkText="about")
     */
    public function homePageNavLinks(AcceptanceTester $I, Example $example)
    {
        $I->amOnPage('/');
        $I->click($example['linkText']);
        $I->seeCurrentUrlEquals($example['url']); // full URL
        $I->seeInCurrentUrl($example['url']); // part of URL
    }
}
