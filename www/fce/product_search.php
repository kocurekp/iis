<?php 
    /**
 * Include our MySQL connection.
 */
require 'connect.php';

	if (empty($_POST['search'])) {
		header('Location: ../obsah/product_preview.php');
	}


function print_Product($row)
{
   	$print = '
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                <div class="d-flex p-3 justify-content-center">
                    <div class="p-2 circle-closed"></div>
                </div>
                    <div class="card-body">
                    <form action="../obsah/product.php" method="post" accept-charset="utf-8">
                        <h4 class="card-title"><a>Produkt: '.$row['name'].'</a></h4>

                    <input type="hidden" name="ID_product" value="'.$row['ID_product'].'">
                    
                        <p class="card-text">'.$row['description'].'</p>
                        <button style="width:100%" class="btn btn-outline-info btn-block" type="submit" >Open</button>
                    </form>
                    </div>
                </div>
            </div>';
    echo $print;
}

function load_products_search($array)
{


    $sql = 'SELECT ID_product, name, description FROM Product ORDER BY ID_product DESC';
    $pdo4 = pdo();
    $stmt = $pdo4->prepare($sql);


    //Execute.
    $stmt->execute();
    
    while ($row = $stmt->fetch())
    {
        foreach ($array as $key => $value) {
                if ($value == $row['name']) {
                 print_Product($row);
                        # code...
                }
            }
   }

}

function search()
{

    if (!empty($_POST['search'])) {
    
        $search = $_POST['search'];
        // echo $search;

        $sql = 'SELECT name, ID_product FROM Product ORDER BY ID_product DESC';
        $pdo1 = pdo();
        $stmt = $pdo1->prepare($sql);


    //Execute.
        $stmt->execute();


        $array = new ArrayObject();
        $match = new ArrayObject();

        while ($row = $stmt->fetch())
        {

            $array->append($row['name']);

        }
        foreach ($array as $key => $value) {

            if(strpos($value, $search) !== false){
            // echo "Word Found!";
                $match->append($value);

            } else{
            // echo "Word Not Found!";
            }
        }

        load_products_search($match);

        // print_r($match);
        // header('Location: ../obsah/product_preview.php');
    }
    else{
        header('Location: ../obsah/product_preview.php');

    }

}

 ?>