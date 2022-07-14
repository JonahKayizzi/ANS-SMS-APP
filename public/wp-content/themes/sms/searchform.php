<form role="search"  method="get" class="navbar-form" action="<?php echo home_url( '/' );?>">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="<?php the_search_query(); ?>" name="s">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
				</div>
				</form>