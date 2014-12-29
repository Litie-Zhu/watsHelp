<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WatsHelp Corpus Management</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="management.css">
  </head>
  <body>
    <h1>WatsHelp Corpus Management<small> - Basic</small></h1>
    <section class="result">
      <div class='container'>
          <div id="btn-wrap" class="col-lg-2">
            <ul class="nav">
              <li class="col-lg-12 col-sm-2 col-xs-4"><button type="button" class="btn btn-primary btn-block">Upload</button></li>
              <li class="col-lg-12 col-sm-2 col-xs-3"><button type="button" class="btn btn-primary btn-block">Delete</button></li>
              <li class="col-lg-12 col-sm-3 col-xs-5"><button type="button" class="btn btn-primary btn-block">Create Corpus</button></li>
            </ul>
          </div>

          <div id="table-wrap" class="col-lg-10">
              <table class='table table-hover table-bordered'>
                <thead>
                  <tr>
                    <th class="col-lg-4">Name</th>
                    <th class="col-lg-1">Status</th>
                    <th class="col-lg-1">Size</th>
                    <th class="col-lg-1">Type</th>
                    <th class="col-lg-2">Uploaded On</th>
                    <th class="col-lg-2">Uploaded By</th>
                    <th class="col-lg-1">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  require 'file_data.php';
                  foreach($files as $file) {
                    echo "    <tr>";
                    echo "    <td>" . $file[0] . "</td>";
                    echo "    <td>" . $file[1] . "</td>";
                    echo "    <td>" . $file[2] . "</td>";
                    echo "    <td>" . $file[3] . "</td>";
                    echo "    <td>" . $file[4] . "</td>";
                    echo "    <td>" . $file[5] . "</td>";
                    echo "    <td><i class='fa fa-cloud-download'></i></td>";
                    echo "    </tr>";
                  }
                ?>
                </tbody>
              </table>
          </div>
          <hr>
          <div class="col-lg-10 col-sm-12 col-xs-12 pull-right">
            <small class="pull-left">Corpus Created: 1/1</small>
            <small class="pull-right">Storage: 3.1MB/10MB</small>
          </div>
      </div>
    </section>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>