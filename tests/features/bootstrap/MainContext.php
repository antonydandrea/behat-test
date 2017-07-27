<?php
use Behat\Behat\Context\ClosuredContextInterface;
use Behat\Behat\Context\TranslatedContextInterface;
use Behat\Behat\Context\BehatContext;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\Step;

class MainContext extends MinkContext
{
    public function __construct()
    {
    	require_once(realpath('../vendor/autoload.php'));
    }

    /** @Given that I am on the first page */
    public function onTheFirstPage()
    {
	 	$this->visit('/');
    }

	/** @When I input :name and submit the form */
	public function inputNameSubmitForm($name)
	{
		$this->fillField('my_name', $name);
		$this->pressButton('submit_name');
	}

	/** @Then I should see a message with :name */
	public function seeMessage($name)
	{
		$page = $this->getSession()->getPage();
        $el = $page->find('named', ['id', 'greeting']);
		if (!$el) {
            throw new \Exception ("Greeting not found.");
        }
        $match = preg_match('/Hello\, '.$name.'\!/', $el->getHtml());
        if ($match == 0) {
            throw new \Exception ("Unexpected greeting - ".$el->getHtml());
        }
	}
}