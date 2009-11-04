 <img src="<?php echo ADMIN_APP_ROOT.'public/img/logo.png'?>"/>
 <form action="<?php echo APP_ROOT ?>lost/send" method="post" id="loginform" name="loginform">

 <fieldset>
	   <legend>Izgubljena/zaboravljena lozinka</legend>

		<?php if($_SESSION['show_msg']):
	 	echo "<div id='login_error' style='margin-left:0px'>".$_SESSION['show_msg']."</div>";
	 	endif?>
           <div id="login_warning">Da bi vam bila generisana nova lozinka potrebno je da unesete svoju el.adresu</div>
         <p>
           <label>El.adresa:
           </label>
         </p>
		   <input id="user_login" name="user[username]" size="40" type="text" />
	     <p>
					
        <p class="submit">
		  <input class = 'inputsubmit' type="submit" value="Pošalji zahtev" />
		</p>
	 </fieldset>

</form>
