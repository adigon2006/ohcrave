<?php
date_default_timezone_set("America/Denver");
class Mydbhandler
{	
private $connect;   
 
private function __contruct()
{	    
date_default_timezone_set("America/Denver");
require_once ('dbconnect.php');    
$dbconnect = new Dbconnect();
$this->connect = $dbconnect->connect();
return $this->connect;
}



public function addLike($planimageid,$userid)
{
global $added;
$added = $this->addNewLike($planimageid,$userid);
return $added; 
}

private function addNewLike($planimageid,$userid)
{
	
if($this->checkIfLiked($planimageid,$userid))
{
// do nothing 
}
else
{
global $added;
$stmt = $this->__contruct()->prepare('insert into like_tbl (user_id,plan_image_id) values (?,?)');
$stmt->bind_param('dd',$userid,$planimageid);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
$added = 'added';
if($this->checkIfLoved($planimageid,$userid))
{
// do nothing 
$this->removeLove2($planimageid,$userid);
}
if($this->checkIfImageCraved($planimageid,$userid))
{
// do nothing 
$this->removeCrave2($planimageid,$userid);
}

$this->InsertNewNotification($userid,  $this->getPlanOwnerID($this->getPlanIDByImageID($planimageid)), $planimageid, $this->getPlanIDByImageID($planimageid), 7);

}
return $added;
}
}


private function checkIfLiked($planimageid,$userid)
{
global $craved; 
$stmt = $this->__contruct()->prepare('select like_id from like_tbl where plan_image_id=? and user_id=? LIMIT 1'); 
$stmt->bind_param('dd',$planimageid,$userid);
$stmt->execute();
$stmt->bind_result($craverid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if ($numrows == 1)
{
$craved = TRUE; 
}
else if($numrows == 0)
{
$craved = FALSE; 
}
return $craved;
}


public function removeALike($planimageid,$userid)
{
global $removed;
$removed = $this->removeLike($planimageid,$userid);
return $removed; 
}

private function removeLike($planimageid,$userid)
{
$stmt = $this->__contruct()->prepare('delete from like_tbl where user_id=? AND plan_image_id=?'); 
$stmt->bind_param('dd',$userid,$planimageid);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
$deleted = 'deleted';
$this->InsertNewNotification($userid,  $this->getPlanOwnerID($this->getPlanIDByImageID($planimageid)), $planimageid, $this->getPlanIDByImageID($planimageid), 8);

}
return $deleted;
}

private function removeLike2($planimageid,$userid)
{
$stmt = $this->__contruct()->prepare('delete from like_tbl where user_id=? AND plan_image_id=?'); 
$stmt->bind_param('dd',$userid,$planimageid);
$stmt->execute();
$affected = $stmt->affected_rows;
// if($affected == 1)
// {
// $deleted = 'deleted';
// $this->InsertNewNotification($userid,  $this->getPlanOwnerID($this->getPlanIDByImageID($planimageid)), $planimageid, $this->getPlanIDByImageID($planimageid), 8);
// // $this->deleteBoxNotificationAfterCraving($planid, $userid);
// }
// return $deleted;
}


// crave an image
public function addImageCrave($planimageid,$userid)
{
global $added;
$added = $this->addNewImageCrave($planimageid,$userid);
return $added; 
}

private function addNewImageCrave($planimageid,$userid)
{
if($this->checkIfImageCraved($planimageid,$userid))
{
// do nothing 
}
else
{
global $added;
$stmt = $this->__contruct()->prepare('insert into crave_image_tbl (user_id,plan_image_id) values (?,?)');
$stmt->bind_param('dd',$userid,$planimageid);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
$added = 'added';
if($this->checkIfLiked($planimageid,$userid))
{
// do nothing 
    $this->removeLike2($planimageid,$userid);
}
if($this->checkIfLoved($planimageid,$userid))
{
// do nothing 
    $this->removeLove2($planimageid,$userid);
}

$this->InsertNewNotification($userid,  $this->getPlanOwnerID($this->getPlanIDByImageID($planimageid)), $planimageid, $this->getPlanIDByImageID($planimageid), 11);

}
return $added;
}
}


private function checkIfImageCraved($planimageid,$userid)
{
global $craved; 
$stmt = $this->__contruct()->prepare('select crave_id from crave_image_tbl where plan_image_id=? and user_id=? LIMIT 1'); 
$stmt->bind_param('dd',$planimageid,$userid);
$stmt->execute();
$stmt->bind_result($craverid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if ($numrows == 1)
{
$craved = TRUE; 
}
else if($numrows == 0)
{
$craved = FALSE; 
}
return $craved;
}

public function removeACrave($planimageid,$userid)
{
global $removed;
$removed = $this->removeCrave($planimageid,$userid);
return $removed; 
}

private function removeCrave($planimageid,$userid)
{
$stmt = $this->__contruct()->prepare('delete from crave_image_tbl where user_id=? AND plan_image_id=?'); 
$stmt->bind_param('dd',$userid,$planimageid);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
$deleted = 'deleted';
$this->InsertNewNotification($userid,  $this->getPlanOwnerID($this->getPlanIDByImageID($planimageid)), $planimageid, $this->getPlanIDByImageID($planimageid), 12);

}
return $deleted;
}

private function removeCrave2($planimageid,$userid)
{
$stmt = $this->__contruct()->prepare('delete from crave_image_tbl where user_id=? AND plan_image_id=?'); 
$stmt->bind_param('dd',$userid,$planimageid);
$stmt->execute();
$affected = $stmt->affected_rows;
// if($affected == 1)
// {
// $deleted = 'deleted';
// $this->InsertNewNotification($userid,  $this->getPlanOwnerID($this->getPlanIDByImageID($planimageid)), $planimageid, $this->getPlanIDByImageID($planimageid), 12);
// // $this->deleteBoxNotificationAfterCraving($planid, $userid);
// }
// return $deleted;
}
///  love an image

public function addLove($planimageid,$userid)
{
global $added;
$added = $this->addNewLove($planimageid,$userid);
return $added; 
}

private function addNewLove($planimageid,$userid)
{
if($this->checkIfLoved($planimageid,$userid))
{
// do nothing 
}
else
{
global $added;
$stmt = $this->__contruct()->prepare('insert into love_tbl (user_id,plan_image_id) values (?,?)');
$stmt->bind_param('dd',$userid,$planimageid);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
$added = 'added';

if($this->checkIfLiked($planimageid,$userid))
{
// do nothing 
$this->removeLike2($planimageid,$userid);    
}
if($this->checkIfImageCraved($planimageid,$userid))
{
// do nothing 
 $this->removeCrave2($planimageid,$userid);   
}


$this->InsertNewNotification($userid,  $this->getPlanOwnerID($this->getPlanIDByImageID($planimageid)), $planimageid, $this->getPlanIDByImageID($planimageid), 9);

}
return $added;
}
}


private function checkIfLoved($planimageid,$userid)
{
global $craved; 
$stmt = $this->__contruct()->prepare('select love_id from love_tbl where plan_image_id=? and user_id=? LIMIT 1'); 
$stmt->bind_param('dd',$planimageid,$userid);
$stmt->execute();
$stmt->bind_result($craverid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if ($numrows == 1)
{
$craved = TRUE; 
}
else if($numrows == 0)
{
$craved = FALSE; 
}
return $craved;
}

public function removeALove($planimageid,$userid)
{
global $removed;
$removed = $this->removeLove($planimageid,$userid);
return $removed; 
}

private function removeLove($planimageid,$userid)
{
$stmt = $this->__contruct()->prepare('delete from love_tbl where user_id=? AND plan_image_id=?'); 
$stmt->bind_param('dd',$userid,$planimageid);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
$deleted = 'deleted';
$this->InsertNewNotification($userid,  $this->getPlanOwnerID($this->getPlanIDByImageID($planimageid)), $planimageid, $this->getPlanIDByImageID($planimageid), 10);

}
return $deleted;
}


private function removeLove2($planimageid,$userid)
{
$stmt = $this->__contruct()->prepare('delete from love_tbl where user_id=? AND plan_image_id=?'); 
$stmt->bind_param('dd',$userid,$planimageid);
$stmt->execute();
$affected = $stmt->affected_rows;
// if($affected == 1)
// {
// $deleted = 'deleted';
// $this->InsertNewNotification($userid,  $this->getPlanOwnerID($this->getPlanIDByImageID($planimageid)), $planimageid, $this->getPlanIDByImageID($planimageid), 10);
// // $this->deleteBoxNotificationAfterCraving($planid, $userid);
// }
// return $deleted;
}

public function redirect_to($location)
{
  exit(header("Location:{$location}"));  
}

public function sessionstart()
{
$lifetime=604800;
$sessionstart = session_start();
setcookie(session_name(),session_id(),time()+$lifetime);

}

public function checkLoggedInStatus()
{
if(isset($_SESSION['myusrid']) && isset($_SESSION['mytype']) == "35")
{
 // do nothing;   
}
else
{
    $this->redirect_to('../logout');    
}
}

public function addNewImageComment($planimageid,$plancomment,$userid)
{
$this->addimagecomment($planimageid,$plancomment,$userid); 
}

private function addimagecomment($planimageid,$plancomment,$userid)
{
$stmt = $this->__contruct()->prepare('insert into plan_image_comment_tbl (user_id,plan_image_id,plan_image_comment) values (?,?,?)');
$stmt->bind_param('dds',$userid,$planimageid,$plancomment);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
    $this->InsertNewNotification($userid, $this->getPlanOwnerID($this->getPlanIDByImageID($planimageid)),$planimageid, $this->getPlanIDByImageID($planimageid),6);    
}
}



public function getLastImageComment($userid,$planimageid,$plancomment)
{
global $thelastcomment;
$date = 'Just Now';
$thelastcomment = '<li><div class="media">
                                    <a href="" class="pull-left">
                                        <img src="'.$this->getUserImageThumb($userid).'" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <a href="" class="comment-author">'.$this->getUserFullName($userid).'</a>
                                        <span>'.$plancomment.'</span>
                                        <div class="comment-date">'.$date.'</div>
                                    </div>
                                </div>
                            </li>'; 
return $thelastcomment;       
}

private function getPlanImageComments($planimageid)
{
global $plancomments;
$stmt = $this->__contruct()->prepare('select plan_image_comment,plan_image_id,user_id,added_date from plan_image_comment_tbl where plan_image_id=? ORDER BY plan_image_comment_id desc'); 
$stmt->bind_param('d',$planimageid);
$stmt->execute();
$stmt->bind_result($plancomment,$theplanid,$theuserid,$date);
$stmt->store_result();
$numrows = $stmt->num_rows();

if($numrows > 0)
{
$plancomments = ''; 
for($i=0;$i<$numrows;$i++)
{
$stmt->fetch(); 
$plancomments .= '<li>
                                <div class="media">
                                    <a href="" class="pull-left">
                                        <img src="'.$this->getUserImageThumb($theuserid).'" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <a href="" class="comment-author">'.$this->getUserFullName($theuserid).'</a>
                                        <span>'.$plancomment.'</span>
                                        <div class="comment-date">'.$this->time_since(time() - strtotime($date)).' ago</div>
                                    </div>
                                </div>
                            </li>'; 
}
}
if($numrows == 0)
{
$plancomments = "<li></li>"; 
}
return $plancomments;
}

private function CountImageComments($planimageid)
{
global $countcomments;
$stmt = $this->__contruct()->prepare('select plan_image_comment_id from plan_image_comment_tbl where plan_image_id=?');
$stmt->bind_param('d',$planimageid);
$stmt->execute(); 
$stmt->bind_result($commentid);
$stmt->store_result();
$numrows = $stmt->num_rows();
$countcomments = $numrows;
return $countcomments;
}

private function generateImageCraveButton($userid,$planimageid)
{
$sessionid = $_SESSION['myusrid'];  
global $realcravebutton;
$stmt = $this->__contruct()->prepare('select crave_id,plan_image_id,user_id from crave_image_tbl where plan_image_id=? and user_id=? LIMIT 1');
$stmt->bind_param('dd',$planimageid,$sessionid);
$stmt->execute();
$stmt->bind_result($craverid,$theplanimageid,$theuserid);  
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$realcravebutton = '<a class="cravebox craveimagebox"><i title="Uncrave This Image" style="color:#F3565D;" class="cravestyle fa fa-heart uncraveimage"> crave </i><i style="display:none;" title="Crave this Image" class="cravestyle fa fa-heart craveimage"> Crave </i></a> '; 
}
else if($numrows == 0)
{
$realcravebutton = '<a class="cravebox craveimagebox"><i style="display:none;" title="Uncrave This Image" style="color:#F3565D;" class="cravestyle fa fa-heart uncraveimage"> crave </i> <i title="Crave this Image" class="cravestyle fa fa-heart craveimage"> Crave</i></a>';  
}
return $realcravebutton;
}


private function generateImageLikeButton($userid,$planimageid)
{
$sessionid = $_SESSION['myusrid'];  
global $realcravebutton;
$stmt = $this->__contruct()->prepare('select like_id,plan_image_id,user_id from like_tbl where plan_image_id=? and user_id=? LIMIT 1');
$stmt->bind_param('dd',$planimageid,$sessionid);
$stmt->execute();
$stmt->bind_result($craverid,$theplanimageid,$theuserid);  
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$realcravebutton = '<a class="cravebox likebox"><i title="Unlike This Image" style="color:#F3565D;" class="cravestyle fa fa-thumbs-up unlikeimage"> like </i><i style="display:none;" title="Like this Image" class="cravestyle fa fa-thumbs-up likeimage"> Like </i></a> '; 
}
else if($numrows == 0)
{
$realcravebutton = '<a class="cravebox likebox"><i style="display:none;" title="Unlike This Image" style="color:#F3565D;" class="cravestyle fa fa-thumbs-up unlikeimage"> crave </i> <i title="Like this Image" class="cravestyle fa fa-thumbs-up likeimage"> Like</i></a>';  
}
return $realcravebutton;
}


private function generateImageLoveButton($userid,$planimageid)
{
$sessionid = $_SESSION['myusrid'];  
global $realcravebutton;
$stmt = $this->__contruct()->prepare('select love_id,plan_image_id,user_id from love_tbl where plan_image_id=? and user_id=? LIMIT 1');
$stmt->bind_param('dd',$planimageid,$sessionid);
$stmt->execute();
$stmt->bind_result($craverid,$theplanimageid,$theuserid);  
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$realcravebutton = '<a class="cravebox lovebox"><i title="Unlove This Image" style="color:#F3565D;" class="cravestyle fa fa-heart unloveimage"> love </i><i style="display:none;" title="Love this Image" class="cravestyle fa fa-heart loveimage"> Love </i></a> '; 
}
else if($numrows == 0)
{
$realcravebutton = '<a class="cravebox lovebox"><i style="display:none;" title="Unlove This Image" style="color:#D8CFCC;" class="cravestyle fa fa-heart unloveimage"> love </i> <i title="Love this Image" class="cravestyle fa fa-heart loveimage"> Love</i></a>';  
}
return $realcravebutton;
}


private function getLastImageOfPlanID($planid)
{
global $thelastimageid;
$stmt = $this->__contruct()->prepare('select plan_image_id from plan_image_tbl where plan_id=? order by plan_image_id desc limit 1');
$stmt->bind_param('d',$planid);
$stmt->execute();
$stmt->bind_result($theimageid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
$thelastimageid = $theimageid;
}
return $thelastimageid;
}

private function getTheOtherPlanIDForTwoImages($planid,$imageid)
{
global $thelastimageid;
$stmt = $this->__contruct()->prepare('select plan_image_id from plan_image_tbl where plan_id=? and plan_image_id != ? order by plan_image_id desc limit 1');
$stmt->bind_param('dd',$planid,$imageid);
$stmt->execute();
$stmt->bind_result($theimageid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
$thelastimageid = $theimageid;
}
return $thelastimageid;
}

private function generateArrayOfPlanImages($planid)
{
global $realplanimage,$planimageid,$storearrayofplanimageid;
$stmt = $this->__contruct()->prepare('select plan_image_id,plan_id,plan_image_name,added_date from plan_image_tbl where plan_id=? order by plan_image_id desc');  
$stmt->bind_param('d',$planid);
$stmt->execute();
$stmt->bind_result($planimageid,$myplanid,$planimage,$added_date);
$stmt->store_result();
$numrows = $stmt->num_rows();
// $realplanimage = "";

 if($numrows == 1)  
 {
$stmt->fetch();
 $storearrayofplanimageid = explode(',',$planimageid);

 return ' <input id="current" type="text" style="display:none;" value="'.$this->getLastImageOfPlanID($planid).'"/>
<input id="next" type="text" style="display:none;" value="'.$storearrayofplanimageid[0].'"/>';
 }
 else if($numrows > 1)
{
for($i=0;$i<$numrows;$i++)
{
$stmt->fetch();
// // if the plan image is one

 if($i < $numrows-1)
{
$joined = ',';
}
else if($i = $numrows-1)
{
$joined = '';
}

$realplanimage .= $planimageid.$joined;


}
$storearrayofplanimageid = explode(',',$realplanimage);
return '<i title="Next" style="cursor:pointer;" class="fa fa-3x fa-angle-right next">
<input id="current" type="text" style="display:none;" value="'.$this->getLastImageOfPlanID($planid).'"/>
<input id="next" type="text" style="display:none;" value="'.$storearrayofplanimageid[$numrows-1].'"/>
</i>';
}

// if($numrows == 0)
// {
// $realplanimage = "";  
// }
// return $storearrayofplanimageid;
}



