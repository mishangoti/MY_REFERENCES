

<!DOCTYPE html>
<html>
<head>
    

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="include/function.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <center><h2>This is Training Programs [1]</h2></center><br>
            </div>
            <div class="col-md-2"></div>

        </div>
        <!-- DETAIL -->
        <div class="row">
            <div class="col-md-4">
                <center style="color: red"><h4>QUESTION</h4></center>
            </div>
            <div class="col-md-8">
                <div class="col-md-5">
                    <center style="color: red"><h4>INPUT / OUTPUT</h4></center>
                </div>
                <div class="col-md-7">
                    <center style="color: red"><h4>DESCRIPTION / CODE</h4></center>
                </div>
            </div>
        </div>
        <!-- DETAIL end -->
        <!-- p.1 start -->
        <div class="row">
            <div class="col-md-4">
                <pre><b>1.</b> Find area of a square
            Area = sizeOfSide^2 </pre>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-1">
                        <label>Input:</label>
                        <label>Output:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" id="input_t1p01" placeholder="Enter Size Of Sides">
                        <input type="number" class="form-control" id="output_t1p01" placeholder="Output">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success" id="run_t1p01">Enter</button>
                        <button class="btn btn-danger" id="reset_t1p01">Reset</button>
                    </div>
                    <div class="col-md-6">
                        <pre>Enter Description Here</pre>
                    </div>
                </div>
            </div>
        </div>
        <!-- p.1 end -->
        <hr>
        <!-- p.2 start -->
        <div class="row">
            <div class="col-md-4">
                <pre><b>2.</b> Find area of a circle
        Area = pi * radius^2 (pi = 3.14) </pre>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-1">
                        <label>Input:</label>
                        <label>Output:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" id="input_t1p02" placeholder="Enter radius">
                        <input type="number" class="form-control" id="output_t1p02" placeholder="Output">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success" id="run_t1p02">Enter</button>
                        <button class="btn btn-danger" id="reset_t1p02">Reset</button>
                    </div>
                    <div class="col-md-6">
                        <pre>Enter Description Here</pre>
                    </div>
                </div>
            </div>
        </div>
        <!-- p.2 end -->
        <hr>
        <!-- p.3 start -->
        <div class="row">
            <div class="col-md-4">
                <pre><b>3.</b> Display given number of days into 
                months and days</pre>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-1">
                        <label>Input:</label>
                        <label>Output:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" id="input_t1p03" placeholder="Enter days">
                        <input type="text" class="form-control" id="output_t1p03" placeholder="Output in Months-days">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success" id="run_t1p03">Enter</button>
                        <button class="btn btn-danger" id="reset_t1p03">Reset</button>
                    </div>
                    <div class="col-md-6">
                        <pre>Enter Description Here</pre>
                    </div>
                </div>
            </div>
        </div>
        <!-- p.3 end -->
        <hr>
         <!-- p.4 start -->
        <div class="row">
            <div class="col-md-4">
                <pre><b>3.</b> Display given number of days into 
                months and days</pre>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-1">
                        <label>Input:</label>
                        <label>Output:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" id="input_t1p04" placeholder="Enter days">
                        <input type="text" class="form-control" id="output_t1p04" placeholder="Output in Months-days">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success" id="run_t1p04">Enter</button>
                        <button class="btn btn-danger" id="reset_t1p04">Reset</button>
                    </div>
                    <div class="col-md-6">
                        <pre>Enter Description Here</pre>
                    </div>
                </div>
            </div>
        </div>
        <!-- p.4 end -->
        <hr>

    </div>
</body> 
</html>

<script type="text/javascript">
    $(document).ready(function(){
    // p1
        $("#run_t1p01").click(function(){
            var sizeofside = $("#input_t1p01").val();
            var result_t1p01 = giveAreaOfSquare(sizeofside);
            $("#output_t1p01").val(result_t1p01);
        });
        $("#reset_t1p01").click(function(){
            $("#input_t1p01").val('');
            $("#output_t1p01").val('');
        });
    // p2  
        $("#run_t1p02").click(function(){
            var radius = $("#input_t1p02").val();
            var result_t1p02 = giveAreaOfCercle(radius);
            $("#output_t1p02").val(result_t1p02);
        });
        $("#reset_t1p02").click(function(){
            $("#input_t1p02").val('');
            $("#output_t1p02").val('');
        });
    // p3
        $("#run_t1p03").click(function(){
            var days = $("#input_t1p03").val();
            var result_t1p03 = covertDaysIntoMonthsAndDays(days);
            $("#output_t1p03").val(result_t1p03);
        });
        $("#reset_t1p03").click(function(){
            $("#input_t1p03").val('');
            $("#output_t1p03").val('');
        });    


        // $("#sizeofside_submit").click(function(){
        //     var number = $("#sizeofside").val();
        //     console.log(number);
        //     $.ajax({
        //         type: "POST",
        //         data: "sizeofside="+number,
        //         url: "include/handler.php",
        //         success: function(result){
                
        //         alert('done');
        //         $("#sizeofside").val('');
        //         // $("#div1").html(result);
        //         }
        //     });
        // });

    });
</script>