<div id="menu">

<?php /*********************************
   <ul>
     <li><h2 class="sidebar">Titel</h2>
        <ul>	
					<li>Inhalt</li>		
        </ul>
     </li>
   </ul>
************************************** /?>	
				
<?php /* -- Blogbeschreibung -- */
if (function_exists('sirius_blogbeschreibunganzeige')) { sirius_blogbeschreibunganzeige();} ?>

<?php /* -- Kalender -- */
if (function_exists('sirius_kalender')) { sirius_kalender();} ?>

<?php /* -- Kategorien -- */
if (function_exists('sirius_kategorien')) { sirius_kategorien();} ?>

<?php /* -- Suche -- */
if (function_exists('sirius_suche')) { sirius_suche();} ?>

<?php /* -- Letze Kommentare -- */
if (function_exists('sirius_kommentare')) { sirius_kommentare();} ?>

<?php /* -- Seiten -- */
if (function_exists('sirius_seiten')) { sirius_seiten();} ?>

<?php /* -- Blogroll -- */
if (function_exists('sirius_blogroll')) { sirius_blogroll();} ?>

<?php  /* -- Archiv -- */
if (function_exists('sirius_archiv')) { sirius_archiv();} ?>

<?php  /* -- Feeds -- */
if (function_exists('sirius_feeds')) { sirius_feeds();} ?>

<?php  /* -- Meta -- */
if (function_exists('sirius_meta')) { sirius_meta();} ?>

	

</div>
