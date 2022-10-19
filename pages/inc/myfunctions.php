<?php
function count_ref($custid)
{
    $sql = "select count(1) as refs from referer where refferer_id=$custid and isDelete=0";
    $res = mysqli_query($sql);
    if($res)
    {
        $data = mysqli_fetch_assoc($res);
        return $data['refs'];
    }else
    {
        return 0;
    }
} 


function count_redemptions($custid)
{
    $sql = "select count(1) as reds from redeemed_offers where refferer_id=$custid";
    $res = mysqli_query($sql);
    if($res)
    {
        $data = mysqli_fetch_assoc($res);
        return $data['reds'];
    }else
    {
        return 0;
    }
} 

function count_cust_redemptions($custid)
{
    $sql = "select count(1) as reds from redeemed_offers where refferer_id=$custid and user25_id='0'";
    $res = mysqli_query($sql);
    if($res)
    {
        $data = mysqli_fetch_assoc($res);
        return $data['reds'];
    }else
    {
        return 0;
    }
}
function count_ans_ques($q,$a,$user_id,$start,$end){
    
    //if($start==$end)
   // {
    //      $sql = "SELECT count(1) as res from customer_answer where answer='$a' AND question='$q' and user_id=$user_id and DATE_FORMAT(created_at,'%Y-%m-%d') = '$end'";
   //// }else
   // {
         $sql = "SELECT count(1) as res from customer_answer where answer='$a' AND question='$q' and user_id=$user_id and DATE_FORMAT(created_at,'%Y-%m-%d') between '$start' and '$end'";
    //}
       // $sql = "SELECT count(1) as res from customer_answer where answer='$a' AND question='$q' and user_id=$user_id";
    
    $res = mysqli_query($sql);
    if($res)
    {
        $data = mysqli_fetch_assoc($res);
        return $data['res'];
    }else
    {
        return 0;
    }
}

function get_fb_shares($id)
{
    $shares = array("fb"=>0,"tw"=>0,"wht"=>0,"em"=>0,'today'=>0);    
    $sql = "select count(1) as nums,type from share_tracking where user_id=$id GROUP by type";
    $res = mysqli_query($sql);
    if($res)
    {
        if(mysqli_num_rows($res)>0)
        {
            while($dd = mysqli_fetch_assoc($res))
            {
                if($dd['type']=="fb")
                {
                    $shares['fb'] = $dd['nums'];
                }
                if($dd['type']=="tw")
                {
                    $shares['tw'] = $dd['nums'];
                }
                if($dd['type']=="wht")
                {
                    $shares['wht'] = $dd['nums'];
                }
                if($dd['type']=="em")
                {
                    $shares['em'] = $dd['nums'];
                }
            }   
        }
    }
    
    $sql_today = "select count(1) as tot from share_tracking where user_id='$id' and DATE_FORMAT(created_at,'%Y-%m-%d')='".date('Y-m-d')."'";
    $res_today = mysqli_query($sql_today);
    
    if($res_today)
    {
        if(mysqli_num_rows($res_today)>0)
        {
            $dt = mysqli_fetch_assoc($res_today);
            $shares['today'] = $dt['tot'];
        }
    }
    
    return $shares;
}

