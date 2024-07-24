
    <?php include('partials-front/menu.php'); ?>

    <!-- tool sEARCH Section Starts Here -->
    <section class="tool-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>tool-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for tool.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- tool sEARCH Section Ends Here -->



    <!-- tool MEnu Section Starts Here -->
    <section class="tool-menu">
        <div class="container">
            <h2 class="text-center">tool Menu</h2>

            <?php 
                //Display tools that are Active
                $sql = "SELECT * FROM tbl_tool WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the tools are availalable or not
                if($count>0)
                {
                    //tools Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="tool-menu-box">
                            <div class="tool-menu-img">
                                <?php 
                                    //CHeck whether image available or not
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

                                <a href="<?php echo SITEURL; ?>order.php?tool_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //tool not Available
                    echo "<div class='error'>tool not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- tool Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>