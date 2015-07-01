<? include 'comp/head.php' ?>
<? include 'comp/header.php' ?>
<?

$abfrage_projekte = mysql_query("SELECT * FROM tab_entity WHERE ent_type LIKE 'h' ORDER BY ent_timestamp DESC") or die (mysql_error());
$abfrage_projekt = mysql_query("SELECT * FROM tab_projekt ORDER BY pro_id DESC LIMIT 1") or die (mysql_error());

?>
  <div class="row">
    <div class="grid-100">
      <h1>Projekte</h1>
    </div>
  </div>
  
  <? 
  if (mysql_num_rows($abfrage_projekt) == 1) {
	  while ($row = mysql_fetch_assoc($abfrage_projekt)) {
		  echo '
   <form class="ajax" method="post" action="script/language.php">
    <div class="row norm-bot">
      <div class="grid-100">
        <input class="form-helper" name="position" value="projekte_headline" />
        <input class="form-helper" name="language" value="'.$lang.'" />
        <input name="text" placeholder="Projekt Übersicht Headline" value="'; if (isset($projekte_headline)) { echo $projekte_headline; } echo '"/>
      </div>
    </div>
  </form>
 
  <form class="ajax" method="post" action="script/language.php">
    <div class="row norm-bot">
      <div class="grid-100">
        <input class="form-helper" name="position" value="projekte_text" />
        <input class="form-helper" name="language" value="'.$lang.'" />
        <textarea name="text" placeholder="Projekt Übersicht Text">'; if (isset($projekte_text)) { echo $projekte_text; } echo'</textarea>
      </div>
    </div>
  </form>

';
    
	  }
  } else {
	  echo'
	  
   <form class="ajax" method="post" action="script/language.php">
    <div class="row norm-bot">
      <div class="grid-100">
        <input class="form-helper" name="position" value="projekte_headline" />
        <input class="form-helper" name="language" value="'.$lang.'" />
        <input name="text" placeholder="Projekt Übersicht Headline" value="'; if (isset($projekte_headline)) { echo $projekte_headline; } echo '"/>
      </div>
    </div>
  </form>
 
  <form class="ajax" method="post" action="script/language.php">
    <div class="row norm-bot">
      <div class="grid-100">
        <input class="form-helper" name="position" value="projekte_text" />
        <input class="form-helper" name="language" value="'.$lang.'" />
        <textarea name="text" placeholder="Projekt Übersicht Text">'; if (isset($projekte_text)) { echo $projekte_text; } echo'</textarea>
      </div>
    </div>
  </form>
  
  ';
  }
  ?>
    
  <div class="row">
    <div class="grid-100">
      <a href="script/add_article.php"><div class="button-fill-blue">neues Projekt</div></a>
    </div>
  </div>
  <div id="projekte">
      <?
	  
	  if (mysql_num_rows($abfrage_projekte) >= 1) {
	
		  mysql_data_seek($abfrage_projekte, 0);

		  while ($row = mysql_fetch_assoc($abfrage_projekte)) {
			  $article_id = $row['ent_article'];
			  $header_id = $row['ent_fk'];
			  if (!empty ($header_id)) {
				  $abfrage_headlines = mysql_query("SELECT * FROM tab_header WHERE hea_id LIKE '$header_id'") or die (mysql_error());
				  while ($row = mysql_fetch_assoc($abfrage_headlines)) {
						echo '<div class="row">
		<div class="grid-100 overview-list"><div class="title">'.$row['hea_headline_de'].'</div><a href="projekt.php?id='.$article_id.'&lang='.$lang.'"><div class="edit">&nbsp;</div></a><div class="delete" data-attrid="'.$article_id.'" >&nbsp;</div><!-- <a href="projekt.php?id='.$article_id.'"><div class="invisible">&nbsp;</div></a> --></div>
	  </div>';
				  }
			  } else {
				  echo '<div class="row">
		<div class="grid-100 overview-list"><div class="title">das unbenanntes Projekt</div><a href="projekt.php?id='.$article_id.'&lang='.$lang.'"><div class="edit">&nbsp;</div></a><a href="projekt.php?id='.$article_id.'"><div class="delete" data-attrid="'.$article_id.'">&nbsp;</div></a><!-- <a href="projekt.php?id=10"><div class="visible">&nbsp;</div></a> --></div>
	  </div>';
			  }
		  }
	  } else {
			echo '<div class="row"><div class="grid-100">Keine Projekte vorhanden!</div></div>';  
	  }
	  ?>
  </div>
<script>
</script>

      
<? include 'comp/foot.php' ?>
