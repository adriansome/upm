<div id="adminzone-menu">
	<a class="dropdown-toggle" id="admin-menu-toggle" role="button" data-toggle="dropdown" href="#">Adminzone <b class="caret"></b></a>
	<ul id="admin-menu" class="dropdown-menu" role="menu" aria-labelledby="admin-menu-toggle">
		<?php foreach($this->items as $item): ?>
		<li><?php echo $item ?></li>
		<?php endforeach; ?>
		<!-- <li><a tabindex="-1" data-toggle="modal" data-target="#page-management" id="page-management" class="btn btn-link" href="/page/management">Page Management</a></li>
		<li><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
		<li><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
		<li class="divider"></li>
		<li><a role="menuitem" tabindex="-1" href="#">Separated link</a></li> -->
	</ul>
</div>