<?php $this->titre = "My Books"; ?>

<div class="container">
<?php foreach ($onestore as $store) {?>
<h3> Welcome <?php echo $store->getNameS(); ?> your Books here !!!</h3>
<?php } ?>
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
    <?php foreach ($hasbook as $hasb) {?>
    <tr>
      <td> <?php echo $hasb->getName(); ?> </td>
      <td> <?php echo $hasb->getAnnee(); ?> </td>
      <td> <?php echo $hasb->getAuteur(); ?>  </td>
      <td><a href="index.php?action=<?php echo "modifierbook"?>&id=<?php echo $hasb->getId(); ?>"><button type = "submit" class = "btn btn-info" >Edit</button></a></td>
<?php foreach ($onestore as $store) {?>
      <td><a href="index.php?action=<?php echo "deletehasbook"?>&id=<?php echo $hasb->getId(); ?>&ids=<?php echo $store->getId_S(); ?>"><button type = "submit" class = "btn btn-danger">Delete</button></a></td>
<?php } ?>
    </tr>
    <?php } ?>
  </tbody>
  </table>
  <?php foreach ($onestore as $store) {?>
  <div class="text-center">
    <a @onclick="" href="index.php?action=<?php echo "addbook"?>&ids=<?php echo $store->getId_S(); ?>"><button type = "submit" class = "btn btn-light">add one BOOK</button></a></td>
  </div>
<?php } ?>
</div>
