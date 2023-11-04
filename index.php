<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap and DataTables CSS links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    <!-- ToastifyJS CSS link -->
    <!-- SweetAlert2 CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

    <title>PHP REALTIME SSE</title>
</head>
<body>

    <main class="container">
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-sm-12 col-md-10 col-lg-8">

                <div class="card mb-3 p-3 text-center">
                    
                    <div class="alert alert-primary" role="alert">
                        <h5>HTML 5 (SERVER SENT EVENT)</h5>
                        <h6>PHP, MYSQL AND JQUERY</h6>
                    </div>

                    <div class="alert alert-info" role="alert">
                        No need to refresh this page to get updated data from database <br>
                        I didn't use setInterval but rather I used HTML 5 (SSE) Unidirectional Channel
                    </div>
                    
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-1">
                            <table id="tableTodo" class="table table-striped table-bordered table-hover p-2 w-100">
                                <thead>
                                    <tr>
                                        <th class="col-1">#</th>
                                        <th class="col-auto">Task</th>
                                        <!-- <th class="col-4">Date</th> -->
                                        <!-- <th class="col-2">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>


    <!-- DataTables JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>

    <!-- ToastifyJS JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/toastify-js@1.11.2/dist/toastify.min.js"></script> -->

    <script>
        // TRY 3
        // let currentPage = 1;

        let table = $('#tableTodo').DataTable({  
                
            lengthMenu: [5, 10, 25, 50, 75, 100],
            pagingType: "full_numbers",             
            scrollX: true,                          
            ajax: {
                url: 'data_source.php',
                method: 'POST',
                dataSrc: 'data',
                // success: function(response) {
                //     NOTE: DataTables doesn't have a specific success callback because it assumes that if the server responds with the expected JSON data, the request was successful. 
                //     console.log(response.message);
                // },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            },
            columns: [
                { "data": "task_id" },
                { "data": "task_name" },
                // { "data": "created_at" },
                // { "data": null, "defaultContent":  // button with icon
                //     "<div class='text-center'>"+
                //     "<button class='edit me-1 btn btn-sm btn-info'><i class='fa-regular fa-pen-to-square text-light'></i></button>"+
                //     "<button class='archive btn btn-sm btn-danger'><i class='fa-solid fa-trash'></i></button>"+
                //     "</div>"
                // }
            ]
        });

        // Assign id for data table search field, for accessibility purposes
        $('#tableTodo_filter input').attr('id', 'searchInput');


        ///////////////////////////////////////////////
        // TRY 1 this keeps going back to page 1 every time the page receives updates from server sent event

        // const eventSource = new EventSource('server_sent_event.php');

        // eventSource.onmessage = function (event) {
        //     const data = JSON.parse(event.data);
        //     table.clear().rows.add(data).draw();
        //     console.log(data);
        // };


        ///////////////////////////////////////////////
        // TRY 2 WORKING GOODS

        let currentPage = 1;

        const eventSource = new EventSource('server_sent_event.php');

        eventSource.onmessage = function (event) {
            const data = JSON.parse(event.data);

            // Store the current page
            currentPage = table.page.info().page + 1;

            table.clear().rows.add(data).draw();

            // Return to the stored page
            table.page(currentPage - 1).draw('page');
        };



        // ///////////////////////////////////////////////
        // // TRY 3

        // // put this on top of javascript
        // // let currentPage = 1; 

        // // Listen for DataTable page change event
        // table.on('page.dt', function () {
        //     currentPage = table.page.info().page + 1;
        //     console.log('CURRENT PAGE: '+currentPage);
            
        // });

        // const eventSource = new EventSource('server_sent_event.php');

        // eventSource.onmessage = function (event) {
        //     const data = JSON.parse(event.data);
            
        //     // Store the current page
        //     const newPage = table.page.info().page + 1;
        //     if (newPage !== currentPage) {
        //         currentPage = newPage;
        //     }

        //     table.clear().rows.add(data).draw();

        //     // Return to the stored page
        //     table.page(currentPage - 1).draw('page');
        // };
    </script>
    
</body>
</html>

