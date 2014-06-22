<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container">
        
        <h1>Register</h1>
            
        {{ Form::open() }}

            <!-- Username Field -->
            <div class="form-group">
                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ error_for('username', $errors) }}
            </div>
        
            <!-- Email Field -->
            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ error_for('email', $errors) }}
            </div>

            <!-- Password Field -->
            <div class="form-group">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
                {{ error_for('password', $errors) }}
            </div>

            <!-- Password Field -->
            <div class="form-group">
                {{ Form::label('password_confirmation', 'Password:') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) }}
                {{ error_for('password_confirmation', $errors) }}
            </div>
        
            <!-- Create Account Field -->
            <div class="form-group">
                {{ Form::submit('Create Account', ['class' => 'btn btn-primary']) }}
            </div>
        {{ Form::close() }}

    </div>

</body>
</html>
