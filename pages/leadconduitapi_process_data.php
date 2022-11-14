<?php
$servername = "localhost";
$db_user = "dreeve_lead";
$db_pass = "%j008k{WXfOj";
$db_name = "dreeve_lead_mng";

if(isset($_POST["query"]))
{
	
	$connect = new PDO("mysql:host=$servername; dbname=$db_name", $db_user, $db_pass);

	$data = array();

	$limit = 50;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$start = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$start = 0;
	}

	if($_POST["query"] != '')
	{

		$condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["query"]);

		$condition = trim($condition);

		$condition = str_replace(" ", "%", $condition);

		$sample_data = array(
			':first_name'			=>	'%' . $condition . '%',
			':last_name'		=>	'%'	. $condition . '%',
            ':phone'			=>	'%' . $condition . '%',
            ':name'			=>	'%' . $condition . '%'
		);

		$query = "
		SELECT 
            l.id,
            l.first_name,
            l.last_name,
            l.phone,
            l.lead_type,
            u.name
		FROM leads as l
        LEFT JOIN users as u ON l.user_id=u.id
		WHERE (l.first_name LIKE :first_name 
		OR l.last_name LIKE :last_name 
        OR l.phone LIKE :phone OR u.name LIKE :name) 
		ORDER BY l.id DESC
		";

		$filter_query = $query . ' LIMIT ' . $start . ', ' . $limit . '';

		$statement = $connect->prepare($query);

		$statement->execute($sample_data);

		$total_data = $statement->rowCount();

		$statement = $connect->prepare($filter_query);

		$statement->execute($sample_data);

		$result = $statement->fetchAll();

		$replace_array_1 = explode('%', $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($result as $row)
		{
			$data[] = array(
				'id'			=>	$row["id"],
				'first_name'		=>	str_ireplace($replace_array_1, $replace_array_2, $row["first_name"]),
				'last_name'		=>	str_ireplace($replace_array_1, $replace_array_2, $row["last_name"]),
				'phone'		=>	str_ireplace($replace_array_1, $replace_array_2, $row["phone"]),
				'lead_type'		=>	str_ireplace($replace_array_1, $replace_array_2, $row["lead_type"]),
				'name'		=>	str_ireplace($replace_array_1, $replace_array_2, $row["name"])
			);
		}

	}
	else
	{

		$query = "
		SELECT 
            l.id,
            l.first_name,
            l.last_name,
            l.phone,
            l.lead_type,
            u.name
		FROM leads as l
        LEFT JOIN users as u ON l.user_id=u.id
		ORDER BY l.id DESC
		";

		$filter_query = $query . ' LIMIT ' . $start . ', ' . $limit . '';

		$statement = $connect->prepare($query);

		$statement->execute();

		$total_data = $statement->rowCount();

		$statement = $connect->prepare($filter_query);

		$statement->execute();

		$result = $statement->fetchAll();

		foreach($result as $row)
		{
			$data[] = array(
				'id'			=>	$row["id"],
				'first_name'			=>	$row["first_name"],
				'last_name'		=>	$row["last_name"],
				'phone'		=>	$row["phone"],
				'lead_type'		=>	$row["lead_type"],
				'name'		=>	$row["name"]
			);
		}

	}

	$pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id >= $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);

}

if(isset($_POST["get_details"])) {
	$id = $_POST["id"];
	$conn = mysqli_connect($servername, $db_user, $db_pass, $db_name);
	$result = mysqli_query($conn, "SELECT trustedform FROM leads WHERE id = $id");
	$data = mysqli_fetch_assoc($result);
	echo '
	<div class="col-sm-12">
		<div class="card">
			<!-- <div class="card-body"> -->
				<div class="mb-3">
					<label class="col-form-label pt-0">Trusted Form</label>
					<input class="form-control" id="trusted_form" type="text" placeholder="Enter Trusted Links" value="'.$data['trustedform'].'">
				</div>
				<div class="mb-3">
					<button class="btn btn-primary" onclick="save_link('.$id.')">Save Link</button>
				</div>
				<center>
				<div class="mb-3">
					<button class="btn btn-success" onclick="submit_api('.$id.')">Submit API</button>
				</div>
				</center>
			<!-- </div> -->
		</div>
	</div>
	';
}

if(isset($_POST["save_link"])) {
	$id = $_POST["id"];
	$trusted_form = $_POST["trusted_form"];
	$conn = mysqli_connect($servername, $db_user, $db_pass, $db_name);
	$result = mysqli_query($conn, "UPDATE leads SET trustedform = '$trusted_form' WHERE id = $id");
	if ($result) {
		echo 1;
	}
}

if(isset($_POST["submit_api"])) {
	$id = $_POST["id"];
	$conn = mysqli_connect($servername, $db_user, $db_pass, $db_name);
	$result = mysqli_query($conn, "SELECT * FROM leads WHERE id = $id");
	$data = mysqli_fetch_assoc($result);
	
	
}

?>