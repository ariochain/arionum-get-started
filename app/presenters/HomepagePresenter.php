<?php

namespace App\Presenters;

use Nette;
use pxgamer\Arionum\Arionum; // use pxgamer's API wrapper


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    
    private $nodeUrl = 'http://peer1.arionum.com'; // this define node url we want to comunicate with

    private $address = '5WuRMXGM7Pf8NqEArVz1NxgSBptkimSpvuSaYC79g1yo3RDQc8TjVtGH5chQWQV7CHbJEuq9DmW5fbmCEW4AghQr'; // address we want to use for donation page
    

    public function renderDefault () {

        $arionum = new Arionum($this->nodeUrl); // initialize new class

        $balance = $arionum->getBalance($this->address); // load balance

        $this->template->balance  = $balance; // assign value to template

        $this->template->address  = $this->address; // assign value to template

        $transactions = $arionum->getTransactions($this->address); // load last transactions

        $this->template->transactions  = $transactions; // assign value to template



    }
}
