<?php
   session_start();
   
   
   
   $con = mysqli_connect('localhost','root');
   if($con){
      echo "create test";
   }
  
   	mysqli_select_db($con,'quizdatabase');
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
   </head>
</html>

<input type="file" id="fileUpload" />
<input type="button" id="upload" value="Preview" />
<button type="reset" value="Reset">Reset</button>
<hr />
<div id="dvExcel"></div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>
<script type="text/javascript">

    $("body").on("click", "#upload", function () {
        //Reference the FileUpload element.
        var fileUpload = $("#fileUpload")[0];
 
        //Validate whether File is valid Excel file.
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xls|.xlsx)$/;
        if (regex.test(fileUpload.value.toLowerCase())) {
            if (typeof (FileReader) != "undefined") {
                var reader = new FileReader();
 
                //For Browsers other than IE.
                if (reader.readAsBinaryString) {
                    reader.onload = function (e) {
                        ProcessExcel(e.target.result);
                    };
                    reader.readAsBinaryString(fileUpload.files[0]);
                } else {
                    //For IE Browser.
                    reader.onload = function (e) {
                        var data = "";
                        var bytes = new Uint8Array(e.target.result);
                        for (var i = 0; i < bytes.byteLength; i++) {
                            data += String.fromCharCode(bytes[i]);
                        }
                        ProcessExcel(data);
                    };
                    reader.readAsArrayBuffer(fileUpload.files[0]);
                }
            } else {
                alert("This browser does not support HTML5.");
            }
        } else {
            alert("Please upload a valid Excel file.");
        }
    });
    function ProcessExcel(data) {
        //Read the Excel File data.
        var workbook = XLSX.read(data, {
            type: 'binary'
        });
 
        //Fetch the name of First Sheet.
        var firstSheet = workbook.SheetNames[0];
 
        //Read all rows from First Sheet into an JSON array.
        var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);
 
        //Create a HTML Table element.
        var table = $("<table />");
        table[0].border = "1";
 
        //Add the header row.
        var row = $(table[0].insertRow(-1));
 
       //Add the header cells.
        var headerCell = $("<th />");
        headerCell.html("Id");
        row.append(headerCell);
 
        var headerCell = $("<th />");
        headerCell.html("Question");
        row.append(headerCell);
 
        var headerCell = $("<th />");
        headerCell.html("OptionA");
        row.append(headerCell);
        
        var headerCell = $("<th />");
        headerCell.html("OptionB");
        row.append(headerCell);
        
        var headerCell = $("<th />");
        headerCell.html("OptionC");
        row.append(headerCell);
        
        var headerCell = $("<th />");
        headerCell.html("OptionD");
        row.append(headerCell);
 
        //Add the data rows from Excel file.
        for (var i = 0; i < excelRows.length; i++) {
            //Add the data row.
            var row = $(table[0].insertRow(-1));
 
            //Add the data cells.
            var cell = $("<td />");
            cell.html(excelRows[i].Id);
            row.append(cell);
 
            cell = $("<td />");
            cell.html(excelRows[i].Question);
            row.append(cell);
 
            cell = $("<td />");
            cell.html(excelRows[i].OptionA);
            row.append(cell);
            
            cell = $("<td />");
            cell.html(excelRows[i].OptionB);
            row.append(cell);
            
            
            cell = $("<td />");
            cell.html(excelRows[i].OptionC);
            row.append(cell);
            
            cell = $("<td />");
            cell.html(excelRows[i].OptionD);
            row.append(cell);
        }
 
        var dvExcel = $("#dvExcel");
        dvExcel.html("");
        dvExcel.append(table);
      

    
</script>
<!DOCTYPE html>
<html>

<body>
 <a href="logout.php" class="btn btn-primary d-block m-auto text-white" > Logout </a> <br> 

   
</body>
</html>
