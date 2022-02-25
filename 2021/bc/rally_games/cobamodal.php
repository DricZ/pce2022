<html>
    <head>
        <title>coba modal</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
<div class="container">
  <h2>Extra Large Modal</h2>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-xl-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="container">
            <div class='row'>
                <div class= 'col-sm-4'>
                    <div class="card" >
                        <img class="card-img-top" src="assets/image/jembatan Baja.png" alt="Card image" width ="100px">
                        <div class="card-body">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                            <a href="#" class="btn btn-primary stretched-link">See Profile</a>
                        </div>
                    </div>
                </div>
                <div class= 'col-sm-4' >
                    <div class="card" >
                        <img class="card-img-top" src="assets/image/jembatan Kayu.png" alt="Card image" width = "100px">
                        <div class="card-body">
                            <h4 class="card-title">John Doe2</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                            <a href="#" class="btn btn-primary stretched-link">See Profile</a>
                        </div>
                    </div>
                </div>

                <div class= 'col-sm-4'>
                    <div class="card" >
                        <img class="card-img-top" src="assets/image/jembatan Beton.png" alt="Card image"width = "100px">
                        <div class="card-body">
                            <h4 class="card-title">John Doe3</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                            <a href="#" class="btn btn-primary stretched-link">See Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>


    </body>
</html>