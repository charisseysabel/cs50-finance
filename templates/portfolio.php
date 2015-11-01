<!--

<div>
    <img alt="Under Construction" src="/img/construction.gif"/>
</div>
<div>
    <a href="logout.php">Log Out</a>
</div>

-->

<!-- TABLE -->
<table class="table table-striped">
	<thead>
		<tr>
			<th> <strong>Name</strong> </th>
			<th> <strong>Symbol</strong> </th>
			<th> <strong>Shares</strong> </th>
			<th> <strong>Price</strong> </th>			
			<th> <strong>TOTAL</strong> </th>
		</tr>
	</thead>
	
	<tbody>
		<?php foreach($positions as $position): ?>
		<tr>
			<td><?= $position["name"]	?></td>
			<td><?= $position["symbol"]	?></td>		
			<td><?= $position["shares"]	?></td>
			<td>$ <?= $position["price"]	?> </td>
			<td>$ <?= $position["total"] ?></td>

		</tr>
		<?php endforeach ?>
		<tr id="cash">
			<td colspan="4">CASH</td>
			<td>$ <?= htmlspecialchars($cash)?> </td>
		</tr>
		
	</tbody>
</table>









