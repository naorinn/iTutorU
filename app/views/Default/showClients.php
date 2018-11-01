<html>
	<head>

		
	</head>
	<body>
		<?php //var_dump($data['clients']); ?>

		<table>
			<tr>
				<th>First Name</th>
			
				<th>Last Name</th>
			</tr>
			<?php
				foreach ($data['clients'] as $client) {
					echo "<tr><td>$client->first_name</td><td>$client->last_name</td><td>to be implemented</td></tr>";
				}

			?>
		</table>
	</body>
</html>