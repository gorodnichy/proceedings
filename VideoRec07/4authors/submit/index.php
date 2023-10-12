<html>
<head>
<TITLE>VideoRec workshop Submission Upload</TITLE>

<style>
<!-
a:active { font-weight: bold; text-decoration: underline }
A:visited { font-weight: bold; color:#993300; text-decoration: none;}
A:link { font-weight: bold; color:#12522E; text-decoration: none;}
A:hover { color:#12522E; text-decoration: underline;background-color:#cccccc;}
A:border { border: 1px solid black; }
P		{font-family: Verdana, Arial, Helvetica; font-size: 9pt;};
UL		{font-family: Verdana, Arial, Helvetica; font-size: 9pt;};
OL		{font-family: Verdana, Arial, Helvetica; font-size: 9pt;};
TD		{font-family: Verdana, Arial, Helvetica; font-size: 9pt;};
DIV		{font-family: Verdana, Arial, Helvetica; font-size: 9pt;};
PRE		{font-family: Times New Roman Cyr, Times New Roman; font-size: 11pt;};
BODY		{font-family: Verdana, Arial, Helvetica; font-size: 8pt;};
INPUT		{font-family: Verdana, Arial, Helvetica; font-size: 8pt;};
TEXTAREA	{font-family: Verdana, Arial, Helvetica; font-size: 8pt;};
->
</style>


</head>

<BODY text=#000000 vLink=#551a8b aLink=#ff0000 link=#0000ee bgColor=#00ff00>

<center>

<TABLE cellPadding=0 width=750 bgColor=#FFFF66 noborder border="1">
  <TBODY>
  <TR>
    <TD colSpan=4 bgcolor="#FF3300">
    
  
<!---   header ------>    
      <TABLE cellSpacing=0 cellPadding=2 width="100%" border=0 bgcolor="#008080">
        <TBODY>
        <TR>
          <TD vAlign=middle align=center width=90 bgColor=#FF3300>
          <a href="http://www.visioninterface.net/fpiv04/preface.html#logo"><img border="0" src="pics/fpiv-logo.gif" 
alt="Click here to read  
  about FPiV logo" width="90" height="90"></a> </TD>
          <TD noWrap align=middle bgColor=#FF3300 height="100">
            <p align="center"><b>
            VideoRec'07: The First International Workshop on&nbsp;<i><font face="Arial,Helvetica" size="5"><br>
            </font></i></b><i><font size="6">
 <b>
 Video&nbsp;Processing and Recognition </b></font></i><br>
May 28-30, Montreal, Canada
            <BR><a href="http://www.computer-vision.org/4security">www.computer-vision.org/4security</a></p>
          </TD>
          <TD align=middle width=90 bgColor=#FF3300 nowrap>
            <p align="center"><a href="http://www.cipprs.org"><img border="0" src="pics/cipprs2.gif" width="79" height="78"></a><a href="http://iit-iti.nrc-cnrc.gc.ca/r-d/cv-vi_e.html"><img  src="pics/NRC-CNRC.gif" border="0" width="82" height="16"></a></p>
 </TD></TR>
             
        <!-- TR>
          <TD bgColor=#ff8888 colSpan=3>
            <p align="right"><font face="Times New Roman" size="6"><i><b>FPIV
            2004</b></i>&nbsp;</font></TD></TR-->
            </TBODY>
            </TABLE>
            </TD>
            </TR>
       
 <!-- End of header ----> 


<h2 align=center> 
Electronic Submission of Papers (and Supplemental Material)</h2>

Please note the following
<ul>
<font size=2>
<li> Make sure your paper is formatted according to <a href="http://www.computer-vision.org/~VideoRec07/authors.html"> the formatting instructions</a>!
<li> The password is "vp4s". You can use it to either a) view already uploaded files, or b) upload a new file.
<li> Do file Listing first to see the file names already uploaded.
<li> Only files with extension .pdf and .zip are accepted.
<li> Make sure the name for your submission is unique and consistent for all your submissions and does not reveal the authorship. 
<br>We suggest you use the following file name convention: "keyword1_keyword2_versionN.pdf"
<li> You can upload your submission as many times as you wish, however make sure always use  the same file prefix. Only the last uploaded file will be reviewed.
<li> If you have any files to supplement you submission (e.g demo videos), you are welcome to upload them too in a  separate zipped file as "keyword1_keyword2_versionN.zip".
<li> If, after uploading your file, you don't see it in a directory Listing, contact Submissions Chair.
</font>
</ul>

<hr>



<?php 
/* Simple Upload manager
Script Version 0.4, copyright RRWH.com 2004

This script is distributed under the licence conditions on the website http://rrwh.com/scripts.php

This script is a simple interface to allow you to upload files to a configured directory on your server.  It will additionally automatically create sub-directories if you want it to.  Additionally, It will let you do a directory listing of the base directory or any specified sub-directory.

You only need to modify the $password and $dir variable and ensure that the directory exists on the server and the permission is set to 777

You may want to modify the $types if you wish to allow other file types to be uploaded - Be careful not to allow dangerous files to be uploaded to your server.

*/

$pw = 'vp4s';

//$dir = "./images/"; //Change this to the correct dir  RELATIVE TO WHERE THIS SCRIPT IS, or /full/path/
//$dir = "/var/www/html/vp4s-submissions/"; //Change this to the correct dir  RELATIVE TO WHERE THIS SCRIPT IS, or /full/path/
$dir = "/home/submissions/VP4S/"; //Change this to the correct dir  RELATIVE TO WHERE THIS SCRIPT IS, or /full/path/

//MIME types to allow, Gif, jpeg, zip ::Edit this to your liking 
//$types = array("application/pdf","image/png","image/x-png","audio/wav","image/gif","image/jpeg","image/pjpeg","application/x-zip-compressed"); 
$types = array("application/pdf","video/wmv","video/mpeg","video/avi","video/mpg","image/gif","image/jpeg","image/pjpeg","application/x-zip-compressed"); 
    
// Nothing to edit below here.

//Function to do a directory listing
function vp4s_scandir($dirstr) {
	echo "<pre>\n";
	passthru("ls -l -F $dirstr 2>&1 ");
	echo "</pre>\n";
}

//Check to determine if the submit button has been pressed 
if((isset($_POST['submit'])) and ($_POST['PW'] == $pw)){ 

	//Shorten Variables 
	$tmp_name = $_FILES['upload']['tmp_name']; 
	$new_name = $_FILES['upload']['name']; 
	$path = $_POST['subdir'];
	$fullpath = "$dir$path/";
	$fullpath = str_replace("..", "", str_replace("\.", "", str_replace("//", "/", $fullpath)));
	$clean_name = ereg_replace("[^a-z0-9._]", "", str_replace(" ", "_", str_replace("%20", "_", strtolower($new_name) ) ) );

// lets see if we are uploading a file or doing a dir listing
	if(isset($_POST['Dir'])){
		echo "Directory listing for $fullpath\n";
		vp4s_scandir("$fullpath");
		}else{


		//Check MIME Type 
		if ((in_array($_FILES['upload']['type'], $types)) and (!file_exists($fullpath.$clean_name))){ 

			// create a sub-directory if required
			if (!is_dir($fullpath)){
				mkdir("$fullpath", 0755);
			}
			//Move file from tmp dir to new location 
			move_uploaded_file($tmp_name,$fullpath . $clean_name); 
 
			echo "$clean_name of {$_FILES['upload']['size']} bytes was uploaded sucessfully to $fullpath";

		}else{ 
          
			//Print Error Message 
			echo "<small>File <strong><em>{$_FILES['upload']['name']}</em></strong> Was Not Uploaded - bad file type or file already exists</small><br />"; 
			//Debug 
			$name =  $_FILES['upload']['name']; 
			$type =    $_FILES['upload']['type']; 
			$size =    $_FILES['upload']['size']; 
			$tmp =     $_FILES['upload']['name']; 
    
			echo "Name: $name<br />Type: $type<br />Size: $size<br />Tmp: $tmp";

		} 
      
	} 
} else { 
	echo 'Status: Ready to upload your file'; 
} ?> 
          
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"> 
      
<fieldset> 

<legend>Upload/View Files</legend> 
Password <input type="password" name="PW" /><br />
Do a directory Listing only <input type="checkbox" name="Dir" value="on" /><br />
File to upload <input type="file" name="upload" /> <br />

<input type="submit" name="submit" value="Upload/List Files" /> 
</fieldset> 
</form>

<!-- 
Subdir to upload to/list directory: <input type="text" name="subdir" value="<?php $path = $_POST['subdir']; echo "$path";?>" /> (Can be blank) Directory will be created if it does not exist<br />
-->

    </TD></TR></TBODY>
    
    </TABLE>     
  Today's date is: <? print (date ("M d, Y")); ?>
  
</center>
    
</body>
</html>
