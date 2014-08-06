<section id="groups">
<div class="page-header">
	<h1>Groups <small>Grouping elements with relative order</small></h1>
</div>

<h2>Group elements</h2>

<div class="row">
	<div class="span4">
		<p>Usually elements within a form are grouped according to the <code>GROUP</code>
		attribute. But groups can be as easilly created using the <code>Group</code>
		class.</p>

		<p>The <code>Group</code> class wraps its children in a <code>FIELDSET</code> element,
		an optionnal legend can be used to provide the group with a title. Each child is wrapped
		in a <code>DIV.field</code> element and the form label is distinguished from the input
		itself.</p>

		<p>The <code>Group</code> class supports the <code>WEIGHT</code> attribute and displays
		ordered children.</p>
	</div>

	<div class="span8">
		<?php display_example('groups-group') ?>
	</div>
</div>

</section>