<?php
	session_start();
    // session_destroy();
	// var_dump($_SESSION); 
    include('header.php');
?>

<body>
    <div class="wrapper">
        <?php
            if(isset($_SESSION['errors'])){
                foreach($_SESSION['errors'] as $error){
                    echo "<p class='error'>".$error."</p>";
                }
                unset($_SESSION['errors']);
            }
            if(isset($_SESSION['success_message'])){
                
                    echo "<p class='success'>".$_SESSION['success_message']."</p>";
               
                unset($_SESSION['success_message']);
            }

        ?>

        <h3 class='page_title'>LogIn</h3>
        <form action="proc_files/process.php" method="post">
            <input type="hidden" name="action" value="login">
            <table class='form_table'>
                <tr>
                    <td>Username:</td>
                    <td><label><input type="text" name="username" placeholder="username"></label></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><label><input type="password" name="password" placeholder="password"></label></td>
                </tr>
                <tr>
                    <td><label><input type="submit" value="LogIn"></label></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>