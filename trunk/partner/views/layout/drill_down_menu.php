
		<div id="subpage_banner">
				<h1><?php echo $label?></h1>
		</div>
  
	<div id="content_sec">
    		<div class="widget-archive widget-archive-category widget">
							<div class="widget-content">
								<h2 class="widget-header">Partner info</h2>
                          		<ul>
									<li><a href="<?php echo APP_ROOT.'aboutus'?>">Pregled</a></li>
									<li>
										<a href="<?php echo APP_ROOT.'aboutus/messages'?>">Privatne poruke
										<?php
										//Show number of new message in inbox
										echo check_message(current_user('id'));
										?>
										</a>
									</li>
									<li><a href="<?php echo APP_ROOT.'aboutus/files'?>">Dokumentacija</a></li>
                                    <li></li>
								</ul>
								<h2 class="widget-header">Klijenti</h2>
								<ul>
									<li><a href="<?php echo APP_ROOT.'clients'?>">Pregled</a></li>
									<li><a href="<?php echo APP_ROOT.'clients/add'?>">Dodavanje</a></li>
								</ul>
								<h2 class="widget-header">Posao</h2>
								<ul>
									<li><a href="<?php echo APP_ROOT.'jobs'?>">Pregled</a></li>
									<li><a href="<?php echo APP_ROOT.'jobs/add'?>">Dodavanje</a></li>
									<li><a href="<?php echo APP_ROOT.'jobs/calc'?>">Kalkulator cena</a></li>
								</ul>
								<h2 class="widget-header">Problemi (tickets)</h2>
								<ul>
									<li><a href="<?php echo APP_ROOT.'tickets'?>">Pregled</a></li>
									<li><a href="<?php echo APP_ROOT.'tickets/add'?>">Dodavanje</a></li>
								</ul>
                                
                             </div>
            </div>    
     </div>
			
		
