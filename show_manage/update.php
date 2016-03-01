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
    $show_query="SELECT * 
               FROM shows ORDER BY show_date DESC";
    $show_list=fetch_all($show_query);

    include('header.php'); 
?>
<body id='update'>
    <div class="wrapper">

        <?php include('nav.php'); ?>

        <h3 class='page_title'>Update Shows Here:</h3>
        <?php
            if(isset($_SESSION['errors'])){
                foreach($_SESSION['errors'] as $error){
                    echo "<p class='error'>".$error."</p>";
                }
                unset($_SESSION['errors']);
            }
        ?>

        <?php
            if(isset($_SESSION['chosen']))
            {
        ?>
                <form action="proc_files/update_proc.php" method="post">
                    <input type='hidden' name='action' value='update'>
                    <input type='hidden' name='id' value='<?= $_SESSION['chosen']['id'] ?>'>
                    <table class='form_table'>
                        <tr>
                            <td>Venue:</td>
                            <td><label><input type='text' name='venue' value="<?= $_SESSION['chosen']['venue'] ?>"></label></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Details:</td>
                            <td><label><textarea name='details'><?= $_SESSION['chosen']['details'] ?></textarea></label></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td><label><input type='text' name='date' value="<?= $_SESSION['chosen']['display_date'] ?>"></label></td>
                            <td><small>( the date must be entered in the yyyy-mm-dd format )</small></td>
                        </tr>
                        <tr>
                            <td><label><input type="submit" value="update show"></label></td>
                            <td></td>
                        </tr>
                    </table>
                </form>
        <?php

                unset($_SESSION['chosen']);
            }
        ?>

        <form action="proc_files/update_proc.php" method="post">
            <input type="hidden" name="action" value="choose">
            <table>
                <tr>
                    <th>Select</th>
                    <th>Venue</th>
                    <th>Details</th>
                    <th>Date</th>
                </tr>
                <?php
                    foreach($show_list as $show){
                ?>
                    <tr>
                        <td><input type="radio" name="show" value=<?= $show['id']?>></td>
                        <td><?= $show['venue']?> </td>
                        <td><?= $show['details']?> </td>  
                        <td><?= $show['display_date']?> </td>
                    </tr>
                <?php
                    }
                ?>
            </table>

            <input type="submit" value="choose show">

        </form>
        
    </div>
</body>
</html>




