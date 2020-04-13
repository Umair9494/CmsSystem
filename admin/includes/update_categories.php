
                    <form action="" method="post">
                          <div class="form-group">
                            <label for="cat-title">Update a Category</label>
                                <?php
                                //update a category
                                if(isset($_GET['edit'])) {
                                    $cat_id = $_GET['edit'];
                                    $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                                    $fetchRecords = mysqli_query($connection, $query);   //execute the query
                                    while ($row = mysqli_fetch_assoc($fetchRecords)) {   //fetch records from db
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        ?>
                                        <input value="<?php if(isset($cat_title)){ echo $cat_title;} ?>"
                                               type="text" class="form-control" name="cat_title">
                                    <?php
                                    }}?>
                                <?php
                                    if(isset($_POST['update_category'])){
                                    $cat_title = $_POST['cat_title'];
                                    $query = "UPDATE categories SET cat_title = '{$cat_title}'  WHERE cat_id = {$cat_id} ";
                                    $update_query = mysqli_query($connection,$query);
                                    if(!$update_query){
                                        die("QUERY FAILED!" . mysqli_error($connection));
                                    }
                                }
                            ?>
                          </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="update_category" value="Update Category">
                        </div>
                    </form> 
                  
