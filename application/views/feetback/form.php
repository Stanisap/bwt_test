<div class="container">
    
    <!-- Форма для регистрации -->
    <form role="form" class="form-horizontal" method="POST" action="/feetback/form">
        <!-- block for text -->
        <div class="form-group has-feedback">
            <label for="first-name" class="control-label col-xs-3">Напишите тут свой отзыв</label>
            <div class="col-xs-6">
                <div class="input-group">
                    <input type="hidden" name="user_id" value="<?= $_COOKIE['user_id'] ?>">
                    <textarea cols="70" rows="5" type="text" class="form-control" required="required" name="text" pattern="[A-Za-z]{3,100}"></textarea>
                </div>
                <span class="glyphicon form-control-feedback"></span>
            </div>
        </div> <!-- /.first-name-->
        <div class="form-group has-feedback">
            <div class="col-xs-3"></div>
            <div class="col-xs-9">
                <div class="g-recaptcha" data-sitekey="6Ld1WtwUAAAAAKjVMHixnwItksQbSo3Mro3zgjg3"></div>
            </div>
        </div>      
        <!-- block for button submit form -->
        <div class="form-group has-feedback">
            <div class="col-xs-5"></div>
            <div class="col-xs-2">
                <div class="input-group">
                    <button id="save" type="submit" class="btn btn-default active center-block">Оставить отзыв</button>
                </div>
                <span class="glyphicon form-control-feedback"></span>
            </div>
        </div> <!-- /.button submit form -->
    </form>
</div>