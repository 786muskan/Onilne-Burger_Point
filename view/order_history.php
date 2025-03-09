<?php 
require('customer_nav.php');
include('../controller/orderhistoryController.php');
$obj = new OrderHistoryController();
$orderDetails = null;
$extra = "ans=1&username=". $_REQUEST['username'];

// Check if the user is logged in
if (isset($_SESSION['name'])) {
    $userInfo = $obj->CheckUsernames(trim($_REQUEST['username']));
    $userId = (int)$userInfo['id'];

    // Fetch the list of orders for the user
    $orders = $obj->showOrderHistory($userId);
    
    // If an order ID is passed in the request, fetch detailed order items
    if (isset($_REQUEST['order_id'])) {
        $orderDetails = $obj->getOrderDetails($_REQUEST['order_id']);
    }
}
?>

<div class="container">
  <!-- Order Summary Table -->
  <?php if (!isset($_REQUEST['order_id'])) { ?>
    <div class="card text-center p-3 mb-5 mt-5">
      <div class="card-body">
        <h2 class="card-title">Order History</h2>
        <hr>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th style="width:5%">Order No.</th>
                <th style="width:10%">Total Quantity</th>
                <th style="width:10%">Total Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($orders != null) { 
                foreach ($orders as $order) { ?>
                  <tr>
                    <td><a href="?<?php echo $extra;?> &order_id=<?php echo $order['Order Number']; ?>"><?php echo $order['Order Number']; ?></a></td>
                    <td><?php echo $order['Total Quantity']; ?></td>
                    <td><?php echo $order['Total Amount']; ?></td>
                  </tr>
                <?php }
              } else { ?>
                <tr><td colspan="3">No Orders</td></tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php } ?>

  <!-- Order Details Table (Visible when an order is clicked) -->
  <?php if ($orderDetails != null) { ?>
    <div class="card text-center p-3 mb-5 mt-5">
      <div class="card-body">
        <h2 class="card-title">Order Details</h2>
        <hr>
        <!-- Back Button -->
        <a href="?<?php echo $extra; ?>" class="btn btn-primary mb-3">Back to Order History</a>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th style="width:5%">Product</th>
                <th style="width:10%">Quantity</th>
                <th style="width:10%">Unit Price</th>
                <th style="width:10%">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($orderDetails as $item) { ?>
                <tr>
                  <td><?php echo $item['Product Name']; ?></td>
                  <td><?php echo $item['Quantity']; ?></td>
                  <td><?php echo $item['Unit Price']; ?></td>
                  <td><?php echo $item['Subtotal']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php } ?>
</div>

<?php require("footer.php"); ?>
