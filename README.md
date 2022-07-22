# Restaurant Management System

User Manual [Click this link to use this system](https://isubroto.github.io/subroto/).
![User Manual](https://github.com/isubroto/subroto/blob/main/img/MicrosoftTeams-image.png?raw=true 'User Manual')

``` html
<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="wrap">
						<div class="img" style="background-image: url(https://www.db-hospitality.com/wp-content/uploads/2017/11/hospitality-consultant.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4"><b>Restaurant Management System</b></br> Sign In</h3>
			      		</div>
			      	</div>
							<form action="#" class="signin-form">
			      		<div class="form-group mt-3">
			      			<input type="text" class="form-control" required>
			      			<label class="form-control-placeholder" for="username">Username</label>
			      		</div>
		            <div class="form-group">
		              <input id="password-field" type="password" class="form-control" required>
		              <label class="form-control-placeholder" for="password">Password</label>
		              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div>
		          </form>
		          <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
```

## System Login

**For valid user**

```
Username: Official username (Provided from the office)
Password: admin12 (Provided from the office)
```

**For invalid user**

```
Username: Your full name
Password: admin12(Default Password)
```

![System Login](<https://github.com/isubroto/subroto/blob/main/img/MicrosoftTeams-image%20(1).png?raw=true> 'System Login')

## New account registration

User will request to administrator and after the approval of the request administrator will send a form link to user for fill-up with details. Administrator will verify all the information and will add the user in the system and will give a mail to the user with their username and password.
![New account registration](<https://github.com/isubroto/subroto/blob/main/img/MicrosoftTeams-image%20(2).png?raw=true> 'New account registration')

### Admin

Here is the dashboard of admin where there is a table which content the Customer order details from the database and also shows the customer order stage in three part

1.  Processing,
2.  Food is ready and
3.  Cancelled.

For finding specific customer order there is a search option where admin can search the customer by name or table number. There is four button first button is use for managing employee, second button is for managing stock items, third button is for managing food menu and the last button is for admin to logout.
![Admin](<https://github.com/isubroto/subroto/blob/main/img/MicrosoftTeams-image%20(3).png?raw=true> 'Admin')

## Employee Button

After clicking on the employee button Admin can add, update and delete employee.
Here in this interface, there is an employee table where all the details of employee are given. The Search option is for searching specific employee by their id or name.

There are three buttons first Add employee button, this button is use for adding employee and for adding admin need to fill in the spaces with the employee details and need to upload employee image by clicking on the

Upload photo button, after secondly the Update Employee button is use for any change for employee details and thirdly the Delete Employee button by which admin can delete a specific employee.
![Employee Button](<https://github.com/isubroto/subroto/blob/main/img/MicrosoftTeams-image%20(4).png?raw=true> 'Employee Button')

## Stock Button

In this image there is a table which show the Stock details.

The Search option help to find the specific stock item by name. In Stock item panel the two textbox are for inserting the name of a stock item and weight of that item.

Here Add button adds a new stock in the table, Update button use for updating a specific stock item and lastly the delete button is use for deleting a stock item.
![Stock Button](<https://github.com/isubroto/subroto/blob/main/img/MicrosoftTeams-image%20(2).png?raw=true> 'Stock Button')

## Food Menu Button:

In this image admin can see the all-food item table and can search a specific food from the search option,

admin can add new food by clicking on the add new item and with filling up the details for the item.

Admin can Enable or disable food item by clicking on the Enable and Disable button, for updating any food item admin can click on the update button.
![Food Menu Button](<https://github.com/isubroto/subroto/blob/main/img/MicrosoftTeams-image%20(5).png?raw=true> 'Food Menu Button')

## Chef:

From the image chef can see the new customer order from the customer order table and their specific order in the

Order Panel and has three buttons, first button is Order is ready this button is used when customer order is ready and to notify the customer,

second button is use when chef can’t complete preparing customer specific order and last stock button is use for checking stock and updating stock items.
![Chef](<https://github.com/isubroto/subroto/blob/main/img/MicrosoftTeams-image%20(6).png?raw=true> 'Chef')

## Customer:

In this image customer will see the food menu of the restaurant and can add any item by clicking on the +(plus) button also can deduct item from there cart by just clicking on the -(minus) button.

Customer can see their total order in the total order panel where food name with price and total price is given.

Lastly after selecting their specific food item customer can pay the bill by cash/card/online banking and confirmed their order.

![Customer](<https://github.com/isubroto/subroto/blob/main/img/MicrosoftTeams-image%20(7).png?raw=true> 'Customer')