private function generateArrayOfPlanImages2($planid,$imageid)
{
global $realplanimage,$planimageid,$storearrayofplanimageid;
$stmt = $this->__contruct()->prepare('select plan_image_id,plan_id,plan_image_name,added_date from plan_image_tbl where plan_id=? order by plan_image_id desc');  
$stmt->bind_param('d',$planid);
$stmt->execute();
$stmt->bind_result($planimageid,$myplanid,$planimage,$added_date);
$stmt->store_result();
$numrows = $stmt->num_rows();
// $realplanimage = "";

//  if($numrows == 1)  
//  {
// $stmt->fetch();
//  $storearrayofplanimageid = explode(',',$planimageid);

//  return ' <input id="current" type="text" style="display:none;" value="'.$this->getLastImageOfPlanID($planid).'"/>
// <input id="next" type="text" style="display:none;" value="'.$storearrayofplanimageid[0].'"/>';
//  }
//  else if($numrows > 1)
// {
for($i=0;$i<$numrows;$i++)
{
$stmt->fetch();
// // if the plan image is one

 if($i < $numrows-1)
{
$joined = ',';
}
else if($i = $numrows-1)
{
$joined = '';
}

$realplanimage .= $planimageid.$joined;


}
$storearrayofplanimageid = explode(',',$realplanimage);


if($numrows == 2)
{
return '<i title="Previous" style="cursor:pointer;" class="fa fa-3x fa-angle-left prev">
</i> &nbsp; &nbsp; &nbsp;
<i title="Next" style="cursor:pointer;" class="fa fa-3x fa-angle-right next">
<input id="prev" type="text" style="display:none;" value="'.$this->getTheOtherPlanIDForTwoImages($planid,$imageid).'"/>
<input id="current" type="text" style="display:none;" value="'.$imageid.'"/>
<input id="next" type="text" style="display:none;" value="'.$this->getTheOtherPlanIDForTwoImages($planid,$imageid).'"/>
</i>';
}
elseif ($numrows > 2) {
$positionofidinarray = array_search($imageid,$storearrayofplanimageid);
if($positionofidinarray == 0)
{
return '<i title="Previous" style="cursor:pointer;" class="fa fa-3x fa-angle-left prev">
</i> &nbsp; &nbsp; &nbsp;
<i title="Next" style="cursor:pointer;" class="fa fa-3x fa-angle-right next">
<input id="prev" type="text" style="display:none;" value="'.$storearrayofplanimageid[1].'"/>
<input id="current" type="text" style="display:none;" value="'.$imageid.'"/>
<input id="next" type="text" style="display:none;" value="'.$storearrayofplanimageid[$numrows - 1].'"/>
</i>';
}
else if ($positionofidinarray == $numrows-1) 
{
 return '<i title="Previous" style="cursor:pointer;" class="fa fa-3x fa-angle-left prev">
</i> &nbsp; &nbsp; &nbsp;
<i title="Next" style="cursor:pointer;" class="fa fa-3x fa-angle-right next">
<input id="prev" type="text" style="display:none;" value="'.$storearrayofplanimageid[0].'"/>
<input id="current" type="text" style="display:none;" value="'.$imageid.'"/>
<input id="next" type="text" style="display:none;" value="'.$storearrayofplanimageid[$positionofidinarray - 1].'"/>
</i>';   
}
else
{

return '<i title="Previous" style="cursor:pointer;" class="fa fa-3x fa-angle-left prev">
</i> &nbsp; &nbsp; &nbsp;
<i title="Next" style="cursor:pointer;" class="fa fa-3x fa-angle-right next">
<input id="prev" type="text" style="display:none;" value="'.$storearrayofplanimageid[$positionofidinarray + 1].'"/>
<input id="current" type="text" style="display:none;" value="'.$imageid.'"/>
<input id="next" type="text" style="display:none;" value="'.$storearrayofplanimageid[$positionofidinarray - 1].'"/>
</i>'; 

}

}

// return '<i title="Next" style="cursor:pointer;" class="fa fa-3x fa-angle-right next">
// <input id="current" type="text" style="display:none;" value="'.$this->getLastImageOfPlanID($planid).'"/>
// <input id="next" type="text" style="display:none;" value="'.$storearrayofplanimageid[$numrows-1].'"/>
// </i>';
// }

// if($numrows == 0)
// {
// $realplanimage = "";  
// }
// return $storearrayofplanimageid;
}


public function TheRightSideOfImage($planid,$userid,$planimageid)
{
  return $this->rightsideofplanImages($planid,$userid,$planimageid);
}

private function rightsideofplanImages($planid,$userid,$planimageid)

{
// $planimageid = 22; 
$allplanimageotherfeatures =   '<div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img src="'.$this->getUserImageThumb($this->getUserIDByPlanID($planid)).'" class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                    <a href="">'.$this->getUserFullName($this->getUserIDByPlanID($planid)).' '.$this->getUserStarIcon($this->getUserIDByPlanID($planid)) .'</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="view-all-comments"> '.$this->generateImageLikeButton($userid,$planimageid). '   ' .$this->generateImageLoveButton($userid,$planimageid).'   '.$this->generateImageCraveButton($userid,$planimageid).'<!--<i class="countcravers"> '.$this->countCravers($planid).' Cravers</i>--></div>
                        <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o viewallcomments"></i> View all</a> <i class="countimagecomments"> '.$this->CountImageComments($planimageid).' </i> comments
                           
                        </div>
                        <ul class="comments imagecomments">
            <div class="userscroll imagecommentcon" style="max-height:300px; scroll-y:inherit; overflow:scroll; overflow-x: hidden;">'.$this->getPlanImageComments($planimageid).'</div>
                       
                            <li class="comment-form">
                                <div class="input-group">
                                    <input type="text" class="form-control imagecomment" />
                                    <span class="input-group-addon">
                   <a href="#"><i class="fa fa-comment addimagecomment"></i></a>
                </span>
                                </div>
                            </li>
                        </ul><script src="../myscript/addplanimagecomment.js"></script>
                    </div>
                </div>';
                return $allplanimageotherfeatures;
}

public function TotalPhotoCrave($planimageid)
{
echo $this->countPhotoCravers($planimageid);
}

private function countPhotoCravers($planimageid)
{
$stmt = $this->__contruct()->prepare('select crave_id from crave_image_tbl where plan_image_id=?');
$stmt->bind_param('d',$planimageid);
$stmt->execute();
$stmt->bind_result($theplanimageid);
$stmt->store_result();
$numrows = $stmt->num_rows();
return $numrows;
}

public function TotalPhotoLove($planimageid)
{
echo $this->countPhotoLover($planimageid);
}

private function countPhotoLover($planimageid)
{
$stmt = $this->__contruct()->prepare('select love_id from love_tbl where plan_image_id=?');
$stmt->bind_param('d',$planimageid);
$stmt->execute();
$stmt->bind_result($theplanimageid);
$stmt->store_result();
$numrows = $stmt->num_rows();
return $numrows;
}


public function TotalPhotoLike($planimageid)
{
echo $this->countPhotoLike($planimageid);
}
private function countPhotoLike($planimageid)
{
$stmt = $this->__contruct()->prepare('select like_id from like_tbl where plan_image_id=?');
$stmt->bind_param('d',$planimageid);
$stmt->execute();
$stmt->bind_result($theplanimageid);
$stmt->store_result();
$numrows = $stmt->num_rows();
return $numrows;
}


public function getTheSingleImagePlusNavigation($planid)
{
  return $this->getSinglePlanImageWithNavigation($planid);
}

private function getSinglePlanImageWithNavigation($planid)
{
global $realplanimage;
$stmt = $this->__contruct()->prepare('select plan_image_id,plan_id,plan_image_name,added_date from plan_image_tbl where plan_id=? order by plan_image_id desc LIMIT 1');  
$stmt->bind_param('d',$planid);
$stmt->execute();
$stmt->bind_result($planimageid,$myplanid,$planimage,$added_date);
$stmt->store_result();
$numrows = $stmt->num_rows();
// $realplanimage = "";
// $seeallphotosdiv = '';
if($numrows == 1)
{
$stmt->fetch();
if($planimage == "")
{
$realplanimage = '';  
}
else if($planimage != "")
{
$realplanimage = '<div align="center"  id="imagediv2"><img  style="cursor:pointer;" src="../server/php/files/'.$planimage.'" /></div>

<div align="center" class="navicon"><input type="hidden" value="'.$planid.'" class="myplanid" />'.$this->generateArrayOfPlanImages($planid).'</div><script></script>
<div align="center" style="color: #000 !important;" class="view-all-comments likelovecrave">
<i class="photolike cravestyle">'.$this->countPhotoLike($planimageid).'</i> <i class="fa fa-thumbs-up cravestyle"></i>, <i class="photolove cravestyle">'.$this->countPhotoLover($planimageid).'</i> <i class="fa fa-heart"></i> , <i class="photocrave cravestyle">'.$this->countPhotoCravers($planimageid).'</i> Craves</div>';
}


}
if($numrows == 0)
{
$realplanimage = "";  
}
return $realplanimage;
}



public function getOtherImagePlusNavigation($planid,$imageid)
{
  return $this->getOtherImageWithNavigation($planid,$imageid);
}

private function getOtherImageWithNavigation($planid,$imageid)
{
global $realplanimage;
$stmt = $this->__contruct()->prepare('select plan_image_id,plan_id,plan_image_name,added_date from plan_image_tbl where plan_id=? and plan_image_id=? order by plan_image_id desc LIMIT 1');  
$stmt->bind_param('dd',$planid,$imageid);
$stmt->execute();
$stmt->bind_result($planimageid,$myplanid,$planimage,$added_date);
$stmt->store_result();
$numrows = $stmt->num_rows();
// $realplanimage = "";
// $seeallphotosdiv = '';
if($numrows == 1)
{
$stmt->fetch();
if($planimage == "")
{
$realplanimage = '';  
}
else if($planimage != "")
{
$realplanimage = '<div align="center"  id="imagediv2"><img  style="cursor:pointer;" src="../server/php/files/'.$planimage.'" /></div>

<div align="center" class="navicon"><input type="hidden" value="'.$planid.'" class="myplanid" />'.$this->generateArrayOfPlanImages2($planid,$imageid).'</div><script></script>
<div align="center" style="color: #000 !important;" class="view-all-comments likelovecrave">
<i class="photolike cravestyle">'.$this->countPhotoLike($planimageid).'</i> <i class="fa fa-thumbs-up cravestyle"></i>, <i class="photolove cravestyle">'.$this->countPhotoLover($planimageid).'</i> <i class="fa fa-heart"></i> , <i class="photocrave cravestyle">'.$this->countPhotoCravers($planimageid).'</i> Craves</div>';
}


}
if($numrows == 0)
{
$realplanimage = "";  
}
return $realplanimage;
}



public function TheNotificationReinitialization($userid)
{
$this->reinitializeNotification($userid);
}
private function reinitializeNotification($userid)
{
$readstatus = 1;  
$stmt = $this->__contruct()->prepare('update notification_tbl set read_status=? where owner_id=?');
$stmt->bind_param('dd',$readstatus,$userid);
$stmt->execute();
}


public function convert($str,$ky=''){ 
if($ky=='')return $str; 
$ky=str_replace(chr(32),'',$ky); 
if(strlen($ky)<8)exit('key error'); 
$kl=strlen($ky)<32?strlen($ky):32; 
$k=array();for($i=0;$i<$kl;$i++){ 
$k[$i]=ord($ky{$i})&0x1F;} 
$j=0;for($i=0;$i<strlen($str);$i++){ 
$e=ord($str{$i}); 
$str{$i}=$e&0xE0?chr($e^$k[$j]):chr($e); 
$j++;$j=$j==$kl?0:$j;} 
return $str; 
}

public function secretKey()
{
 //$this->sessionstart();
 return "adekunle";
}

public function DeletePlanAndNecessaryStuff($userid,$planid)
{
  return  $this->DeleteExipirePlan($userid, $planid)  ; 
}

private function DeleteExipirePlan($userid,$planid)
{
global $done;    
$this->deletePlanImages($planid);    
$stmt = $this->__contruct()->prepare('delete from plan_tbl where user_id=? AND plan_id=? LIMIT 1');
$stmt->bind_param('dd',$userid,$planid);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
 $done = "yes";   
}
return $done;
}

private function deletePlanImages($planid)
{
$stmt = $this->__contruct()->prepare('select plan_image_name from plan_image_tbl where plan_id=?');
$stmt->bind_param('d',$planid);
$stmt->execute();
$stmt->bind_result($planimage);
$stmt->store_result();
$numrows  = $stmt->num_rows();
for($i=0;$i<$numrows;$i++)
{
 $stmt->fetch();
 // delete plan immages
 $firstpaththumb = '../server/php/files/thumbnail/'.$planimage;
 $firstpathmedium = '../server/php/files/medium/'.$planimage;
 $firstpathooriginal = '../server/php/files/'.$planimage;
 if(file_exists($firstpathooriginal))
 {
   unlink($firstpathooriginal);  
 }
 if(file_exists($firstpathmedium))
 {
    unlink($firstpathmedium); 
 }
 if(file_exists($firstpaththumb))
 {
    unlink($firstpaththumb);  
 }

 
 
}
}




private function countPlanCravers($planid)
{
$stmt = $this->__contruct()->prepare('select craver_id from craver_tbl where plan_id=?');
$stmt->bind_param('d',$planid);
$stmt->execute();
$stmt->bind_result($craverid);
$stmt->store_result();
$numrows = $stmt->num_rows();
return $numrows;
}

private function SelectPlansforTrendingPlans()
{
$stmt = $this->__contruct()->prepare('select plan_id from plan_tbl');
$stmt->execute();
$stmt->bind_result($planid);
$stmt->store_result();
$numrows = $stmt->num_rows();
for($i=0;$i<$numrows;$i++)
{
$stmt->fetch();
$listofplan .= $planid;
$listofcountcravers .= $this->countPlanCravers($planid);

}
}


public function GetAllUserForSearch($userid)
{
return $this->GetAllUser($userid);    
}
private function GetAllUser($userid)
{
  global $alluser; 
$stmt = $this->__contruct()->prepare('select user_id,firstname,lastname from user_tbl where user_id != ? order by user_id desc');
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($userid,$firstname,$lastname);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows > 0)
{
 $alluser = '<ul class="chat-contacts">';
}
for($i=0;$i<$numrows;$i++)
{
 $stmt->fetch();
 $alluser .= '<li class="online" data-user-id="1">
                <a href="../publicprofile/?'.$this->getProfileURL($_SESSION['myusrid']).'='.$userid.'">
                    <div class="media">
                        <div class="pull-left">
                            <span class="status"></span>
                            '.  $this->ProfilePixThumb($userid).'
                        </div>
                        <div class="media-body">
                            <div class="contact-name">'.ucwords($firstname .' '.$lastname).'</div>
                            <!--<small>"Free Today"</small>-->
                        </div>
                    </div>
                </a>
            </li>';
}
if($numrows > 0)
{
 $alluser .= '</ul>';
}
return $alluser;
}

public function GetAllMyBoxByPage($limit,$offset)
{    
return $this->getMyBoxByPage($limit,$offset);    
}

private function getMyBoxByPage($limit,$offset)
{
global $mybox;    
$myid = $_SESSION['myusrid'];   
$stmt = $this->__contruct()->prepare('select plan_id from box_tbl where owner_id=? order by plan_id desc LIMIT '.$limit.','.$offset);
$stmt->bind_param('d',$myid);
$stmt->execute();
$stmt->bind_result($planid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows > 0)
{
for($i=0; $i<$numrows;$i++)
{
$stmt->fetch();
$mybox .= $this->GetBoxPlanImage($planid) ;   
}
}
else if($numrows == 0)
{
$mybox = ' <div class="col-md-12"><div class="timeline row" data-toggle="gridalicious">
             
    <div class="timeline-block">
                    <div class="panel panel-default share">
                        <div class="panel-heading panel-heading-gray title">
                         <i class="fa fa-inbox"></i> No message in box
                        </div>
                        
                       
                    </div>
                </div></div>
    </div>';
}
return $mybox;
}

public function GetAllMyBox()
{
global $noofbox;    
return $this->getMyBox();    
}

private function getMyBox()
{
global $mybox,$noofbox;    
$myid = $_SESSION['myusrid'];   
$stmt = $this->__contruct()->prepare('select plan_id from box_tbl where owner_id=? order by plan_id desc');
$stmt->bind_param('d',$myid);
$stmt->execute();
$stmt->bind_result($planid);
$stmt->store_result();
$numrows = $stmt->num_rows();
$noofbox = $numrows;
for($i=0; $i<$numrows;$i++)
{
$stmt->fetch();
$mybox .= $this->GetBoxPlanImage($planid) ;   
}
return $mybox;
}

private function GetBoxPlanImage($planid)
{
 global $allhomeplans;	
//$mineid = $_SESSION['myusrid'];	
$stmt = $this->__contruct()->prepare('select user_id,plan_id,plan_name,plan_desc,added_date from plan_tbl where plan_id=? LIMIT 1');
$stmt->bind_param('d',$planid);	
$stmt->execute();
$stmt->bind_result($userid,$theplanid,$planname,$plandesc,$added);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
$allhomeplans = '<div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img src="'.$this->getUserImageThumb($userid).'" class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                    <a href="">'.$this->getUserFullName($userid).' '.$this->getUserStarIcon($userid).'</a>
                                    <span>'.$this->time_since(time() - strtotime($added)).' ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
    <div class="timeline-added-images"><div class="viewimages" data-toggle="modal" data-target="#planimagemodal"> 
                                '.$this->getPlanImages($theplanid).'</div>
                                <input type="hidden" class="planids" value="'.$theplanid.'" /> 
								
                            </div> 
                        </div>
                       
                       
			             </div> 
                </div>';	
}
if($numrows == 0)
{
$allhomeplans = '<div class="timeline-block">
                    <div class="panel panel-default share">
                        <div class="panel-heading panel-heading-gray title">
                          You have no Box 
                        </div>
                        
                       
                    </div>
                </div>
    ';	
}
return $allhomeplans;   
}

