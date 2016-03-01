<?php include('includes/header.php'); ?>

<body id="shows">

<?php include('includes/nav-main.php'); 
    require_once('show_manage/connection.php');
    $past_query="SELECT * FROM shows WHERE CURRENT_DATE() > show_date ORDER BY show_date DESC";
    $past_shows=fetch_all($past_query);

    $future_query="SELECT * FROM shows WHERE CURRENT_DATE() < show_date ORDER BY show_date ASC";
    $future_shows=fetch_all($future_query);
    
?>


    <h3 class='titles'>Upcoming Shows</h3>            
	<table id="show-table">
    	<tr>
		    <th class="date">Date</th>
            <th>Venue</th>
            <th>Details</th>
		</tr>
        <?php
            $counter=0;
            foreach($future_shows as $show)
            {
                $create=date_create($show['display_date']);
                $show_date=date_format($create, 'm/d/Y');
                $counter ++;
                if($counter%2==0)
                {
                    $row_count='even';
                }
                else
                {
                    $row_count='odd';
                }
        ?> 
            <tr class='<?= $row_count ?>'>
                <td class="date"><?= $show_date ?></td>
                <td><?= $show['venue'] ?></td>
                <td><?= $show['details'] ?></td>
            </tr>  
        <?php
            }
        ?> 
    </table>

    <h3 class='titles'>Past Shows</h3>
    <table id="show-table">
        <tr>
            <th class="date">Date</th>
            <th>Venue</th>
            <th>Details</th>
        </tr>
        <?php
            $counter=0;
            foreach($past_shows as $show)
            {
                $create=date_create($show['display_date']);
                $show_date=date_format($create, 'm/d/Y');
                $counter ++;
                if($counter%2==0)
                {
                    $row_count='even';
                }
                else
                {
                    $row_count='odd';
                }
        ?> 
        <tr class='<?= $row_count ?>'>
            <td class="date"><?= $show_date ?></td>
            <td><?= $show['venue'] ?></td>
            <td><?= $show['details'] ?></td>
        </tr>
        <?php
            }
        ?>
       
    </table>
   
<?php include('includes/nav-side.php'); ?> 
           

<?php include('includes/footer.php'); ?>