<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style3.css') }}">
</head>

<body>
    <div class="formAdd">
        <h3>ADD USERS</h3>
        <form action="" method="" name="add">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" class="form-control form-control-lg" /><br>

            <label class="form-label" for="lastName">Email</label>
            <input type="email" id="emailAddress" class="form-control form-control-lg" /><br>

            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control form-control-lg" id="password" /><br>

            <h6 class="mb-2 pb-1">Gender: </h6>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender" value="option1"
                    checked />
                <label class="form-check-label" for="femaleGender">Female</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                    value="option2" />
                <label class="form-check-label" for="maleGender">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                    value="option3" />
                <label class="form-check-label" for="otherGender">Other</label>
            </div>
            <br>
            <br>
            <label class="form-label" for="phoneNumber">Phone Number</label>
            <input type="tel" id="phoneNumber" class="form-control form-control-lg" /><br>

            <label class="form-label" for="position">Position</label>
            <input type="text" id="position" class="form-control form-control-lg" /><br>

            <label class="form-label" for="Department">Department</label>
            <input type="text" id="Department" class="form-control form-control-lg" /><br>

            <div class="submit">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
            </div>
        </form>
    </div>
</body>

</html>
