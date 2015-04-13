<?php 

	if (count($users->content) > 0) {

		echo '<table><thead><tr>';
		echo '<th>id</th>';
		echo '<th>Name</th>';
		echo '<th>Email</th>';
		echo '<th>No Businesses</th>';
		echo '<th>Actions</th>';
				
		foreach($users->content as $user) {

			echo '<tr><td>';
			echo $user->id;
			echo '</td><td><b>';
			echo $user->first_name . ' ' . $user->last_name;
			echo '</b></td><td>';
			echo $user->email;
			echo '</td><td>';
			echo count($businessModel->findAll('user_id', $user->id));
			echo '</td><td>';
			echo 'edit - delete';
			echo '</td></tr>';
		}

		echo '</tbody></table>';

		/* Pagination */
		echo '<div class="pagination">';
		echo $users->links();
		echo '</div>';
		
	} else {

		echo '<div>No results to show</div>';
	}

?>
