  <!---------------------------- PHP--------------------------  -->
  <?php  
// ///////////SQL QUERY for a selected tip///////////////////////
    $serverName = "LAPTOP-BBPRS3C8"; 
    $connectionOptions = [
         "Database"=>"Energy Savings Tips",
         "Uid" => "",   
         "PWD" => "" 
    ]; 
    
    // establish connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn == false)
         die(print_r(sqlsrv_errors(), true));
   
   
    $catNum = 1;
    $tipNum = 1;
    $subNum = 1;

    

$queryTip = "SELECT T_DESC_ENGLISH  
              FROM dbo.TIPS 
              WHERE C_ID = $catNum
             AND SUB_ID = $subNum
             AND T_ID = $tipNum";
 // FETCHING DATA FROM DATABASE
$tipResult =  sqlsrv_query($conn, $queryTip);

 // Make the first (and in this case, only) row of the result set available for reading.
if( sqlsrv_fetch($tipResult) === false) {
    die( print_r( sqlsrv_errors(), true));
}

 $tip = sqlsrv_get_field( $tipResult, 0);  


////////////////////SubCategory////////////////////////////////

 $querySub = "SELECT SUB_NAME  
              FROM dbo.SUBCATEGORY 
              WHERE SUB_ID = $subNum";
 // FETCHING DATA FROM DATABASE
$subResult =  sqlsrv_query($conn, $querySub);

 // Make the first (and in this case, only) row of the result set available for reading.
if( sqlsrv_fetch($subResult ) === false) {
    die( print_r( sqlsrv_errors(), true));
}

 $subcategory = sqlsrv_get_field( $subResult, 0);
 
 /////////////////////////Category/////////////////////////////////

 $queryCat = "SELECT C_NAME  
              FROM dbo.CATEGORY
              WHERE (C_ID = $catNum)";
 // FETCHING DATA FROM DATABASE
$nameResult =  sqlsrv_query($conn, $queryCat);

 // Make the first (and in this case, only) row of the result set available for reading.
if( sqlsrv_fetch($nameResult ) === false) {
    die( print_r( sqlsrv_errors(), true));
}

 $name = sqlsrv_get_field( $nameResult, 0); 
?>

 <!---------------------------- PHP END--------------------------  -->

<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Energy saving tips</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <!-- Alternative stylesheet use for 'style.css' 
         link rel="stylesheet" href="style.css"> -->

         <script>
        function addDiv() {
            
            document.getElementById("container").innerHTML +=
            document.getElementById("container").innerHTML ;
        }
    </script>

    
    <style>
        body {
            font-family: 'Lato';
            font-size: 16px;
            color: #4F4C4D;
            background-color:#D3D2D2;
        }

        h2 {
            font-family: 'Lato';
            font-size: 24px;
        }

        h3 {
            font-family: 'Lato';
            font-size: 18px;
        }

        h4 {
            font-family: 'Lato';
            font-size: 16px;
        }

        h5 {
            font-family: 'Lato';
            font-size: 13px;
        }

        h6 {
            font-family: 'Lato';
            font-size: 12px;
        }

        hr {
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .border {
            height: 195px;
            width: fixed 1280px;
            padding: 28px;
            margin: 18px;
            box-shadow: 0px 1px 5px #A7A5A6;
        }
      
        .half-br {
            display: block;
            margin: 16px;
        }
    
        .no-gutters {
            margin-right: 48px;
            margin-left: 0px;
        }
        
        .no-gutters>.col,
        .no-gutters>[class*=col-] {
            padding-right: 0px;
            padding-left: 0px;
        }
    </style>
    </head>

    <body>


    <!-- Image placement  -->
    <div id="container">
        <div class="row bg-white">
            <div class="col no-gutters">
                    <br><br>
                    <div class="col">
                        <a href="imageplaceholder.png" target="_blank">
                            <img src="imageplaceholder.png" class="mx-auto d-block" alt="Tip image">
                        </a>
                    </div>  
            </div>
            <!-- Tip title and tip description  -->
            <div class="col">
                <br>
                <div class="half-br"></div>
                    <div class="col no-gutters">
                        <h2><?php echo $name;?>, <?php echo $subcategory;?></h2>
                        <div class="half-br"></div>
                        <p><?php echo $tip;?></p>
                        <br>
                        <!-- Tip information  -->
                        <div class="row">
                            <div class="col">
                                <b>Effort</b>
                            </div>
                            <div class="col no-gutters">
                                <b>Cost range</b>
                            </div>
                            <div class="col">
                                <b>Savings</b>
                            </div>
                            <div class="col">
                                <b>CO2</b>
                            </div>    
                        </div>
                        <hr>
                        <!-- Tip savings  -->
                        <div class="row">
                            <div class="col">
                                Free
                            </div>
                            <div class="col no-gutters">
                                $100-$200
                            </div>
                            <div class="col">
                                5-10%
                            </div>
                            <div class="col">
                                2,000lbs
                            </div>
                        </div> 
                        <hr>
                    </div>
                </div>     
          </div>
    </div>

    <script> addDiv() </script>
<!---------------------------- JavaScript--------------------------  -->

<button onclick= "generatePDF()">Download </button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script type ="text/javascript">
    function generatePDF(){
        const element = document.getElementById("container");

     var opt = {
  margin:       1,
  filename:     'test_file.pdf',
  image:        { type: 'jpeg', quality: 0.98 },
  html2canvas:  { scale: 2 },
  jsPDF:        { unit: 'mm', format: 'letter', orientation: 'landscape' }
};

html2pdf().set(opt).from(element).save();
    } 
    </script>
<!---------------------------- JavaScript--------------------------  -->    





    </body>
</html>
 
