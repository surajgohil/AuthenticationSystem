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


</head>
<body>
	
	
<div class="container">
    <h2>Register</h2>
    <form id="registerForm">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<script>
    $('#registerForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url("/auth/register") ?>',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response.message);
            },
            error: function(err) {
                console.log(err.responseText);
            }
        });
    });
</script>


</body>
</html>



