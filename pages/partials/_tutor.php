<div>
	
	<h5>Admin login details</h5>

	<div>
		
		<p>Email: admin@business.com</p>

		<p>Password: password</p>

		<p>Click <a href="loginPage.php">here</a> to log in.</p>

	</div>

</div>

<div>
	
	<h5>Summary of database tables</h5>

	<img alt="no image" src="../public/img/business_listings_db.jpg" />

</div>

<div>
	
	<h5>Payment Gateway</h5>

	<p>Payment Gateway uses the Luhn Formula to determine if the card is valid. Click <a href="http://www.freeformatter.com/credit-card-number-generator-validator.html">here</a> for more information.</p>

	<p>URL to call: <a href="http://mayar.abertay.ac.uk/~1405776/payment_gateway/process_payment.php">http://mayar.abertay.ac.uk/~1405776/payment_gateway/process_payment.php</a></p>

	<p>Required parameters:</p>
	
	<p><b>api_key</b> - s0m3h4rdc0d3dv41u3</p>

	<p><b>token</b> - randomly generated string that is also returned with the response</p>

	<p><b>card_number</b> - the card number that needs validation</p>

	<p><b>cvv</b> - CVV check - for purpose of this assignment this is the last 3 digits of the card number</p>

	<p><b>amount</b> - amount for the transaction - that is also returned with the response</p>

	<p>Example: <a href="http://mayar.abertay.ac.uk/~1405776/payment_gateway/process_payment.php?api_key=s0m3h4rdc0d3dv41u3&token=sd73hfy$dsk&card_number=4024007110595823&cvv=823&amount=30">
	http://mayar.abertay.ac.uk/~1405776/payment_gateway/process_payment.php?api_key=s0m3h4rdc0d3dv41u3&token=sd73hfy$dsk&card_number=4024007110595823&cvv=823&amount=30
	</a></p>
</div>

<div>
	
	<h5>Link to remote repository</h5>

	<a href="https://github.com/janputzan/business_listing"><img alt="no image" src="../public/img/github.png" /> GitHub </a>

</div>