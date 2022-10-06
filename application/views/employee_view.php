<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/jquery.dataTables.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/dataTables.bootstrap4.css' ?>"> -->

    <title>Employee</title>
</head>

<body>
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-12">
                <div class="col-md-12">
                    <h1>Employee
                        <small>List</small>
                        <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div> -->
                        <div class="float-right"><button class="btn btn-primary" id="btn_add"><span class="fa fa-plus"></span> Add New</button></div>
                    </h1>
                </div>

                <div class="col-12">
                    <div class="col-md-12">
                        <div class="list-employee">

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="view_modal" style="display: none;"></div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.2.1.js' ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- DataTable -->
    <!-- <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.dataTables.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/dataTables.bootstrap4.js' ?>"></script> -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // show employee list
        function showData() {
            $.ajax({
                type: "GET",
                url: "<?= site_url('employee/employee_data') ?>",
                async: true,
                dataType: "json",
                success: function(response) {
                    $('.list-employee').html(response.data)
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            })
        }

        function update(id) {
            $.ajax({
                type: "POST",
                url: "<?= site_url('employee/edit') ?>",
                dataType: "json",
                data: {
                    id
                },
                success: function(response) {
                    if (response.success) {
                        $('.viewmodal').html(response.success).show()
                        $('#Modal_Edit').modal('show')
                    }
                }
            })
        }

        // delete employee
        function destroy(id) {
            Swal.fire({
                title: 'Delete Confirmation',
                text: "Delete this employee?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('employee/destroy') ?>",
                        dataType: "json",
                        data: {
                            id: id
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Data employee has been deleted!'
                                })
                                showData()
                            }
                        }
                    })
                }
            })
        }

        $(document).ready(function() {
            showData() // call function show list employee

            // add new employee
            $('#btn_add').click(function(event) {
                event.preventDefault()
                $.ajax({
                    url: "<?= site_url('employee/add') ?>",
                    dataType: "json",
                    success: function(response) {
                        $('.view_modal').html(response.data).show()
                        $('#Modal_Add').modal('show')
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                    }
                })
            })
        })
    </script>

</body>

</html>