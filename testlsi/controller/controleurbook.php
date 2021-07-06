<?php
//importer les class de model et view
require_once "model/book.php";
require_once "model/bookDAO.php";
require_once "model/store.php";
require_once "model/storeDAO.php";
require_once "model/has.php";
require_once "model/hasDAO.php";
require_once "view/view.php";

//class ControleurBook
class ControleurBook{
  private $book;
  private $bookDAO;
  private $Store;
  private $StoreDAO;
  private $has;
  private $hasDAO;

//const
  public function __construct(){
    $this->bookDAO = new BookDAO();
    $this->StoreDAO = new StoreDAO();
    $this->hasDAO = new HasDAO();

  }//fin_const
//actions
  public function getAllBooks(){
    $books=$this->bookDAO->getAll();
    $vue =new Vue("listbook");
    $vue->generer(array('listbooks' => $books ));

  }//FIN_getAllBooks

  public function addBook(){
    $vue = new Vue("addbook");
    $vue->generer(array());
  if(isset($_POST['submit'])){
    $a = $_POST['name'] ;
    $b = $_POST['auteur'] ;
    $c = $_POST['annee'] ;

    $bookPerson = new Book($_POST["name"], $_POST["auteur"] , $_POST["annee"] ,"");
    $bookPersonDAO = new BookDAO();

    $bookPersonDAO->save($bookPerson);
    //-----------------------------------------------------------
    $id_b = $bookPersonDAO->get_id_book($a, $b , $c);
    
    $has = new Has($id_b,$_GET['ids']);
    $this->hasDAO->savehas($has);

    }
  }//FIN_addBook
  public function editeBook(){
    $onebook = $this->bookDAO->get_one();
    $vue = new Vue("modifierbook");
    $vue->generer(array('onebook'=>$onebook));
  if(isset($_POST['submit'])){
    $bookPerson = new Book($_POST["name"], $_POST["auteur"] , $_POST["annee"] ,"");
    $bookPersonDAO = new BookDAO();
    $bookPersonDAO->modifier($bookPerson);


    }
  }//FIN_editeBook

public function deletbook(){

  $this->bookDAO->supprimer();

  $books=$this->bookDAO->getAll();
  $vue = new Vue("listbook");
  $vue->generer(array('listbooks' => $books ));

}

public function delfromHas(){
$store = $this->StoreDAO->get_one_store();

$this->hasDAO->supprimer();
$this->bookDAO->supprimer();

$hasbook =$this->hasDAO->mybooks();

$vue = new Vue("mybooks");
$vue->generer(array('onestore'=>$store,'hasbook'=>$hasbook));
}
//----------------------------BOOK_STORE-------------------
public function addstore(){
  $vue =new Vue("inscription");
  $vue->generer(array());
  if(isset($_POST['submit'])){
    $onestore = new Store($_POST["name"], $_POST["adresse"] , $_POST["email"] ,$_POST["telephone"],"");
    $onestoreDAO = new StoreDAO();
    $onestoreDAO->save($onestore);
    }
}
public function getAllStors(){
  $stors=$this->StoreDAO->getAll();
  $vue =new Vue("liststors");
  $vue->generer(array('liststors' => $stors ));
}

public function editStore(){
  $store = $this->StoreDAO->get_one_store();
  $vue = new Vue("modifierstore");
  $vue->generer(array('onestore'=>$store));
if(isset($_POST['submit'])){
  $onestore = new Store($_POST["name"], $_POST["adresse"] , $_POST["email"] ,$_POST["telephone"],"");
  $onestoreDAO = new StoreDAO();
  $onestoreDAO->modifier($onestore);
  }

}//fin_edit

public function deleteStore(){
  $this->StoreDAO->supprimer();
  $stors=$this->StoreDAO->getAll();
  $vue =new Vue("liststors");
  $vue->generer(array('liststors' => $stors ));

}


public function getMyBooks(){
$store = $this->StoreDAO->get_one_store();
$hasbook =$this->hasDAO->mybooks();

$vue = new Vue("mybooks");
$vue->generer(array('onestore'=>$store,'hasbook'=>$hasbook));

}

public function start(){
  $vue = new Vue('start');
  $vue->generer(array());
}

}//FIN_Controleur

 ?>