private function time_since($since) {
   
	    $chunks = array(
	        array(60 * 60 * 24 * 365 , 'year'),
	        array(60 * 60 * 24 * 30 , 'month'),
	        array(60 * 60 * 24 * 7, 'week'),
	        array(60 * 60 * 24 , 'day'),
	        array(60 * 60 , 'hour'),
	        array(60 , 'minute'),
	        array(1 , 'second')
	    );

	    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
	        $seconds = $chunks[$i][0];
	        $name = $chunks[$i][1];
	        if (($count = floor($since / $seconds)) != 0) {
	            break;
	        }
	    }


  $print = ($count == 1) ? '1 '.$name : "$count {$name}s";   

	   
 return $print;
	}


public function checkLoggedInStatus2()
{
if(isset($_SESSION['myusrid']) && isset($_SESSION['mytype']) == "35")
{
 $this->redirect_to('home');   
}
else
{
   // do nothing;    
}
}

public function sessiondestroy()
{
 $sessiondestoy = session_destroy();   
}

public function finduser($username,$password)
{
global $msg;
$this->checkuser($username,$password);
$msg = $msg;	
}


public function addMyNewPlan($userid,$myplan)
{
$this->addnewPlan($userid,$myplan);	
}

// add a new plan
private function addnewPlan($userid,$myplan)
{
$planname = $this->get_words($myplan,5);	
$stmt = $this->__contruct()->prepare('insert into plan_tbl (plan_name,plan_desc,user_id) values (?,?,?)');
$stmt->bind_param('ssd',$planname,$myplan,$userid);
$stmt->execute();
$affected = $stmt->affected_rows;
//$planid = $stmt->
if($affected == 1)
{
$planid = $stmt->insert_id;

//$tweet = "Valid hashtags include: #hashtag #NYC2016 #NYC_2016 #Adekunle!";

$hashtag = $this->checkForHashTaggingInPlan($myplan);
$arrayhashtag = explode(',',$hashtag);
for($i=0;$i<count($arrayhashtag);$i++)
{
$this->insertNewHashTag($arrayhashtag[$i],$planid);
}
// end of forstatement
}
}


// insert new hash tag
private function insertNewHashTag($hashtag,$planid)
{
$stmt = $this->__contruct()->prepare('select hash_tag_id from hash_tag_tbl where hash_tag=? LIMIT 1');
$stmt->bind_param('s',$hashtag);
$stmt->execute();
$stmt->bind_result($hashtagid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
  $stmt->fetch();  
$hashtagid = $hashtagid;    
$this->insertHashTagTrend($hashtagid,$planid);
} 
else if($numrows == 0)
{
$stmt2 = $this->__contruct()->prepare('insert into hash_tag_tbl (hash_tag) values (?) ');
$stmt2->bind_param('s',$hashtag);
$stmt2->execute();
$affected = $stmt2->affected_rows;
if($affected == 1)
{
$lastid = $stmt2->insert_id;
$this->insertHashTagTrend($lastid,$planid);
}


}

}


// start the hash tag trend
private function insertHashTagTrend($hashtagid,$planid)
{
$usrid = $_SESSION['myusrid'];   
$type = 1; 
$stmt = $this->__contruct()->prepare('insert into hash_tag_trend_tbl (hash_tag_id,user_id,plan_id,hash_type) values (?,?,?,?)');
$stmt->bind_param('ssss',$hashtagid,$usrid,$planid,$type); 
$stmt->execute();
}

private function get_words($sentence, $count = 5) {
  preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
  return $matches[0];
}

// check for hash tagging in a sentence and return word without hash tag infront
public function checkForHashTaggingInPlan($string, $str = 1)
{
  $keywords = '';
                 preg_match_all('/#(\w+)/',$string,$matches);
                  $i = 0;
                  if ($str) {
                   foreach ($matches[0] as $match) {
                   $count = count($matches[0]);
                   $keywords .= $match;
                   $i++;
                   if ($count > $i) $keywords .= ",";
                  }
                 } else {
                   foreach ($matches[0] as $match) {
                    $keyword[] = $match;
                       }
                      $keywords = $keyword;
                 }
                return $keywords;
}

// check for hash tagging in a sentence and return word with hash tag
public function checkForHashTaggingInPlan2($string, $str = 1)
{
  $keywords = '';
                 preg_match_all('/#(\w+)/',$string,$matches);
                  $i = 0;
                  if ($str) {
                   foreach ($matches[1] as $match) {
                   $count = count($matches[1]);
                   $keywords .= $match;
                   $i++;
                   if ($count > $i) $keywords .= ", ";
                  }
                 } else {
                   foreach ($matches[1] as $match) {
                    $keyword[] = $match;
                       }
                      $keywords = $keyword;
                 }
                return $keywords;
}

private function getUserFullName($userid)
{
global $realname;
$stmt = $this->__contruct()->prepare('select firstname,lastname from user_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($firstname,$lastname);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
$realname = $firstname.' '.$lastname;
}
return $realname;
}


public function theLastTenUsers()
{
$tenusers = $this->getLastTenUser();
return $tenusers;
}
/// get the last ten user on home page
private function getLastTenUser()
{
global $lasttenuser,$staricon;
$notid = $_SESSION['myusrid'];
$stmt = $this->__contruct()->prepare('select user_id,profile_pix,firstname,lastname,added_date,celeb from user_tbl where user_id != ? order by user_id desc limit 40');
$stmt->bind_param('d',$notid);
$stmt->execute();
$stmt->bind_result($userid,$propix,$firstname,$lastname,$added,$celeb);
$stmt->store_result();
$numrows = $stmt->num_rows();
for($i=0;$i<$numrows; $i++)
{
 $stmt->fetch(); 
  if($celeb == 1)
{
$staricon = '<i  class="celeb2 fa fa-check-circle"></i>';
}
else if($celeb == 0)
{
$staricon = '';
}
 if($propix == "")
 {
 $propix = '../images/thumbsprofilepix/noprofilethumb.jpg';    
 }
 else if($propix !="")
 {
  $propix = '../images/thumbsprofilepix/allprofilethumb/'.$propix;  
 }
 $lasttenuser .= ' <a class="latestuserslink" href="../publicprofile/?'.$this->getProfileURL($_SESSION['myusrid']).'='.$userid.'"><div style="padding:4px; border-bottom:1px solid #ccc;" id="realprofilepix"><img title="'.$firstname.' '.$lastname.'" width="40" height="40"
  class="img-circle" src="'.$propix.'" />&nbsp;&nbsp;&nbsp;&nbsp;'.$firstname.' '.$lastname.' Joined '.$this->time_since(time() - strtotime($added)).' ago    '.$staricon.'</div></a>';   
}
return $lasttenuser;
}


public function LogPlanImage($name)
{
     $this->InsertPlanImages($name);    
}

private function InsertPlanImages($name)
{
$this->sessionstart();    
$planid = $_SESSION['planid'];    
$stmt = $this->__contruct()->prepare('insert into plan_image_tbl (plan_image_name,plan_id) values (?,?)');
$stmt->bind_param('sd',$name,$planid);
$stmt->execute();
}

public function TriggerBoxNotificationOnPlanImageUpload()
{
    $this->selectPlanCravers();    
}

private function selectPlanCravers()
{
//$this->sessionstart();    
$planid = $_SESSION['planid'];      
$stmt = $this->__contruct()->prepare('select user_id from craver_tbl where plan_id = ?');
$stmt->bind_param('d',$planid);
$stmt->execute();
$stmt->bind_result($userid);
$stmt->store_result();
$num_rows = $stmt->num_rows();
for($i=0; $i<$num_rows;$i++)
{
 $stmt->fetch();
$stmt2 = $this->__contruct()->prepare('select box_id from box_tbl where owner_id=? and plan_id=? LIMIT 1');
$stmt2->bind_param('dd',$userid,$planid);
$stmt2->execute();
$stmt2->bind_result($boxid);
$stmt2->store_result();
$num_rows2 = $stmt2->num_rows();
 if($num_rows2 == 1)
 {
  // trigger notifications;  
  $this->InsertNewNotification($this->getPlanOwnerID($planid),$userid,0,$planid,13);  
 }
 else if($num_rows2 == 0)
 {
  // trigger box;
 $this->TriggerBox($planid, $userid);    
  // trigger notification;
 }
}
}

private function TriggerBox($planid,$userid)
{
$stmt = $this->__contruct()->prepare('insert into box_tbl (owner_id,plan_id) values (?,?)');
$stmt->bind_param('dd',$userid,$planid);
$stmt->execute();
$affected = $stmt->affected_rows;   
if($affected == 1)
{
  $this->InsertNewNotification($this->getPlanOwnerID($planid),$userid,0,$planid,13);	
}
}

public function DeleteLogPlanImage($name)
{
     $this->DeletePlanImageFromDb($name);   
}
private function DeletePlanImageFromDb($name)
{
 $stmt = $this->__contruct()->prepare('delete from plan_image_tbl where plan_image_name=?');
$stmt->bind_param('s',$name);
$stmt->execute();   
}

private function getUserImageThumb($userid)
{
global $realprofilepix;
$stmt = $this->__contruct()->prepare('select profile_pix from user_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($profilepix);
$stmt->store_result();
$numrows = $stmt->num_rows();

if($numrows == 1)
{
$stmt->fetch();
if($profilepix == "")
{
$realprofilepix = "../images/thumbsprofilepix/noprofilethumb.jpg";	
}
else if($profilepix != "")
{
$realprofilepix = "../images/thumbsprofilepix/allprofilethumb/".$profilepix;	
}
}
return $realprofilepix;	
}

private function getURLForPostPlanUser($userid)
{
	
}
public function getActiveHomePlans()
{
global $myactivehomeplans,$noofplansonhome;	
$myactivehomeplans = $this->getHomePlans();	
return $myactivehomeplans;
}

public function getLastInsertedActiveHomePlans()
{
global $myactivehomeplans;	
$myactivehomeplans = $this->getLastHomePlans();	
return $myactivehomeplans;
}

public function getLastComment($userid,$planid,$plancomment)
{
global $thelastcomment;
if($theuserid == $_SESSION['myusrid'])
{
$name = '<a style="font-size:12px;" class="comment-author"> You </a> said';
$editdeletebutton = '<input type="hidden" class="thecommentid" value="'.$plancommentid.'"/><a class="editbutton editdeletebutton"><i title="Edit" class="fa fa-pencil"></i> Edit</a> <a class="deletebutton editdeletebutton"><i class="fa fa-trash-o"></i> Delete</a>';    
}
else
{

$editdeletebutton = '<input type="hidden" class="thecommentid" value="'.$plancommentid.'"/><a style="display:none" class="editbutton editdeletebutton"><i title="Edit" class="fa fa-pencil"></i> Edit</a> <a style="display:none" class="deletebutton editdeletebutton"><i class="fa fa-trash-o"></i> Delete</a>';
 $name = ' <a href="../publicprofile/?'.$this->getProfileURL($_SESSION['myusrid']).'='.$theuserid.'" style="font-size:12px;" class="comment-author">'.$this->getUserFullName($theuserid).' </a> said ';   
}
$date = 'Just Now';
$thelastcomment = '<li><div class="media">
                                    <a href="" class="pull-left">
                                        <img src="'.$this->getUserImageThumb($userid).'" class="media-object">
                                    </a>
                                    <div class="media-body">
                                    '.$name.'
                                        <span>'.$plancomment.'</span>
                                        <div class="comment-date">'.$date.'</div>
                                        '.$editdeletebutton.'
                                    </div>
                                </div>
                            </li>';	
return $thelastcomment;							
}

private function timeformating($time)
{
$splited = explode(' ',$time);
$day = $splited[0];
$timeof = $splited[1];
$diet = 'am';
$timesplit = explode(':',$timeof);
$hour = $timesplit[0];
$min = $timesplit[1];	

if($hour > 12)
{
$diet = 'pm';	
$realhour = $hour%12;
$correcttime =$realhour.':'.$min.' '.$diet;	
}
else
{
$correcttime = $hour.':'.$min.' '.$diet;		
}
return '<span class="">'.$correcttime.'</span>';
}

private function generateCraveButton($userid,$planid)
{
$sessionid = $_SESSION['myusrid'];	
global $realcravebutton;
$stmt = $this->__contruct()->prepare('select craver_id,plan_id,user_id from craver_tbl where plan_id=? and user_id=? LIMIT 1');
$stmt->bind_param('dd',$planid,$sessionid);
$stmt->execute();
$stmt->bind_result($craverid,$theplanid,$theuserid);	
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$realcravebutton = '<a class="cravebox"><i title="Uncrave This Event" style="color:#F3565D;" class="cravestyle fa fa-camera uncraveplan"> crave </i><i style="display:none;" title="Crave this Event" class="cravestyle fa fa-camera craveplan"> crave </i></a> ';	
}
else if($numrows == 0)
{
$realcravebutton = '<a class="cravebox"><i style="display:none;" title="Uncrave This Event" class="cravestyle fa fa-thumbs-down uncraveplan"> crave </i> <i title="Crave this Event" class="cravestyle fa fa-camera craveplan"> crave</i></a>';	
}
return $realcravebutton;
}
private function getPlanImages($planid)
{
global $realplanimage;
$stmt = $this->__contruct()->prepare('select plan_image_id,plan_id,plan_image_name,added_date from plan_image_tbl where plan_id=? order by plan_image_id desc');	
$stmt->bind_param('d',$planid);
$stmt->execute();
$stmt->bind_result($planimageid,$myplanid,$planimage,$added_date);
$stmt->store_result();
$numrows = $stmt->num_rows();
$realplanimage = "";
$seeallphotosdiv = '';
for($i=0;$i<$numrows;$i++)
{
$stmt->fetch();
if($planimage == "")
{
$realplanimage = '';	
}
else if($planimage != "")
{
if($i == 2)
{
  //$seeallphotosdiv = '<div style="position:absolute; width:inherit; height:inherit; background:#000; opacity:0.6; color:#fff;">See All Photos ghgfhdgfhdgfhdf fdfdhfjdfhd dhffgdh</div>';
 // $seeallphotosdiv = '';
 // $realplanimage .= '<div align="center" data-toggle="modal" id="imagediv" data-target="#planimagemodal" class="openimage" >'.$seeallphotosdiv.'<img  style="cursor:pointer;" src="../server/php/files/medium/'.$planimage.'" ></div>';
  break;
}
 else
 {
  $realplanimage .= ''.$seeallphotosdiv.'<img class="lazyload" style="cursor:pointer; padding:5px; width:100% !important; " data-original="../server/php/files/'.$planimage.'" >';

  // $realplanimage .= '<div align="center"  id="imagediv"  class="openimage" >'.$seeallphotosdiv.'<img  style="cursor:pointer;" src="../server/php/files/medium/'.$planimage.'" ></div>';
 
 }

}
}
if($numrows == 0)
{
$realplanimage = "";	
}
return $realplanimage;
}

public function NoOfCravers($planid)
{
global $mycravercount;
$mycravercount = $this->countCravers($planid);	
return $mycravercount;
}
private function countCravers($planid)
{
global $noofcravers;
$stmt = $this->__contruct()->prepare('select craver_id from craver_tbl where plan_id=?');
$stmt->bind_param('d',$planid);
$stmt->execute();
$stmt->bind_result($cravers);
$stmt->store_result();
$numrows = $stmt->num_rows();
$noofcravers = $numrows;
return $noofcravers;
}

private function checkIfCraved($planid,$userid)
{
global $craved;	
$stmt = $this->__contruct()->prepare('select craver_id from craver_tbl where plan_id=? and user_id=? LIMIT 1');	
$stmt->bind_param('dd',$planid,$userid);
$stmt->execute();
$stmt->bind_result($craverid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if ($numrows == 1)
{
$craved = TRUE;	
}
else if($numrows == 0)
{
$craved = FALSE;	
}
return $craved;
}

public function addCraver($planid,$userid)
{
global $added;
$added = $this->addNewCraver($planid,$userid);
return $added;	
}



private function getPlanOwnerID($planid)
{
   global $theidneeded; 
$stmt = $this->__contruct()->prepare('select user_id from plan_tbl where plan_id=? LIMIT 1');  
$stmt->bind_param('d',$planid);
$stmt->execute();
$stmt->bind_result($userid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
$theidneeded = $userid;
}
return $theidneeded;
}



private function getPlanIDByImageID($planimageid)
{
   global $theidneeded; 
$stmt = $this->__contruct()->prepare('select plan_id from plan_image_tbl where plan_image_id=? LIMIT 1');  
$stmt->bind_param('d',$planimageid);
$stmt->execute();
$stmt->bind_result($userid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
$theidneeded = $userid;
}
return $theidneeded;
}


private function countNoOfPlanImagesAvailable($planid)
{
$stmt = $this->__contruct()->prepare('select plan_image_id from plan_image_tbl where plan_id=?');
$stmt->bind_param('d',$planid);
$stmt->execute();
$stmt->bind_result($planimageid);
$stmt->store_result();
$numrows = $stmt->num_rows();
return $numrows;    
}


private function addNewCraver($planid,$userid)
{
if($this->checkIfCraved($planid,$userid))
{
// do nothing
if($this->countNoOfPlanImagesAvailable($planid) > 0)
{
$this->InsertNewNotification($this->getPlanOwnerID($planid),$userid,0,$planid,13);

}	
    }
else
{
global $added;
$stmt = $this->__contruct()->prepare('insert into craver_tbl (user_id,plan_id) values (?,?)');
$stmt->bind_param('dd',$userid,$planid);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
$added = 'added';
$this->InsertNewNotification($userid,  $this->getPlanOwnerID($planid), 0, $planid, 3);
if($this->countNoOfPlanImagesAvailable($planid) > 0)
{
$this->InsertNewNotification($this->getPlanOwnerID($planid),$userid,0,$planid,13);
$this->triggerBoxNotificationAfterCraving($planid, $userid);
}


}
return $added;
}
}


