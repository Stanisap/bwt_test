<div class="container">
	
	<!-- Форма для регистрации -->
	<form role="form" class="form-horizontal" method="POST" action="/register">
		<!-- block for first name -->
		<div class="form-group has-feedback">
			<label for="first-name" class="control-label col-xs-3">Имя:</label>
			<div class="col-xs-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>         
					<input type="text" class="form-control" required="required" name="first_name" pattern="[A-Za-z]{3,}">
				</div>
				<span class="glyphicon form-control-feedback"></span>
			</div>
		</div> <!-- /.first-name-->
		<!-- block for last name -->
		<div class="form-group has-feedback">
			<label for="last-name" class="control-label col-xs-3">Фамилия:</label>
			<div class="col-xs-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>         
					<input type="text" class="form-control" required="required" name="last_name" pattern="[A-Za-z]{3,}">
				</div>
				<span class="glyphicon form-control-feedback"></span>
			</div>
		</div> <!-- /.last-name-->
		<!-- block for email -->
		<div class="form-group has-feedback">
			<label for="email" class="control-label col-xs-3">Email:</label>
			<div class="col-xs-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					<input type="email" class="form-control" required="required" name="email">
				</div>
				<span class="glyphicon form-control-feedback"></span>
			</div>
		</div> 	<!-- /.email-->
		
		<!-- block for sex -->
		<div class="form-group">
			<label for="sex" class="control-label col-xs-3">Пол:</label>
			<div class="col-xs-6">
				<div class="col-xs-8">
					<label class="radio-inline">
						<input type="radio" name="sex" value="male"><p>Мужской</p>
					</label>
				</div>
				<div class="col-xs-4">
					<label class="radio-inline">
						<input type="radio" name="sex" value="female"><p>Женский</p>
					</label>
				</div>
			</div>
		</div> <!-- /.sex -->

		<!-- block for date of birth -->
		<div class="form-group">
			<label for="date" class="control-label col-xs-3">Дата рождения:</label>
			<div class="col-xs-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					<input type="date" name="date_birth" class="form-control">
				</div>
			</div>
		</div> <!-- /.block for date of birth-->

		<!-- block for button submit form -->
		<div class="form-group has-feedback">
			<div class="col-xs-5"></div>
			<div class="col-xs-2">
				<div class="input-group">
					<button id="save" type="submit" class="btn btn-default active center-block">Регистрация</button>
				</div>
				<span class="glyphicon form-control-feedback"></span>
			</div>
		</div> <!-- /.button submit form -->
	</form>

</div>