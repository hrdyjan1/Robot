<?php
include("inc/conection.php");
include("inc/functions.php");

$games = get_basic_info_about_items('games', $db);
$os = get_basic_info_about_items('os', $db);

$pageTitle = "BiteCorn";
$section = null;

include("inc/header.php"); ?>


			<div class="carousel">
					<div class="carousel-inner">

							<input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
							<div class="carousel-item">
									<img src="img\carousel\moda.jpg">
							</div>

							<input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="" >
							<div class="carousel-item">
									<img src="img\carousel\lg.png">
							</div>

							<input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
							<div class="carousel-item">
									<img src="img\carousel\lego.png">
							</div>

							<label for="carousel-3" class="carousel-control prev control-1">‹</label>
							<label for="carousel-2" class="carousel-control next control-1">›</label>
							<label for="carousel-1" class="carousel-control prev control-2">‹</label>
							<label for="carousel-3" class="carousel-control next control-2">›</label>
							<label for="carousel-2" class="carousel-control prev control-3">‹</label>
							<label for="carousel-1" class="carousel-control next control-3">›</label>

							<ol class="carousel-indicators">
									<li>
											<label for="carousel-1" class="carousel-bullet">•</label>
									</li>
									<li>
											<label for="carousel-2" class="carousel-bullet">•</label>
									</li>
									<li>
											<label for="carousel-3" class="carousel-bullet">•</label>
									</li>
							</ol>

					</div>
			</div>

			<div class="recomendation">
				<h1 id="title">We recommend</h1>
			</div>

			<div class="content clearfix">

				<?php

				$random_games = get_basic_info_about_random_items("Games",$db);
				$random_os = get_basic_info_about_random_items("OS",$db);

					foreach ($random_games as $item) {
						echo get_item_html('games',$item);
					}
					foreach ($random_os as $item) {
						echo get_item_html('os',$item);
					}
				?>

			</div>
		</div>
	</div>

</body>
</html>