function count_referrers($id)
{
    $d['total_refs'] = 0;
    $d['today_refs'] = 0;
    $d['em_open'] = 0;
    $d['redeems'] = 0;
    
    
    $sql = "SELECT count(1) as refs FROM `referer` where user_id=$id and isDelete=0";
    $res = mysqli_query($sql);
    
    if($res)
    {
        if(mysqli_num_rows($res)>0)
        {
            $dt = mysqli_fetch_assoc($res);
            $d['total_refs'] = $dt['refs'];
        }  
    }
    
    $sql1 = "SELECT count(1) as refs FROM `referer` where user_id=$id and isDelete=0 and DATE_FORMAT(created_at,'%Y-%m-%d')='".date('Y-m-d')."'";
    $res1 = mysqli_query($sql1);
    
    if($res1)
    {
        if(mysqli_num_rows($res1)>0)
        {
            $dt1 = mysqli_fetch_assoc($res1);
            $d['today_refs'] = $dt['refs'];
        }  
    }
    
    $sql2 = "SELECT count(1) as open_em FROM `referer` where user_id=$id and isDelete=0 and email_open='true'";
    $res2 = mysqli_query($sql2);
    
    if($res2)
    {
        if(mysqli_num_rows($res2)>0)
        {
            $dt2 = mysqli_fetch_assoc($res2);
            $d['em_open'] = $dt2['open_em'];
        }  
    }
    
    
     $sql3 = "SELECT count(1) as redeems FROM `redeemed_offers` where user_id=$id";
    $res3 = mysqli_query($sql3);
    
    if($res3)
    {
        if(mysqli_num_rows($res3)>0)
        {
            $dt3 = mysqli_fetch_assoc($res3);
            $d['redeems'] = $dt3['redeems'];
        }  
    }
     
    return $d;
}

function create_subdomain($name)
{
            include_once "xmlapi.php";
            $xmlapi = new xmlapi('localhost',"dreeve_funnel",'admin@123');
            $xmlapi->password_auth("dreeve",'2fQ)a#T+eg~A');
            $xmlapi->set_output('json');
            $xmlapi->set_debug(0);
            try{
                $xx = $xmlapi->api2_query("dreeve", "SubDomain", "addsubdomain",  array(
                  'domain' => $name,
                   'rootdomain' => "thankyoufollowup.com",
                   "dir" => "/public_html/thankyoufollowup.com"
                  )
                  );
                  $res = json_decode($xx,true);
                  //print_r($res);
                  if($res['cpanelresult']['error'])
                  {
                    $ss = $res['cpanelresult']['error'] ;
                     if(strpos($ss,"already exists")!==false)
                     {
                        return 2;
                        //echo '{"success":"true","msg":"Domain is created!"}';
                     }else
                     {
                        return 0;
                        // echo '{"success":"false","msg":["'.$res['cpanelresult']['error'].'"]}';
                     }
                   
                  }else
                  {
                    return 1;
                    //echo '{"success":"true","msg":"Domain is parked!"}';
                  }
                 // print_r(json_decode($xx,true));
                }catch(Exception $e)
                {
                    return 0;
                     //echo '{"success":"false","msg":["There is problem to park your domain,Try Later!"]}';
                }
}

function create_Email($email,$dom)
{
            include_once "xmlapi.php";
            $xmlapi = new xmlapi('localhost',"dreeve_funnel",'admin@123');
            $xmlapi->password_auth("dreeve",'2fQ)a#T+eg~A');
            $xmlapi->set_output('json');
            $xmlapi->set_debug(0);
            try{
                $xx = $xmlapi->api2_query("dreeve", "Email", "addpop",  array(
                   'domain' => "$dom.thankyoufollowup.com",
                   "email" => "customerservice",
                   "password"=>"12345@Temp",
                   'quota' => '0'
                  )
                  );
                  $res = json_decode($xx,true);
                  //print_r($res);
                  if($res['cpanelresult']['error'])
                  {
                    $ss = $res['cpanelresult']['error'] ;
                     if(strpos($ss,"already exists")!==false)
                     {
                        return 2;
                        //echo '{"success":"true","msg":"Domain is created!"}';
                     }else
                     {
                        return 0;
                        // echo '{"success":"false","msg":["'.$res['cpanelresult']['error'].'"]}';
                     }
                   
                  }else
                  {
                    return 1;
                    //echo '{"success":"true","msg":"Domain is parked!"}';
                  }
                 // print_r(json_decode($xx,true));
                }catch(Exception $e)
                {
                    return 0;
                     //echo '{"success":"false","msg":["There is problem to park your domain,Try Later!"]}';
                }
}