private function triggerBoxNotificationAfterCraving($planid,$userid)
{
$stmt = $this->__contruct()->prepare('select box_id from box_tbl where owner_id=? and plan_id=? LIMIT 1');
$stmt->bind_param('dd',$userid,$planid);
$stmt->execute();
$stmt->bind_result($boxid);
$stmt->num_rows();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
    
}
else if($numrows == 0)
{
$stmt2 = $this->__contruct()->prepare('insert into box_tbl (owner_id,plan_id) values (?,?)');
$stmt2->bind_param('dd',$userid,$planid);
$stmt2->execute();   
}

}


private function deleteBoxNotificationAfterUnCraving($planid,$userid)
{
$stmt = $this->__contruct()->prepare('select box_id from box_tbl where owner_id=? and plan_id=? LIMIT 1');
$stmt->bind_param('dd',$userid,$planid);
$stmt->execute();
$stmt->bind_result($boxid);
$stmt->num_rows();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
    
}
else if($numrows == 0)
{
$stmt2 = $this->__contruct()->prepare('delete from box_tbl where owner_id=? and plan_id=?');
$stmt2->bind_param('dd',$userid,$planid);
$stmt2->execute();   
}

}

public function removeACraver($planid,$userid)
{
global $removed;
$removed = $this->removeCraver($planid,$userid);
return $removed;	
}

private function removeCraver($planid,$userid)
{
$stmt = $this->__contruct()->prepare('delete from craver_tbl where user_id=? AND plan_id=?');	
$stmt->bind_param('dd',$userid,$planid);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
$deleted = 'deleted';
$this->InsertNewNotification($userid,  $this->getPlanOwnerID($planid), 0, $planid, 4);
$this->deleteBoxNotificationAfterUnCraving($planid, $userid);
}
return $deleted;
}

public function NoOfPlanComments($planid)
{
global $noofplancomment;
$noofplancomment = $this->CountComments($planid);
return $noofplancomment;	
}

private function CountComments($planid)
{
global $countcomments;
$stmt = $this->__contruct()->prepare('select plan_comment_id from plan_comment_tbl where plan_id=?');
$stmt->bind_param('d',$planid);
$stmt->execute();	
$stmt->bind_result($commentid);
$stmt->store_result();
$numrows = $stmt->num_rows();
$countcomments = $numrows;
return $countcomments;
}



public function NoOfImageComments($planimageid)
{
global $noofplancomment;
$noofplancomment = $this->CounttheImageComments($planimageid);
return $noofplancomment; 
}

private function CounttheImageComments($planimageid)
{
global $countcomments;
$stmt = $this->__contruct()->prepare('select plan_image_comment_id from plan_image_comment_tbl where plan_image_id=?');
$stmt->bind_param('d',$planimageid);
$stmt->execute(); 
$stmt->bind_result($commentid);
$stmt->store_result();
$numrows = $stmt->num_rows();
$countcomments = $numrows;
return $countcomments;
}

// remember to write a function that calculates dates

private function getPlanComments($planid)
{
global $plancomments;
$stmt = $this->__contruct()->prepare('select plan_comment_id,plan_comment,plan_id,user_id,added_date from plan_comment_tbl where plan_id=? ORDER BY plan_comment_id desc');	
$stmt->bind_param('d',$planid);
$stmt->execute();
$stmt->bind_result($plancommentid,$plancomment,$theplanid,$theuserid,$date);
$stmt->store_result();
$numrows = $stmt->num_rows();

if($numrows > 0)
{
$plancomments = '';	
for($i=0;$i<$numrows;$i++)
{
$stmt->fetch();	
if($theuserid == $_SESSION['myusrid'])
{
$name = '<a style="font-size:12px;" class="comment-author"> You </a> said';
//$editdeletebutton = '<input type="hidden" class="thecommentid" value="'.$plancommentid.'"/><a class="editbutton editdeletebutton"><i title="Edit" class="fa fa-pencil"></i> Edit</a> <a class="deletebutton editdeletebutton"><i class="fa fa-trash-o"></i> Delete</a>';    
$editdeletebutton = '';
}
else
{

$editdeletebutton = '<input type="hidden" class="thecommentid" value="'.$plancommentid.'"/><a style="display:none" class="editbutton editdeletebutton"><i title="Edit" class="fa fa-pencil"></i> Edit</a> <a style="display:none" class="deletebutton editdeletebutton"><i class="fa fa-trash-o"></i> Delete</a>';
 $name = ' <a href="../publicprofile/?'.$this->getProfileURL($_SESSION['myusrid']).'='.$theuserid.'" style="font-size:12px;" class="comment-author">'.$this->getUserFullName($theuserid).' </a> said ';   
}
$plancomments .= '<li class="commentlist">
                                <div class="media">
                                    <a href="" class="pull-left">
                                        <img src="'.$this->getUserImageThumb($theuserid).'" class="media-object">
                                    </a>
                                    <div class="media-body">
                                       '.$name.'
                                        <span class="theplancomment">'.$plancomment.'</span>
                                        <div class="comment-date">'.$this->time_since(time() - strtotime($date)).' ago</div>
                                        <div>'.$editdeletebutton.'</div>
                                    </div>
                                </div>
                            </li>';	
}
}
if($numrows == 0)
{
$plancomments = "";	
}
return $plancomments;
}

public function addNewComment($planid,$plancomment,$userid)
{
return $this->addcomment($planid,$plancomment,$userid);	
}

private function addcomment($planid,$plancomment,$userid)
{
$stmt = $this->__contruct()->prepare('insert into plan_comment_tbl (user_id,plan_id,plan_comment) values (?,?,?)');
$stmt->bind_param('dds',$userid,$planid,$plancomment);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
    $this->InsertNewNotification($userid, $this->getPlanOwnerID($planid),0, $planid,5);
 $plancommentid = $stmt->insert_id;
 if($userid == $_SESSION['myusrid'])
{
$name = '<a style="font-size:12px;" class="comment-author"> You </a> said';
$editdeletebutton = '<input type="hidden" class="thecommentid" value="'.$plancommentid.'"/><a class="editbutton editdeletebutton"><i title="Edit" class="fa fa-pencil"></i> Edit</a> <a class="deletebutton editdeletebutton"><i class="fa fa-trash-o"></i> Delete</a>';    
}
else
{

$editdeletebutton = '<input type="hidden" class="thecommentid" value="'.$plancommentid.'"/><a style="display:none" class="editbutton editdeletebutton"><i title="Edit" class="fa fa-pencil"></i> Edit</a> <a style="display:none" class="deletebutton editdeletebutton"><i class="fa fa-trash-o"></i> Delete</a>';
 $name = ' <a href="../publicprofile/?'.$this->getProfileURL($_SESSION['myusrid']).'='.$theuserid.'" style="font-size:12px;" class="comment-author">'.$this->getUserFullName($theuserid).' </a> said ';   
}
$date = 'Just Now';
$thelastcomment = '<li><div class="media">
                                    <a href="" class="pull-left">
                                        <img src="'.$this->getUserImageThumb($userid).'" class="media-object">
                                    </a>
                                    <div class="media-body">
                                    '.$name.'
                                        <span>'.$plancomment.'</span>
                                        <div class="comment-date">'.$date.'</div>
                                        '.$editdeletebutton.'
                                    </div>
                                </div>
                            </li>'; 
return $thelastcomment;                                
}
}

public function MyActivePlans()
{
global $myactiveplans,$noactive;
$myactiveplans = $this->getMyActivePlans();	
return $myactiveplans;
}


private function getMyActivePlans()
{
global $allhomeplans,$noactive;	
$mineid = $_SESSION['myusrid'];	
$stmt = $this->__contruct()->prepare('select user_id,plan_id,plan_name,plan_desc,added_date from plan_tbl where user_id=? ORDER BY plan_id desc');
$stmt->bind_param('d',$mineid);	
$stmt->execute();
$stmt->bind_result($userid,$planid,$planname,$plandesc,$added);
$stmt->store_result();
$numrows = $stmt->num_rows();
$noactive = $numrows;
for($i=0;$i<$numrows;$i++)
{
$stmt->fetch();
$allhomeplans .= '<div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img src="'.$this->getUserImageThumb($userid).'" class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                    <a href="">'.$this->getUserFullName($userid). ' '.$this->getUserStarIcon($userid).'</a>
                                    <span>'.$this->time_since(time() - strtotime($added)).' ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
						    <p><a class="btn btn-success btn-sm">My Event <i class="fa fa-tags"></i></a><br/> '.preg_replace('/#(\w+)/', ' <a href="../hashtags/?tag=%23$1">#$1</a>', $planname).'...</p>
                            <p><a class="btn btn-success btn-sm">Description <i class="fa fa-globe"></i></a><br/> '.preg_replace('/#(\w+)/', ' <a href="../hashtags/?tag=%23$1">#$1</a>', $plandesc).'</p>
							<p><script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-561771eafa9685be" async="async"></script>
							<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_sharing_toolbox"></div>
<!--<a style="margin-bottom:10px;" href="#" class="btn btn-primary btn-xs pull-right addplanimage"><i class="fa fa-plus"></i><input type="hidden" class="planid"  value="'.$planid.'" /> Add Plan Image '.$planid.' <i class="fa fa-photo"></i></a> -->
</p>
 <div><p style="width:100%; height:22px;"><a href="#" class="btn btn-primary btn-xs pull-right addplanimage"><i class="fa fa-plus"></i><input type="hidden" class="planid"  value="'.$planid.'" /> Add Event Photos  <i class="fa fa-photo"></i></a></p> </div>

							                           <div class="timeline-added-images"> 
                               <div class="viewimages" data-toggle="modal" data-target="#planimagemodal"> '.$this->getPlanImages($planid).' </div>
								
                            </div> 
                        </div>
                        <div class="view-all-comments"><!--'.$this->generateCraveButton($userid,$planid).'--><i class="countcravers"> '.$this->countCravers($planid).' Cravers</i></div>
                        <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o"></i> View all</a> <i class="countcomments"> '.$this->CountComments($planid).' </i> suggestions
                           <input type="hidden" class="planids" value="'.$planid.'" /> 
                        </div>
                        <ul class="comments">
						<div class="userscroll imagecommentcon" style="max-height:250px; scroll-y:inherit; overflow:scroll; overflow-x: hidden;">'.$this->getPlanComments($planid).'</div>
                       
                            <li class="comment-form">
                                <div class="input-group">
                                    <input type="text" class="form-control plancomment" />
                                    <span class="input-group-addon">
                   <a href="#"><i class="fa fa-comment addcomment"></i></a>
                </span>
                                </div>
                            </li>
                        </ul>
						<div align="right" style="padding:15px;"><a class="expireplan btn-sm btn btn-danger"><i class="fa fa-trash-o"></i> Expire Event</a></div>
                    </div>
                </div>';	
}
if($numrows == 0)
{
$allhomeplans = '<div class="timeline-block">
                    <div class="panel panel-default share">
                        <div class="panel-heading panel-heading-gray title">
                          You have no Active Plan 
                        </div>
                        
                       
                    </div>
                </div>
    ';	
}
return $allhomeplans;
}


public function MyActivePlansbypage($limit,$offset)
{
global $myactiveplans;
$myactiveplans = $this->getMyActivePlansbypage($limit,$offset); 
return $myactiveplans;
}

private function getMyActivePlansbypage($limit,$offset)
{
global $allhomeplans;   
$mineid = $_SESSION['myusrid']; 
$stmt = $this->__contruct()->prepare('select user_id,plan_id,plan_name,plan_desc,added_date from plan_tbl where user_id=? ORDER BY plan_id desc LIMIT '.$limit.','.$offset);
$stmt->bind_param('d',$mineid); 
$stmt->execute();
$stmt->bind_result($userid,$planid,$planname,$plandesc,$added);
$stmt->store_result();
$numrows = $stmt->num_rows();
for($i=0;$i<$numrows;$i++)
{
$stmt->fetch();
$allhomeplans .= '<div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img src="'.$this->getUserImageThumb($userid).'" class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                    <a href="">'.$this->getUserFullName($userid). ' '.$this->getUserStarIcon($userid).'</a>
                                    <span>'.$this->time_since(time() - strtotime($added)).' ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p><a class="btn btn-success btn-sm">My Event <i class="fa fa-tags"></i></a><br/> '.preg_replace('/#(\w+)/', ' <a href="../hashtags/?tag=%23$1">#$1</a>', $planname).'...</p>
                            <p><a class="btn btn-success btn-sm">Description <i class="fa fa-globe"></i></a><br/> '.preg_replace('/#(\w+)/', ' <a href="../hashtags/?tag=%23$1">#$1</a>', $plandesc).'</p>
                            <p><script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-561771eafa9685be" async="async"></script>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_sharing_toolbox"></div>
<!--<a style="margin-bottom:10px;" href="#" class="btn btn-primary btn-xs pull-right addplanimage"><i class="fa fa-plus"></i><input type="hidden" class="planid"  value="'.$planid.'" /> Add Plan Image '.$planid.' <i class="fa fa-photo"></i></a> -->
</p>
 <div><p style="width:100%; height:22px;"><a href="#" class="btn btn-primary btn-xs pull-right addplanimage"><i class="fa fa-plus"></i><input type="hidden" class="planid"  value="'.$planid.'" /> Add Event Photos  <i class="fa fa-photo"></i></a></p> </div>

                                                       <div class="timeline-added-images"> 
                               <div class="viewimages" data-toggle="modal" data-target="#planimagemodal"> '.$this->getPlanImages($planid).' </div>
                                
                            </div> 
                        </div>
                        <div class="view-all-comments"><!--'.$this->generateCraveButton($userid,$planid).'--><i class="countcravers"> '.$this->countCravers($planid).' Cravers</i></div>
                        <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o"></i> View all</a> <i class="countcomments"> '.$this->CountComments($planid).' </i> suggestions
                           <input type="hidden" class="planids" value="'.$planid.'" /> 
                        </div>
                        <ul class="comments">
                        <div class="userscroll imagecommentcon" style="max-height:250px; scroll-y:inherit; overflow:scroll; overflow-x: hidden;">'.$this->getPlanComments($planid).'</div>
                       
                            <li class="comment-form">
                                <div class="input-group">
                                    <input type="text" class="form-control plancomment" />
                                    <span class="input-group-addon">
                   <a href="#"><i class="fa fa-comment addcomment"></i></a>
                </span>
                                </div>
                            </li>
                        </ul>
                        <div align="right" style="padding:15px;"><a class="expireplan btn-sm btn btn-danger"><i class="fa fa-trash-o"></i> Expire Event</a></div>
                    </div>
                </div>';    
}
if($numrows == 0)
{
$allhomeplans = '<div class="timeline-block">
                    <div class="panel panel-default share">
                        <div class="panel-heading panel-heading-gray title">
                          You have no Active Plan 
                        </div>
                        
                       
                    </div>
                </div>
    ';  
}
return $allhomeplans;
}

private function getFollowingHomePlanSyntax($mineid)
{
global $preparesyntax,$following,$nooffollowing,$secondstringparam,$bindparamsyntax,$stringparam;    
$stmt = $this->__contruct()->prepare('select following from follow_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$mineid);
$stmt->execute();
$stmt->bind_result($following);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
$following = $following;
$followingconcat = $following;
if($followingconcat == "")
{
 $nooffollowing = 0;   
}
else if($followingconcat != "")
{
$arrayfollowing = explode(',',$followingconcat);
$nooffollowing = count($arrayfollowing);
}
// for just one followingelse 
if($nooffollowing == 0)
{
 $stringparam = 'd';   
 $preparesyntax = 'user_id=?';
  $bindparamsyntax = $mineid;       
}
else if($nooffollowing == 1)
{
$stringparam = 'dd';    
$preparesyntax = 'user_id=? or user_id=?';
$bindparamsyntax = $mineid.','.$arrayfollowing[0];
//$bindparamsyntax = '9,12';
}

else if($nooffollowing > 1)
{
$stringparam = "d";
 $preparesyntax = 'user_id=? ';
 $bindparamsyntax = $mineid; 
 $secondstringparam = "d";
for($i=0;$i<$nooffollowing;$i++)
{
 $stringparam .= "d";
 $secondstringparam .= ",d";
 $preparesyntax .= 'or user_id=? ';
 $bindparamsyntax .= ','.$arrayfollowing[$i];
}
}

}

//return $following;
}

public function getActiveHomePlansByPage($limit,$offset)
{
global $myactivehomeplans,$noofplansonhome;  
$myactivehomeplans = $this->getHomePlansbyPage($limit,$offset); 
return $myactivehomeplans;
}

