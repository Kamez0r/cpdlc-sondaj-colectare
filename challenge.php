<!DOCTYPE html>
<html lang="en">
  <script>
    var ch_total = <?php echo $_GET['number']; ?>;
  </script>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>p5.js Drawing App</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    #instruction-container {
      background-color: #ccc;
    }

    #instruction-1 {
        color: green;
    }
    #instruction-2 {
      color: red;
    }
    #instruction-3 {
      color: blue;
    }
    #instruction-4 {
      color: aqua;
    }
  </style>
</head>
<body>

<div id="instruction-container" class="container my-4 text-center" style="position:fixed; left:50%; width: 900px; margin-left:-450px; border: 1px solid black;">
    <h1><span id="prog">-</span>/<span id="ch_total">-</span> | <span id="timer">--:--.--</span></h1>
    <h1 >You are <span id="instruction-1">Loading</span></h1>
    <h1 >Starting from <span id="instruction-2">Loading</span></h1>
    <h1 >Destination is <span id="instruction-3">Loading</span></h1>
    <h1 >Taxi via <span id="instruction-4">Loading</span></h1>
    <a href="javascript:do_undo();do_undo();" class="btn btn-primary" style="width:min-content;"><h3>Undo</h3>(CTRL+Z)</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a id="btn_submit" href="javascript:do_undo();submit_challenge();" class="btn btn-success" style="width:min-content;"><h3>Submit</h3>(CTRL+ENTER)</a>
  
    <br>
    <br>
  </div>
</div>

    <div style="width:min-content; border: 5px solid black;">
        <div id="canvas-container" style="width: 99%; height:99%;"></div>

    </div>

<!-- p5.js -->
<script src="https://cdn.jsdelivr.net/npm/p5@1.9.0/lib/p5.min.js"></script>
<!-- Your main script -->
 <script src="js/form_helper.js"></script>
<script src="js/main.js"></script>

</body>
</html>
