<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="button-area mb-2">
                    <a href="index.php" class="btn btn-primary">Add</a>
                </div>
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">User List</h4>
                    </div>
                    <div class="card-body">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="user_table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Gender</th>
                                        <th>Skills</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
        $.ajax({
            type: "POST",
            url: "action.php",
            data: {
                action: 'select'
            },
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    let users = response.data;
                    let tableBody = '';

                    $.each(users, function(index, user) {
                        tableBody += `<tr>
                        <td>${user.id}</td>
                        <td>${user.name}</td>
                        <td>${user.age}</td>
                        <td>${user.email}</td>
                        <td>${user.city}</td>
                        <td>${user.gender}</td>
                        <td>${user.skills}</td>
                        <td>
                            <button class="btn btn-sm btn-warning edit-btn" data-id="${user.id}">Edit</button>
                            <button class="btn btn-sm btn-danger delete-btn" data-id="${user.id}">Delete</button>
                        </td>
                    </tr>`;
                    });

                    $("#user_table tbody").html(tableBody);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: ", status, error);
            }
        });

        $(document).on('click', ".edit-btn", function() {
            var id = $(this).data("id");
            window.location.href = "index.php?id=" + id;
        });

        $(document).on('click', ".delete-btn", function() {
            var id = $(this).data("id");
            if (confirm("Are you sure you want to delete this user?")) {
                $.ajax({
                    type: "post",
                    url: "action.php",
                    data: {
                        action: 'delete',
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload(); // Reload the table after delete
                        } else {
                            alert(response.message);
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>