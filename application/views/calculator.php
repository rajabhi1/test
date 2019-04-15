<!DOCTYPE html>
<html lang="en">
<head>
  <title>calculater</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <a href = "javascript:history.back()" class="ml-auto">Back to previous page</a>
  <h2 class="text-center">calculater form</h2>
  <form action="">
    <div class="form-group">
      <label for="Revenue">Average Monthly Revenue/ Customer ($):</label>
      <input type="number" class="form-control calc" id="RevenueId" placeholder="$" name="Revenue">
    </div>
    <div class="form-group">
      <label for="Commission">Your Commission (%):</label>
      <input type="number" class="form-control calc" id="CommissionId" placeholder="%" name="Commission">
    </div>
    <div class="form-group">
      <label for="Customers">Number of Referred Customers/ Month:</label>
      <input type="number" class="form-control calc" id="CustomersId" name="Customers">
    </div>
    <div class="form-group">
      <label for="Affiliate">Affiliate Period (Months):</label>
      <input type="number" class="form-control calc" id="AffiliateId" name="Affiliate">
    </div>
    <div class="form-group">
      <h2 for="Customers">Your Earning :
        <h4 id="result">$0</h4><h6>/Month</h6>
      </h2>
    </div>
  </form>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function(){
        $('.calc').on('input', function() {
          var var1=$('#RevenueId').val();
          var var2=$('#CommissionId').val();
          var var3=$('#CustomersId').val();
          var var4=$('#AffiliateId').val();
          var var5 = (((var1*(var2/100))*var3)*var4);
            $('#result').html('$'+var5);
        });
    });
  </script>

</body>
</html>