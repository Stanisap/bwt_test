<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<div class="row">
				<?php
					for ($i = 2; $i <= 23; $i = $i + 3) {
						?>
						<div class="col-sm-4 col-md-3">
							<div class="thumbnail" style="height: 100px;background: #add3ef38;">
								<div class="img" style="width: 80px; height: 80px; display: inline;">
									<?= $data["$i"]['icon']; ?>
									<h4 style="float: none;position: absolute;top: 0;right: 20px"><?= "$i:00" ?></h4>
									<p>Температура: <?= $data["$i"]['temp'] ?></p>
									<p>Ветер: <?= $data["$i"]['wind'] ?>м/с</p>
								</div>
							</div>
						</div>
					<?php
					}
				?>
			</div>
		</div> <!--/.col-xs-12 col-sm-9 -->
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas">
			<div class="thumbnail" style="background: #78a6fb;">
				<h3><?= $data['today'] ?></h3>
				<?= $data['icon_today'] ?>
				<p style="font-size: 20px"><?= $data['weather_type'] ?></p>
				<p style="color: white;">Температура: <strong style="font-size: 20px;float: right;padding-right: 5px;"><?= $data['temp_today'] ?></strong></p>
			</div>
		</div>
	</div> <!--/.row row-offcanvas row-offconvas-right -->
</div> <!--/.container --> 