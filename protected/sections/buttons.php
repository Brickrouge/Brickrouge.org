<?php

namespace Brickrouge;

?>

<style type="text/css">
#buttons table td {
	vertical-align: middle;
}
</style>

<section id="buttons">
	<div class="page-header">
    <h1>Buttons</h1>
	</div>

	<p>The <code>Button</code> class is used to create buttons. Their label is translated in the
	<code>button</code> scope. The initial type of the button is <code>button</code>.</p>

	<p>The <code>.btn</code> class can be used to make elements such as
	the <code>&lt;a&gt;</code> element look like buttons. Compared to
	<a href="http://twitter.github.com/bootstrap/" target="_blank">Bootstrap</a>,
	<code>&lt;button&gt;</code> elements don't require the <code>.btn</code> class to be styled.</p>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Button</th>
        <th>Code</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?= new Button('Default'); ?></td>
        <td><pre class="prettyprint">&lt;?= new Button('Default');</pre></td>
        <td>Standard gray button with gradient</td>
      </tr>
      <tr>
        <td><?= new Button('Primary', array('class' => 'btn-primary')); ?></td>
        <td><pre class="prettyprint">&lt;?= new Button('Primary', array('class' =&gt; 'btn-primary'));</pre></td>
        <td>Provides extra visual weight and identifies the primary action in a set of buttons</td>
      </tr>
      <tr>
        <td><?= new Button('Info', array('class' => 'btn-info')); ?></td>
        <td><pre class="prettyprint">&lt;?= new Button('Info', array('class' =&gt; 'btn-info'));</pre></td>
        <td>Used as an alternate to the default styles</td>
      </tr>
      <tr>
        <td><?= new Button('Success', array('class' => 'btn-success')); ?></td>
        <td><pre class="prettyprint">&lt;?= new Button('Success', array('class' =&gt; 'btn-success'));</pre></td>
        <td>Indicates a successful or positive action</td>
      </tr>
      <tr>
        <td><?= new Button('Warning', array('class' => 'btn-warning')); ?></td>
        <td><pre class="prettyprint">&lt;?= new Button('Warning', array('class' =&gt; 'btn-warning'));</pre></td>
        <td>Indicates caution should be taken with this action</td>
      </tr>
      <tr>
        <td><?= new Button('Danger', array('class' => 'btn-danger')); ?></td>
        <td><pre class="prettyprint">&lt;?= new Button('Danger', array('class' =&gt; 'btn-danger'));</pre></td>
        <td>Indicates a dangerous or potentially negative action</td>
      </tr>
    </tbody>
  </table>

  <div class="row">
    <div class="span4">
      <h3>Multiple sizes</h3>
      <p>Fancy larger or smaller buttons? Have at it!</p>
      <p>
        <?= new Button('Primary action', array('class' => 'btn-large btn-primary')) . PHP_EOL . new button('Action', array('class' => 'btn-large')); ?>
      </p>
      <pre class="prettyprint">&lt;?= new Button('Primary action', array('class' =&gt; 'btn-large btn-primary')) . PHP_EOL . new Button('Action', array('class' =&gt; 'btn-large'));</pre>
      <p>
        <?= new Button('Primary action', array('class' => 'btn-small btn-primary')) . PHP_EOL . new button('Action', array('class' => 'btn-small')); ?>
      </p>
      <pre class="prettyprint">&lt;?= new Button('Primary action', array('class' =&gt; 'btn-small btn-primary')) . PHP_EOL . new Button('Action', array('class' =&gt; 'btn-small'));</pre>
    </div>
    <div class="span8">
      <h3>Disabled state</h3>
      <p>For buttons that are not active or are disabled by the app for one reason or another, use the disabled state. That’s <code>.disabled</code> for links and <code>:disabled</code> for <code>&lt;button&gt;</code> elements.</p>
      <p>
        <?= new A('Primary action', '#', array('class' => 'btn btn-large btn-primary disabled')) . PHP_EOL . new A('Action', '#', array('class' => 'btn btn-large disabled')); ?>
		</p>
		<pre class="prettyprint">&lt;?= new A('Primary action', '#', array('class' =&gt; 'btn btn-large btn-primary disabled')) . PHP_EOL . new A('Action', '#', array('class' =&gt; 'btn btn-large disabled'));</pre>
      <p>
        <?= new Button('Primary action', array('class' => 'btn-large btn-primary', 'disabled' => true)) . PHP_EOL . new Button('Action', array('class' => 'btn-large', 'disabled' => true)); ?>
       </p>
        <pre class="prettyprint">&lt;?= new Button('Primary action', array('class' =&gt; 'btn-large btn-primary', 'disabled' =&gt; true)) . PHP_EOL . new Button('Action', array('class' =&gt; 'large', 'disabled' =&gt; true));</pre>
    </div>
  </div>

  <br>

</section>