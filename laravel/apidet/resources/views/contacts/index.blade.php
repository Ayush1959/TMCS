<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form action="{{ action('ContactController@store') }}" method="post">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="name">FirstName</label>
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">  
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lastname">LastName</label>
                        <input type="lastname" id="lastname" name="lastname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" id="age" name="age" class="form-control">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 form-group">
                    <label for="message">Address</label><br>
                    <textarea id="message" name="message" rows="5" class="form-control"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 form-group">
                    <label for="male">
                        <input type="radio" name="gender" id="male" value="Male"> Male
                    </label>
                    <label for="female">
                        <input type="radio" id="female" name="gender" value="Female"> Female
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="no">Phone Number</label>
                        <input type="text" id="no" name="no" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <hr> -->
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <button class="btn btn-primary">Submit!
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>