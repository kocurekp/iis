<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("Home");
require "../fce/load_ticket.php";
?>

<div class="container">
    <!-- PAK ZMĚNIT ZA NĚCO INTERAKTIVNIHO-->

    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto"></div><!--end of col-->

                    <div class="col">
                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
                    </div><!--end of col-->

                    <div class="col-auto">
                        <button class="btn btn-lg btn-dark" type="submit">Search</button>
                    </div><!--end of col-->
                </div>
            </form>
        </div><!--end of col-->
    </div>

    <div class="row">
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="d-flex p-3 justify-content-center">
                    <div class="p-2 circle-add"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title"><a href="../obsah/new_ticket.php">Přidat ticket</a></h4>
                </div>
            </div>
        </div>
        <?php Load_Tickets(); ?>

    </div><!-- /.row -->
</div>