<?php
//session_register('Cart');
session_start();
header('Content-Type: text/xml');
?>
<?php
    if (!isset($_SESSION["Cart"])) {
        $_SESSION["Cart"] = "";
    }
    $newitem = $_POST["book"];
    $action = $_POST["action"];
    if ($_SESSION["Cart"] != "") {
        $MDA = $_SESSION["Cart"];
        if ($action == "Add") {
            if ($MDA[$newitem] != "") {
                $value = $MDA[$newitem] + 1;
                $MDA[$newitem] = $value;
            } else {
                $MDA[$newitem] = "1";
            }
        } else {
            $MDA= "";
        }
    } else {
        $MDA[$newitem] = "1";
    }
    $_SESSION["Cart"] = $MDA;
    echo(toXml($MDA));
                                        
    
   function toXml($MDA)
   {
       $doc = new DomDocument('1.0');
       $cart = $doc->appendChild($doc->createElement('cart'));
       $total = 0;
        
       if ($MDA!="") {
           foreach ($MDA as $Item => $ItemName) {
               $book = $cart->appendChild($doc->createElement('book'));
    
               $title = $book->appendChild($doc->createElement('Title'));
               $title->appendChild($doc->createTextNode($Item));
                
               $authors = $book->appendChild($doc->createElement('Authors'));
               $authors->appendChild($doc->createTextNode($_POST['authors']));
             
               $isbn = $book->appendChild($doc->createElement('ISBN'));
               $isbn->appendChild($doc->createTextNode($_POST['ISBN']));
            
               $price = str_replace("$", "", $_POST['price']);
               $priceNode = $book->appendChild($doc->createElement('Price'));
               $priceNode->appendChild($doc->createTextNode($price));
    
               $quantity = $book->appendChild($doc->createElement('Quantity'));
               $quantity->appendChild($doc->createTextNode($ItemName));
            
               $total = $total + $price * $ItemName;
           }
       }
       $totalNode =  $cart->appendChild($doc->createElement('Total'));
       $totalNode->appendChild($doc->createTextNode($total));

       $strXml = $doc->saveXML();
       return $strXml;
   }

?>
