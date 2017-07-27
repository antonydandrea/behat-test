Feature: inputName
	Scenario: User enters a lowercase name
		Given that I am on the first page
		When I input "antony" and submit the form
		Then I should see a message with "Antony"