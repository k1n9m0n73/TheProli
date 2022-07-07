<style type="text/css">
			 	@media(max-width: 767px){
			 		.currency-language{
			 			margin-top:-41px;
			 		}
			 	}
			 </style>
			<div class="top-header top-header4">
				<div class="container">
					<div class="row">
						
						<div class="col-md-4 col-sm-4 col-xs-4">

							<div class="account-login">
								<div class="language-box">
									<a href="#" class="language-current"><span style="color: #fff">Partnerhip</span></a>
									<ul class="language-list list-unstyled">
										<li><a href="/aggregator"><span>Aggregator</span></a></li>
										<li><a href="/farmer"><span>Farmer</span></a></li>
										<li><a href="/logistics"><span>Logistics</span></a></li>
										<li><a href="/warehouse"><span>Warehouse</span></a></li>
									</ul>
								</div>

								

							</div>
						</div>
						

						<div class="col-md-4 col-sm-4 col-xs-4">
							<div class="account-login">
								 <?php
                                  if (!empty($user->user_id)):
                                    
								  ?>
								<a href="/account/index">My Account</a>
                                  <?php
                                     else:
                                   ?>
                                 
                                
                               
								<a href="{{route('register-user')}}">Register</a>
								 <?php
                                     endif;
                                   ?>
							</div>
						</div>

						



						<div class="col-md-4 col-sm-4 col-xs-4">
							<div class="account-login">
							
						     	<?php
                                    if (empty($user->user_id)):
                                    
								  ?>
								<a href="/login">Login</a>

								  <?php
                                    else:
                                   ?>

                                

								<a href="{{route('logout')}}">Logout {{$user->fn}}</a>

								<?php
                                 endif;
                                ?>  

                                 
						</div>
					</div>

					</div>
					
				</div>
			</div>