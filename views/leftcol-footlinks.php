<ul>
	<li class="<?php echo get_query_var('name')=='about' ? 'active' : '' ?>">
        <a href="/about">About</a>
    </li>
	<li class="<?php echo get_query_var('name')=='pollinators' ? 'active' : '' ?>">
        <a href="/pollinators">Pollinators</a>
    </li>
	<li>
        <a href="mailto:<?php echo get_option('admin_email') ?>">Contact</a>
    </li>
</ul>