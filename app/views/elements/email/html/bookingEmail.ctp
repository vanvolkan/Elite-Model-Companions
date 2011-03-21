<h1>New booking submission received</h1>

<h3>Customer would like to book <?php echo $Booking[0]['EliteModel']['name']; ?></h3>
<table style="margin-top: 8px; margin-bottom: 5px;">
	<tr>
		<td width="150"><b>Title:</b></td>
		<td><?php echo $Booking['Booking']['title']; ?></td>
	</tr>
	<tr>
		<td><b>Full Name:</b></td>
		<td><?php echo $Booking['Booking']['first_name'] . " " . $Booking['Booking']['last_name']; ?></td>
	</tr>
	<tr>
		<td><b>Email Address:</b></td>
		<td><?php echo $Booking['Booking']['email_address']; ?></td>
	</tr>
	<tr>
		<td><b>Date of Birth:</b></td>
		<td><?php echo $Booking['Booking']['date_of_birth']; ?></td>
	</tr>
	<tr>
		<td><b>Contact Number:</b></td>
		<td><?php echo $Booking['Booking']['contact_number']; ?></td>
	</tr>
	<tr>
		<td><b>City/Suburb of Appointment:</b></td>
		<td><?php echo $Booking['Booking']['city_of_appointment']; ?></td>
	</tr>
	<tr>
		<td><b>Appointment Date:</b></td>
		<td><?php echo $Booking['Booking']['appointment_date']; ?></td>
	</tr>
	<tr>
		<td><b>Time of Appointment:</b></td>
		<td><?php echo $Booking['Booking']['time_of_appointment']['hour'] . ':' . $Booking['Booking']['time_of_appointment']['min'] . ' ' . $Booking['Booking']['time_of_appointment']['meridian']; ?></td>
	</tr>
	<tr>
		<td><b>Duration of Appointment:</b></td>
		<td><?php echo $Booking['Booking']['duration_of_appointment']; ?></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2"><h3>If you are staying in a Hotel:</h3></td>
	</tr>
	<tr>
		<td><b>Hotel Name:</b></td>
		<td><?php echo $Booking['Booking']['hotel_name']; ?></td>
	</tr>
	<tr>
		<td><b>Is your Hotel reservation confirmed?:</b></td>
		<td><?php echo $Booking['Booking']['hotel_reserved']; ?></td>
	</tr>
	<tr>
		<td><b>How did you hear about us?:</b></td>
		<td><?php echo $Booking['Booking']['how_heard']; ?></td>
	</tr>
	<tr>
		<td><b>Additional Information:</b></td>
		<td><?php echo $Booking['Booking']['additional_information']; ?></td>
	</tr>
</table>