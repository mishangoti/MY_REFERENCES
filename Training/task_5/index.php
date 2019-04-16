
<!DOCTYPE html>
<html>
<head>
  <title>Task 5</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- validation library -->
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  



  <!-- time piker -->
  
  <link href="bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

  <!-- <script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script> -->
  <!-- <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script> -->
  <script type="text/javascript" src="bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <!-- <script type="text/javascript" src="bootstrap-datetimepicker.fr.js" charset="UTF-8"></script> -->

  <!-- dropzone -->
  <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
  <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

</head>
<body>
  <center><h2>Enter Product Offers</h2></center>  
  <div class="container">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-6">
        <form id="misForm" method="post">
          
            <div> 
              <label>Name:<span style="color: red">*</span></label>
              <input class="form-control" name="offer_name" id="offer_name" type="text" placeholder="Enter Product Name">
            </div>  

            <div> 
              <label>Price:<span style="color: red">*</span></label>
              <input class="form-control" id="original_price" type="text" name="original_price" placeholder="Enter Product Price">
            </div>

            <div> 
              <label>Available Stock:<span style="color: red">*</span></label>
              <input class="form-control" id="available_stock" type="text" name="available_stock" placeholder="Enter Available Stock">
            </div>
            
            <div> 
              <label>Offer Price:<span style="color: red">*</span></label>
              <input class="form-control" id="offer_price" type="text" name="offer_price" placeholder="Enter Product Offer Price">
            </div>

            <div>
              <label>Stock For Offer:<span style="color: red">*</span></label>
              <input class="form-control" id="offer_stock" type="text" name="offer_stock" placeholder="Enter Stock For Offer">
            </div>

            <div>
                <label>DateTime Picking:<span style="color: red">*</span></label>
                <div class="date startingdate" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input size="16" type="text" value="" class="form-control" name="startdate" placeholder="Click To Select Offer Starting Date" id="startdate" readonly>
                    <span class="add-on"><i class="icon-remove"></i></span>
                    <span class="add-on"><i class="icon-th"></i></span>
                </div>
                <input type="hidden" id="dtp_input1" value="" /><br/>
            </div>

            <div>
                <label>Offer Ending date:<span style="color: red">*</span></label>
                <div class="date endingdate" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input size="16" type="text" value="" class="form-control" name="enddate" placeholder="Click To Select Offer Ending Date" id="enddate" readonly>
                    <span class="add-on"><i class="icon-remove"></i></span>
                    <span class="add-on"><i class="icon-th"></i></span>
                </div>
                <!-- <input type="hidden" id="dtp_input1" value="" > -->
                <br/>
            </div>

            <div>
              <button type="submit" class="btn btn-info">Submit</button>
            </div>
             </form>
          </div>
          <div class="col-md-4"> 
            <label>Drop Image Here:</label>
            <form action="upload.php" method="post" class="dropzone" id="my-a wesome-dropzone" enctype="multipart/form-data"></form>

              <script type="text/javascript">
                // myDropzone.on("complete", function(file) {
                //   myDropzone.removeFile(file);
                // });
              </script>
               
          </div>
          <div class="col-md-1"></div>

      </div>
     
    </div>
  </div>

  <!-- Footer -->
<footer class="page-footer font-small blue pt-4">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <p> Offer Adding Page With Validation, Dropzone and Time-Date Piker</p>
      <a href="https://jqueryvalidation.org/category/methods/">For Validation</a><a href="#">For Dropzone</a><a href="#">For Time-Date Piker</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</body>
</html>

<script>
  $(document).ready(function () {
      $('#misForm').validate({ // initialize the plugin
        rules: {
          offer_name: {
              required: true
          },
          original_price: {
              required: true,
              maxlength: 6,
              digits: true
          },
          available_stock: {
              required: true,
              maxlength: 5,
              digits: true
          },
          offer_price: {
              required: true,
              maxlength: 6,
              digits: true
          },
          offer_stock: {
              required: true,
              maxlength: 5,
              digits: true
          // },
          // startdate: {
          //  required: true
          // },
          // enddate: {
          //  required: true
          }
        },
        messages :{
          offer_name : {
            required : 'Enter Product Name'
          },
          original_price: {
              required: 'Enter Original Price in maximum 6 digits'  
          },
          available_stock: {
              required: 'Enter Available Stock Count in maximum 5 digits'
          },
          offer_price: {
              required: 'Enter Offer Price in maximum 6 digits'
          },
          offer_stock: {
              required: 'Enter Stock For Offer in 5 digits'
          // },
          // startdate: {
          //  required: 'Enter Starting date';
          // },
          // enddate: {
          //  required: 'Enter Ending date';
          }
        },
        submitHandler: function(form) {
          var offer_name = $("#offer_name").val();
          var original_price = $("#original_price").val();
          var available_stock = $("#available_stock").val();
          var offer_price = $("#offer_price").val();
          var offer_stock = $("#offer_stock").val();
          var startdate = $("#startdate").val();
          var enddate = $("#enddate").val();

          $.ajax({
              type:'POST',
              url:'ajax.php',
              data: {
                offer_name:offer_name,
                original_price:original_price,
                available_stock:available_stock,
                offer_price:offer_price,
                offer_stock:offer_stock,
                startdate:startdate,
                enddate:enddate
              },
              success:function(html){
                  $("#offer_name").val('');
                  $("#original_price").val('');
                  $("#available_stock").val('');
                  $("#offer_price").val('');
                  $("#offer_stock").val('');
                  $("#startdate").val('');
                  $("#enddate").val('');
                  alert("Data Successfully Inserted");
              }          
          });
        }
      });

      $('.startingdate').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
      });
      $('.endingdate').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
      }); 
  });
</script>