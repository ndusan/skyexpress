
		<div id="subpage_banner">
				<h1><?php echo $label?></h1>
		</div>
  
	<div id="content_sec">
    		<div class="widget-archive widget-archive-category widget">
							<div class="widget-content">
		<?php
		//This part should bee visible only for adminstartors
		if(current_user('level_fk')==1){
		?>	
								<h2 class="widget-header">Administratori</h2>
                          		<ul>
									<li><a href="<?php echo APP_ROOT.'admins'?>">Pregled</a></li>
									<li><a href="<?php echo APP_ROOT.'admins/add'?>">Dodavanje</a></li>
                                    <li></li>
								</ul>
								<h2 class="widget-header">Partneri</h2>
								<ul>
									<li><a href="<?php echo APP_ROOT.'partners'?>">Pregled</a></li>
									<li><a href="<?php echo APP_ROOT.'partners/add'?>">Dodavanje</a></li>
									<li><a href="<?php echo APP_ROOT.'partners/send_message'?>">Slanje poruke</a></li>
									<li>
										<a href="<?php echo APP_ROOT.'partners/job'?>">Poslovi
										<?php
										//Check job
										echo check_jobs();
										?>
										</a>
									</li>
								</ul>
								<h2 class="widget-header">Dokumentacija</h2>
								<ul>
									<li><a href="<?php echo APP_ROOT.'documents'?>">Pregled tipa dokumenta</a></li>
									<li><a href="<?php echo APP_ROOT.'documents/add'?>">Dodavanje tipa dokumenta</a></li>
									<li><a href="<?php echo APP_ROOT.'public_files'?>">Pregled dokumenata</a></li>
									<li><a href="<?php echo APP_ROOT.'public_files/add'?>">Dodavanje dokumenata</a></li>
								</ul>
								<h2 class="widget-header">Artikli</h2>
								<ul>
									<li><a href="<?php echo APP_ROOT.'articles'?>">Pregled/Dodavanje</a></li>
								</ul>
								<h2 class="widget-header">Popusti</h2>
								<ul>
									<li><a href="<?php echo APP_ROOT.'discounts'?>">Pregled/Dodavanje</a></li>
								</ul>
								<h2 class="widget-header">Kursna lista (&#8364;)</h2>
								<ul>
									<li><a href="<?php echo APP_ROOT.'currencies'?>">Pregled</a></li>
									<li><a href="<?php echo APP_ROOT.'currencies/add'?>">Nova kursna lista</a></li>							
								</ul>
                                                                <h2 class="widget-header">Vesti</h2>
								<ul>
									<li><a href="<?php echo APP_ROOT.'news'?>">Pregled</a></li>
									<li><a href="<?php echo APP_ROOT.'news/add'?>">Dodavanje</a></li>
								</ul>
			<?php
		}?>
								<h2 class="widget-header">Problemi(tickets)</h2>
								<ul>
									<li>
										<a href="<?php echo APP_ROOT.'tickets'?>">Pregled
										<?php
										//Check num of tickets
										echo checkNumOfTickets();
										?>
										</a>
									</li>
								</ul>
                                
                             </div>
            </div>    
     </div>
			
		