private function getHomePlansbyPage($limit,$offset)
{
global $allhomeplans,$preparesyntax,$noofplansonhome,$secondstringparam,$bindparamsyntax,$stringparam;   
$mineid = $_SESSION['myusrid']; 
$this->getFollowingHomePlanSyntax($mineid);
$preparesyntax = $preparesyntax;
$bindparamsyntax = $bindparamsyntax;
$stringparam = $stringparam;
$splitbindparam = explode(",", $bindparamsyntax);
$splitsecondstringparam = explode(",",$secondstringparam);
//$commaseperated = implode(',',$splitbindparam);
$stmt = $this->__contruct()->prepare('select user_id,plan_id,plan_desc,added_date from plan_tbl where '.$preparesyntax.' ORDER BY plan_id desc limit '.$limit.','.$offset);
if(count($splitbindparam) == 3)
{
$stmt->bind_param($stringparam,$splitbindparam[0],$splitbindparam[1],$splitbindparam[2]);   
}
else if(count($splitbindparam) == 2)
{
 $stmt->bind_param($stringparam,$splitbindparam[0],$splitbindparam[1]);
}
 else {
 

 $paramarray = array($stringparam); 
$mergeparam = array_merge($paramarray,$splitbindparam);

$tmp = array();
foreach($mergeparam as $key=>$value)

  $tmp[$key] = &$mergeparam[$key]; 
 

  call_user_func_array(array($stmt, 'bind_param'),$tmp );  

 }
    

$stmt->execute();
$stmt->bind_result($userid,$planid,$plandesc,$added);
$stmt->store_result();
$numrows = $stmt->num_rows();
$noofplansonhome = $numrows;
for($i=0;$i<$numrows;$i++)
{
$stmt->fetch();
if($userid == $_SESSION['myusrid'])
{
$name = '<a>'.$this->getUserFullName($userid).'</a>';
}
else
{
 $name = '<a href="../publicprofile/?'.$this->getProfileURL($_SESSION['myusrid']).'='.$userid.'">'.$this->getUserFullName($userid).'</a>';   
}
// if(time() - strtotime($added) < 0)
// {
// $realtime = 1;
// }
$allhomeplans .= '<div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img src="'.$this->getUserImageThumb($userid).'" class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                    '.$name.'
                                    <span>'.$this->time_since(time() - strtotime($added)).' ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p>'.preg_replace('/#(\w+)/', ' <a href="../hashtags/?tag=%23$1">#$1</a>', $plandesc).'</p>
                           <div class="timeline-added-images"> <!--
                                '.$this->getPlanImages($planid).'-->
                                <!--<img src="../images/social/100/1.jpg" width="80">
                                <img src="../images/social/100/2.jpg" width="80">
                                <img src="../images/social/100/3.jpg" width="80"> -->
                            </div> 
                        </div>
                        <div class="view-all-comments">'.$this->generateCraveButton($userid,$planid).'<!--<i class="countcravers"> '.$this->countCravers($planid).' Cravers</i>--></div>
                        <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o viewallcomments"></i> View all</a> <i class="countcomments"> '.$this->CountComments($planid).' </i> suggestions
                           <input type="hidden" class="planids" value="'.$planid.'" /> 
                        </div>
                        <ul class="comments">
                        <div class="userscroll " style="max-height:200px; scroll-y:inherit; overflow:scroll; overflow-x: hidden;">'.$this->getPlanComments($planid).'</div>
                       
                            <li class="comment-form">
                                <div class="input-group">
                                    <input type="text" class="form-control plancomment" />
                                    <span class="input-group-addon">
                   <a href="#"><i class="fa fa-comment addcomment"></i></a>
                </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>';    
}
return $allhomeplans;
}



private function getHomePlans()
{
global $allhomeplans,$preparesyntax,$noofplansonhome,$secondstringparam,$bindparamsyntax,$stringparam;	
$mineid = $_SESSION['myusrid'];	
$this->getFollowingHomePlanSyntax($mineid);
$preparesyntax = $preparesyntax;
$bindparamsyntax = $bindparamsyntax;
$stringparam = $stringparam;
$splitbindparam = explode(",", $bindparamsyntax);
$splitsecondstringparam = explode(",",$secondstringparam);
//$commaseperated = implode(',',$splitbindparam);
$stmt = $this->__contruct()->prepare('select user_id,plan_id,plan_desc,added_date from plan_tbl where '.$preparesyntax.' ORDER BY plan_id desc');
if(count($splitbindparam) == 3)
{
$stmt->bind_param($stringparam,$splitbindparam[0],$splitbindparam[1],$splitbindparam[2]);	
}
else if(count($splitbindparam) == 2)
{
 $stmt->bind_param($stringparam,$splitbindparam[0],$splitbindparam[1]);
}
 else {
    
 $paramarray = array($stringparam); 
$mergeparam = array_merge($paramarray,$splitbindparam);

$tmp = array();
foreach($mergeparam as $key=>$value)

  $tmp[$key] = &$mergeparam[$key]; 
 

  call_user_func_array(array($stmt, 'bind_param'),$tmp );  

 }
	

$stmt->execute();
$stmt->bind_result($userid,$planid,$plandesc,$added);
$stmt->store_result();
$numrows = $stmt->num_rows();
$noofplansonhome = $numrows;
for($i=0;$i<$numrows;$i++)
{
$stmt->fetch();
if($userid == $_SESSION['myusrid'])
{
$name = '<a>'.$this->getUserFullName($userid).' '.$this->getUserStarIcon($userid).'</a>';
}
else
{
 $name = '<a href="../publicprofile/?'.$this->getProfileURL($_SESSION['myusrid']).'='.$userid.'">'.$this->getUserFullName($userid).'  '.$this->getUserStarIcon($userid).'</a>';   
}
// if(time() - strtotime($added) < 0)
// {
// $realtime = 1;
// }
$allhomeplans .= '<div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img src="'.$this->getUserImageThumb($userid).'" class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                    '.$name.'
                                    <span>'.$this->time_since(time() - strtotime($added)).' ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p>'.preg_replace('/#(\w+)/', ' <a href="../hashtags?tag=%23$1">#$1</a>', $plandesc).'</p>
                           <div class="timeline-added-images"> <!--
                                '.$this->getPlanImages($planid).'-->
								<!--<img src="../images/social/100/1.jpg" width="80">
                                <img src="../images/social/100/2.jpg" width="80">
                                <img src="../images/social/100/3.jpg" width="80"> -->
                            </div> 
                        </div>
                        <div class="view-all-comments">'.$this->generateCraveButton($userid,$planid).'<!--<i class="countcravers"> '.$this->countCravers($planid).' Cravers</i>--></div>
                        <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o viewallcomments"></i> View all</a> <i class="countcomments"> '.$this->CountComments($planid).' </i> suggestions
                           <input type="hidden" class="planids" value="'.$planid.'" /> 
                        </div>
                        <ul class="comments">
						<div class="userscroll " style="max-height:200px; scroll-y:inherit; overflow:scroll; overflow-x: hidden;">'.$this->getPlanComments($planid).'</div>
                       
                            <li class="comment-form">
                                <div class="input-group">
                                    <input type="text" class="form-control plancomment" />
                                    <span class="input-group-addon">
                   <a href="#"><i class="fa fa-comment addcomment"></i></a>
                </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>';	
}
return $allhomeplans;
}


private function getLastHomePlans()
{
global $allhomeplans;	
$mineid = $_SESSION['myusrid'];	
$stmt = $this->__contruct()->prepare('select user_id,plan_id,plan_desc,added_date from plan_tbl where user_id=? ORDER BY plan_id desc LIMIT 1');
$stmt->bind_param('d',$mineid);	
$stmt->execute();
$stmt->bind_result($userid,$planid,$plandesc,$added);
$stmt->store_result();
$numrows = $stmt->num_rows();
for($i=0;$i<$numrows;$i++)
{
$stmt->fetch();
$allhomeplans .= '<div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img src="'.$this->getUserImageThumb($userid).'" class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                    <a href="">'.$this->getUserFullName($userid).'</a>
                                    <span> '.$this->time_since(time() - strtotime($added)).' ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p>'.preg_replace('/#(\w+)/', ' <a href="../hashtags?tag=%23$1">#$1</a>', $plandesc).'</p>
                           <div class="timeline-added-images"><!-- 
                                '.$this->getPlanImages($planid).'-->
								<!--<img src="../images/social/100/1.jpg" width="80">
                                <img src="../images/social/100/2.jpg" width="80">
                                <img src="../images/social/100/3.jpg" width="80"> -->
                            </div> 
                        </div>
                        <div class="view-all-comments">'.$this->generateCraveButton($userid,$planid).'<i class="countcravers"> '.$this->countCravers($planid).' Cravers</i></div>
                        <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o"></i> View all</a> <i class="countcomments"> '.$this->CountComments($planid).' </i> request & comments
                            
                        </div>
                        <ul class="comments">
						'.$this->getPlanComments($planid).'<input type="hidden" class="planids" value="'.$planid.'" />
                        
                            <li class="comment-form">
                                <div class="input-group">
                                    <input type="text" class="form-control plancomment" />
                                    <span class="input-group-addon">
                   <a href="#"><i class="fa fa-comment addcomment"></i></a>
                </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>';	
}
return $allhomeplans;
}

private function checkuser($username,$password)
{
global $msg;
$password = hash('sha512',$password);	
$stmt = $this->__contruct()->prepare('select user_id,firstname,lastname,username,email,type,notfirstlogin,celeb from user_tbl where username=? and password=? LIMIT 1');
$stmt->bind_param('ss',$username,$password);	
$stmt->execute();
$stmt->bind_result($userid,$firstname,$lastname,$username,$email,$type,$notfirstlogin,$celeb);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
$_SESSION['myusrid'] = $userid;
$_SESSION['fullname'] = $firstname.' '.$lastname;
$_SESSION['myusrname'] = $username;
$_SESSION['myemail'] = $email;
$_SESSION['mytype'] = $type;
$_SESSION['notfirstlogin'] = $notfirstlogin;
$_SESSION['celeb'] = $celeb;

$profileurl = $this->generateProfileURL();
$this->updateProfileURL($_SESSION['myusrid'],$profileurl);

if($notfirstlogin == "0")
{
$this->checkifuserdeyforfollowtable($userid);
}
$msg='found';
}
else if($numrows == 0)
{
$msg = 'notfound';	
}
}


private function checkifuserdeyforfollowtable($userid)
{
global $exist;
$stmt = $this->__contruct()->prepare('select follow_id from follow_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($followid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
// nothing ;	
}
else if($numrows == 0)
{
$this->insertNewFollowRecord($userid);	
$this->updateIfFirstLogin($userid);
}
}
private function updateIfFirstLogin($userid)
{
$not = 1;	
$stmt = $this->__contruct()->prepare('update user_tbl set notfirstlogin=? where user_id=?');
$stmt->bind_param('ss',$not,$userid);	
$stmt->execute();
}
private function insertNewFollowRecord($userid)
{
$stmt = $this->__contruct()->prepare('insert into follow_tbl (user_id) values (?)');
$stmt->bind_param('d',$userid);
$stmt->execute();	
}

public function registeruser($firstname,$lastname,$email,$username,$password)
{
global $msg;	
$this->addnewuser($firstname,$lastname,$email,$username,$password);
$msg = $msg;	
}

private function addnewuser($firstname,$lastname,$email,$username,$password)
{
global $msg;
$password = hash('sha512',$password);
$not = 0;
$stmt = $this->__contruct()->prepare('insert into user_tbl (firstname,lastname,email,username,password,notfirstlogin) values (?,?,?,?,?,?)');
$stmt->bind_param('ssssss',$firstname,$lastname,$email,$username,$password,$not);
$stmt->execute();
$affectedrow = $stmt->affected_rows;	
if($affectedrow == 1)
{
$msg = 'Registration Successful';
$lastid = $stmt->insert_id;
$this->checkifuserdeyforfollowtable($lastid);
// send registration mail
$theheader = 'From: Welcome to OHCrave <info@ohcrave.com>';
$messagebody = 'Dear '.$firstname.' '.$lastname.',<br/><br/> Welcome to OHCrave a platform that makes your friend participate in your activities. OHCrave provide with lots of features which allows you to send photos updates to friends making every activity an interesting one with friends. Your friends express their views on your photos updates. They can also make a suggestion about your activity.';
 $this->sendEmailViaBlueHost($email,'Welcome to OHCrave',$this->EmailTemplates($messagebody),$theheader);
}
}


public function checkemail($email,$tablename)
{
global $msg;	
if($this->checkIFExistEmail($email,$tablename))
{
$msg = "emailfound";
}
}


public function checkemail2($email,$tablename,$field,$id)
{
global $msg;	
if($this->checkIFExistEmail2($email,$tablename,$field,$id))
{
$msg = "emailfound";
}
}

public function checkmobile($phoneno,$tablename)
{
global $msg;	
if($this->checkIFExistMobile($phoneno, $tablename))
{
$msg = "mobilefound";
}
}


public function checkmobile2($phoneno,$tablename,$field,$id)
{
global $msg;	
if($this->checkIFExistMobile2($phoneno, $tablename, $field, $id))
{
$msg = "mobilefound";
}
}


private function checkIFExistEmail($email,$tablename)
{	
$found = FALSE;
$stmt = $this->__contruct()->prepare('select email from '.$tablename.' where email=? LIMIT 1');	
$stmt->bind_param('s',$email);
$stmt->execute();
$stmt->bind_result($me);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$found = TRUE;	
}
return $found;
}

private function checkIFExistEmail2($email,$tablename,$field,$id)
{
global $found;	
$found = FALSE;
$stmt = $this->__contruct()->prepare('select email from '.$tablename.' where email=? and '.$field.' !=? LIMIT 1');	
$stmt->bind_param('sd',$email,$id);
$stmt->execute();
$stmt->bind_result($me);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$found = TRUE;	
}
return $found;
}


private function checkIFExistMobile($phoneno,$tablename)
{
$found = FALSE;
$stmt = $this->__contruct()->prepare('select phone from '.$tablename.' where phone=? LIMIT 1');	
$stmt->bind_param('s',$phoneno);
$stmt->execute();
$stmt->bind_result($me);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$found = TRUE;	
}
return $found;
}

private function checkIFExistMobile2($phoneno,$tablename,$field,$id)
{
$found = FALSE;
$stmt = $this->__contruct()->prepare('select phone from '.$tablename.' where phone=? and '.$field.'!=? LIMIT 1');	
$stmt->bind_param('sd',$phoneno,$id);
$stmt->execute();
$stmt->bind_result($me);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$found = TRUE;	
}
return $found;
}

public function checkusername($username,$tablename)
{
global $msg;	
if($this->checkIFExistUsername($username,$tablename))
{
$msg = "usernamefound";
}
}

public function checkusername2($username,$tablename,$field,$id)
{
global $msg;	
if($this->checkIFExistUsername2($username,$tablename,$field,$id))
{
$msg = "usernamefound";
}
}

private function checkIFExistUsername2($username,$tablename,$field,$id)
{
$found = FALSE;
$stmt = $this->__contruct()->prepare('select username from '.$tablename.' where username=? and '.$field.'!=? LIMIT 1');	
$stmt->bind_param('sd',$username,$id);
$stmt->execute();
$stmt->bind_result($me);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$found = TRUE;	
}
return $found;
}


private function checkIFExistUsername($username,$tablename)
{
$found = FALSE;
$stmt = $this->__contruct()->prepare('select username from '.$tablename.' where username=? LIMIT 1');	
$stmt->bind_param('s',$username);
$stmt->execute();
$stmt->bind_result($me);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$found = TRUE;	
}
return $found;
}

//// get the profile details of a customer

public function getSingleCustomerDetails($id)
{
 global $firstname,$lastname,$sex,$phoneno,$email,$username,$address,$state,$country,$zipcode,$bio;
 $this->getCustomerDetails($id);
$firstname = $firstname;
$lastname = $lastname;
$sex = $sex;
$email = $email;
$phoneno = $phoneno;
$address = $address;
$state = $state;
$country = $country;
$zipcode = $zipcode;
$username = $username;
$bio = $bio;
}

private function getCustomerDetails($id)
{
global $firstname,$lastname,$sex,$phoneno,$email,$username,$address,$state,$country,$zipcode,$bio;
$stmt = $this->__contruct()->prepare('select firstname,lastname,sex,email,phone,address,state
    ,country,zipcode,username,about from user_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$id);
$stmt->execute();
$stmt->bind_result($firstname,$lastname,$sex,$email,$phoneno,$address,$state,$country,$zipcode,$username,$bio);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
$firstname = $firstname;
$lastname = $lastname;
$sex = $sex;
$email = $email;
$phoneno = $phoneno;
$address = $address;
$state = $state;
$country = $country;
$zipcode = $zipcode;
$username = $username;
$bio = $bio;
}
}


public function updateMyProfile($firstname,$lastname,$email,$username,
        $gender,$phoneno,$state,$country,$zipcode,$address,$userid,$bio)
{
global $msg;
$this->updateprofile($firstname, $lastname, 
        $email, $username, $gender, $phoneno, $state, $country, $zipcode, $address,$userid,$bio);
$msg = $msg;
    
}

private function updateprofile($firstname,$lastname,$email,$username,
        $gender,$phoneno,$state,$country,$zipcode,$address,$userid,$bio)
{
global $msg;    
$stmt = $this->__contruct()->prepare('update user_tbl set firstname=?,lastname=?,email=?,username=?,
    sex=?,phone=?,state=?,country=?,zipcode=?,address=?,about=? where user_id=?');
$stmt->bind_param('sssssssssssd',$firstname,$lastname,$email,$username,
        $gender,$phoneno,$state,$country,$zipcode,$address,$bio,$userid);
$stmt->execute();
$affectedrows = $stmt->affected_rows;
if($affectedrows == 1)
{
$msg = "Profile Updated";
$_SESSION['fullname'] = $firstname.' '.$lastname;
$_SESSION['email'] = $email;
$_SESSION['sex'] = $gender;
$_SESSION['phone'] = $phoneno;
$_SESSION['state'] = $state;
$_SESSION['country'] = $country;
$_SESSION['zipcode'] = $zipcode;
$_SESSION['address'] = $address; 
$_SESSION['bio'] = $bio;
}
else
{
$msg = "No changes was made"; 
$_SESSION['fullname'] = $firstname.' '.$lastname;
$_SESSION['email'] = $email;
$_SESSION['sex'] = $gender;
$_SESSION['phone'] = $phoneno;
$_SESSION['state'] = $state;
$_SESSION['country'] = $country;
$_SESSION['zipcode'] = $zipcode;
$_SESSION['address'] = $address;
$_SESSION['bio'] = $bio;
}
}

public function checkOldPassMatch($oldpassword,$userid)
{
global $msg;
$this->checkOldPasswordMatch($oldpassword,$userid);
$msg = $msg;	
}

private function checkOldPasswordMatch($oldpassword,$userid)
{
global $msg;
$oldpassword = hash('sha512',$oldpassword);
$stmt = $this->__contruct()->prepare('select user_id from user_tbl where password=? and user_id=? LIMIT 1');	
$stmt->bind_param('sd',$oldpassword,$userid);
$stmt->execute();
$stmt->bind_result($myid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
	
}
else if ($numrows == 0)
{
$msg = 'invalid';	
}

}

public function updatePassword($password,$userid)
{
global $msg;
$this->updateUserPassword($password,$userid);
$msg = $msg;	
}

private function updateUserPassword($password,$userid)
{
global $msg;
$password = hash('sha512',$password);
$stmt = $this->__contruct()->prepare('update user_tbl set password=? where user_id=?');	
$stmt->bind_param('sd',$password,$userid);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
$msg = "Password Changed Successfully";	
}
else if($affected == 0)
{
$msg = "samepass";	
}
}

