<h1>You have received a contact submission</h1>
<table style="margin-top: 8px;">
	<tr>
		<td width="100"><b>Full Name</b></td>
		<td><p><?php echo $Contact['Contact']['full_name']; ?></p></td>
	</tr>
	<tr>
		<td><b>Email</b></td>
		<td><p><?php echo $Contact['Contact']['email']; ?></p></td>
	</tr>
	<?php if (isset($Contact['Contact']['contact_number']) && !empty($Contact['Contact']['contact_number'])): ?>
	<tr>
		<td><b>Contact Number</b></td>
		<td><p><?php echo $Contact['Contact']['contact_number']; ?></p></td>
	</tr>
	<?php endif; ?>
	<tr>
		<td colspan="2"><b>Enquiry</b></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo $Contact['Contact']['enquiry']; ?></p></td>
	</tr>
</table>