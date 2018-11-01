<html>
	<head>

		
	</head>
	<body>
		<?php //var_dump($data['clients']); ?>


		<dl>
			<dt>First Name</dt>
			<dd><?php echo $data['client']->first_name; ?></dd>
			<dt>Last Name</dt>
			<dd><?php echo $data['client']->last_name; ?></dd>
		</dl>
		<table>
			<tr>
				<th>Type</th>
			
				<th>Information</th>

				<th>Action</th>
			</tr>
			<?php
				foreach ($data['contacts'] as $contacts) {
					echo "<tr><td>$contacts->type</td><td>$contacts->information</td><td>To be implemented</td></tr>";
				}
			?>
		</table>
	</body>
</html>