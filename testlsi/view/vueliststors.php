<?php $this->titre='book store' ?>
<div class="container ">
  <table class="table">
  <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">address</th>
        <th scope="col">Email</th>
        <th scope="col">phone number</th>
        <th scope="col"></th>
        <th scope="col">actions</th>
        <th scope="col"></th>

      </tr>
  </thead>
  <tbody>
    <?php foreach ($liststors as $store) {?>
    <tr>
      <td> <?php echo $store->getNameS(); ?> </td>
      <td> <?php echo $store->getAdresse(); ?> </td>
      <td> <?php echo $store->getEmail(); ?>  </td>
      <td> <?php echo $store->getTele(); ?>  </td>
      <td><a  href="index.php?action=<?php echo "mybooks"?>&ids=<?php echo $store->getId_S(); ?>"><button type = "submit" class = "btn btn-info" >log in</button></a></td>
      <td><a  href="index.php?action=<?php echo "modifierstore"?>&ids=<?php echo $store->getId_S(); ?>"><button type = "submit" class = "btn btn-warning" >Edit</button></a></td>
      <td><a @onclick="" href="index.php?action=<?php echo "suppstore"?>&id=<?php echo $store->getId_S(); ?>"><button type = "submit" class = "btn btn-danger">Delete</button></a></td>
    </tr>
    <?php } ?>
  </tbody>
  </table>
<div class="text-center">
  <a @onclick="" href="index.php?action=<?php echo "inscription"?>"><button type = "submit" class = "btn btn-light">add one </button></a></td>

</div>
</div>
