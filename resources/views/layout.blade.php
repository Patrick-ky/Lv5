<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>

<div class="content">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" >

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* Remove border and other styles from the input field */
        .borderless-input {
            border: none;
            outline: none; /* Remove the focus outline */
            background: transparent; /* Remove the background color */
            padding: 0; /* Remove any padding */
            margin: 0; /* Remove any margin */
            font-size: inherit; /* Inherit font size */
            /* Add any other custom styles you want */
        }
        .no-border {
    border: none;
    /* Optionally, you can remove other box-shadow styles as well */
    box-shadow: none;
    /* Optionally, you can remove any padding and margin */
    padding: 0;
    margin: 0;
    /* Optionally, you can adjust the background color */
    background-color: transparent;
}
</style>




    @yield('clients.addclients')
    @yield('clients.edit')
    @yield('client_info.add')
    @yield('client_info.view')

</div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>

</html>