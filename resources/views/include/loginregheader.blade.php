<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Rental and Billing System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="https://gensantos.gov.ph">
            <img style="width:50px;height:50px;" src="{{ URL('images\logo-lgu.png') }}" alt="Logo">
            <div class="navbar-content">
                <span class="navbar-title"><b>THE LGU GENERAL SANTOS CITY</b></span>
                <h3 class="navbar-subtitle"><b>Rental and Billing </b>with <b>SMS Notification</b></h3>
            </div>
        </a>
    </div>
</nav>
<div class="content">
    @yield('login')
    @yield('registration')
</div>

</body>
</html>
