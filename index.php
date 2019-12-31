<?php
error_reporting(0);

// class Fruit {
//   // Properties
//   public $name;
//   public $color;

//   // Methods
//   function set_name($name) {
//     $this->name = $name;
//   }

//   function set_color($color){
//   	$this->color = $color;
//   }

//   function get_name() {
//     return $this->name;
//   }

//   function get_color(){
//   	return $this->color;
//   }
// }

// 	$apple = new Fruit();
// 	$banana = new Fruit();
// 	$apple->set_name('Apple');
// 	$banana->set_name('Banana');

// 	$c = new Fruit();
// 	$c->set_color('red');
 
// echo $apple->get_name();
// echo "<br>";
// echo $banana->get_name();
// echo "<br>";
// echo $c->get_color();

// class New_DB{

// 	public $host;
// 	public $db;
// 	public $password;
// 	public $username;
// 	public $conn;
// 	// public $status;

// 	// public function __construct() {
//  //    	$this->connection();
//  //  	}

// 	public function connection($host, $db, $username, $password){
		
// 		    $this->conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
// 		    // set the PDO error mode to exception
// 		    $conn = $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 		    //$status = 1;
// 		    if($conn){
// 		    return "Connected successfully";
// 			}
// 		}

// 	public function add($field_array=null, $data_array=null, $table=null, $where_type=null ){
// 			$field_array  = "`".implode("`,`", $field_array)."`";
// 			$data_array = "'".implode("','", $data_array)."'";
// 			$table = "`".$table."`";

// 			 $query = "insert into ".$table." (".$field_array.") values (".$data_array.")" ;
// 			// $query = "insert into `user` (`email`, `password`) values ('abc@gmail.com', 'abcd')" ;
// 			 //return $query;
			

// 			 $add_user = $this->conn->prepare($query);
// 			 if($add_user->execute()){
// 				$add_user->close();
// 				return "Added Successfully";
// 			}
// 			else{
// 				$add_user->close();
// 				return "Something Error";
// 			}
			
			

			

			// function result(){
			// 	if($status == 1){
			// 		return "Connected successfully";
			// 	}
			// 	else if($status == 0){
			// 		return "Connection failed: " . $e->getMessage();
			// 	} 
			// }
// 		}
// }

	// $co = new New_DB();
	// echo $co->connection('localhost', 'project', 'root', '');

	// if(isset($_REQUEST['submit'])){

	// 	$fieldData = array(
	// 			"1" => 'email',
	// 			"2" => 'password'
	// 		);
	// 	$postData = array(
	// 			"email" => $_REQUEST[email],
	// 			"password" => $_REQUEST[password]
	// 		);
	// 	$table = 'users';
	// 	$co = new New_DB();
	// 	echo $co->add($fieldData, $postData, $table);
	// }

	// echo "<br>";
	// echo $co->result();

?>

<?php




Class Connection {
			private  $server = "mysql:host=localhost;dbname=cloudways";
			private  $user = "root";
			private  $pass = "";
			private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
			protected $con;
 
          	public function openConnection()
           	{
               try
                {
	        		$this->con = new PDO($this->server, $this->user,$this->pass,$this->options);
	        		return $this->con;
                }
               catch (PDOException $e)
                {
                    echo "There is some problem in connection: " . $e->getMessage();
                }
           	}

			public function closeConnection() 
			{
   				$this->con = null;
			}

			public function insert($field_array=null, $data_array=null, $table=null, $where_type=null)
			{
				$field_array  = "`".implode("`,`", $field_array)."`";
	 			$data_array = "'".implode("','", $data_array)."'";
	 			$table = "`".$table."`";
				$ret=mysqli_query($this->dbh,"insert into ".$table." (".$field_array.") values (".$data_array.")");

				return $ret;
			}
		}


	define('DB_SERVER','localhost');
	define('DB_USER','root');
	define('DB_PASS' ,'');
	define('DB_NAME', 'project');
	class DB_con
	{
		function __construct()
		{
			$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
			$this->dbh=$con;
			// ------------------------
			// $con = new PDO("mysql:host=DB_SERVER;dbname=DB_NAME", DB_USER, DB_PASS);
			// $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// $this->dbh=$con;
		    // set the PDO error mode to exception
			// $conn = $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// Check connection
			if (mysqli_connect_errno())
			{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		}
		public function insert($field_array=null, $data_array=null, $table=null, $where_type=null)
		{
			$field_array  = "`".implode("`,`", $field_array)."`";
 			$data_array = "'".implode("','", $data_array)."'";
 			$table = "`".$table."`";
			$ret=mysqli_query($this->dbh,"insert into ".$table." (".$field_array.") values (".$data_array.")");

			return $ret;
		}
	}


	$insertdata=new DB_con();

	if(isset($_POST['submit']))
	{
		$fieldData = array(
				"1" => 'email',
				"2" => 'password'
			);
		$postData = array(
				"email" => $_REQUEST[email],
				"password" => $_REQUEST[password]
			);
		$table = 'users';

		$sql=$insertdata->insert($fieldData, $postData, $table);
			if($sql)
			{
			echo "<script>alert('Data inserted');</script>";
			}
		else
			{
			echo "<script>alert('Data not inserted');</script>";
			}
	}
 ?>






<html>
<head>
	<title>My Test 4</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
	  	<div class="row">
		    <div class="col-md-12 pt-4 ">
				<form class="form-inline" method="POST" action="">
				  <label for="email" class="mr-sm-2">Email address:</label>
				  <input type="email" class="form-control mb-2 mr-sm-2" name="email" id="email" required>
				  <label for="pwd" class="mr-sm-2">Password:</label>
				  <input type="password" class="form-control mb-2 mr-sm-2" name="password" id="pwd" required>
				  <!-- <div class="form-check mb-2 mr-sm-2">
				    <label class="form-check-label">
				      <input class="form-check-input" type="checkbox"> Remember me
				    </label>
				  </div> -->
				  <input type="submit" id="submit1" name="submit" class="btn btn-primary mb-2" value="Submit">
				</form>
			</div>
			<div id="myModal" class="modal fade" role="dialog" >
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="alert alert-danger" id="err"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
            $('#submit').on('click', function() {
				var email = $('#email').val();
				var password = $('#pwd').val();


				 console.log( $( this ).serializeArray() );
  				 event.preventDefault();

				// var postData = array(
				// 		"email" => email,
				// 		"password" => password
				// 	);
				//var postData = '&email=' + email + '&password=' + password;

				//alert(postData);

					// $.ajax({
					// 	url: "/",
					// 	type: "POST",
					// 	data:{
					// 		'email' : email,
					// 		'password' : password
					// 	},
					// 	cache: false,
					// 	success: 
					    
				 //    });

				//  $.ajax({
				// type: "POST",
				// url: "../web20forms/edit_template_1.php",
				// data: dataString,
				// success: function() {
				// $('#editpriceoflessondiv').html("<div id='message'></div>");
				// $('#message').html("Thank you<br />Signup was successful!")
				// .hide()
				// .fadeIn(1500, function() {
				         
				//         });
				//       }
				 });
		});

	</script>

</body>
</html>



