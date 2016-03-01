<?php 
	session_start();

    // if(!(isset($_SESSION['logged_in']) && ($_SESSION['logged_in']==TRUE)))
    // {
    //     session_destroy();
    //     $_SESSION['errors'][]="You must be logged in to make changes to the database";
    //     header('location: index.php');
    //     die();
    // }
    
    require_once('connection.php');
    $past_query="SELECT * FROM shows WHERE CURRENT_DATE() > show_date ORDER BY show_date DESC";
    $past_shows=fetch_all($past_query);

    $future_query="SELECT * FROM shows WHERE CURRENT_DATE() < show_date ORDER BY show_date ASC";
    $future_shows=fetch_all($future_query);

    $next_query="SELECT * FROM shows WHERE CURRENT_DATE() < show_date ORDER BY show_date ASC LIMIT 1";
    $next_show=fetch_record($next_query);

    
    
    include('header.php'); 
?>
<body id='add'>
    <div class="wrapper">

        <?php include('nav.php'); ?>

        <h3 class='page_title'>Add Shows Here:</h3>
        <?php
            if(isset($_SESSION['errors'])){
                foreach($_SESSION['errors'] as $error){
                    echo "<p class='error'>".$error."</p>";
                }
                unset($_SESSION['errors']);
            }
        ?>
        <form action="proc_files/add_proc.php" method="post">
            <input type='hidden' name='action' value='add'>
            <table class='form_table'>
                <tr>
                    <td>Venue:</td>
                    <td><label><input type="text" name="venue"></label></td>
                </tr>
                <tr>
                    <td>Details:</td>
                    <td><label><input type="text" name="details"></label></td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><label><input type="date" name="date"></label></td>
                </tr>
                <tr>
                    <td><label><input type="submit" value="add"></label></td>
                    <td></td>
                </tr>  
            </table>
        </form>
        <br>
        <h3 class='table_titles'>Next Show</h4>
        <p><?= $next_show['venue'] ?> <?= $next_show['details']?> <?= $next_show['display_date']?></p>
        <br>
        <h3 class='table_titles'>Future Shows</h3>
        <table>
            <tr>
                <th>Venue</th>
                <th>Details</th>
                <th>Date</th>
            </tr>
            <?php
                foreach($future_shows as $show){
            ?>
                <tr>
                    <td><?= $show['venue']?> </td>
                    <td><?= $show['details']?> </td>  
                    <td><?= $show['display_date']?> </td>
                </tr>
            <?php
                }
            ?>
        </table>

        <h3 class='table_titles'>Past Shows</h3>
        <table>
            <tr>
                <th>Venue</th>
                <th>Details</th>
                <th>Date</th>
            </tr>
            <?php
                foreach($past_shows as $show){
            ?>
                <tr>
                    <td><?= $show['venue']?> </td>
                    <td><?= $show['details']?> </td>  
                    <td><?= $show['display_date']?> </td>
                </tr>
            <?php
                }
            ?>
        </table>
        
    </div>
</body>
</html>




