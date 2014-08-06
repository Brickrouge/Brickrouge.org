<div class="container">
	<footer class="footer">
		<p class="pull-right"><a href="#">Back to top</a></p>
		<p>Developped by <a href="http://weirdog.com">Olivier Laviale</a>
		(<a href="http://twitter.com/olvlvl" target="_blank">@olvlvl</a>), leveraging the awesomeness
		of <a href="http://twitter.github.com/bootstrap/" target="_blank">Bootstrap</a>
		and <a href="http://mootools.net" target="_blank">MooTools</a>.</p>
		<p>Brickrouge is licensed under the <a href="http://en.wikipedia.org/wiki/BSD_licenses" target="_blank">Simplified BSD license</a>.</p>
	</footer>
</div>

<a href="http://github.com/Brickrouge/Brickrouge" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0; z-index: 10000" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js"></script>
<script type="text/javascript" src="<?= Brickrouge\Document::resolve_url(Brickrouge\ASSETS . 'brickrouge.js') ?>"></script>
<script type="text/javascript" src="/assets/google-code-prettify/prettify.js"></script>

<script type="text/javascript">

window.addEvent
(
	'domready', function() { prettyPrint() }
);

$$('.dropdown-menu li').addEvent('click', function (ev) {
	ev.preventDefault()
})

<?php if (strpos(__DIR__, '/media/') === false): ?>

  var _gaq = _gaq || []

  _gaq.push(['_setAccount', 'UA-8673332-4'])
  _gaq.push(['_trackPageview'])

  !function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  } ()

<?php endif ?>

</script>