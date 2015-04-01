<table>
	
	<thead>
		
		<tr>
			<th>id</th>
			<th>Name</th>
			<th>Email</th>
			<th>No. Businesses</th>

		</tr>

	</thead>

	<tbody>
		
		<?php 

			$usersObject = new User;

			$users = $usersObject->paginate(3);

			foreach($users->content as $user) {

				echo '<tr>
						<td>'.$user->id.'</td>
						<td>'.$user->first_name.' '.$user->last_name.'</td>
						<td>'.$user->email.'</td>
						<td>n/a</td>
					</tr>';
			}

		?>

	</tbody>
</table>

<div class="pagination">

	<?php
		
		echo $users->links();

	?>

</div>