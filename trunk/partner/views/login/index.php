 <img src="<?php echo ADMIN_APP_ROOT.'public/img/logo.png'?>"/>
 <form action="<?php echo APP_ROOT ?>login/access" method="post" id="loginform" name="loginform">

 <fieldset>
	   <legend>Stranica za prijavljivanje partnera</legend>

		<?php if($_SESSION['show_msg']):
	 	echo "<div id='login_error'>".$_SESSION['show_msg']."</div>";
	 	endif?>
		 
         <p>
           <label>El.adresa:
           </label>
         </p>
		   <input id="user_login" name="user[username]" size="40" type="text" />
	     <p>
			  <label>Lozinka:</label>
		</p>
		   <input id="user_pass" name="user[password]" size="40" type="password" />
			
        <p class="submit">
		  <input class = 'inputsubmit' type="submit" value="Prijavi se" />
		</p>
                
	 </fieldset>
     <br/>

                <a href="<?php echo APP_ROOT?>lost">Zaboravili ste lozinku?</a>
             

</form>
