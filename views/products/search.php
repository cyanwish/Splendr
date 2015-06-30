<!-- Page Content -->
    <div class="container">
        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1>Suchergebnisse
                    <small>Alle</small>
                </h1>
                <hr>
                <?php echo Message::show(); ?>
                <?php
                    if (!sizeof($data['search'])) {
                        echo '<br><br><div class="alert alert-info">Ihre Suche hat leider keine Treffer ergeben.</div><br><br>';
                    }
                ?>
            </div>
        </div>
        <!-- /.row -->
        
        <!-- Projects Row -->
        <div class="row">
        <?php 
            if (sizeof($data['search'])) {
                foreach ($data['search'] as $search) {
                    echo 
                        '<div class="col-md-4 portfolio-item">
                            <div style="background-color: #4e5d6c; padding: 20px 20px; 20px; 20px;">
                                <div type="hidden" style="height: 205.703px; width:360px;"
                            <a href="' . $search['url'] . '">
                                <img class="img-responsive" style="max-height:205.703px; max-width:360px;" src="' . $search['image'] . '" alt="">
                            </a>
                            </div>
                            
                            <h3>
                                <a href="' . $search['url'] . '">' . $search['name'] . '</a>
                            </h3>
                            <p>Preis:' . $search['price'] . '</p>
                            <div class="buttons-edit">
                                <a class="btn btn-info btn-sm" href="' . DIR . 'products/edit/' . $search['id'] . '" >Bearbeiten</a>
                                <a class="btn btn-danger btn-sm" href="' . DIR . 'products/delete/' . $search['id'] . '">Löschen</a>
                            </div>
                            </div>
                            <br>
                        </div>';
                    }
            }
        ?>
        </div>
        <hr>
        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->