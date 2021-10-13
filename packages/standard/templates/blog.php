<# 

This template extends the "post.php" template.
The "main" snippet is overriden to actually change the content of the page body.

Note that the order of the block editor fields can be defined by simply adding the
in those variables in the correct order to a comment block in the header of a template as follows:

@{ +hero }
@{ +main }

#>
<@ snippet main @>
	<main class="content uk-block">
		<@ elements/content.php @>
		<@ elements/pagelist_config.php @>
		<@~ if not @{ checkboxHideFilters } @>
			<div id="list" class="am-block buttons-stacked uk-margin-bottom">
				<@ elements/filters.php @>
				<@ elements/clear_search.php @>
			</div>
		<@ end ~@>
		<section <@ if @{ :pagelistDisplayCount } < 3 @>class="am-block"<@ end @>>
			<@ if @{ checkboxUseAlternativePagelistLayout } @>
				<@ blocks/pagelist/blog_alt.php @>
			<@ else @>
				<@ blocks/pagelist/blog.php @>
			<@ end @>
		</section>
		<@ elements/pagination.php @>
	</main>
<@ end @>
<@ post.php @>