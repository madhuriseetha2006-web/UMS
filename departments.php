<?php
$departments = array(
array("id"=>1,"name"=>"Computer Science & Engineering","head"=>"Dr. Ramesh Kumar"),
array("id"=>2,"name"=>"Mechanical Engineering","head"=>"Dr. Anil Reddy"),
array("id"=>3,"name"=>"Civil Engineering","head"=>"Dr. Suresh Rao"),
array("id"=>4,"name"=>"MBBS (Medical Sciences)","head"=>"Dr. Lakshmi Devi"),
array("id"=>5,"name"=>"Bachelor of Business Administration","head"=>"Dr. Kiran Varma"),
array("id"=>6,"name"=>"Bachelor of Laws (LLB)","head"=>"Dr. Sneha Sharma"),
array("id"=>7,"name"=>"Digital Marketing & Analytics","head"=>"Dr. Priya Mehta")
);

$deptImages = array(
"Computer Science & Engineering"=>"https://images.unsplash.com/photo-1518770660439-4636190af475",
"Mechanical Engineering"=>"https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc",
"Civil Engineering"=>"https://images.unsplash.com/photo-1503387762-592deb58ef4e",
"MBBS (Medical Sciences)"=>"https://images.unsplash.com/photo-1576091160550-2173dba999ef",
"Bachelor of Business Administration"=>"https://images.unsplash.com/photo-1556761175-4b46a572b786",
"Bachelor of Laws (LLB)"=>"https://images.unsplash.com/photo-1589829545856-d10d557cf95f",
"Digital Marketing & Analytics"=>"https://images.unsplash.com/photo-1551288049-bebda4e38f71"
);
?>

<!DOCTYPE html>
<html>
<head>
<title>University Departments</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:linear-gradient(135deg,#1f4037,#99f2c8);
min-height:100vh;
padding:40px 20px;
}

/* BACK BUTTON */

.back-btn{
display:inline-block;
background:#ffcc00;
color:black;
padding:10px 25px;
border-radius:30px;
text-decoration:none;
font-weight:600;
margin-bottom:30px;
transition:0.3s;
}

.back-btn:hover{
background:white;
}

/* HEADER */

.header{
text-align:center;
color:white;
margin-bottom:40px;
}

.header h1{
font-size:42px;
}

.header p{
opacity:0.9;
}

/* SEARCH BAR */

.search-box{
text-align:center;
margin-bottom:40px;
}

.search-box input{
width:350px;
padding:12px 18px;
border-radius:30px;
border:none;
outline:none;
font-size:14px;
}

/* CONTAINER */

.department-container{
display:flex;
flex-wrap:wrap;
justify-content:center;
gap:35px;
}

/* CARD */

.department-card{
width:300px;
background:rgba(255,255,255,0.15);
backdrop-filter:blur(12px);
border-radius:25px;
padding:30px;
text-align:center;
color:white;
box-shadow:0 15px 35px rgba(0,0,0,0.3);
transition:0.4s;
}

.department-card:hover{
transform:translateY(-10px) scale(1.03);
box-shadow:0 25px 50px rgba(0,0,0,0.5);
}

/* IMAGE */

.department-card img{
width:150px;
height:150px;
border-radius:50%;
object-fit:cover;
border:5px solid white;
margin-bottom:20px;
}

/* TEXT */

.department-card h3{
font-size:22px;
margin-bottom:8px;
}

.department-card p{
font-size:14px;
opacity:0.9;
margin-bottom:15px;
}

/* BUTTON */

.department-card a{
text-decoration:none;
background:#ffcc00;
color:black;
padding:10px 20px;
border-radius:25px;
font-weight:600;
transition:0.3s;
}

.department-card a:hover{
background:white;
color:#203a43;
}

</style>

</head>

<body>

<div style="text-align:center;">
<a href="academics.php" class="back-btn">⬅ Back to Academics</a>
</div>

<div class="header">
<h1>Our Academic Departments</h1>
<p>Excellence in Education • Innovation • Research</p>
</div>

<div class="search-box">
<input type="text" id="searchInput" placeholder="Search Department..." onkeyup="searchDept()">
</div>

<div class="department-container">

<?php
foreach($departments as $dept){

$imagePath = $deptImages[$dept['name']];

echo "<div class='department-card'>";
echo "<img src='".$imagePath."' alt='Department'>";
echo "<h3>".$dept['name']."</h3>";
echo "<p>Head of Department: ".$dept['head']."</p>";
echo "<a href='courses.php?dept_id=".$dept['id']."'>Explore Programs</a>";
echo "</div>";
}
?>

</div>

<script>

function searchDept(){

let input=document.getElementById("searchInput").value.toLowerCase();
let cards=document.getElementsByClassName("department-card");

for(let i=0;i<cards.length;i++){

let text=cards[i].innerText.toLowerCase();

if(text.includes(input)){
cards[i].style.display="block";
}
else{
cards[i].style.display="none";
}

}

}

</script>

</body>
</html>