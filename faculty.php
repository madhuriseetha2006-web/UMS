<?php
include("db.php");
$query = "SELECT * FROM faculty ORDER BY course";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Faculty Management</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
    min-height:100vh;
    padding:30px 20px;
}

/* TOP BAR */
.top-bar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.back-btn{
    padding:10px 22px;
    background:linear-gradient(to right,#2c5364,#203a43,#0f2027);
    color:white;
    text-decoration:none;
    border-radius:25px;
    font-size:14px;
    letter-spacing:0.5px;
    transition:0.4s;
}

.back-btn:hover{
    background:linear-gradient(to right,#0f2027,#203a43,#2c5364);
    transform:scale(1.05);
}

/* HEADER */
.header{
    text-align:center;
    color:white;
    margin-bottom:40px;
}

.header h1{
    font-size:38px;
    font-weight:700;
}

.header p{
    opacity:0.8;
}

/* TAGS */
.tags{
    text-align:center;
    margin-bottom:30px;
}

.tag-btn{
    background:rgba(255,255,255,0.15);
    border:1px solid rgba(255,255,255,0.3);
    padding:10px 22px;
    margin:6px;
    border-radius:30px;
    cursor:pointer;
    color:white;
    transition:0.3s;
}

.tag-btn:hover,
.tag-btn.active{
    background:white;
    color:#0f2027;
    font-weight:600;
}

/* SEARCH */
.search-box{
    text-align:center;
    margin-bottom:40px;
}

.search-box input{
    width:320px;
    padding:12px 18px;
    border-radius:30px;
    border:none;
    outline:none;
}

/* CONTAINER */
.faculty-container{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:30px;
}

/* CARD */
.card{
    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(15px);
    border-radius:20px;
    width:270px;
    padding:25px;
    text-align:center;
    color:white;
    box-shadow:0 10px 25px rgba(0,0,0,0.4);
    transition:0.4s;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}

.card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,0.6);
}

/* CIRCLE IMAGE */
.card img{
    width:130px;
    height:130px;
    object-fit:cover;
    border-radius:50%;
    border:4px solid white;
    margin:0 auto 15px auto;
}

/* TEXT */
.card h3{
    margin-bottom:6px;
}

.card p{
    font-size:14px;
    opacity:0.9;
}

.badge{
    background:white;
    color:#0f2027;
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
    margin-top:8px;
    display:inline-block;
    font-weight:600;
}

.card a{
    text-decoration:none;
    background:white;
    color:#0f2027;
    padding:9px 18px;
    border-radius:25px;
    font-weight:600;
    margin-top:18px;
    transition:0.3s;
}

.card a:hover{
    background:#ffcc00;
    color:black;
}

</style>
</head>

<body>

<!-- TOP BAR WITH BACK BUTTON -->
<div class="top-bar">
    <a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>
</div>

<div class="header">
    <h1>Faculty Management System</h1>
    <p>Meet Our Professional Educators</p>
</div>

<div class="tags">
    <button class="tag-btn active" onclick="filterSelection('all',this)">All</button>
    <button class="tag-btn" onclick="filterSelection('btechcse',this)">B.Tech CSE</button>
    <button class="tag-btn" onclick="filterSelection('degree',this)">Degree</button>
    <button class="tag-btn" onclick="filterSelection('mbbs',this)">MBBS</button>
    <button class="tag-btn" onclick="filterSelection('bba',this)">BBA</button>
    <button class="tag-btn" onclick="filterSelection('llb',this)">LLB</button>
    <button class="tag-btn" onclick="filterSelection('digitalmarketing',this)">Digital Marketing</button>
</div>

<div class="search-box">
    <input type="text" id="searchInput" placeholder="Search faculty..." onkeyup="searchFaculty()">
</div>

<div class="faculty-container">

<?php
while($row = mysqli_fetch_assoc($result)) {

$course_class = strtolower(preg_replace('/[^A-Za-z0-9]/','',$row['course']));
$randomImages = array(
"https://images.unsplash.com/photo-1573496359142-b8d87734a5a2",
"https://images.unsplash.com/photo-1607746882042-944635dfe10e",
"https://images.unsplash.com/photo-1582750433449-648ed127bb54",
"https://images.unsplash.com/photo-1544005313-94ddf0286df2",
"https://images.unsplash.com/photo-1502767089025-6572583495b4",
"https://images.unsplash.com/photo-1603415526960-f7e0328c63b1",
"https://images.unsplash.com/photo-1595152772835-219674b2a8a6",
"https://images.unsplash.com/photo-1556157382-97eda2d62296",
"https://images.unsplash.com/photo-1527980965255-d3b416303d12",
"https://images.unsplash.com/photo-1547425260-76bcadfb4f2c",
"https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5",
"https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e",
"https://images.unsplash.com/photo-1531123897727-8f129e1688ce",
"https://images.unsplash.com/photo-1548142813-c348350df52b",
"https://images.unsplash.com/photo-1535713875002-d1d0cf377fde",
"https://images.unsplash.com/photo-1522075469751-3a6694fb2f61",
"https://images.unsplash.com/photo-1517841905240-472988babdf9",
"https://images.unsplash.com/photo-1542909168-82c3e7fdca5c",
"https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d",
"https://images.unsplash.com/photo-1494790108377-be9c29b29330"
);

$imagePath = $randomImages[array_rand($randomImages)];

if(!empty($row['profile_image']) && file_exists("images/".$row['profile_image'])){
    $imagePath = "images/".$row['profile_image'];
} else {
    $imagePath = $randomImages[array_rand($randomImages)];
}

echo "<div class='card ".$course_class."'>";
echo "<div>";
echo "<img src='".$imagePath."' alt='Faculty'>";
echo "<h3>".$row['name']."</h3>";
echo "<p>".$row['designation']."</p>";
echo "<span class='badge'>".$row['course']."</span>";
echo "</div>";
echo "<a href='faculty_profile.php?id=".$row['id']."'>View Profile</a>";
echo "</div>";
}
?>

</div>

<script>

function filterSelection(course,btn){
let cards=document.getElementsByClassName("card");
let buttons=document.getElementsByClassName("tag-btn");

for(let i=0;i<buttons.length;i++){
buttons[i].classList.remove("active");
}
btn.classList.add("active");

for(let i=0;i<cards.length;i++){
if(course==="all"){
cards[i].style.display="flex";
}
else if(cards[i].classList.contains(course)){
cards[i].style.display="flex";
}
else{
cards[i].style.display="none";
}
}
}

function searchFaculty(){
let input=document.getElementById("searchInput").value.toLowerCase();
let cards=document.getElementsByClassName("card");

for(let i=0;i<cards.length;i++){
let text=cards[i].innerText.toLowerCase();
if(text.includes(input)){
cards[i].style.display="flex";
}else{
cards[i].style.display="none";
}
}
}

</script>

</body>
</html>