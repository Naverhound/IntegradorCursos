<?php 
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require __DIR__ . "/../inc/functions/PayPal/credentialsPayPal.php";//The __DIR__ magic constant returns the directory of the current file.
if(isset($_POST['name'],$_POST['cost'],$_POST['descript'])){//if there is no name in the post request
    //printf($_POST['descript']);
    //exit('fdas');
    $name=htmlspecialchars($_POST['name']);
    $cost=(int) $_POST['cost'];
    $descript=$_POST['descript'];
    $discount=0.5;//50% discount, we can also get it from the DB if avaiable and reieve it in the ajax petition
    $total=$cost-($cost*$discount);
    //exit($cost);
    $payer=new Payer();
    $payer->setPaymentMethod('paypal');

    $item= new Item();
    $item->setName($name)
         ->setCurrency('MXN')
         ->setQuantity(1)
         ->setPrice($cost)
         ->setDescription($descript);
    $ListOfItems=[$item];

    $items=new ItemList();
    $items->setItems($ListOfItems);//demands an array to be sent

    $details= new Details();
    $details->setSubtotal($cost);

    $amount=new Amount();
    $amount->setCurrency('MXN')
            ->setTotal($cost)
            ->setDetails($details);
    
    $transaction=new Transaction();
    $transaction->setAmount($amount)
                ->setItemList($items)
                ->setDescription('Payment for adknowledge')
                ->setInvoiceNumber(uniqid());
    $redir=new RedirectUrls();
    $redir->setReturnUrl(SITE_URL."/index.php?success=true")
            ->setCancelUrl(SITE_URL."/index.php?success=false");
//var_dump($redir);
    $payment=new Payment();
    $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redir)
            ->setTransactions(array($transaction))//in case of several transactions, must be separeted by a ","
            ;
    try{
        //exit ($payment);
        $payment->create($apiContext);
    }catch(PayPal\Exception\PayPalConnectionException $e){
        
        echo "<pre>";
            print_r(json_decode($e->getData()));
            exit;
        echo"</pre>";
    }
    $approved=$payment->getApprovalLink();
    header("Location: {$approved}");
    
}else{
exit ("Some data was inadequate");
}

?>