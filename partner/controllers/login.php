<?php


//Data from database
 include(MODEL_PATH.$route['controller'].'.php');

switch ($route['view']) {
	
  case "access":
                //print_r($params);
		if(login_partner($params['user']['username'], $params['user']['password']))
		{
			 message('You have been logged in.');
			 redirect('home');
		}
		else 
		{
			message('<strong>Greška</strong>: Pogrešno uneta el.adresa i lozinka');
                        $route['view'] = 'index';
		}

  break;	
	
  case "delete":
        $_SESSION['user_partner'] = null;
	message('<strong>Obaveštenje</strong>: Uspešno ste se odjavili sa sistema');
	check_authentication();
  break;

  case "lost":
        
  break;

  case "send":
     // print_r($params);
      
       //If email is entered it should be checked in database
       $details = check_email($params['user']['username']);
        if($details){
            //Send email 
            $link = "<a href='http://partner.sky-express.rs/new/".$details['password']."?email=".$details['email']."' target='_blank'>http://partner.sky-express.rs/new/".$details['password']."?email=".$details['email']."</a>";
            $msg = "<br/>Ovaj mail ste dobli na zahtev koji je generisan na stranici 'Izgubljena/zaboravljena lozinka'.<br/>Da bi vam bila generisana nova lozinka potrebno je da uradite potvrdu identiteta klikom na link: ";
            $msg .= $link ."<br/><br/>";
            $msg .= "Nakon klika i provere vašeg identiteta, nova lozinka će vam biti prosleđena automatski na ovu elektronsku adresu";
            $title = "Generator nove lozinke - ".date('d.m.Y.');
            $email = $details['email'];
            send_email($details['id'], $title, $msg, $email);


            message('Poruka sa aktivacionim linkom za novu lozinku i uputstvo su vam prosleđeni na unetu elektronsku adresu');
            redirect('home');
        }else{
            message('Uneta el.adresa nije isprvna. Ponovite unos ili kontaktirajte administratora');
            $route['view'] = 'lost';
        }
  break;

  case "new":
        //Check params
        
        $new_pass = set_new_password($params['password'], $params['email']);
        if($new_pass){

            //Send email
            $msg = "<br/>Poštovani,<br/>Nova lozinka koju vam je sistem generisao: ";
            $msg .= $new_pass ."<br/><br/>Adresa sa koje možete da pristupite portalu je: <a href='http://partner.sky-express.rs'>http://partner.sky-express.rs</a>";
            $msg .= "<br/><br/>Lozinku možete da promenite kada se ulogujete u svoj profil na stranici Partner info » Pregled » Izmeni";
            $title = "Generator nove lozinke - ".date('d.m.Y.');
            $email = $params['email'];
            send_new_password($title, $msg, $email);

            message('Nova lozinka vam je poslata na elektronsku adresu');
            redirect('home');
        }else{
            message('Neispravan pristup');
            redirect('home');
        }
        
  break;

}




?>
