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
    <h1>WatsHelp Corpus Management <span class="badge">Basic</span></h1>
    <section class="result">
      <div class='container'>
          <div class="row">
            <div class="col-sm-2">
              <div class="sidebar-nav">
                <div class="navbar navbar-default" role="navigation">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <span class="visible-xs navbar-brand">Action Menu</span>
                  </div>
                  <div class="navbar-collapse collapse sidebar-navbar-collapse">
                    <ul class="nav navbar-nav">
                      <li class="active"><a id="create-corpus-tab" href="#create-corpus">Create Corpus</a></li>
                      <li><a id="manage-corpus-tab" href="#manage-corpus">Manage Corpus</a></li>
                    </ul>
                  </div><!--/.nav-collapse -->
                </div>
              </div>
            </div>

            <div id="create-corpus" class="col-sm-10">
              <div id="table-wrap">
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
                    echo "    <td>
                                <div class='checkbox'>
                                  <label>
                                    <input type='checkbox' value=''>
                                  " . $file[0] . "
                                  </label>
                                </div>
                              </td>";
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

              <div>
                <ul class="nav">
                  <li class="col-lg-3 col-sm-3 col-xs-12"><button type="button" class="btn btn-primary btn-block">Upload</button></li>
                  <li class="col-lg-3 col-sm-3 col-xs-12"><button type="button" class="btn btn-primary btn-block">Delete</button></li>
                  <li class="col-lg-3 col-sm-3 col-xs-12"><button type="button" class="btn btn-primary btn-block">Delete All</button></li>
                  <li class="col-lg-3 col-sm-3 col-xs-12"><button type="button" class="btn btn-primary btn-block">Create Corpus</button></li>
                </ul>
              </div>

              <div>
                <small class="pull-left">Corpus Created: 1/1</small>
                <small class="pull-right">Storage: 3.1MB/10MB</small>
              </div>

            </div>

            <div id="manage-corpus" class="col-sm-10">
              <div id="table-wrap">
              <table class='table table-hover table-bordered'>
                <thead>
                  <tr>
                    <th class="col-lg-4">Name</th>
                    <th class="col-lg-1">Status</th>
                    <th class="col-lg-1">Size</th>
                    <th class="col-lg-2">Created On</th>
                    <th class="col-lg-2">Created By</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  require 'file_data.php';
                  echo "    <tr>";
                  echo "    <td>
                              <div class='checkbox'>
                                <label>
                                  <input type='checkbox' value=''>
                                    <a>
                                  " . $corpora[0][0] . "
                                    </a>
                                </label>
                              </div>
                            </td>";
                  echo "    <td>" . $corpora[0][1] . "</td>";
                  echo "    <td>" . $corpora[0][2] . "</td>";
                  echo "    <td>" . $corpora[0][3] . "</td>";
                  echo "    <td>" . $corpora[0][4] . "</td>";
                  echo "    </tr>";
                ?>
                </tbody>
              </table>
            </div>

              <div>
                <ul class="nav">
                  <li class="col-lg-3 col-sm-3 col-xs-12"><button type="button" class="btn btn-primary btn-block">Delete Corpus</button></li>
                  <li class="col-lg-3 col-sm-3 col-xs-12"><button type="button" class="btn btn-primary btn-block">Deploy Corpus</button></li>
                </ul>
              </div>

              <div>
                <small class="pull-left">Corpus Deployed: 1/1</small>
                <small class="pull-right">Storage: 3.1MB/10MB</small>
              </div>

            </div>

          </div>
      </div>
    </section>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script>
    $("#manage-corpus").hide();
    $(function() {
      $( "#create-corpus-tab" ).on('click', function(e) {
        e.preventDefault();
        $(".active").toggleClass("active");
        $(this).parent().toggleClass("active");
        $("#manage-corpus").hide();
        $("#create-corpus").show();
      });
      $( "#manage-corpus-tab" ).on('click', function(e) {
        e.preventDefault();
        $(".active").toggleClass("active");
        $(this).parent().toggleClass("active");
        $("#create-corpus").hide();
        $("#manage-corpus").show();
      });
    });
  </script>
  </body>
</html>