function randStr($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function make_bitly_url($url,$format = 'json',$version = '2.0.1')
{
    $login = "dreeve23";
    $appkey = "R_1c507a77e056464f84c41bf4aca33254";
    //create the URL
    $bitly = 'http://api.bit.ly/shorten?version='.$version.'&longUrl='.urlencode($url).'&login='.$login.'&apiKey='.$appkey.'&format='.$format;
    
    //get the url
    //could also use cURL here
    $response = file_get_contents($bitly);
    
    //parse depending on desired format
    if(strtolower($format) == 'json')
    {
        $json = @json_decode($response,true);
        return $json['results'][$url]['shortUrl'];
    }
    else //xml
    {
    $xml = simplexml_load_string($response);
    return 'http://bit.ly/'.$xml->results->nodeKeyVal->hash;
    }
}



function broadcast_count_sent($bid)
{
	$sql = "select count(1) as sent from broadcast_analytics where broadcast_id=$bid and status=1";
	$res = mysqli_query($sql);
	$data = mysqli_fetch_assoc($res);
	return $data['sent'];
}

function broadcast_count_fail($bid)
{
	$sql = "select count(1) as fail from broadcast_analytics where broadcast_id=$bid and status=0";
	$res = mysqli_query($sql);
	$data = mysqli_fetch_assoc($res);
	return $data['fail'];
}

function broadcast_count_click($bid)
{
	$sql = "select count(1) as click from broadcast_analytics where broadcast_id=$bid and click_email=1";
	$res = mysqli_query($sql);
	$data = mysqli_fetch_assoc($res);
	return $data['click'];
}

function broadcast_count_open($bid)
{
	$sql = "select count(1) as open from broadcast_analytics where broadcast_id=$bid and open_email=1";
	$res = mysqli_query($sql);
	$data = mysqli_fetch_assoc($res);
	return $data['open'];
}

function broadcast_count_customer($bid)
{
	$sql = "select count(1) as customers from broadcast_analytics where broadcast_id=$bid";
	$res = mysqli_query($sql);
	$data = mysqli_fetch_assoc($res);
	return $data['customers'];
}

function broadcast_sms_stats($bid)
{
    $sql1 = "select count(1) as sent from sms_broadcast_analytics where status='s' and broadcast_id=$bid";
    $res1 =  mysqli_query($sql1);
    $d1 = mysqli_fetch_assoc($res1);
    
    $sql2 = "select count(1) as delivered from sms_broadcast_analytics where status='d' and broadcast_id=$bid";
    $res2 =  mysqli_query($sql2);
    $d2 = mysqli_fetch_assoc($res2);
    
    
    $sql3 = "select count(1) as queue from sms_broadcast_analytics where status='q' and broadcast_id=$bid";
    $res3 =  mysqli_query($sql3);
    $d3 = mysqli_fetch_assoc($res3);
    
    $sql4 = "select count(1) as fail from sms_broadcast_analytics where status='f' and broadcast_id=$bid";
    $res4 =  mysqli_query($sql4);
    $d4 = mysqli_fetch_assoc($res4);
    
    
    return array("fail"=>$d4['fail'],"queue"=>$d3['queue'],"delivered"=>$d2['delivered'],"sent"=>$d1['sent']);
    
}


function broadcast_send_sms($to,$from,$body,$sid,$token)
    {
     
       // echo $To,$from,$body;
        //echo "<br>$user_id<br>";
        $url = "https://$sid:$token@api.twilio.com/2010-04-01/Accounts/$sid/Messages";
        $val = array(
            "To"=>$to,
            "From"=>$from,
            "Body"=>$body,
            "StatusCallback"=>"http://thankyoufollowup.com/new_design/new_user/sms_status.php"
        );
        
        $ch = curl_init(); // Initialize the curl
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_URL, $url);  // set the opton for curl
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);// set the option to transfer output from script to curl
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $val);
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;

    }
function curl_get($url)
{
        $ch = curl_init(); // Initialize the curl
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_URL, $url);  // set the opton for curl
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);// set the option to transfer output from script to curl
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
}     

?>