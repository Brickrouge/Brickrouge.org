<?php

require $_SERVER['DOCUMENT_ROOT'] . '/startup.php';

?><!DOCTYPE html>
<html>
<meta charset="utf-8" />
<title>Brickrouge, building webapps and sites</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?= Brickrouge\Document::resolve_url(Brickrouge\ASSETS . 'brickrouge.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?= Brickrouge\Document::resolve_url(Brickrouge\ASSETS . 'brickrouge-responsive.css') ?>" type="text/css" />
<link rel="stylesheet" href="/assets/google-code-prettify/prettify.css" type="text/css" />
<link rel="stylesheet" href="/assets/page.css" type="text/css" />

<link rel="stylesheet" href="calendar.css" type="text/css" />
</head>
<body>

<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a href="/" class="brand">Brickrouge</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li><a href="/docs/">Docs</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<section class="container">
<div class="alert alert-warning">This is work in progress !</div>
</section>

<section id="calendar" class="container">
	<div class="page-header">
	<h1>Calendar</h1>

	<p>Brickrouge provides classes that can be used to create highly customizable and fuctionnal
	calendars, which are automatically accessible to screen reader and keyboard only users.</p>

	<p>Calendars are localized using the <a href="http://mootools.net/docs/more/Locale/Locale" target="_blank">MooTools Locale interface</a>.</p>

	</div>

	<div class="row">
		<div class="span4">
			<h2>First, there's a month…</h2>

			<p>The <code>Brickrouge.Calendar.Month</code> class is used to handle and render months.
			Give it a <code>TABLE</code> or <code>TBODY</code> element and it will happily render
			the month of a given date.</p>
		</div>

		<div class="span8">
			<p>The <code>update</code> event is fired when the date is updated, which only happens
			when the keyboard is used to browse dates. The <code>change</code> event is fired when
			the date is validated, either by clicking on a day cell or by pressing <kbd>enter</kbd>
			or <kbd>space</kbd>.</p>

			<p id="standalone-calendar-month-debug"><em>No event yet. Click on any day, don't be afraid!</em></p>

			<table id="standalone-calendar-month" class="calendar" role="grid" aria-labelledby="month">
				<tbody class="calendar-month" tabindex="0">
					<tr><td>Javascript must be activated.</td></tr>
				</tbody>
			</table>

			<pre class="prettyprint linenums"><?php

echo Brickrouge\escape(<<<EOT
<table id="standalone-calendar-month" class="calendar" role="grid" aria-labelledby="month">
	<tbody class="calendar-month" tabindex="0">
		<tr><td>Javascript must be activated.</td></tr>
	</tbody>
</table>
EOT

)

?></pre>

	</div>
	</div>

	<div class="row">
		<div class="span4">
		<h3>Navigation shortcuts</h3>

		<p>The element can be controled using the keyboard. The following combinaison are recognized:</p>
		</div>
		<div class="span8">
			<table class="table table-bordered">
				<tr>
					<th><kbd>right</kbd></th><td>Next day</td>
					<th><kbd>shift+right</kbd></th><td>Next month</td>
					<th><kbd>alt+right</kbd></th><td>Next year</td>
				</tr>

				<tr>
					<th><kbd>left</kbd></th><td>Previous day</td>
					<th><kbd>shift+left</kbd></th><td>Previous month</td>
					<th><kbd>alt+left</kbd></th><td>Previous year</td>
				</tr>

				<tr>
					<th><kbd>up</kbd></th><td>Previous week</td>
					<th><kbd>pageup</kbd></th><td>Previous month</td>
					<th><kbd>shift+pageup</kbd></th><td>Previous year</td>
				</tr>

				<tr>
					<th><kbd>down</kbd></th><td>Next week</td>
					<th><kbd>pagedown</kbd></th><td>Next month</td>
					<th><kbd>shift+pagedown</kbd></th><td>Next year</td>
				</tr>

				<tr>
					<th><kbd>t</kbd></th><td colspan="5">Today</td>
				</tr>

				<tr>
					<th><kbd>m</kbd></th><td>Next month</td>
					<th><kbd>y</kbd></th><td>Next year</td>
					<th><kbd>alt+y</kbd></th><td>Next 10 years</td>
				</tr>

				<tr>
					<th><kbd>shift+m</kbd></th><td>Previous month</td>
					<th><kbd>shift+y</kbd></th><td>Previous year</td>
					<th><kbd>alt+shift+y</kbd></th><td>Previous 10 years</td>
				</tr>

				<tr><th><kbd>enter|space</kbd></th><td colspan="5">Select date</td></tr>

				<tr><th style="vertical-align: top"><kbd>e</kbd></th><td colspan="5">Opens the
				date editor, which lets you enter the year, month and day using text inputs.
				Note: This shortcut is only available with the calendar element.</td></tr>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="span4">
			<h2>… then a calendar</h2>

			<p> The <code>Brickrouge.Calendar</code> class is used to create calendars. A <code>TABLE</code>
			element is required to setup the calendar. The <code>CAPTION</code> element of the table
			contains the controls and the <code>THEAD</code> element contains the day names.</p>

			<p>The <code>data-decrement</code> and <code>data-increment</code> attributes are used
			to decrement and increment the date. <code>data-increment="month"</code> increments the
			month and <code>data-increment="year"</code>
			increments the month. The <code>data-increment-amount</code> and <code>data-decrement-amount</code>
			attributes can be used to specify the amount of increment/decrement, which defaults to 1.</p>
		</div>

		<div class="span8">
			<table id="calendar-edit-date" class="calendar" role="grid" aria-labelledby="month">
				<caption>
					<span class="date">
						<span class="browse prev" data-decrement="month">←</span>
						<span class="name" data-edit="date">
						<span class="month"><span class="name">&nbsp;</span></span>
						<span class="year"><span class="name">&nbsp;</span></span>
						</span>
						<span class="browse next" data-increment="month">→</span>
					</span>
				</caption>

				<thead>
					<tr class="calendar-weekdays">
						<th class="calendar-weekcount dummy">W</th>
						<th class="calendar-weekday">Mo</th>
						<th class="calendar-weekday">Tu</th>
						<th class="calendar-weekday">We</th>
						<th class="calendar-weekday">Th</th>
						<th class="calendar-weekday">Fr</th>
						<th class="calendar-weekday">Sa</th>
						<th class="calendar-weekday">Su</th>
					</tr>
				</thead>

				<tbody class="calendar-month" tabindex="0">
					<tr><td colspan="8">Javascript must be activated.</td></tr>
				</tbody>
			</table>

			<pre class="prettyprint linenums"><?php

echo Brickrouge\escape(<<<EOT
<table id="calendar-edit-date" class="calendar" role="grid" aria-labelledby="month">
	<caption>
		<span class="date">
			<span class="browse prev" data-decrement="month">←</span>
			<span class="name" data-edit="date">
			<span class="month"><span class="name">&nbsp;</span></span>
			<span class="year"><span class="name">&nbsp;</span></span>
			</span>
			<span class="browse next" data-increment="month">→</span>
		</span>
	</caption>

	<thead>
		<tr class="calendar-weekdays">
			<th class="calendar-weekcount">W</th>
			<th class="calendar-weekday">Mo</th>
			<th class="calendar-weekday">Tu</th>
			<th class="calendar-weekday">We</th>
			<th class="calendar-weekday">Th</th>
			<th class="calendar-weekday">Fr</th>
			<th class="calendar-weekday">Sa</th>
			<th class="calendar-weekday">Su</th>
		</tr>
	</thead>

	<tbody class="calendar-month" tabindex="0">
		<tr><td colspan="8">Javascript must be activated.</td></tr>
	</tbody>
</table>
EOT

)

?></pre>

			<pre class="prettyprint linenums">var calendar = new Brickrouge.Calendar('calendar-edit-date')</pre>
		</div>
	</div>



	<div class="row">
		<div class="span4">
			<h3>Markup is optional</h3>

			<p>The <code>Brickrouge.Calendar.from()</code> method is used to create
			calendars from options, without requiring an existing markup.</p>
		</div>

		<div class="span8">
			<div id="calendar-placeholder"></div>

			<pre class="prettyprint">&lt;div id="calendar-placeholder"&gt;&lt;/div&gt;</pre>

<pre class="prettyprint linenums">
var calendar = Brickrouge.Calendar.from({ noWeekNumber: true, noDayNames: true })

calendar.element.inject('calendar-placeholder')
</pre>
		</div>
	</div>

	<div class="row">
		<div class="span4">
		<h2>Date layouts and editors</h2>

		<p>Date editors are use to enter dates manually, which can be quite handy when you need to
		enter the birthday of Paul Atreides (10175 AG).</p>

		<p>The <code>data-edit</code> attribute is used to specify the editor to use. The
		following values are supported: <code>date</code>, <code>year</code>, <code>month</code>
		and <code>day</code>.</p>

		<p>Calendars usually use the <code>date</code> editor, but the calendar here
		against is using two separate editors for its <code>month</code> and
		<code>year</code>.</p>

		<div class="alert alert-info"><strong>Remember:</strong> The shortcut <kbd>e</kbd>
		always brings up the <em>date</em> editor.</div>

		</div>

		<div class="span8">
			<table id="calendar-edit-month-year" class="calendar" role="grid" aria-labelledby="month">
				<caption>
					<span class="month">
						<span class="browse prev" data-decrement="month">←</span>
						<span class="name" data-edit="month">&nbsp;</span>
						<span class="browse next" data-increment="month">→</span>
					</span>

					<span class="year">
						<span class="browse prev" data-decrement="year">←</span>
						<span class="name" data-edit="year">&nbsp;</span>
						<span class="browse next" data-increment="year">→</span>
					</span>
				</caption>

				<thead>
					<tr class="calendar-weekdays">
						<th class="calendar-weekcount dummy">W</th>
						<th class="calendar-weekday">Mo</th>
						<th class="calendar-weekday">Tu</th>
						<th class="calendar-weekday">We</th>
						<th class="calendar-weekday">Th</th>
						<th class="calendar-weekday">Fr</th>
						<th class="calendar-weekday">Sa</th>
						<th class="calendar-weekday">Su</th>
					</tr>
				</thead>

				<tbody class="calendar-month" tabindex="0">
					<tr><td colspan="8">Javascript must be activated.</td></tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="span4">
			<h3>Exemple markup</h3>

			<p>This is a markup exemple for a separated month/year</p>
		</div>

		<div class="span8">

			<pre class="prettyprint linenums"><?php

echo Brickrouge\escape(<<<EOT
<caption>
	<span class="month">
		<span class="browse prev" data-decrement="month">←</span>
		<span class="name" data-edit="month">&nbsp;</span>
		<span class="browse next" data-increment="month">→</span>
	</span>

	<span class="year">
		<span class="browse prev" data-decrement="year">←</span>
		<span class="name" data-edit="year">&nbsp;</span>
		<span class="browse next" data-increment="year">→</span>
	</span>
</caption>
EOT

)

?></pre>
		</div>
	</div>

</section>

<section id="calendar" class="container">
	<div class="page-header">
	<h1>Datepicker</h1>

	<p>A datepicker is a calendar lovingly fitted in a popver anchored to an input element, it
	provides a nice interface to edit dates.</p>
	</div>

	<div class="row">
		<div class="span4">
			<h2>A calendar, in a popover</h2>

			<p>When the input element is focused the datepicker is opened and keyboard events
			are delegated to it so that you can navigate dates using keys and shortcuts.</p>

			<div class="alert alert-info"><strong>Remember:</strong> The shortcut <kbd>t</kbd>
			sets the date to <em>today</em>. The shortcut <kbd>esc</kbd> closes the datepicker and
			the shortcut <kbd>enter</kbd> opens it again.</div>
		</div>

		<div class="span8">
			<div class="well">
				<div class="control-group">
				<label class="controls-label">Date:</label>
				<div class="controls"><input id="calendar-anchor" type="text" /></div>
				</div>
			</div>

			<pre class="prettyprint">&lt;input id="calendar-anchor" type="text" /&gt;</pre>
			<pre class="prettyprint">new Brickrouge.Datepicker({ anchor: 'calendar-anchor' })</pre>
		</div>
	</div>

	<div class="row">
		<div class="span4">
			<h2>Automatically attachable</h2>

			<p>Datepickers are automatically attached to elements matching the
			<code>[data-editor="datepicker"]</code> selector when they are first focused.</p>
		</div>

		<div class="span4">
			<div class="well">
				<div class="control-group">
				<label class="controls-label">Date:</label>
				<div class="controls"><input type="text" data-editor="datepicker" /></div>
				</div>
			</div>

			<pre class="prettyprint">&lt;input type="text" data-editor="datepicker" /&gt;</pre>
		</div>

		<div class="span4">
			<div class="well">
				<div class="control-group">
				<label class="controls-label">Date (but no week numbers):</label>
				<div class="controls"><input type="text" data-editor="datepicker" data-no-week-number="true" /></div>
				</div>
			</div>

			<pre class="prettyprint">&lt;input type="text" data-editor="datepicker" data-no-week-number="true" /&gt;</pre>
		</div>
	</div>

	<div class="row">
		<div class="offset4 span8">
			<div class="alert alert-info">Because keyboard events are delegated to the calendar
			only when the datepicker is opened, you can use the <kbd>esc</kbd> key to close it
			and edit the date freely.</div>
		</div>
	</div>
</section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/protected/partials/footer.php' ?>

<script src="/assets/mootools-more.js" type="text/javascript"></script>
<script src="calendar.js" type="text/javascript"></script>

<script type="text/javascript">

window.addEvent('domready', function() {

	new Brickrouge.Calendar('calendar-edit-date')

	var month = new Brickrouge.Calendar.Month('standalone-calendar-month', { noWeekNumber: true })
	, monthDebug = $('standalone-calendar-month-debug')

	month.addEvents({

		update: function(date) {

			monthDebug.innerHTML = '<strong>update:</strong> ' + date.format('%Y-%m-%d')

		},

		change: function(date) {

			monthDebug.innerHTML = '<strong>change:</strong> ' + date.format('%Y-%m-%d')

		}
	})

	/* calendar-placeholder */

	var calendar = Brickrouge.Calendar.from({ noWeekNumber: true, noDayNames: true })

	calendar.element.inject('calendar-placeholder')

	/* calendar-edit-month-year */

	new Brickrouge.Calendar('calendar-edit-month-year')

	/* popover */

	new Brickrouge.Datepicker({ anchor: 'calendar-anchor' })
})

</script>

</body>
</html>