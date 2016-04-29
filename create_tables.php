<?php

// Connect
$con = mysql_connect("mysql1.000webhost.com", "a4113320_php","123456");

mysql_select_db("a4113320_php", $con);

// Create accounts table in bs_db database
// Gender use 0,1,2 stands for male, female, unknown
$sql = "CREATE TABLE Accounts
(
Email varchar(30),
Password varchar(20),
User_Id int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(User_Id),
Blocked int
)";
if (mysql_query($sql, $con)) {
	echo "Accounts Table has been created..<br>";
}
else {
	echo "Error creating Accounts Table: " . mysql_error()."<br>";
}









// Create students table in bs_db database
$sql = "CREATE TABLE Students
(
Student_Id int NOT NULL AUTO_INCREMENT,
Email varchar(30),
Name varchar(15),
Avatar varchar(100),
Gender int,
Hobbies varchar(50),
Major varchar(30),
Birth date,
Contact_No varchar(11),
PRIMARY KEY(Student_Id)
)";
if (mysql_query($sql, $con)) {
	echo "Students Table has been created..<br>";
}
else {
	echo "<br>Error creating Students Table: " . mysql_error()."<br>";
}










// Create organizations table in bs_db database
$sql = "CREATE TABLE Organizations
(
Organization_Id int NOT NULL AUTO_INCREMENT,
Email varchar(30),
Name varchar(15),
Avatar varchar(100),
Introduction varchar(300),
PRIMARY KEY(Organization_Id)
)";
if (mysql_query($sql, $con)) {
	echo "Organizations Table has been created..<br>";
}
else {
	echo "Error creating Organizations Table: " . mysql_error()."<br>";
}


$sql = "CREATE TABLE Remotecontrol
(Remotecontrol_Id int NOT NULL AUTO_INCREMENT,
name varchar(30),
Wash varchar(3),
Air varchar(3),
Water varchar(3),
Garage varchar(3),
Light_A varchar(3),
Light_B varchar(3),
Light_C varchar(3),
PRIMARY KEY(Remotecontrol_Id)
)";
if (mysql_query($sql, $con)){
        echo "Remotecontrol Table has been created..<br>";
}

else {
        echo "Error creating Remotecontrol Table: ".mysql_error()."<br>";
}











$sql = "CREATE TABLE Flight
(Heating_Id int NOT NULL AUTO_INCREMENT,
name varchar(30),
Dpc varchar(3),
Dpt varchar(30),
Arc varchar(3),
Art varchar(30),
Fnum varchar(30),
Time varchar(6),
PRIMARY KEY(Heating_Id)
)";
if (mysql_query($sql, $con)){
        echo "Flight Table has been created..<br>";
}

else {
        echo "Error creating Flight Table: ".mysql_error()."<br>";
}



















// Create Admin table in bs_db database
$sql = "CREATE TABLE Admin
(
Admin_Id int NOT NULL AUTO_INCREMENT,
Account varchar(30),
PRIMARY KEY(Admin_Id)
)";
if (mysql_query($sql, $con)) {
	echo "Admin Table has been created..<br>";
}
else {
	echo "<br>Error creating Admin Table: " . mysql_error()."<br>";
}

