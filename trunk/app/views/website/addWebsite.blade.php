@extends('layouts.common')
@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-3 well">
        <form name="form" method="post" action="/website/add">
            <?php $sessionMessage = Session::get('message'); if (!empty($sessionMessage)) $message = $sessionMessage; else $message = Input::old('message');?>
            <?php $sessionStatus = Session::get('status'); if (!empty($sessionStatus)) $status = $sessionStatus; else $status = Input::old('status');$validationClass = AppHtmlHelper::getValidationClass($status)?>
            <?php if (!empty($message)) echo "<div class=\"$validationClass\">$message <button type='button' class='close' data-dismiss='alert'>×</button></div>"; else echo "";?>
            <div class="form-group">
                <label for="domain">Domain Name</label>
                <input tabindex="1" class="form-control" name="domain" id="domain" placeholder="Enter your domain name"
                       type="text">
                <% $errors->first('domain', '<div class="alert-error alert margin-top-10">:message</div>')%>
            </div>

            <div class="form-group">
                <input tabindex="2" class="btn btn-block btn-info" type="submit" value="Add">
            </div>
        </form>
    </div>
</div>
@stop