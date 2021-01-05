
<?php require APPROOT . '/views/components/header.php';?>

      <h2 class="mb-4">New Expense</h2>
        <span><?php echo date("jS \of F Y ( l )"); ?></span>

        <div class="row mt-5">
        <div class="col-md-4"></div>
        
        <form class="col-md-8" action="<?php echo URLROOT ?>/expense/store" method="POST">
            <div class="form-group">
                <label >Amount</label>
                <input type="number" class="form-control" name="amount" id="amount" placeholder="enter amount here">
            </div>
            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="number" class="form-control" name="qty" id="qty" placeholder="enter quantity here">
            </div>
            <div class="form-group">
                <label >Category</label>
                <select class="form-control" id="category" name="category_id">
                
                <?php 
                    foreach($data['categories'] as $category)
                    {
                ?>
                <option value="<?php  echo $category['id'] ?>">
                    <?php  echo $category['name'] ?>
                </option>

                <?php
                    }
                ?>

                </select>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <input type="reset" class="btn btn-secondary float-right btn-block" value="Reset">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary float-right btn-block">Add</button>
                </div>
            </div>
        </form>
        
        </div>  <!-- end of row -->

  

<?php require APPROOT . '/views/components/footer.php';?>
