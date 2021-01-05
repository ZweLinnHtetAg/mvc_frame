
<?php require APPROOT . '/views/components/header.php';?>

      <h2 class="mb-4">Income</h2>

      <?php include(APPROOT.'/views/components/message.php'); ?>


      <table class="table table-light text-center" id="myTable">
      <thead>
       <tr>
         <th>id</th>
         <th>Category</th>
         <th>Amount</th>
         <th>Assigned By</th>
         <th>Date </th>
         <th></th>
         <th></th>
       </tr>
       </thead>
        <?php
            foreach( $data['incomes'] as $income )
            {
               ?>
               <tr>
               <td><?php echo $income['id'] ?></td>
               <td><?php echo $income['category_name'] ?></td>
               <td><?php echo $income['amount'] ?></td>
               <td><?php echo $income['user_name'] ?></td>
               <td><?php echo $income['date'] ?></td>
               <td>
                  <a href="<?php echo URLROOT ?>/income/edit/<?php echo $income['id'] ?>" class="btn btn-primary">Edit</a>
               </td>
               <td>
                  <a href="<?php echo URLROOT ?>/income/destory/<?php echo base64_encode($income['id']) ?>" class="btn btn-danger">Delete</a>
               </td>
               </tr>
               <?php
            }

         ?>
      </table>
      <a href="<?php echo URLROOT ?>/income/create" class="btn btn-primary float-right mt-5">Add New</a>


<?php require APPROOT . '/views/components/footer.php';?>
