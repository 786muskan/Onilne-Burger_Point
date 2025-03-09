<?php 
    require('nav.php');
    require('sidebar.php');
   
    // Fetch vegetarian fries products
    $res = $obj->allfries('Vegetarian');
    $user = isset($_REQUEST['username']) ? htmlspecialchars(trim($_REQUEST['username']), ENT_QUOTES, 'UTF-8') : ''; // Sanitize the username

    if ($res != null) {
        if (isset($_REQUEST['p_id'])) {
            // Check if user is logged in
            if (isset($_SESSION['name'])) {
                $id = $obj->searchCustomerController($user);  // Get customer ID based on username
                $ans = '1';  // Indicate the add-to-cart action
                $obj->addtocart($_REQUEST['p_id'], $id['id']);  // Add product to the cart
            } else {
                echo "<script>alert('Please log in to add items to the cart'); window.location.href = 'login.php'</script>";
            }
        }
    }
?>  

<div class="container">
    <h2 align="center">Vegetarian French Fries</h2>
    <div class="row mt-5 mb-5 d-flex justify-content-around">
        <?php 
        if (!empty($res) && is_array($res)) {
            // Loop through each vegetarian fries product
            for ($i = 0; $i < count($res); $i++) {
                if ($i != 0 && $i % 3 == 0) {
                    echo '</div><div class="row mt-5 mb-5 d-flex justify-content-around">';  // Start a new row after every 3 items
                }
        ?>
                <div class="col-lg-3 col-md-4 mb-4" style="display: flex; justify-content: center; align-items: stretch; width: 100%; max-width: 300px;"> <!-- Ensuring consistent width -->
                    <div class="card text-center p-3" style="display: flex; flex-direction: column; justify-content: space-between; height: 100%; width: 100%; max-width: 100%;"> <!-- Ensuring equal height and width for the card -->
                        <img src="../admin/attachment/upload/<?php echo $res[$i]['image'] ?>" class="card-img-top img-fluid" alt="Product Image" onerror="this.src='path/to/placeholder.jpg';" style="flex-shrink: 0; width: 100%; height: auto;">
                        <div class="card-body" style="display: flex; flex-direction: column; justify-content: space-between; flex-grow: 1;">
                            <h4 class="card-title"><?php echo $res[$i]['name'] ?></h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-danger h5"><?php echo $res[$i]['price'] ?></span>
                                <a href="friesveg.php?p_id=<?php echo $res[$i]['id']; ?>&username=<?php echo $user ?>&ans=<?php echo $ans ?>" class="btn btn-outline-danger mt-3">Add</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div> 

<?php 
    require('footer.php');
?>
