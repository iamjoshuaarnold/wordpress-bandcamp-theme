<?php
//get_header(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />


    
    
    
    <title>BFF</title>
    
    <meta name="Description" content=""/>
    
     
         
        
            
        
    
    <link rel="shortcut icon" href="http://bandcamp.com/files/33/90/3390512577-1.jpg"/>
    
    
    
        <meta name="title" content="The Mossy Rock Album, by BFF" />
        <meta name="description" content=""/>
        
        <link rel="image_src" href="http://bandcamp.com/files/33/90/3390512577-1.jpg" />
        
    
     

     
      
    
    <!--
    <link type="text/css" rel="stylesheet" href="http://bandcamp.com/tmpdata/cache/container_0b31041f2e820c868a4022570db1a41f.css" >
	-->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  

        
            <link rel="alternate" type="application/rss+xml"  title="BFF"  href="/feed" />
            
                <link rel="alternate" type="application/rss+xml"  title="BFF: The Mossy Rock Album"  href="/feed/album/the-mossy-rock-album" />
            
            
        
    

</head>
<body class="gecko">


    
    
    

    



<div id="pgBd" class="yui-skin-sam">
 
<?php do_action('bandcamp_headerimg'); ?>

<div id="colmask">
	<div id="colmid">
		<div id="colright">
			<div id="col1wrap">
				<div id="col1pad">
					<div id="col1">
						<?php do_action('bandcamp_content'); ?>
						<!-- Column 1 start -->
						<img style="float: right; margin-left: 10px;" src="http://bandcamp.com/files/72/96/729605302-1.jpg" alt="The Mossy Rock Album Cover Art"/>
						
						
						
						<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>
						
						<!-- Column 1 end -->

					</div>
				</div>

			</div>
			<div id="col2">
				<!-- Column 2 start -->
				<?php get_sidebar(); ?>
				<!-- Column 2 end -->
			</div>
			<div id="col3">
				<!-- Column 3 start -->
				<!--<div id="rightColumn" class="rightColumn">-->



<ul id="discography" title="Discography">
    
        
        
            
            
    <li>
        <div>
        
            <div class="thumbthumb">
                <a href="/album/the-mossy-rock-album"><img class="thumbthumb" src="http://bandcamp.com/files/33/90/3390512577-1.jpg" alt="The Mossy Rock Album Cover Art"/></a>

          
        
        
            </div>
        
        </div>
        <div class="trackTitle"><a href="/album/the-mossy-rock-album">The Mossy Rock Album</a></div>
        <div class="trackYear secondaryText">Jan 2009</div>
    </li>
    
    
    
</ul>
				<!-- Column 3 end -->

			</div>
		</div>
	</div>
</div>

<div style="clear: both;"></div>
</div>

<div id="footer">
<div id="pgFt">

<a href="http://bandcamp.com?from=logo"><div id="footerLogo" alt="Bandcamp logo"><span class="hiddenAccess">Bandcamp</span></div></a>
Wordpress Bandcamp Theme

<script type="text/javascript">  
if ((typeof Y != "undefined") && (typeof Stats != "undefined")) {
    Y.util.Event.onDOMReady(function() {
        Stats.record({kind:"click", click:"footer_logo_served"});
    });
}
</script>

<ul id="legal" class="horizNav">
    
    <li id="login"><a href="https://bandcamp.com/login">artist login</a></li>
    
    <li><a href="http://bandcamp.com/terms_of_use">terms of use</a></li>
    <li><a href="http://bandcamp.com/privacy">privacy</a></li>

    <li><a href="http://bandcamp.com/copyright">copyright policy</a></li>
    
    <li><a href="http://twitter.com/bandcampstatus" target="_blank">status</a></li>    
    
</ul>
&nbsp; 


</div>
</div>








</div>




</body>
</html>



<?php // get_footer(); ?>
