<section id="forms">
	<div class="page-header"><h1>Forms</h1></div>

	<h2>Form controls</h2>

	<p>Creating a form is super easy with instances of <code>Form</code>, <code>Element</code>,
	<code>Text</code>, …</p>

	<?php display_example('forms-controls') ?>

	<h2>Form validation</h2>

	<p>The validation state of input elements is defined by the <code>STATE</code> attribute. The
attribute is updated when a form is validated. The attribute may be used by groups to highlight
elements. Possible values are <code><em>null</em></code>, <code>STATE_DANGER</code>,
<code>STATE_SUCCESS</code>, and <code>STATE_WARNING</code>.</p>

	<pre><code class="lang-php">&lt;?php echo new Text([

    Group::LABEL => "Input with warning",
    Element::INLINE_HELP => "Something may have gone wrong",
    Element::STATE => Element::STATE_WARNING

]);</code></pre>

	<?php display_example('forms-validation') ?>

	<h2>Prepend &amp; append inputs</h2>
	<p><code>Text</code> inputs&mdash;with appended or prepended text&mdash;provide an easy way to give more
	context for your inputs. Great examples include the <code>@</code> sign for Twitter usernames or <code>€</code> for
	finances. The <code>ADDON</code> attribute defines the add-on text, the
	<code>ADDON_POSITION</code> attribute to define its position.</p>

	<?php display_example('forms-addons') ?>
</section>
