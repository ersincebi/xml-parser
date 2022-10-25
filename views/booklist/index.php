<input type="text" id="search-bar" onkeyup="searchOnKeyUp()" placeholder="Search for names..">

<table id="data-table">
	<thead>
		<tr class="header">
			<th>Author Name</th>
			<th>Book Name</th>
		</tr>
	</thead>
	<tbody id="data-rows">
		<?php foreach ($this->list as $row): ?>
		<tr>
			<td><?=$row->author?></td>
			<td><?= ($row->book) !== null ? ($row->book) : '(no books found)' ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
