<?php 

	if (count($payments->content) > 0) {

		echo '<table><thead><tr>';
		echo '<th>id</th>';
		echo '<th>Business</th>';
		echo '<th>Amount</th>';
		echo '<th>User Email</th>';
		echo '<th>Date</th>';
				
		foreach($payments->content as $payment) {

			$business = $businessModel->findOne($payment->business_id);

			echo '<tr><td>';
			echo $payment->id;
			echo '</td><td><a href="businessPage.php?business_id='. $business->id .'">';
			echo $business->name;
			echo '</td><td>';
			echo $payment->amount;
			echo '</a></td><td>';
			echo $userModel->findOne($business->user_id)->email;
			echo '</td><td>';
			echo $payment->date_time;
			echo '</td></tr>';
		}

		echo '</tbody></table>';

		/* Pagination */
		echo '<div class="pagination">';
		echo $payments->links();
		echo '</div>';
		
	} else {

		echo '<div>No results to show</div>';
	}

?>
