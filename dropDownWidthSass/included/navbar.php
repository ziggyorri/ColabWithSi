<div class="navcontainer">
	<input type="checkbox" id="toggle">
	<label for="toggle">&#9776menu</label>
	<nav>
	    <ul>
			<?php if ($currentPage !== '3' && $currentPage !== '4') {echo('<li>
				<input type="radio" name="db" id="tog1">
				<label class="undirtoggle" for="tog1" >Current page</label>
				<ul>
					<li><a id="link1" href="#">Discription</a></li>
					<li><a id="link2" href="#">Map</a></li>
					<li><a id="link3" href="#">Other info</a></li>
					<li><a id="link4" href="#">Contacts</a></li>
				</ul>
			</li>');} ?>
			<li>
				<input type="radio" name="db" id="tog2">
				<label class="undirtoggle" for="tog2">Events</label>
				<ul>
					<?php if ($currentPage == '1') {echo('<li><a href="./undirsidur/browser.php">Browse events</a></li>
					<li><a href="./undirsidur/indexForm.php">Create event</a></li>');}
					else {echo('<li><a href="./browser.php">Browse events</a></li>
					<li><a href="./indexForm.php">Create event</a></li>');} ?>
				</ul>
			</li>
			<li>
				<input type="radio" name="db" id="tog3">
				<label class="undirtoggle" for="tog3">Top tengill</label>
				<ul>
					<li><a href="#">tengill</a></li>
					<li><a href="#">tengill</a></li>
					<li><a href="#">tengill</a></li>
					<li><a href="#">tengill</a></li>
				</ul>
			</li>
			<?php if ($currentPage == '1') {echo('<li><a href="./included/logout.php">Logout</a></li>');}
			else {echo('<li><a href="../included/logout.php">Logout</a></li>');} ?>
		</ul>
	</nav>
</div>