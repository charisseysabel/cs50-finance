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
			<th>Name</th>
			<th>Symbol</th>
			<th>Shares</th>
			<th>Price</th>			
			<th>TOTAL</th>
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
			<td>$ <?= $totalCash ?></td>
		</tr>

		
	</tbody>
</table>









