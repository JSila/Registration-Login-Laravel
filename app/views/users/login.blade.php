<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container">
        
        <h1>Login</h1>
            
        {{ Form::open() }}

            <!-- Username Field -->
            <div class="form-group">
                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ error_for('username', $errors) }}
            </div>
        
            <!-- Password Field -->
            <div class="form-group">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
                {{ error_for('password', $errors) }}
            </div>

            <!-- Checkbox Field -->
            <div class="form-group">
                {{ Form::label('remember-me', 'Remember me?') }}
                {{ Form::checkbox('remember-me', null, ['class' => 'form-control']) }}
                {{ error_for('remember-me', $errors) }}
            </div>
        
            <!-- Log In Field -->
            <div class="form-group">
                {{ Form::submit('Log In', ['class' => 'btn btn-primary']) }}
            </div>
        {{ Form::close() }}

    </div>

</body>
</html>
