<?php
  require_once('show_manage/connection.php');
  $next_query="SELECT * FROM shows WHERE CURRENT_DATE() < show_date ORDER BY show_date ASC LIMIT 1";
  $next_show=fetch_record($next_query);
  $date=date_create($next_show['display_date']);
  $formatted_date=date_format($date, 'F jS');
?>
</div>
            
  <nav id="nav-side">
    	<h2><a href="shows.php">Next Show</a></h2>
       <p><?= $formatted_date ?> <br> @ <?= $next_show['venue'] ?><br/><?= $next_show['details'] ?></p>

       <h2>Audio</h2>
       <div class ="audio-side">
       <iframe style="border: 0; width: 100%; height: 42px;" src="https://bandcamp.com/EmbeddedPlayer/track=4280437884/size=small/bgcol=333333/linkcol=de430a/artwork=none/transparent=true/" seamless><a href="http://sweetjesus.bandcamp.com/track/getting-over-2">Getting Over by sweet jesus</a></iframe>
       </div>
       <h2><!-- <a href="contact.php"> -->Contact<!-- </a> --></h2>
       <p class="email">email:<br/><a href="mailto:sweetjesuslovesyou@gmail.com">sweetjesuslovesyou@<br/>gmail.com</a></p>
       
       <h2><a href="media-photos.php">Photos</a></h2>
       <p class="variation"><img src="images/nav-side.jpg" alt="bobby and ryan"/></p> 
            
                
  </nav>  