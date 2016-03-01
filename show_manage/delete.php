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
               FROM shows ORDER BY show_date ASC";
    $show_list=fetch_all($show_query);

    
    
    include('header.php'); 
?>
<body id='delete'>
    <div class="wrapper">

        <?php include('nav.php'); ?>

        <?php
            if(isset($_SESSION['errors'])){
                foreach($_SESSION['errors'] as $error){
                    echo "<p class='error'>".$error."</p>";
                }
                unset($_SESSION['errors']);
            }

        ?>
        <h3 class='page_title'>Delete Shows Here:</h3>

        <form action="proc_files/delete_proc.php" method="post">
            <input type="hidden" name="action" value="delete">
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
                        <td><input type="checkbox" name="options[]" value=<?= $show['id']?>></td>
                        <td><?= $show['venue']?> </td>
                        <td><?= $show['details']?> </td>  
                        <td><?= $show['display_date']?> </td>
                    </tr>
                <?php
                    }
                ?>
            </table>

            <input type="submit" value="delete">

        </form>

    </div>
</body>
</html>

