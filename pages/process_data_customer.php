<?php

include('./inc/config.php');

if(isset($_POST["query"]))
{
	
	$connect = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);

	$data = array();

	$limit = 20;

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
			':name'			=>	'%' . $condition . '%',
			':mobile_no'		=>	'%'	. $condition . '%',
            ':email'			=>	'%' . $condition . '%'
		);

		$query = "
		SELECT *
		FROM customer 
		WHERE (name LIKE :name 
		OR mobile_no LIKE :mobile_no 
        OR email LIKE :email) 
        AND user_id = {$_SESSION['user_id']}
        AND email_brod = 0
		ORDER BY id DESC
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
			$id = $row["id"];
			$query_claimed = mysqli_query($conn, "SELECT * FROM ref_rewards WHERE refferer_id = $id AND is_claim = 1");
			$query_unclaimed = mysqli_query($conn, "SELECT * FROM ref_rewards WHERE refferer_id = $id AND is_claim = 0");
			$data[] = array(
				'id'			=>	$row["id"],
				'name'		=>	str_ireplace($replace_array_1, $replace_array_2, $row["name"]),
				'email'		=>	str_ireplace($replace_array_1, $replace_array_2, $row["email"]),
				'mobile_no'		=>	str_ireplace($replace_array_1, $replace_array_2, $row["mobile_no"]),
				'pin'		=>	str_ireplace($replace_array_1, $replace_array_2, $row["pin"]),
				'claimed'		=>	mysqli_num_rows($query_claimed),
				'unclaimed'		=>	mysqli_num_rows($query_unclaimed),
				// 'post_description'	=>	str_ireplace($replace_array_1, $replace_array_2, $row["post_description"])
			);
		}

	}
	else
	{

		$query = "
		SELECT *
		FROM customer 
		WHERE user_id = {$_SESSION['user_id']} AND email_brod = 0
		ORDER BY id DESC
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
			$id = $row["id"];
			$query_claimed = mysqli_query($conn, "SELECT * FROM ref_rewards WHERE refferer_id = $id  AND is_claim = 1");
			$query_unclaimed = mysqli_query($conn, "SELECT * FROM ref_rewards WHERE refferer_id = $id AND is_claim = 0");
			$data[] = array(
				'id'			=>	$row["id"],
				'name'		=>	$row["name"],
				'email'		=>	$row["email"],
				'mobile_no'		=>	$row["mobile_no"],
				'pin'		=>	$row["pin"],
				'claimed'		=>	mysqli_num_rows($query_claimed),
				'unclaimed'		=>	mysqli_num_rows($query_unclaimed),
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

?>