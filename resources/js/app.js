import './bootstrap';




require('bootstrap-datepicker');
$(document).ready(function () {
    // Initialize Datepickers
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd', // Use the desired date format
        autoclose: true,
    });
});