// Create PersonalNews table in bs_db database
/*$sql = "CREATE TABLE PersonalNews
(
News_Id int NOT NULL AUTO_INCREMENT,
Email varchar(30),
News varchar(300),
Photo varchar(100),
Time datetime,
PRIMARY KEY(News_Id)
)";
if (mysql_query($sql, $con)) {
	echo "PersonalNews Table has been created..<br>";
}
else {
	echo "<br>Error creating PersonalNews Table: " . mysql_error()."<br>";
}

$sql = "CREATE TABLE FriendNews
(
News_Id int NOT NULL AUTO_INCREMENT,
Email varchar(30),
News varchar(200),
Photo varchar(100),
Time datetime,
PRIMARY KEY(News_Id)
)";
if (mysql_query($sql, $con)) {
	echo "FriendNews Table has been created..<br>";
}
else {
	echo "<br>Error creating FriendNews Table: " . mysql_error()."<br>";
}

// Create PersonalPlans table in bs_db database
$sql = "CREATE TABLE PersonalPlans
(
Plans_Id int NOT NULL AUTO_INCREMENT,
Update_Time datetime,
Progress float,
Complete int,
Title varchar(50),
Progrss_once float,
Days int,
Follower_Num int,
Email varchar(30),
Content varchar(200),
Photo varchar(100),
Time datetime,
PRIMARY KEY(Plans_Id)
)";
if (mysql_query($sql, $con)) {
	echo "PersonalPlans Table has been created..<br>";
}
else {
	echo "<br>Error creating PersonalPlans Table: " . mysql_error()."<br>";
}

// Create announcements table in bs_db database
$sql = "CREATE TABLE Annoucements
(
Announcement_Id int NOT NULL AUTO_INCREMENT,
Email varchar(30),
time datetime,
Follower_Num int,
Content varchar(200),
Photo varchar(100),
PRIMARY KEY(Announcement_Id)
)";
if (mysql_query($sql, $con)) {
	echo "Announcements Table has been created..<br>";
}
else {
	echo "<br>Error creating Announcements Table: " . mysql_error()."<br>";
}

// Create comments table in bs_db database
$sql = "CREATE TABLE Comments
(
Comment_Id int NOT NULL AUTO_INCREMENT,
Email varchar(30),
Time datetime,
Content varchar(300),
Type int,
No int,
Toward varchar(30),
PRIMARY KEY(Comment_Id)
)";
if (mysql_query($sql, $con)) {
	echo "Comments Table has been created..<br>";
}
else {
	echo "<br>Error creating Comments Table: " . mysql_error()."<br>";
}*/















$sql = "CREATE TABLE Friends
(
Friend_Id int NOT NULL AUTO_INCREMENT,
Email varchar(30),
F_ID int,
PRIMARY KEY(Friend_Id)
)";
if (mysql_query($sql, $con)) {
	echo "Friends Table has been created..<br>";
}
else {
	echo "Error creating Friends Table: " . mysql_error()."<br>";
}


















$sql = "CREATE TABLE FriendRequest
(
Request_Id int NOT NULL AUTO_INCREMENT,
Email varchar(30),
Req_ID int,
PRIMARY KEY(Request_Id)
)";
if (mysql_query($sql, $con)) {
	echo "FriendRequest Table has been created..<br>";
}
else {
	echo "Error creating FriendRequest Table: " . mysql_error()."<br>";
}

// Create follow table in bs_db database
/*$sql = "CREATE TABLE Follow
(
Follow_Id int NOT NULL AUTO_INCREMENT,
Email varchar(30),
Plan_Follow_Id int,
Announcement_Follow_Id int,
PRIMARY KEY(Follow_Id)
)";
if (mysql_query($sql, $con)) {
	echo "Follow Table has been created..<br>";
}
else {
	echo "<br>Error creating Comments Table: " . mysql_error()."<br>";
}

// Create plan_update table in bs_db database
$sql = "CREATE TABLE PlanUpdate
(
PlanUpdate_Id int NOT NULL AUTO_INCREMENT,
Plans_Id int,
Time datetime,
Content varchar(200),
PRIMARY KEY(PlanUpdate_Id)
)";
if (mysql_query($sql, $con)) {
	echo "Organizations Table has been created..<br>";
}
else {
	echo "Error creating Organizations Table: " . mysql_error()."<br>";
}

*/
//List followers
$sql = "CREATE TABLE Org
(
Org_Id int NOT NULL AUTO_INCREMENT,
O_Email varchar(30),
F_Email varchar(30),
PRIMARY KEY(Org_Id)
)";
if (mysql_query($sql, $con)) {
	echo "Org Table has been created..<br>";
}
else {
	echo "Error creating Org Table: " . mysql_error()."<br>";
}


// Close connection
mysql_close($con);
?>
