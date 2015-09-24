<?php include('includes/header.php'); ?>

<body id="contact">

<?php include('includes/nav-main.php'); ?>

<!--   <div id="content-top-bar">
	<h3>Contact</h3>
  </div> -->
<form action="formhandler.php" method="post">  
  <table>
  	<tr>
    	<td class="form-labels"><label for="name">Name:</label></td>
       <td><input type="text" name="name" id="name"/></td>
    </tr>

  	<tr>
    	<td class="form-labels"><label for="email">Email:<em>(required)</em></label></td>
       <td><input type="email" name="email" id="email" required/> </td>
    </tr>

  	<tr>
    	<td class="form-labels">Comments:</td>
       <td><textarea name="comments" rows="6" cols="30"></textarea></td>
    </tr>
   

  	<tr>
      <td class="form-labels"><!-- blank --></td>
    	<td class="form-labels submit"><input type="submit" value="Send" /></td>
    </tr>
  </table>
</form>      
    
<?php include('includes/nav-side.php'); ?> 
           

<?php include('includes/footer.php'); ?>    
    
  