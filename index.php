<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Bootstrap Form with Card</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">User Registration Form</h4>
                    </div>
                    <div class="card-body">
                        <form id="user_form">
                            <!-- Hidden ID field -->
                            <input type="hidden" id="id" name="id" value="">

                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
                                    </div>
                                </div>

                                <!-- Age -->
                                <div class="col-md-6 mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-image-portrait"></i>
                                        </span>
                                        <input type="number" id="age" name="age" class="form-control" placeholder="Enter your age">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-envelope-circle-check"></i>
                                        </span>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- City -->
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <select id="city" name="city" class="form-select">
                                        <option selected>Select your city</option>
                                        <option value="New York">New York</option>
                                        <option value="Los Angeles">Los Angeles</option>
                                        <option value="Chicago">Chicago</option>
                                        <!-- Add more cities as needed -->
                                    </select>
                                </div>

                                <!-- Address -->
                                <div class="col-md-6 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea id="address" name="address" class="form-control" placeholder="Enter your address"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Gender -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Gender</label>
                                    <div class="form-check">
                                        <input type="radio" id="male" name="gender" value="Male" class="form-check-input">
                                        <label for="male" class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="female" name="gender" value="Female" class="form-check-input">
                                        <label for="female" class="form-check-label">Female</label>
                                    </div>
                                </div>

                                <!-- Skills -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Skills</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="html" name="skills[]" value="HTML" class="form-check-input">
                                        <label for="html" class="form-check-label">HTML</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="css" name="skills[]" value="CSS" class="form-check-input">
                                        <label for="css" class="form-check-label">CSS</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="php" name="skills[]" value="PHP" class="form-check-input">
                                        <label for="php" class="form-check-label">PHP</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script>
        $(function() {

            const urlParams = new URLSearchParams(window.location.search);
            const userId = urlParams.get('id');

            if (userId) {
                $.ajax({
                    type: "POST",
                    url: "action.php",
                    data: {
                        action: 'select',
                        id: userId
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            let id = $("#id").val(response.data.id);
                            if (id.length != 0) {
                                $("#password").prop('disabled', true);
                            }
                            $("#name").val(response.data.name);
                            $("#age").val(response.data.age);
                            $("#email").val(response.data.email);
                            $("#city").val(response.data.city);
                            $("#address").val(response.data.address);
                            $("input[name='gender'][value='" + response.data.gender + "']").prop("checked", true);

                            const skills = response.data.skills;
                            if (skills) {
                                skills.forEach(skill => {
                                    $("input[name='skills[]'][value='" + skill + "']").prop("checked", true);
                                });
                            }
                        } else {
                            alert(response.message);
                            $("#user_form")[0].reset();
                        }
                    }
                });
            } else {
                $("#user_form")[0].reset();
            }

            $("#user_form").submit(function(e) {
                e.preventDefault();
                let data = $(this).serialize();
                $.ajax({
                    type: "post",
                    url: "action.php",
                    data: {
                        action: 'save',
                        data: data
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.href = "table.php"
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>