public function NoOfActivePlans($myuserid)
{
$noofactiveplans = $this->countActivePlans($myuserid);
return $noofactiveplans;	
}
private function countActivePlans($myuserid)
{
global $noofactiveplans;
$stmt = $this->__contruct()->prepare('select plan_id from plan_tbl where user_id=?');	
$stmt->bind_param('d',$myuserid);
$stmt->execute();
$stmt->bind_result($myid);
$stmt->store_result();
$noofactiveplans = $stmt->num_rows();
return $noofactiveplans;	
}

public function CountNotifications($myuserid)
{
 $noofactivenotifications = $this->NoOfNotification($myuserid);
return $noofactivenotifications;	
}

private function NoOfNotification($myuserid)
{
global $noofactivenotifications;
$read = 0;
$stmt = $this->__contruct()->prepare('select notification_id from notification_tbl where owner_id=? and read_status=?');	
$stmt->bind_param('dd',$myuserid,$read);
$stmt->execute();
$stmt->bind_result($myid);
$stmt->store_result();
$noofactivenotifications = $stmt->num_rows();
return $noofactivenotifications;	
}


public function CountActiveBox($myuserid)
{
$noofactivebox = $this->NoOfBoxNotification($myuserid);
return $noofactivebox;	
}

private function NoOfBoxNotification($myuserid)
{
global $noofactivebox;
$read = 0;
$stmt = $this->__contruct()->prepare('select box_id from box_tbl where owner_id=? and read_status=?');	
$stmt->bind_param('dd',$myuserid,$read);
$stmt->execute();
$stmt->bind_result($myid);
$stmt->store_result();
$noofactivebox = $stmt->num_rows();
return $noofactivebox;	
}

public function ProfilePix($myuserid)
{
$myprofilepix = $this->selectProfilePix($myuserid);	
return $myprofilepix;
}
private function selectProfilePix($myuserid)
{
global $realprofilepix;	
$stmt = $this->__contruct()->prepare('select profile_pix from user_tbl where user_id=? LIMIT 1');	
$stmt->bind_param('d',$myuserid);
$stmt->execute();
$stmt->bind_result($profilepix);
$stmt->store_result();	
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
if($profilepix == "")
{
$realprofilepix = '<img class="lazyload img-circle" src="../images/profilepix/noprofile.jpg" alt="Profile Pix"  />';	
}
else if($profilepix != "")
{
$realprofilepix = '<img class="lazyload img-circle"  src="../images/profilepix/allprofile/'.$profilepix.'" alt="Profile Pix"  />';	
}
}
return $realprofilepix;
}


public function ProfilePixThumb($myuserid)
{
$myprofilepixthumb = $this->selectProfilePixthumb($myuserid);	
return $myprofilepixthumb;
}
private function selectProfilePixthumb($myuserid)
{
global $realprofilepixthumb;	
$stmt = $this->__contruct()->prepare('select profile_pix from user_tbl where user_id=? LIMIT 1');	
$stmt->bind_param('d',$myuserid);
$stmt->execute();
$stmt->bind_result($profilepixthumb);
$stmt->store_result();	
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
if($profilepixthumb == "")
{
$realprofilepixthumb = '<img class="lazyload img-circle"  src="../images/thumbsprofilepix/noprofilethumb.jpg" alt="Profile Pix" width="40" />';	
}
else if($profilepixthumb != "")
{
$realprofilepixthumb = '<img  class="lazyload img-circle"  src="../images/thumbsprofilepix/allprofilethumb/'.$profilepixthumb.'" alt="Profile Pix" width="40"  />';	
}
}
return $realprofilepixthumb;
}

public function  changeprofilepix($usersessionid,$imgname,$originalfile)
{
$this-> updateprofilepix($usersessionid,$imgname,$originalfile);	
}
private function updateprofilepix($usersessionid,$imgname,$originalfile)
{
$this->selectOldProfilePixandDelete($usersessionid);	
$stmt = $this->__contruct()->prepare('update user_tbl set profile_pix = ?,profile_pix_original=? where user_id=?');	
$stmt->bind_param('ssd',$imgname,$originalfile,$usersessionid);
$stmt->execute();	
$affected = $stmt->affected_rows;	
}


private function selectOldProfilePixandDelete($userid)
{
$stmt = $this->__contruct()->prepare('select profile_pix,profile_pix_original from user_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$userid);
$stmt->execute();	
$stmt->bind_result($formalpix,$formalpixoriginal);
$stmt->store_result();
$numrows = $stmt->num_rows();	
if($numrows == 1)
{
$stmt->fetch();
if($formalpix != "")
{
$fileone = '../images/profilepix/allprofile/'.$formalpix;
$filetwo = "../images/profilepix/allprofile/".$formalpixoriginal;
$filethree	= "../images/thumbsprofilepix/allprofilethumb/".$formalpix;
unlink($fileone);
unlink($filetwo);
unlink($filethree);	
}
}
}


public function MyTenLatesFollowers($userid)
{
$lastestfollowers = $this->MyLatestFollowers($userid);	
return $lastestfollowers;
}

private function MyLatestFollowers($userid)
{
global $latestfollowers;	
$stmt = $this->__contruct()->prepare('select follow_id,followers from follow_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($followid,$followers);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 0)
{
$stmt->fetch();	
$latestfollowers = '<div style="padding:
10px;">No Followers</div>';	
}
else if($numrows == 1)
{
$stmt->fetch();	
if($followers == "")
{
$latestfollowers = '<div style="padding:
10px;">No Followers</div>';	
}
else
{
$followerarray = explode(',',$followers);
$nooffollowers = count($followerarray);
$limit = $nooffollowers - 10;
if($nooffollowers > 0)
{
$latestfollowers = ' <ul class="list-unstyled friends-list">';  	
}
global $count,$filledyes;
$count = 0;
for($i=$nooffollowers-1;$i>=0;$i--)
{
if($count == 10)	
{
break;
}
else
{
$theid = $followerarray[$i];	
$latestfollowers .= '<li>'.$this->getSingleFollowerImageAndUrl($theid).'                  
           </li>';		
}
$count++;
}
if($nooffollowers > 0)
{
$latestfollowers .= '</ul>';	
}
}

}

return $latestfollowers;
}


private function getSingleFollowerImageAndUrl($userid)
{
global $singlefollowerdetails;	
$stmt  = $this->__contruct()->prepare('select profile_pix,user_id,firstname,lastname,username from user_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($profilepix,$myuserid,$firstname,$lastname,$username);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();	
if($profilepix == "")
{
$profilepix = "noprofile.jpg";	
}
$imgsrc = "../images/profilepix/allprofile/";
$singlefollowerdetails = '<a title="'.$firstname.' '.$lastname.' @'.$username.'" href="../publicprofile/?'.$this->getProfileURL($_SESSION['myusrid']).'='.$myuserid.'">
                                    <img src="'.$imgsrc.$profilepix.'" alt="image" class="img-responsive" />
                                </a>';
}
return $singlefollowerdetails;
}



public function MyPublicProfileDetails($userid)
{
global $firstname,$lastname,$email,$username,$bio,$sex,$fullimage,$ffbuttons,$ffno;	
$this->getPublicprofileDetails($userid);
$firstname = $firstname;
$lastname = $lastname;
$email = $email;
$username = $username;
$sex = $sex;	
$fullimage = $fullimage;
$ffbuttons = $ffbuttons;
$ffno =$ffno;
}


private function getPublicprofileDetails($userid)
{
$userid; //= $this->simple_decrypt($userid,"");	
global $firstname,$lastname,$email,$username,$bio,$sex,$fullimage,$ffbuttons,$ffno,$celebstatus;	
$stmt = $this->__contruct()->prepare('select firstname,lastname,email,username,about,sex,profile_pix,celeb from user_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($firstname,$lastname,$email,$username,$bio,$sex,$profilepix,$celebstatus);
$stmt->store_result();	
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
$imgsrc = "../images/profilepix/allprofile/";
if($profilepix == "")
{
$profilepix = "noprofile.jpg";	
$fullimage = '<img src="'.$imgsrc.$profilepix.'" alt="" class="img-circle" />';
}
else
{
$fullimage = '<img src="'.$imgsrc.$profilepix.'" alt="" class="img-circle" />';	
}
$firstname = $firstname;
$lastname = $lastname;
$email = $email;
$username = $username;
$sex = $sex;	
$bio = $bio;
$celebstatus = $celebstatus;
$fullimage = $fullimage;
$ffbuttons = $this->generateFollowButton($userid);
$ffno = $this->nooffollowers($userid);
}
}

public function thenooffollowers($userid)
{
global $fffno;
$fffno = $this->nooffollowers($userid);
return $fffno;
}

private function nooffollowers($userid)
{
global $nooffollowers;
$stmt = $this->__contruct()->prepare('select followers from follow_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($followers);
$stmt->store_result();
$numrows = 	$stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();	
if($followers == "")
{
$nooffollowers = "0 follower";	
}
else if($followers != "")
{
$followersplit = explode(',',$followers);
$arraycount = count($followersplit);
if($arraycount == 1)
{
$nooffollowers = $arraycount.' follower';	
}
else
{
$nooffollowers = $arraycount.' followers';	
}
}
}
return $nooffollowers;
}



// start of follow function 

public function followSingleUser($tofollow,$userid)
{
global $msg;
$this->FollowAUser($tofollow,$userid);	
$msg = $msg;
}





private function FollowAUser($tofollow,$userid)
{
global $msg,$followed;	
$stmt = $this->__contruct()->prepare('select following from follow_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($following);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
if($following == "")
{
$newfollowing = $tofollow;
$followed = $this->updateFollower($userid,$newfollowing,$tofollow);
if($followed)
{
$msg = "followed";	
}	
}
else if($following != "")
{
$followingsplit  = explode(',',$following);
if(in_array($tofollow,$followingsplit))
{
$newfollowing = $following;	
}
else
{
$newfollowing = $following.','.$tofollow;	
}	
$followed = $this->updateFollower($userid,$newfollowing,$tofollow);
if($followed)
{
$msg = "followed";	
}
}
}
return $msg;
}




private function updateFollower($userid,$newfollowing,$tofollow)
{
global $added;
$added = FALSE;
$stmt = $this->__contruct()->prepare('update follow_tbl set following=? where user_id=?');
$stmt->bind_param('sd',$newfollowing,$userid);
$stmt->execute();
$affected = $stmt->affected_rows;	
if($affected == 1)
{
$this->InsertNewNotification($userid, $tofollow,0,0,1);  
$stmt = $this->updateFollowerForsecond($userid,$tofollow);	
$added = TRUE;	
}
return $added;
}






private function updateFollowerForsecond($userid,$tofollow)
{
$stmt = $this->__contruct()->prepare('select followers from follow_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$tofollow);
$stmt->execute();	
$stmt->bind_result($follower);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
if($follower == "")
{
$newfollower = $userid;
$this->updateFollower2($userid,$newfollower,$tofollow);
}
else if($follower != "") 
{
$followersplit = explode(',',$follower);
if(in_array($userid,$followersplit))
{
$newfollower = $follower;	
}
else
{
$newfollower = $follower.','.$userid;	
}
$this->updateFollower2($userid,$newfollower,$tofollow);
}
}

}

private function updateFollower2($userid,$newfollower,$tofollow)
{
//global $added;
//$added = FALSE;
$stmt = $this->__contruct()->prepare('update follow_tbl set followers=? where user_id=?');
$stmt->bind_param('sd',$newfollower,$tofollow);
$stmt->execute();
$affected = $stmt->affected_rows;	
}


private function updateFollower4($userid,$newfollower,$tounfollow)
{
//global $added;
//$added = FALSE;
$stmt = $this->__contruct()->prepare('update follow_tbl set followers=? where user_id=?');
$stmt->bind_param('sd',$newfollower,$tounfollow);
$stmt->execute();
$affected = $stmt->affected_rows;	
}



// start of unfollow function
// unfollow method
public function unfollowSingleUser($tounfollow,$userid)
{
global $msg;
$this->UnFollowAUser($tounfollow,$userid);	
$msg = $msg;
}


private function UnFollowAUser($tounfollow,$userid)
{
global $msg,$followed;	
$stmt = $this->__contruct()->prepare('select following from follow_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($following);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
if($following == "")
{
//$newfollowing = $tounfollow;
//$followed = $this->updateFollower($userid,$newfollowing,$tounfollow);
/*if($followed)
{*/
$msg = "unfollowed";	
//}	
}
else if($following != "")
{

$followingsplit = explode(',',$following);	
/*if(in_array($tounfollow,$followingsplit))
{*/
$newfollowingsplit = $this->array_delete($followingsplit,array($tounfollow));
$newfollowing = implode(',',$newfollowingsplit);
//$newfollowing = $following.','.$tofollow;	
$followed = $this->updateFollower3($userid,$newfollowing,$tounfollow);
if($followed)
{
$msg = "unfollowed";	
}
//}
}
}
return $msg;
}

private function array_delete($array, $element) {
    return array_diff($array, $element);
}

private function updateFollower3($userid,$newfollowing,$tounfollow)
{
global $added;
$added = FALSE;
$stmt = $this->__contruct()->prepare('update follow_tbl set following=? where user_id=?');
$stmt->bind_param('sd',$newfollowing,$userid);
$stmt->execute();
$affected = $stmt->affected_rows;	
if($affected == 1)
{	
$stmt = $this->updateFollowerForsecond2($userid,$tounfollow);
$this->InsertNewNotification($userid,$tounfollow,0,0,2);
$added = TRUE;	
}
return $added;
}

private function updateFollowerForsecond2($userid,$tounfollow)
{
$stmt = $this->__contruct()->prepare('select followers from follow_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$tounfollow);
$stmt->execute();	
$stmt->bind_result($follower);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
if($follower == "")
{
//$newfollower = $userid;
//$this->updateFollower2($userid,$newfollower,$tounfollow);
}
else if($follower != "") 
{
$followersplit = explode(',',$follower);
if(in_array($userid,$followersplit))
{
$newfollowersplit = $this->array_delete($followersplit,array($userid));
$newfollower = implode(',',$newfollowersplit);
//$newfollower = $follower.','.$userid;	
}
$this->updateFollower4($userid,$newfollower,$tounfollow);
}
}

}

private function generateFollowButton($userid)
{
global $followbutton;	
$session = $_SESSION['myusrid'];
$stmt = $this->__contruct()->prepare('select following from follow_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$session);
$stmt->execute();
$stmt->bind_result($following);
$stmt->store_result();
$numrows = $stmt->num_rows();	
if($numrows == 1)
{
$stmt->fetch();
if($following == "")
{
$followbutton = '<a href="#" class="btn btn-default follow">Follow <i class="fa fa-share"></i></a><a style="display:none;" href="#" class="btn btn-success">Following <i class="fa fa-check-circle fa-fw"></i></a>
<a style="display:none;" href="#" class="btn btn-danger unfollow">Unfollow <i class="fa fa-close"></i></a>';	
}
else
{
$followingsplit = explode(',',$following);
if(in_array($userid,$followingsplit))
{
$followbutton = '<a href="#" style="display:none;" class="btn btn-default follow">Follow <i class="fa fa-share"></i></a><a href="#" class="btn btn-success">Following <i class="fa fa-check-circle fa-fw"></i></a>
<a href="#" class="btn btn-danger unfollow">Unfollow <i class="fa fa-close"></i></a>';	
}
else if(!in_array($userid,$followingsplit))
{
$followbutton = '<a href="#" class="btn btn-default follow">Follow <i class="fa fa-share"></i></a><a style="display:none;" href="#" class="btn btn-success">Following <i class="fa fa-check-circle fa-fw"></i></a>
<a style="display:none;" href="#" class="btn btn-danger unfollow">Unfollow <i class="fa fa-close"></i></a>';		
}
}
}
return $followbutton;
}
private function simple_encrypt($text, $salt="ose")
 {
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}
// This function will be used to decrypt data.
public function simple_decrypt($text, $salt="ose")
 {
    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}

public function confirmCheckIfNotExist($userid)
{
global $notfound;	
$notfound = $this->checkIfNotExistUser($userid);
return $notfound;	
}

private function checkIfNotExistUser($userid)
{
global $notfound;		
$stmt = $this->__contruct()->prepare('select user_id from user_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($myuserid);
$stmt->store_result();
$numrows = $stmt->num_rows();	
if($numrows == 1)
{
$stmt->fetch();
$notfound = false;	
}
else if($numrows == 0)
{
$notfound = true;		
}
return $notfound;
}

public function confirmCheckIfNotExist2($profileurl)
{
global $notfound;   
$notfound = $this->checkIfNotExistUser2($profileurl);
return $notfound;   
}

private function checkIfNotExistUser2($profileurl)
{
global $notfound;       
$stmt = $this->__contruct()->prepare('select profile_url from user_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($myuserid);
$stmt->store_result();
$numrows = $stmt->num_rows();   
if($numrows == 1)
{
$stmt->fetch();
$notfound = false;  
}
else if($numrows == 0)
{
$notfound = true;       
}
return $notfound;
}

public function getAllMyFollowers($userid)
{
global $myallfollowers;
$myallfollowers = $this->getMyFollowers($userid);	
}
private function getMyFollowers($userid)
{
global $allfollower;	
$stmt = $this->__contruct()->prepare('select followers from follow_tbl where user_id=? LIMIT 1');
$stmt->bind_param('d',$userid);	
$stmt->execute();
$stmt->bind_result($followers);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
if($followers == "")
{
$allfollower = "<div>No Followers</div>";	
}
else if($followers != "")
{
$followersplit = explode(',',$followers);
$countarray = count($followersplit);
// iterate over follow of a user
for($i=0;$i<$countarray;$i++)
{
$followerid = $followersplit[$i];
$allfollower .= $this->getIndividualFollowerDetails($followerid,$userid);	
}
// ednd of for state ment 
}
// end 
}
return $allfollower;
}

private function getIndividualFollowerDetails($followerid,$userid)
{
global $realfollowerdetails,$staricon;
$stmt = $this->__contruct()->prepare('select user_id,username,firstname,lastname,profile_pix,celeb from user_tbl where user_id=?');
$stmt->bind_param('d',$followerid);
$stmt->execute();
$stmt->bind_result($myuserid,$username,$firstname,$lastname,$profilepix,$celeb);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
if($celeb == 1)
{
                

$staricon ='<i  class="celeb2 fa fa-check-circle"></i>';
                
}
else
{
 $staricon = '';   
}
$realfollowerdetails = '<div class="timeline-block">
                    <div class="panel panel-default user-box">
                        <div class="panel-body">
                            <div class="media">';
if($profilepix == "")
{
$realimageurl = "../images/thumbsprofilepix/noprofilethumb.jpg";	
}
else if($profilepix != "")
{
$realimageurl = "../images/thumbsprofilepix/allprofilethumb/".$profilepix;	
}
$realfollowerdetails  .= '<a href="../publicprofile/?'.$this->getProfileURL($_SESSION['myusrid']).'='.$myuserid.'"><img src="'.$realimageurl.'" alt="'.$firstname.' '.$lastname.'" title="'.$firstname.' '.$lastname.'" class="media-object img-circle pull-left" /></a>
                                <div class="media-body">
								<input type="hidden" class="tofollow" value="'.$myuserid.'" />
								<input type="hidden" class="tounfollow" value="'.$myuserid.'" />
                                    <a href="../publicprofile/?'.$this->getProfileURL($_SESSION['myusrid']).'='.$myuserid.'" class="username">'.$firstname.' '.$lastname.' @'.$username.'  '.$staricon.'</a>

                                    <div class="profile-icons">
                                        <span class="followerno"><i class="fa fa-users"></i> '.$this->nooffollowers($followerid).'</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer followerdiv">
                           '.$this->generateFollowButton($followerid).'
                        </div>';
			$realfollowerdetails .= '</div>
                </div>';			
 
}
return $realfollowerdetails;
}



private function InsertNewNotification($userid,$ownerid,$planimageid,$planid,$notificationtype)
{    
$stmt = $this->__contruct()->prepare('insert into notification_tbl (user_id,owner_id,plan_image_id,plan_id,notification_type) values (?,?,?,?,?)');
$stmt->bind_param('ddddd',$userid,$ownerid,$planimageid,$planid,$notificationtype);
$stmt->execute();

}


//private function InsertNewNotification($craverid,$userid,$ownerid,$likeid,
//        $planimagecommmentid,$plancommentid,$planid,$notificationtype)
//{    
//$stmt = $this->__contruct()->prepare('insert into notification_tbl (craver_id,user_id,owner_id,like_id,
//plan_image_comment_id,plan_comment_id,plan_id,notification_type) values (?,?,?,?,?,?,?,?)');
//$stmt->bind_param('dddddddd',$craverid,$userid,$ownerid,$likeid,$planimagecommmentid,$plancommentid,
//$planid,$notificationtype);
//$stmt->execute();
//
//}





 public function notification($userid)
 {
return $this->NotificationTranslator($userid) ;    
 }


public function getThePlanName($planid)
{
return $this->getPlanName($planid);
}

 private function getPlanName($planid)
 {
 global $theplaname;    
 $stmt = $this->__contruct()->prepare('select plan_name from plan_tbl where plan_id=?');
 $stmt->bind_param('d',$planid);
 $stmt->execute();
 $stmt->bind_result($planname);
 $stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
 $stmt->fetch();
 $theplaname = $planname;
}
return $theplaname;
 }


 private function getUserIDByPlanID($planid)
 {
 global $theplaname;    
 $stmt = $this->__contruct()->prepare('select user_id from plan_tbl where plan_id=?');
 $stmt->bind_param('d',$planid);
 $stmt->execute();
 $stmt->bind_result($planname);
 $stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
 $stmt->fetch();
 $theplaname = $planname;
}
return $theplaname;
 }

 public function getlatestnotification($userid)
 {
return $this->NotificationTranslator($userid) ;    
 }

 private function LatestNotification($userid)
{
global $constructnotification;    
$stmt = $this->__contruct()->prepare('select user_id,owner_id,plan_image_id,plan_id,notification_type,added_date from notification_tbl where owner_id=? order by notification_id desc limit 20');
$stmt->bind_param('d',$userid); 
$stmt->execute(); 
$stmt->bind_result($theuserid,$ownerid,$planimageid,$planid,$notificationtype,$addeddate);
$stmt->store_result();
$numrows = $stmt->num_rows();

if($numrows > 0)
{
  $constructnotification = '<div class="panel panel-default"> ';  
}
for($i=0;$i<$numrows;$i++)
{
$stmt->fetch();
if($theuserid == $_SESSION['myusrid'])
{
$name = 'You';    
}
else
{
$name = '<a href="../publicprofile/?'.$this->getProfileURL($_SESSION['myusrid']).'='.$theuserid.'">'.$this->getUserFullName($theuserid).'</a>';
}
switch($notificationtype)
{
case 1:

 $message = '<div class="notificationmessagebox">'.$name.' followed you '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';
 break;
case 2:
   $message = '<div class="notificationmessagebox">'.$name.' unfollowed you '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';
  break;
case 3:
    $message = '<div class="notificationmessagebox">'.$name.' craved your plan ('.$this->getPlanName($planid).') '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';
    break;
case 4:
    $message = '<div class="notificationmessagebox">'.$name.' uncraved your plan ('.$this->getPlanName($planid).') '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';
    break;
case 5:
    $message = '<div class="notificationmessagebox">'.$name.' comment your plan ('.$this->getPlanName($planid).') '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
    break;
  case 6:
  $message = '<div class="notificationmessagebox">'.$name.' comment your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 7:
  $message = '<div class="notificationmessagebox">'.$name.' liked your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 8:
  $message = '<div class="notificationmessagebox">'.$name.' unliked your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 9:
  $message = '<div class="notificationmessagebox">'.$name.' loved your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 10:
  $message = '<div class="notificationmessagebox">'.$name.' unlove your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 11:
  $message = '<div class="notificationmessagebox">'.$name.' craved your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 12:
  $message = '<div class="notificationmessagebox">'.$name.' uncraved your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 13:
  $message = '<div class="notificationmessagebox">'.$name.' sent photos '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  default:
    $message = '';
    break;
}
$constructnotification .= $message;
}

if($numrows > 0)
{
  $constructnotification .= '</div> ';  
}
if($numrows == 0)
{
 $constructnotification = '<div class="timeline-block">
                    <div class="panel panel-default share">
                        <div class="panel-heading panel-heading-gray title">
                         You have no notification
                        </div>
                        
                       
                    </div>
                </div>' ;  
}

return $constructnotification;
}
 
private function NotificationTranslator($userid)
{
global $constructnotification;    
$stmt = $this->__contruct()->prepare('select user_id,owner_id,plan_image_id,plan_id,notification_type,added_date from notification_tbl where owner_id=? order by notification_id desc limit 30');
$stmt->bind_param('d',$userid); 
$stmt->execute(); 
$stmt->bind_result($theuserid,$ownerid,$planimageid,$planid,$notificationtype,$addeddate);
$stmt->store_result();
$numrows = $stmt->num_rows();

if($numrows > 0)
{
  $constructnotification = '<div class="panel panel-default"> ';  
}
for($i=0;$i<$numrows;$i++)
{
$stmt->fetch();
if($theuserid == $_SESSION['myusrid'])
{
$name = 'You';    
}
else
{
$name = '<a href="../publicprofile/?'.$this->getProfileURL($_SESSION['myusrid']).'='.$theuserid.'">'.$this->getUserFullName($theuserid).'</a>';
}
switch($notificationtype)
{
case 1:

 $message = '<div class="notificationmessagebox">'.$name.' followed you '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';
 break;
case 2:
   $message = '<div class="notificationmessagebox">'.$name.' unfollowed you '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';
  break;
case 3:
    $message = '<div class="notificationmessagebox">'.$name.' craved your plan ('.$this->getPlanName($planid).') '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';
    break;
case 4:
    $message = '<div class="notificationmessagebox">'.$name.' uncraved your plan ('.$this->getPlanName($planid).') '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';
    break;
case 5:
    $message = '<div class="notificationmessagebox">'.$name.' comment your plan ('.$this->getPlanName($planid).') '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
    break;
  case 6:
  $message = '<div class="notificationmessagebox">'.$name.' comment your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 7:
  $message = '<div class="notificationmessagebox">'.$name.' liked your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 8:
  $message = '<div class="notificationmessagebox">'.$name.' unliked your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 9:
  $message = '<div class="notificationmessagebox">'.$name.' loved your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 10:
  $message = '<div class="notificationmessagebox">'.$name.' unlove your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 11:
  $message = '<div class="notificationmessagebox">'.$name.' craved your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 12:
  $message = '<div class="notificationmessagebox">'.$name.' uncraved your photo  '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  case 13:
  $message = '<div class="notificationmessagebox">'.$name.' sent photos '.$this->time_since(time() - strtotime($addeddate)).' ago'.'</div>';  
  break;
  default:
    $message = '';
    break;
}
$constructnotification .= $message;
}

if($numrows > 0)
{
  $constructnotification .= '</div> ';  
}
if($numrows == 0)
{
 $constructnotification = '<div class="timeline-block">
                    <div class="panel panel-default share">
                        <div class="panel-heading panel-heading-gray title">
                         You have no notification
                        </div>
                        
                       
                    </div>
                </div>' ;  
}

return $constructnotification;
}

public function RetrievePassword($email)
{
 return $this->RetriveMyPersonalPassword($email);   
}

private function TokenGenerator()
{

$s =  substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz",5)),0,5);
$s .= substr(str_shuffle(str_repeat("0123456789",5)),0,4);  
$s .= substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz",5)),0,5);
$s .= substr(str_shuffle(str_repeat("0123456789",5)),0,6);
$s .= substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz",5)),0,5);
return $s;  

}

private function getUserStarIcon($userid)
{
global $staricon;    
$stmt = $this->__contruct()->prepare('select celeb from user_tbl where user_id=? limit 1');    
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($celeb);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
if($celeb == 1)
{
$staricon = '<i style="padding:0px !important;"  class="celeb3 fa fa-check-circle"></i>';
}
else if($celeb == 0)
{
 $staricon = '';   
}

}
return $staricon;
}

