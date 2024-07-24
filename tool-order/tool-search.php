
    <?php include('partials-front/menu.php'); ?>

    <!-- tool sEARCH Section Starts Here -->
    <section class="tool-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>


            <h2>tools on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- tool sEARCH Section Ends Here -->



    <!-- tool MEnu Section Starts Here -->
    <section class="tool-menu">
        <div class="container">
            <h2 class="text-center">tool Menu</h2>

            <?php 

                //SQL Query to Get tools based on search keyword
                //$search = burger '; DROP database name;
                // "SELECT * FROM tbl_tool WHERE title LIKE '%burger'%' OR description LIKE '%burger%'";
                $sql = "SELECT * FROM tbl_tool WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether tool available of not
                if($count>0)
                {
                    //tool Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="tool-menu-box">
                            <div class="tool-menu-img">
                                <?php 
                                    // Check whether image name is available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/tool/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php 

                                    }
                                ?>
                                
                            </div>

                            <div class="tool-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="tool-price">$<?php echo $price; ?></p>
                                <p class="tool-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //tool Not Available
                    echo "<div class='error'>tool not found.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- tool Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>