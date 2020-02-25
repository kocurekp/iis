<?php

function print_TicketPreview(){
    require "../fce/load_ticket.php";
echo('<div class="row">
    <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="d-flex p-3 justify-content-center">
                    <h4 class="card-title"><a href="../obsah/new_ticket_no_product.php"><div class="p-2 circle-add"></div></a></h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title"><a href="../obsah/new_ticket_no_product.php">Přidat ticket</a></h4>
                </div>
            </div>
        </div>');
Load_tickets();
echo('</div>');
    }

function print_TaskPreview(){
    require "../fce/load_task.php";
    echo('<div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <div class="d-flex p-3 justify-content-center">
                            <a href="new_task_no_ticket.php"><div class="p-2 circle-add"></div></a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><a href="new_task_no_ticket.php">Přidat úkol</a></h4>
                        </div>
                    </div>
                </div>');
    load_Tasks();
        echo('</div>');

    }
function print_ProductPreview(){
    require "../fce/load_product.php";
    echo ('<div class="row">
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="d-flex p-3 justify-content-center">
                    <div class="p-2 circle-add"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title"><a href="../obsah/new_product.php">Přidat Produkt</a></h4>
                </div>
            </div>
        </div>');
    Load_Products();
    echo('</div>');
    }
    function print_UserPreview(){
        require "../fce/load_user.php";
        echo '
                <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 p-2">
                <form class="card card-sm" method="post" action="admin_search.php">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto"></div><!--end of col-->

                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless" name="search" type="search" placeholder="Hledat podle jména">
                        </div><!--end of col-->

                        <div class="col-auto">
                            <button class="btn btn-lg btn-dark" type="submit">Hledat</button>
                        </div><!--end of col-->
                    </div>
                </form>
            </div><!--end of col-->
        </div>
    ';
        echo '<div class="row">';
        Load_Users();
        echo '</div>';
    }

    function print_cannotPreview(){
        echo '<h1 class="text-center">Nedostatečné oprávnění</h1>';
    }


?>