private function RetriveMyPersonalPassword($email)
{
    global $seen;
$stmt = $this->__contruct()->prepare('select user_id,email from user_tbl where email=? LIMIT 1');
$stmt->bind_param('s',$email);
$stmt->execute();
$stmt->bind_result($userid,$email);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
   $stmt->fetch(); 
$seen = 'userfound';
$email = $email;
$userid = $userid;
// set forget token and reset mail
$this->setForgotToken($userid,$this->TokenGenerator(),$email);
}
else if($numrows == 0)
{
$seen = 'usernotfound';
}

return $seen;
}

private function setForgotToken($id,$token,$email)
{
$stmt = $this->__contruct()->prepare('update user_tbl set forgot_token=? where user_id=? limit 1');
$stmt->bind_param('ss',$token,$id);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
//send email for token reactivation
$theheaders = 'From: OHCrave <info@ohcrave.com>';
$to = $email;
$subject = 'Reset Password on OHCrave';
$message = 'Dear '.$this->getUserFullName($id).',<br> Please reset your password. Click on this <a href="http://ohcrave.com/resetpassword/?forgottoken='.$token.'">link</a>' ;   
$this->sendEmailViaBlueHost($to,$subject,$message,$theheader);
}

}


public function InitializeFirstTime($userid)
{
$this->setFirstTimeDetails($userid);
}
private function setFirstTimeDetails($userid)
{
$notfirstlogin = 1;    
$stmt = $this->__contruct()->prepare('update user_tbl set notfirstlogin=? where user_id=? LIMIT 1');  
$stmt->bind_param('dd',$notfirstlogin,$userid);
$stmt->execute();  
}

public function SendEmail($from,$fromname,$to,$subject,$body)
{
$this->AmazonSESMailer($from,$fromname,$to,$subject,$body);	
}

private function AmazonSESMailer($from,$fromname,$to,$subject,$body)
{
// remember from has to be a verified email address from amazon	
//date_default_timezone_set('Etc/UTC');
require 'mailapiparameters.php';
// require 'phpmailer/PHPMailerAutoload.php'; 
require 'phpmailer/class.phpmailer.php'; 
$mail = new PHPMailer();
$mail->isSMTP(); // SMTP
$mail->SMTPDebug = 2;
$mail->Host= SMTP_HOST; // Amazon SES
$mail->Port = SMTP_PORT;  // SMTP Port
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth  = true;  // SMTP authentication
$mail->Username = SMTP_USERNAME;  // SMTP  Username
$mail->Password = SMTP_PASSWORD;  // SMTP Password
$mail->setFrom($from, $fromname);
$mail->addReplyTo($from,'info@ohcrave.com');
$mail->Subject = $subject;
$mail->msgHTML($body);
$address = $to;
$mail->addAddress($address, $to);
$mail->send();
// if(!$mail->send())
// return  "Mailer Error: ". $mail->ErrorInfo;
// else
// return true;  
}

private function sendEmailViaBlueHost($to,$subject,$message,$theheader)
{
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Additional headers
//$headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
$headers .= $theheader. "\r\n";
// Mail it
mail($to, $subject, $message, $headers);	
}
private function EmailTemplates($messagebody)
{
global $theemailtemplate;
$theemailtemplate = '
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>OHCrave</title>
<style type="text/css">
         /* Client-specific Styles */
         #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
         body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
         /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
         .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
         .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} 
         /* Force Hotmail to display normal line spacing.  */
         #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
         img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
         a img {border:none;}
         .image_fix {display:block;}
         p {margin: 0px 0px !important;}
         table td {border-collapse: collapse;}
         table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
         a {color: #33b9ff; text-decoration:none!important;}
         /*STYLES*/
         table[class=full] { width: 100%; clear: both; }
         /*IPAD STYLES*/
         @media only screen and (max-width: 640px) {
         a[href^="tel"], a[href^="sms"] {
         text-decoration: none;
         color: #33b9ff; /* or whatever your want */
         pointer-events: none;
         cursor: default;
         }
         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
         text-decoration: default;
         color: #33b9ff !important;
         pointer-events: auto;
         cursor: default;
         }
         table[class=devicewidth] {width: 440px!important;text-align:center!important;}
         table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
         img[class=banner] {width: 440px!important;height:220px!important;}
         img[class=colimg2] {width: 440px!important;height:220px!important;}
         
         
         }
         /*IPHONE STYLES*/
         @media only screen and (max-width: 480px) {
         a[href^="tel"], a[href^="sms"] {
         text-decoration: none;
         color: #ffffff; /* or whatever your want */
         pointer-events: none;
         cursor: default;
         }
         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
         text-decoration: default;
         color: #ffffff !important; 
         pointer-events: auto;
         cursor: default;
         }
         table[class=devicewidth] {width: 280px!important;text-align:center!important;}
         table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
         img[class=banner] {width: 280px!important;height:140px!important;}
         img[class=colimg2] {width: 280px!important;height:140px!important;}
         td[class="padding-top15"]{padding-top:15px!important;}
         
        
         }
      </style>
</head>
<body>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0" ><tbody><tr>
<td>
                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hasbackground="true"><tbody><tr>
<td width="100%">
                                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth"><tbody>
<tr>
<td width="100%" height="10">
                                            </td>
                                        </tr>
<tr>
<td>
                                                <table width="48%" align="left" border="0" cellpadding="0" cellspacing="0"><tbody><tr>
<td align="left" valign="middle" style="font-family: Helvetica, arial, sans-serif; font-size: 13px;color: #282828" >
                                                                
                                                            </td>
                                                        </tr></tbody></table>
<table width="48%" align="right" border="0" cellpadding="0" cellspacing="0"><tbody><tr>
<td align="right" valign="middle" style="font-family: Helvetica, arial, sans-serif; font-size: 13px;color: #282828" >
                                                            
                                                            </td>
                                                        </tr></tbody></table>
</td>
                                        </tr>
<tr>
<td width="100%" height="10">
                                            </td>
                                        </tr>

</tbody></table>
</td>
                        </tr></tbody></table>
</td>
        </tr></tbody></table>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0" ><tbody><tr>
<td>
                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" bgcolor="#f2f2f2" hasbackground="true"><tbody><tr>
<td width="100%">
                                <table bgcolor="#f2f2f2" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth"><tbody>
<tr>
<td height="5" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
                                            </td>
                                        </tr>
<tr>
<td>
                                             

                                                <table width="140" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidth" bgcolor="#f2f2f2"><tbody><tr>
<td width="140" height="100" align="center">
                     <div class="imgpop">
                <a href="http://ohcrave.com"><img src="http://ohcrave.com/img/newlogo.png" alt="" border="0" width="150" height="150" style="display:block; border:none; outline:none; text-decoration:none;"  id="4uj98ntesi2dfgvi"></a>
                                                                </div>
                                                            </td>
                                                        </tr></tbody></table>
