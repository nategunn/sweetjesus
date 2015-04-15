<?php include('includes/header.php'); ?>

<body id="contact">

<?php include('includes/nav-main.php'); ?>

  <div id="content-top-bar">
	<h3>Thank you! Your message has been sent.</h3>
  </div>
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
    	<td class="form-labels">Would you like to be added to our mailing list?</td>
       <td>
       	   <label>
           	<input type="radio" name="mailing-list" id="mailing-list-yes" value="yes"/>
           	Yes
           </label>
            <br />
            <label>
            	<input type="radio" name="mailing-list" id="mailing-list-no" value="no"/>
                No
            </label>
       </td>
    </tr>

  	<tr>
    	<td class="form-labels">What sorts of things would you like to hear about in the newsletter?</td>
       <td><label><input type="checkbox" id="bobbys-hair" name="newsletter-topics[]" value="bobbys-hair"/> News about Bobby's hair.</label>
       <br/>
       <label><input type="checkbox" id="ryans-glasses" name="newsletter-topics[]" value="ryans-glasses"/> A word about Ryans glasses.</label>
       <br/>
       <label><input type="checkbox" id="chris-beard" name="newsletter-topics[]" value="chris-beard"/> Update on Chris' beard.</label>
       <br/>
       <label><input type="checkbox" id="austins-razor" name="newsletter-topics[]" value="austins-razor"/> What is Austin shaving with?</label>
       </td>
    </tr>

  	<tr>
    	<td class="form-labels">Where did you hear about the band?</td>
       <td>
       <select name="discovery-method" size="1" id="discovery-method">
       		<option value="#">Choose one</option>
           <option value="friend">From a friend</option>
           <option value="radio">On the radio</option>
           <option value="show">At a show</option>
           <option value="internet">On the internet</option>
       </select>
       </td>
    </tr>

  	<tr>
    	<td class="form-labels" colspan="2"><input type="submit" value="Send" /></td>
    </tr>
  </table>
</form>      
    
<?php include('includes/nav-side.php'); ?> 
           

<?php include('includes/footer.php'); ?>    
    
  