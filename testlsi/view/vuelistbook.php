<?php $this->titre = "My Books"; ?>

<div class="container">
  <table class="table">
  <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Year</th>
        <th scope="col">Author</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($listbooks as $book) {?>
    <tr>
      <td> <?php echo $book->getName(); ?> </td>
      <td> <?php echo $book->getAnnee(); ?> </td>
      <td> <?php echo $book->getAuteur(); ?>  </td>
      <td><a href="index.php?action=<?php echo "modifierbook"?>&id=<?php echo $book->getId(); ?>"><button type = "submit" class = "btn btn-info" >Edit</button></a></td>
      <td><a href="index.php?action=<?php echo "suppression"?>&id=<?php echo $book->getId(); ?>"><button type = "submit" class = "btn btn-danger">Delete</button></a></td>
    </tr>
    <?php } ?>
  </tbody>
  </table>
  <div class="text-center">
    <a @onclick="" href="index.php?action=<?php echo "addbook"?>"><button type = "submit" class = "btn btn-light">creat new store </button></a></td>

  </div>
</div>
