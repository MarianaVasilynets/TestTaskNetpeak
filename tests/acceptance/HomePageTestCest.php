<?php

class HomePageTestCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function CheckHomePage(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->waitForElement("//ul[@id='js-logo-rating']");
        $I->click("//li[@class = 'blog']/a");
        $I->waitForElement("div.col-md-6.hidden-sm.hidden-xs:nth-child(1) h1");
        $I->click("//a[contains(@class, 'green-btn')]");
        $I->waitForElement("h1");
        $I->attachFile("//body/input[1]", 'incorrect_format.jpg');

        $I->waitForElement("//div[@id='up_file_name']/label", 10);
        $I->fillField("#inputName", 'Test'.AcceptanceTester::generateRandomString(5));
        $I->fillField("#inputLastname", "Guest".AcceptanceTester::generateRandomString(6));

        $yearBirthValues = $I->grabMultiple('//select[@name="by"]/option[not (contains(@disabled,"disabled"))]', 'value');
        $I->selectOption('//select[@name="by"]', $yearBirthValues[rand(0, count($yearBirthValues) - 1)]);

        $monthBirthValue =$I->grabMultiple('//select[@name="bm"]/option[not (contains(@disabled,"disabled"))]', "value");
        $I->selectOption('//select[@name="bm"]', $monthBirthValue[rand(0, count($monthBirthValue) - 1)]);

        $dayBirthValues = $I->grabMultiple('//select[@name="bd"]/option[not (contains(@disabled,"disabled"))]', 'value');
        $I->selectOption('//select[@name="bd"]', $dayBirthValues[rand(0, count($dayBirthValues) - 1)]);

        $I->fillField("#inputEmail", AcceptanceTester::generateRandomString(10)."@gmail.com");
        $I->fillField("#inputPhone", "+3809".rand(1, 9).AcceptanceTester::generateRandomIntNumber(7));

        $I->click("#submit");
        $color_message = $I->executeJS("return jQuery('p.warning-fields.help-block').css('color');");

        $color_message_hex = AcceptanceTester::strRgbToHex($color_message);
        \PHPUnit\Framework\assertEquals("#ff0000", $color_message_hex);
        $I->wait(3);
        $I->scrollTo("p.warning-fields.help-block", 0, -300);
        $I->wait(3);

        $I->click("//a[contains(text(),'Курсы')]");
        $I->waitForElement("//div[@class='bordered']", 10);
        $I->click("//a[contains(text(),'Курсы')]");
        $I->waitForElement("//section[@class='filter']");
    }
}
