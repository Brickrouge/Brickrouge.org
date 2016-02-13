<section id="groups">
	<h1>Grouping elements</h1>

	<p>Elements may be grouped using a <code>Group</code> instance. The <code>WEIGHT</code> attribute
	may be used to specify the order in which the elements should be displayed. The weight
	may be specified as a number or a position relative to another element e.g. <code>123</code>,
	<code>before:other_element</code>, <code>after:other_element</code>. Additionally the
	<code>LEGEND</code> attribute may be used to give the group a title.</p>

	<div class="doc-example">
	<?php display_demo('groups-group') ?>
	</div>
	<?php display_source('groups-group') ?>

</section>