<table width="250" border="0" align="right" valign="middle" cellpadding="0" cellspacing="0" class="devicewidth" bgcolor="#f2f2f2"><tbody><tr>
<td align="center" style="font-family: Helvetica, arial, sans-serif; font-size: 20px; color: #ffffff;"  height="60">
                                                                <p>
                                                                    <span style="color: rgb(154, 102, 166);">Get Connected with friend</span>
                                                                </p>
                                                            </td>
                                                        </tr></tbody></table>

</td>
                                        </tr>
<tr>
<td height="5" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
                                            </td>
                                        </tr>

</tbody></table>
</td>
                        </tr></tbody></table>
</td>
        </tr></tbody></table>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0" ><tbody><tr>
<td>
                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hasbackground="true"><tbody><tr>
<td width="100%">
                                <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth"><tbody><tr>
<td align="center">
                                                <div class="imgpop">
                                                    <a href="#"><img width="600" border="0" height="300" alt="" style="display:block; border:none; outline:none; text-decoration:none;" src="http://ohcrave.com/img/8ebc7d9e3fef41f8b4bb214f1587d8bc.jpg" class="banner" id="4kki0931kukp4x6r"></a>
                                                </div>
                                            </td>
                                        </tr></tbody></table>
</td>
                        </tr></tbody></table>
</td>
        </tr></tbody></table>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0"><tbody><tr>
<td>
                <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" hasbackground="true"><tbody><tr>
<td align="center" height="30" style="font-size:1px; line-height:1px;">
                                <p>
                                </p>
                            </td>
                        </tr></tbody></table>
</td>
        </tr></tbody></table>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0"><tbody><tr>
<td>
                <table width="600" bgcolor="#9a66a6" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hasbackground="true"><tbody><tr>
<td width="100%">
                                <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" bgcolor="#9a66a6"><tbody><tr>
<td align="center" style="font-family: Helvetica, arial, sans-serif; font-size: 24px; color: #ffffff; padding: 15px 0;">
                                                <p>
                                                    <span style="color:#ffffff;"> Welcome to OHCrave</span>
                                                </p>
                                            </td>
                                        </tr></tbody></table>
</td>
                        </tr></tbody></table>
</td>
        </tr></tbody></table>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0" ><tbody><tr>
<td>
                <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" hasbackground="true"><tbody><tr>
<td align="center" height="30" style="font-size:1px; line-height:1px;" >
                                <p>
                                </p>
                            </td>
                        </tr></tbody></table>
</td>
        </tr></tbody></table>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0"><tbody><tr>
<td>
                <table bgcolor="" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hasbackground="true"><tbody><tr>
<td width="100%">
                                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth"><tbody><tr>
<td>
                                                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidth"><tbody>
<tr>
<td width="100%" height="10">
                                                            </td>
                                                        </tr>
<tr>
<td>
<div style="padding:10px; color:#000000;">
'.$messagebody.'

</div>
</td>
                                                        </tr>
<tr>
<td width="100%" height="10">
                                                            </td>
                                                        </tr>

</tbody></table>
<table width="290" align="right" border="0" cellpadding="0" cellspacing="0" class="devicewidth"><tbody>
<tr>
<td width="100%" height="10">
                                                            </td>
                                                        </tr>
<tr>

                                                        </tr>
<tr>
<td width="100%" height="20">
                                                            </td>
                                                        </tr>

</tbody></table>

</td>
                                        </tr></tbody></table>
</td>
                        </tr></tbody></table>
</td>
        </tr></tbody></table>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0" ><tbody><tr>
<td>
                <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" hasbackground="true"><tbody><tr>
<td align="center" height="30" style="font-size:1px; line-height:1px;">
                                <p>
                                </p>
                            </td>
                        </tr></tbody></table>
</td>
        </tr></tbody></table>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0" ><tbody><tr>
<td>
                <table bgcolor="#6F448B" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hasbackground="true"><tbody><tr>
<td width="100%">
                                <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth"><tbody><tr>
<td align="center" style="font-family: Helvetica, arial, sans-serif; font-size: 24px; color: #ffffff; padding: 15px 0;" >
                                                <p>
                                                    Get Social with us
                                                </p>
                                            </td>
                                        </tr></tbody></table>
</td>
                        </tr></tbody></table>
</td>
        </tr></tbody></table>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0" ><tbody><tr>
<td>
                <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hasbackground="true"><tbody><tr>
<td width="100%">
<table align="center">
<tr >
<td><a href="http://ohcrave.com"><img src="http://ohcrave.com/img/facebook-sf.png" alt="" border="0" width="58" height="52" style="display:block; border:none; outline:none; text-decoration:none;" id="4uj98ntesi2dfgvi">
</a></td>

<td><a href="http://ohcrave.com"><img src="http://ohcrave.com/img/twitter-sf.png" alt="" border="0" width="58" height="52" style="display:block; border:none; outline:none; text-decoration:none;" id="4uj98ntesi2dfgvi"></a></td>

<td><a href="http://ohcrave.com"><img src="http://ohcrave.com/img/instagram-sf.png" alt="" border="0" width="58" height="52" style="display:block; border:none; outline:none; text-decoration:none;" id="4uj98ntesi2dfgvi"></a></td>
</tr>

</table>    









 <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth"><tbody>
<tr>
<td height="20">
                                            </td>
                                        </tr>
<tr>

                                        </tr>
<tr>
<td height="20">
                                            </td>
                                        </tr>
<tr>
<td width="100%" bgcolor="#d41b29" height="3" style="font-size: 1px; line-height: 1px;">
                                            </td>
                                        </tr>

</tbody></table>
</td>
                        </tr></tbody></table>
</td>
        </tr></tbody></table>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0">

<tbody><tr>
<td>
                <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" hasbackground="true"><tbody></tbody></table>
</td>
        </tr></tbody></table>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0" ><tbody><tr>
<td>
                <table bgcolor="#9a66a6" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hasbackground="true"><tbody><tr>
<td width="100%">
                                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" bgcolor="#9a66a6"><tbody><tr>
<td>
                                                <table width="290" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidth" bgcolor="#9a66a6"><tbody>
<!-- Spacing --><tr>
<td width="100%" height="20">
                                                            </td>
                                                        </tr>
<!-- Spacing --><tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #ffffff; text-align:left;" >
                                                                
                                                            </td>
                                                        </tr>
<!-- Spacing --><tr>
<td width="100%" height="10">
                                                            </td>
                                                        </tr>
<!-- Spacing --><tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 14px; color: #ffffff; text-align:left;" >
                                                                <p style="text-align: center;">
                                                                    <span style="color:#FFFFFF; text-align: -webkit-center; font-family: \'Open Sans\', sans-serif; font-size: 12px; line-height: 22px; "></span>
                                                                </p>
                                                                <p style="text-align: center;">
                                                                    <span style="color:#FFFFFF; text-align: -webkit-center; font-family: \'Open Sans\', sans-serif; font-size: 12px; line-height: 22px; "> &copy; 2016 OHCrave Copyright All Right Reserved</span><span style="color:#FFFFFF; text-align: -webkit-center; font-family: \'Open Sans\', sans-serif; font-size: 12px; line-height: 22px; "></span>
                                                                </p>
                                                            </td>
                                                        </tr>
<!-- Spacing --><tr>
<td width="100%" height="10">
                                                            </td>
                                                        </tr>
<!-- Spacing -->
</tbody></table>
<!-- end of left column --><!-- start of right column --><table width="200" align="right" border="0" cellpadding="0" cellspacing="0" class="devicewidth" bgcolor="#9a66a6"><tbody>
<!-- Spacing --><tr>
<td width="100%" height="20">
                                                            </td>
                                                        </tr>
<!-- Spacing --><tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #ffffff; text-align:left;" >
                                                                <p>
                                                                    <span style="color:#FFFFFF !important; font-family: \'Open Sans\', sans-serif; font-size: 12px; line-height: 22px; ">Contact us:</span>
                                                                </p>
                                                                <p>
                                                                    <span style="color:#FFFFFF !important; font-family: \'Open Sans\', sans-serif; font-size: 12px; line-height: 22px; ">Tel: 08057710661, 08108547191</span>
                                                                </p>
                                                                <p>
                                                                    <span style="color:#FFFFFF !important; font-family: \'Open Sans\', sans-serif; font-size: 12px; line-height: 22px; ">Email: info@ohcrave.com</span>
                                                                </p>
                                                                <p>
                                                                    <br></p>
                                                            </td>
                                                        </tr>
<!-- Spacing --><tr>
<td width="100%" height="10">
                                                            </td>
                                                        </tr>
<!-- Spacing --><tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 14px; color: #ffffff; text-align:left;" >
                                                                <p>
                                                                </p>
                                                            </td>
                                                        </tr>
<!-- Spacing --><tr>
<td width="100%" height="20">
                                                            </td>
                                                        </tr>
<!-- Spacing -->
</tbody></table>
<!-- end of right column -->
</td>
                                        </tr></tbody></table>
</td>
                        </tr></tbody></table>
</td>
        </tr></tbody></table>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0"><tbody><tr>
<td>
                <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" hasbackground="true"><tbody><tr>
<td align="center" height="30" style="font-size:1px; line-height:1px;" >
                                <p>
                                </p>
                            </td>
                        </tr></tbody></table>
</td>
        </tr></tbody></table>
<table width="100%" bgcolor="#dedede" cellpadding="0" cellspacing="0" border="0" ><tbody><tr>
<td>
                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hasbackground="true"><tbody><tr>
<td width="100%">
                                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth"><tbody>
<!-- Spacing --><tr>
<td width="100%" height="21">
                                            </td>
                                        </tr>
<!-- Spacing --><tr>
<td align="center" valign="middle" style="font-family: Helvetica, arial, sans-serif; font-size: 13px;color: #ffffff" >
                                                <p>
                                                    <span style="color: rgb(0, 0, 0);"><br><span style="font-family: \'Open Sans\', sans-serif; font-size: 12px; line-height: 22px; background-color: rgb(245, 247, 250);"></span></span>
                                                </p>
                                            </td>
                                        </tr>
<!-- Spacing --><tr>
<td width="100%" height="20">
                                            </td>
                                        </tr>
<!-- Spacing -->
</tbody></table>
</td>
                        </tr></tbody></table>








                

</td>
        </tr></tbody></table>
    
</body>
</html>
';	
return $theemailtemplate;
}


public function TokenUpdatePassword($token,$password,$cpassword)
{
 global $msg;
 $msg = $this->checkTokenAndUpdatePassword($token,$password,$cpassword);
return $msg;   
}
private function checkTokenAndUpdatePassword($token,$password,$cpassword)
{
global $msg;
$password = hash('sha512',$password);
$stmt = $this->__contruct()->prepare('select user_id from user_tbl where forgot_token=? LIMIT 1');
$stmt->bind_param('s',$token);
$stmt->execute();
$stmt->bind_result($theuserid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();    
$theuserid = $theuserid;
$msg = $this->updateNewPassword($theuserid,$password);
}
else if($numrows == 0)
{
$msg = 'invalidtoken';
}
return $msg;
}

private function updateNewPassword($userid,$password)
{
global $msg;
$forgettoken = "";    
$stmt = $this->__contruct()->prepare('update user_tbl set forgot_token=?,password=? where user_id=? limit 1');
$stmt->bind_param('ssd',$forgettoken,$password,$userid);
$stmt->execute();
$affected = $stmt->affected_rows;
if($affected == 1)
{
$msg = 'Password Updated';
}
return $msg;
}
public function getAllPlanTrend($hashtag)
{
$plantrend = $this->getPlanHashTrend($this->getHashTagID($hashtag));
return $plantrend;
}
private function getHashTagID($hashtag)
{
$stmt = $this->__contruct()->prepare('select hash_tag_id from hash_tag_tbl where hash_tag=? LIMIT 1');
$stmt->bind_param('s',$hashtag);
$stmt->execute();
$stmt->bind_result($hashtagid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
$hashtagid = $hashtagid;
}     
return $hashtagid;
}




private function getPlanHashTrend($hashtagid)
{
 global $hashtagtrendplan,$planstring,$totalno ;    
$hashtype = 1;
$stmt = $this->__contruct()->prepare('select plan_id from hash_tag_trend_tbl where hash_tag_id=? and hash_type=? order by created_date desc'); 
$stmt->bind_param('ss',$hashtagid,$hashtype);
$stmt->execute();
$stmt->bind_result($theplanid);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows>0)
{
    for($i=0;$i<$numrows;$i++)
{
$stmt->fetch();
if($numrows == 1)
{
$planstring = $theplanid;    
}
else if($numrows > 1)
{
if($i == $numrows-1)
{
$planstring .= $theplanid;
}
else
{
$planstring .= $theplanid.',';
}
  
}
} 
$totalno = explode(',',$planstring);
}
else if($numrows == 0)
{

$hashtagtrendplan = "No Hashtag Plan";    
  
}  


if($totalno > 0)
{
for($j=0;$j<count($totalno);$j++)
{

$stmt2 = $this->__contruct()->prepare('select user_id,plan_id,plan_desc,added_date from plan_tbl where plan_id=? ');
$stmt2->bind_param('d',$totalno[$j]);
$stmt2->execute();
$stmt2->bind_result($userid,$planid,$plandesc,$added);
$stmt2->store_result();
//$numrows = $stmt2->num_rows();

$stmt2->fetch();
if($userid == $_SESSION['myusrid'])
{
$name = '<a>'.$this->getUserFullName($userid).' '.$this->getUserStarIcon($userid).'</a>';
}
else
{
 $name = '<a href="../publicprofile/?'.$this->getProfileURL($_SESSION['myusrid']).'='.$userid.'">'.$this->getUserFullName($userid).'  '.$this->getUserStarIcon($userid).'</a>';   
}
$hashtagtrendplan = $hashtagtrendplan .'<div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img src="'.$this->getUserImageThumb($userid).'" class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                    '.$name.'
                                    <span>'.$this->time_since(time() - strtotime($added)).' ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p>'.preg_replace('/#(\w+)/', ' <a href="../hashtags?tag=%23$1">#$1</a>', $plandesc).'</p>
                           <div class="timeline-added-images"> <!--
                                '.$this->getPlanImages($planid).'-->
                                <!--<img src="../images/social/100/1.jpg" width="80">
                                <img src="../images/social/100/2.jpg" width="80">
                                <img src="../images/social/100/3.jpg" width="80"> -->
                            </div> 
                        </div>
                        <div class="view-all-comments">'.$this->generateCraveButton($userid,$planid).'<!--<i class="countcravers"> '.$this->countCravers($planid).' Cravers</i>--></div>
                        <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o viewallcomments"></i> View all</a> <i class="countcomments"> '.$this->CountComments($planid).' </i> suggestions
                           <input type="hidden" class="planids" value="'.$planid.'" /> 
                        </div>
                        <ul class="comments">
                        <div class="userscroll " style="max-height:200px; scroll-y:inherit; overflow:scroll; overflow-x: hidden;">'.$this->getPlanComments($planid).'</div>
                       
                            <li class="comment-form">
                                <div class="input-group">
                                    <input type="text" class="form-control plancomment" />
                                    <span class="input-group-addon">
                   <a href="#"><i class="fa fa-comment addcomment"></i></a>
                </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>';




} 
}
else if($totalno == 0)
{
$hashtagtrendplan = "No Hashtag Plan";    
}
return $hashtagtrendplan;



}


public function PlanCommentBYID($commentid)
{
$plancomment = $this->getPlanCommentByID($commentid);
return $plancomment;    
}

private function getPlanCommentByID($commentid)
{
$stmt = $this->__contruct()->prepare('select plan_comment from plan_comment_tbl where plan_comment_id=? LIMIT 1');
$stmt->bind_param('s',$commentid);
$stmt->execute();
$stmt->bind_result($plancomment);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
$plancomment = $plancomment;
return $plancomment;
}
}

public function updatePlanComment($plancommentid,$plancomment)
{
 $this->updateNewPlanComment($plancommentid,$plancomment);   
}

private function updateNewPlanComment($plancommentid,$plancomment)
{
$stmt = $this->__contruct()->prepare('update plan_comment_tbl set plan_comment=? where plan_comment_id=? ');
$stmt->bind_param('ss',$plancomment,$plancommentid);
$stmt->execute();
}


public function removeCommentPlan($plancommentid)
{
$this->removePlanComment($plancommentid);    
}

// remove a comment 
private function removePlanComment($plancommentid)
{
$stmt = $this->__contruct()->prepare('delete from plan_comment_tbl where plan_comment_id=?');
$stmt->bind_param('d',$plancommentid);
$stmt->execute();
removePlanComment($plancommentid);
}

private function generateProfileURL()
{
$s = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz",5)),0,10);
$s .= substr(str_shuffle(str_repeat("0134465789",7)),0,6);  
$s .= substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz",5)),0,10);
$s .= substr(str_shuffle(str_repeat("0134465789",7)),0,6);  
$s .= substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz",5)),0,5);
$s .= substr(str_shuffle(str_repeat("0134465789",7)),0,10); 
$s .= substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz",5)),0,20);
return $s;  
}

private function updateProfileURL($userid,$profileurl)
{
$stmt = $this->__contruct()->prepare('update user_tbl set profile_url=? where user_id=?');
$stmt->bind_param('sd',$profileurl,$userid);
$stmt->execute();
}

public function getProfileURL($userid)
{
$stmt = $this->__contruct()->prepare('select profile_url from user_tbl where user_id=? limit 1');
$stmt->bind_param('d',$userid);
$stmt->execute();
$stmt->bind_result($profileurl);
$stmt->store_result();
$numrows = $stmt->num_rows();
if($numrows == 1)
{
$stmt->fetch();
$profileurl = $profileurl;
return $profileurl;
}

}
// end of class
} // end of class 

?>