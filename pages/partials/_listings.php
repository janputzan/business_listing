<?php 

	if (count($listings->content) > 0) {

		echo '<table><thead><tr>';
		echo '<th>id</th>';
		echo '<th>Name</th>';
		echo '<th>User Email</th>';
		echo '<th>Status</th>';
		echo '<th>Package</th>';
		echo '<th>Payment</th>';
		echo '</tr></thead><tbody>';
				
		foreach($listings->content as $business) {

			$className = $business->is_premium ? 'tr-premium' : '';

			echo '<tr class="' . $className .'"><td>';
			echo $business->id;
			echo '</td><td><a href="businessPage.php?business_id='. $business->id .'">';
			echo $business->name;
			echo '</a></td><td>';
			echo $userModel->findOne($business->user_id)->email;
			echo '</td><td>';
			if (Auth::is_admin()) {

				echo $business->is_active ? '<a class="status status-active" href="../scripts/makeActive.php?business_id='.$business->id.'&status=0"><i class="mdi-image-flash-on"></i> active </a>' : '<a class="status status-inactive" href="../scripts/makeActive.php?business_id='.$business->id.'&status=1"><i class="mdi-image-flash-off"></i> inactive </a>';
			
			} else {

				echo $business->is_active ? '<span class="status status-active"><i class="mdi-image-flash-on"></i> active </span>' : '<span class="status status-inactive" ><i class="mdi-image-flash-off"></i> inactive </span>';
			}
			echo '</td><td>';
			echo $business->is_premium ? '<span class="premium-package">premium</span>' : '<span class="standard-package">standard</span>';
			echo '</td><td>';
			echo $paymentModel->isPaid($business->id) ? '<span class="paid">paid</span>' : '<span class="unpaid">unpaid</span>';
			echo '</td></tr>';
		}

		echo '</tbody></table>';

		/* Pagination */
		echo '<div class="pagination">';
		echo $listings->links();
		echo '</div>';
		
	} else {

		echo '<div>No results to show</div>';
	}

?>
