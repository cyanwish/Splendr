<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $data['title'] . ' - ' . SITETITLE ?></title>

    <link href="<?= URL::STYLES('bootstrap') ?>" rel="stylesheet">
    <link href="<?= URL::STYLES('style') ?>" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="/static/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/static/js/bootstrap.js"></script>
    <script src="/static/js/ownjs.js"></script>
</head>
<!-- dark blue #2b3e50 // light blue #4e5d6c -->

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= DIR ?>">Splendr</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="profile.html">Profil</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Boards <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="board.html">Beliebte Boards</a>
                            </li>
                            <li><a href="board.html">Aufsteigende Boards</a>
                            </li>
                            <li><a href="board.html">Neue Boards</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="profile.html">Eigene Boards</a>
                            </li>
                            <li><a href="#">Neues Board erstellen</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Produkte <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= DIR . products ?>">Beliebte Produkte</a>
                            </li>
                            <li><a href="#">Aufsteigende Produkte</a>
                            </li>
                            <li><a href="#">Neue Produkte</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Produktkategorien</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="profile.html">Eigene Produkte</a>
                            </li>
                            <li><a href="#" data-toggle="modal" data-target=".bs-modal-pm">Produkt hinzufügen</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <form class="navbar-form navbar-right" action="<? echo DIR . 'products/search/' ?>" method="GET">
                            <input type="text" class="form-control" placeholder="Suche" type='submit' name="q">
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <? if(isset($_SESSION['email'])) {
                    echo '<li class="nav btn-primary">
                             <a role="button" href="' . DIR . 'user/logout/">&nbsp; Abmelden &nbsp;</a>
                         </li>';
                    } else {
                    echo '<li class="nav btn-primary">
                        <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Anmelden <b class="caret"></b></a>
                        <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                            <li class="divider" id="special_divider"></li>
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form" role="form" method="POST" action="' . DIR .'user/login/" accept-charset="UTF-8" id="login-nav">
                                            <input type="hidden" name="location" value="' . $data['url'] . '"/>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail2" name="email" placeholder="E-Mail Adresse" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword2" name="password" placeholder="Passwort" required>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="true" name="keepLogged"> angemeldet bleiben
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-block">Anmelden</button>
                                            </div>
                                            </form>
                                        
                                            <div class="form-group">
                                                <!-- button-->
                                                <button type="button" class="btn btn-danger btn-block" href="#" data-toggle="modal" data-target="#registrationModal">Registrieren
                                                </button>
                                            </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>'; 
                    } ?>
                    
                </ul>
            </div>
        </div>
    </nav>

    <script type="text/javascript">
        $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
        });
    </script>
    
    
    <!-- modal registration -->
    <div class="modal fade bs-modal-pm" id="registrationModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-pm">
            <div class="modal-content">

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <br>
                        <br>
                        <form class="form-horizontal" role="form" action="<? echo DIR . 'user/registration/' ?>" method="POST">
                            <fieldset>
                                <!-- Form Name -->
                                <legend>Registrierung</legend>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">Vorname</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="firstname" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">Nachname</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="lastname" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">E-Mail Adresse</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">Passwort</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">Passwort wiederholen</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="passwordVal" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="pull-right">
                                            <button type="button" data-dismiss="modal" class="btn btn-danger">Abbbrechen</button>
                                            <button type="submit" class="btn btn-success"> &nbsp; Registrieren &nbsp; </button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                        </form>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    
    <!-- modal product creating -->
    <div class="modal fade bs-modal-pm" id="editProductsModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-pm">
            <div class="modal-content">

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <br>
                        <br>
                        
                        <?php
                            $product = $data['product'][0];
                            if (isset($product['id'])) {
                                echo     
                        '<form class="form-horizontal" role="form" action="' . DIR . 'products/doEdit/' . $product['id'] . '" method="POST">
                            <fieldset>
                                <!-- Form Name -->
                                <legend>' . $data['createOrEdit'] . '</legend>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" placeholder="IPhone 6" value="' . $product['name'] . '" class="form-control">
                                    </div>
                                </div>
                                
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">Preis</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="price" placeholder="300.-" value="' . $product['price'] . '" class="form-control">
                                    </div>
                                </div>
                                
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">URL</label>
                                    <div class="col-sm-10">
                                        <input type="url" name="url" placeholder="www.Amazon.com/.../" value="' . $product['url'] . '" class="form-control">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">Bild-URL</label>
                                    <div class="col-sm-10">
                                        <input type="url" name="image" placeholder="www.Amazon.com/.../.jpeg" value="' . $product['image'] . '" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="select" class="col-lg-2 control-label">Board auswählen</label>
                                    <div class="col-lg-10">
                                        <select required class="form-control" name="board" id="select">';
                                if($product['board'] == 'Technik') {
                                    echo '<option selected>Technik</option>
                                            <option>Mode</option>
                                            <option>Bier</option>';}
                                if($product['board'] == 'Mode') {
                                    echo '<option>Technik</option>
                                            <option selected>Mode</option>
                                            <option>Bier</option>'; }
                                if($product['board'] == 'Bier') {
                                    echo '<option>Technik</option>
                                            <option>Mode</option>
                                            <option selected>Bier</option>'; }
                                echo '</select>
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="pull-right">
                                            <a class="btn btn-danger" href="' . DIR . '' . $data['url'] . '">Abbbrechen</a>
                                            <button type="submit" class="btn btn-success"> &nbsp; Speichern &nbsp; </button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                        </form>';
                            }
                        ?>
                        
                        <?php
                            $product = $data['product'][0];
                            if (!isset($product['id'])) {
                                echo     
                        '<form class="form-horizontal" role="form" action="' . DIR . 'products/insert" method="POST">
                            <fieldset>
                                <!-- Form Name -->
                                <legend>' . $data['createOrEdit'] . '</legend>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" placeholder="IPhone 6" class="form-control">
                                    </div>
                                </div>
                                
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">Preis</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="price" placeholder="300.-" class="form-control">
                                    </div>
                                </div>
                                
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">URL</label>
                                    <div class="col-sm-10">
                                        <input type="url" name="url" placeholder="www.Amazon.com/.../" class="form-control">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">Bild-URL</label>
                                    <div class="col-sm-10">
                                        <input type="url" name="image" placeholder="www.Amazon.com/.../.jpeg" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="select" class="col-lg-2 control-label">Board auswählen</label>
                                    <div class="col-lg-10">
                                        <select required="required" class="form-control" name="board" id="select">
                                            <option disabled selected> -- Wählen Sie aus -- </option>
                                            <option>Technik</option>
                                            <option>Mode</option>
                                            <option>Bier</option>
                                        </select>
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="pull-right">
                                            <a class="btn btn-danger" href="' . DIR . '' . $data['url'] . '">Abbbrechen</a>
                                            <button type="submit" class="btn btn-success"> &nbsp; Speichern &nbsp; </button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                        </form>';
                            }
                        ?>
                        
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>