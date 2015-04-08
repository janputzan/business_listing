<?php 

	if (count($listings->content) > 0) {

		echo '<table><thead><tr>';
		echo '<th>id</th>';
		echo '<th>Name</th>';
		echo '<th>User Email</th>';
		echo '<th>Status</th>';
		echo '<th>Package</th>';
		echo '</tr></thead><tbody>';
				
		foreach($listings->content as $business) {

			echo '<tr><td>';
			echo $business->id;
			echo '</td><td>';
			echo $business->name;
			echo '</td><td>';
			echo $userModel->findOne($business->user_id)->email;
			echo '</td><td>';
			echo $business->is_active ? 'active' : 'inactive';
			echo '</td><td>';
			echo $business->is_premium ? 'premium' : 'standard';
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
