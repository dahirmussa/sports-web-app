<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class aboutPageCest
{
    public function aboutPageContent(AcceptanceTester $I)
    {
        $I->amOnPage('/about');
        $I->see(' welcome to the about page');
    }
    public function aboutPageAboutLink(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('home');
        $I->see('Home page', 'h1');
        $I->SeeInCurrentUrl('/');
    }
}
