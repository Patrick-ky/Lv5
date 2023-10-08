{{-- @extends('include.header')
<style>
    table {
        border: 1px solid black;
        width: 100%; /* Use full width */
        border-collapse: collapse; /* Merge adjacent borders */
    }

    th, td {
        border: 1px solid black;
        padding: 8px; /* Add some padding for better spacing */
        text-align: center; /* Center-align content */
    }


    tr.borderless td {
        border: none;
    }

    
</style>

@section('billing.record')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-dark"> Records</h2>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

          
                <table id="billingTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Full Name</th>
                            <th class="text-center">Monthly</th>
                            <th class="text-center">Violation</th>
                            <th class="text-center">Penalty Price</th>
                            <th class="text-center">Stall Number</th>
                            <th class="text-center">Total Balance</th>
                          
                            
                        </tr>
                    </thead>
                    <tbody>

                        @php
                        $totalBalance = 0; // Initialize the total balance variable
                        @endphp
                        
                        @foreach($billings as $billing)
                        <tr>
                            <td class="text-center">{{ $billing->client->firstname }} {{ $billing->client->middlename }} {{ $billing->client->lastname }}</td>
                            <td class="text-center">{{ $billing->stallType->price }}</td>
                            <td class="text-center"> {{ $billing->violation->violation_name }}</td>
                            <td class="text-center"> {{ $billing->violation->penalty_value }} </td>
                            <td class="text-center"> {{ $billing->stallNumber->stall_number }} </td>
                            <td class="text-center">{{ $billing->total_balance }}</td>

                
                            
                        </tr>
                        @php
                         $totalBalance += $billing->total_balance  ; // Add each billing amount to the total
                        @endphp
                        @endforeach
                        <tr class="borderless">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>TOTAL:</b></td>
                            <td>₱ {{$totalBalance}}.00</td>
                            
                        </tr>

    
                       
                    </tbody>
                </table>
           

        

        </div>
    </div>
</div>


@endsection
 --}}



 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <style>
        @media print {
            /* Hide elements when printing */
            #printButton {
                display: none;
            }
        }
    </style>
    <title>Records</title>

<body>
    @extends('include.header')
    @section('billing.record')
    <br>
    <br>
    <br>
    <br>
    <div class="card card-outline rounded card-navy">
        <div class="flex justify-between">
            <h4 class="ml-2 mt-2"><b>RECORDS</b></h4>  
            <div>
                <button id="printButton" class="btn btn-primary sm mb-2 mr-2 mt-2 ml-auto" onclick="printReport()">Print Records</button>
             </div>
        </div>
        
        <div class="container-fluid">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="monthYearSelect" class="col-form-label">Select Month:</label>
                    <select id="monthYearSelect" class="form-control" onchange="filterByMonthAndYear()">
                        <option value="">All Months</option>
                        <option value="2023-01">January</option>
                        <option value="2023-02">February</option>
                        <option value="2023-03">March </option>
                        <option value="2023-04">April</option>
                        <option value="2023-05">May</option>
                        <option value="2023-06">June</option>
                        <option value="2023-07">July</option>
                        <option value="2023-08">August</option>
                        <option value="2023-09">September</option>
                        <option value="2023-10">October</option>
                        <option value="2023-11">November</option>
                        <option value="2023-12">December</option>
                        <!-- Add options for other months and years as needed -->
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table id="billingTable" class="table table-hover table-striped table-bordered table table-sm">
                    <thead class="table-light">
                        <tr class="table-primary">
                            <th>ID</th>
                            <th>Reading Date</th>
                            <th>Client</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $totalBalance = 0; // Initialize the total balance variable
                        @endphp
                        
                        @foreach($billings as $billing)
                        <tr>
                            <td class="text-center">{{ $billing->client->firstname }} {{ $billing->client->middlename }} {{ $billing->client->lastname }}</td>
                            <td class="text-center">{{ $billing->stallType->price }}</td>
                            <td class="text-center"> {{ $billing->violation->violation_name }}</td>
                            <td class="text-center"> {{ $billing->violation->penalty_value }} </td>
                            <td class="text-center"> {{ $billing->stallNumber->stall_number }} </td>
                            <td class="text-center">{{ $billing->total_balance }}</td>

                
                            
                        </tr>
                        @php
                         $totalBalance += $billing->total_balance  ; // Add each billing amount to the total
                        @endphp
                        @endforeach
                        <tr class="borderless">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>TOTAL:</b></td>
                            <td>₱ {{$totalBalance}}.00</td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
    <!-- JavaScript for the print functionality -->
    <script>
        function printReport() {
            // Hide the print button before printing
            document.getElementById('printButton').style.display = 'none';

            // Print the table
            window.print();

            // Show the print button again after printing
            document.getElementById('printButton').style.display = 'block';
        }
                $(document).ready(function () {
            var table = $('#billingTable').DataTable({  // Change 'recordTable' to 'billingTable'
                "pagingType": "full_numbers",
                "lengthMenu": [10, 25, 50, 100],
                "language": {
                    "lengthMenu": "Show MENU entries",
                    "info": "Showing START to END of TOTAL entries",
                },
                "order": [],
            });

            // Show initial number of entries
            $('#billingTable_length select').change(function () {  // Change 'recordTable' to 'billingTable'
                table.page.len($(this).val()).draw();
            });
        });
        function filterByMonthAndYear() {
    var selectedMonthYear = document.getElementById('monthYearSelect').value;
    var table = $('#billingTable').DataTable();

    if (selectedMonthYear === '') {
        // If "All Months and Years" is selected, show all records
        table.columns(1).search('').draw(); // Column index 1 is the "Reading Date" column
    } else {
        // Filter by the selected month and year
        table.columns(1).search(selectedMonthYear, true, false).draw();
    }
}


    </script>
