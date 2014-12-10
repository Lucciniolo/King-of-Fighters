# Partage sur les reseaux sociaux

	<div>
	    <p><i>Vous avez aimé cet article ? Alors partagez-le avec vos amis en cliquant sur les boutons ci-dessous :</i></p>
	    <div>
	        <a target="_blank" title="Twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&via=korben" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;"><img src="http://korben.info/wp-content/themes/korben2013/hab/twitter_icon.png" alt="Twitter" /></a>
	        <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;"><img src="http://korben.info/wp-content/themes/korben2013/hab/facebook_icon.png" alt="Facebook" /></a>
	        <a target="_blank" title="Google +" href="https://plus.google.com/share?url=<?php the_permalink(); ?>&hl=fr" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');return false;"><img src="http://korben.info/wp-content/themes/korben2013/hab/gplus_icon.png" alt="Google Plus" /></a>
	        <a target="_blank" title="Linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');return false;"><img src="http://korben.info/wp-content/themes/korben2013/hab/linkedin_icon.png" alt="Linkedin" /></a>
	        <a target="_blank" title="Envoyer par mail" href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>" rel="nofollow"><img src="http://korben.info/wp-content/themes/korben2013/hab/email_icon.png" alt="email" /></a>
	    </div>
	    <div>
	        <a target="_blank" title="Flattr !" href="https://flattr.com/submit/auto?user_id=Korben&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&description=<?php bloginfo('description'); ?>&language=fr_FR&tags=blog&category=text" rel="nofollow"><img src="http://korben.info/wp-content/themes/korben2013/hab/flattr_icon.png" alt="Flattr !" /></a>
	    </div>
	</div>

# Partager sur Facebook

Cela peut se faire fait Via l'URL :

	https://www.facebook.com/dialog/feed?
	  app_id=145634995501895
	  &display=popup&caption=An%20example%20caption 
	  &link=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2F
	  &redirect_uri=https://developers.facebook.com/tools/explorer

**Documentation officielle** : https://developers.facebook.com/docs/sharing/reference/feed-dialog/v2.2?locale=fr_FR

Mais il faut avoir une application Facebook ... Pour avoir le app_id.


# Para