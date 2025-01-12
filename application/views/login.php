<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Authentication System</title>

    <!-- Bootstrap CSS CDN -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body{
            width: 100%;
            height: 100vh;
            background: #000000;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>

<div class="container w-25 border rounded p-5">
    <h2 class="w-100 text-center">Login</h2>
    <form id="loginForm">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn w-100 btn-warning">Login</button>
        <div class="mt-2 text-center">
            Redirect to <a href="register">Register</a>
        </div>
    </form>
</div>

<script>
    $('#loginForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url("/auth/login") ?>',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === true) {
                    localStorage.setItem('token', response.token);
                    window.location.href = 'home';
                } else {
                    alert(response.message);
                }
            },
            error: function(err) {
                console.log(err.responseText);
            }
        });
    });
</script>

</body>
</html>