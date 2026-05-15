<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Academics | University</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f8f9fb;
    color:#333;
}

/* HERO SECTION */
.hero{
    background:linear-gradient(to right,rgba(13,71,161,0.8),rgba(21,101,192,0.8)),
    url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1');
    background-size:cover;
    background-position:center;
    color:white;
    text-align:center;
    padding:120px 20px;
}

.hero h1{
    font-size:44px;
    margin-bottom:15px;
}

.hero p{
    font-size:18px;
    opacity:0.9;
}

/* NAV BUTTONS */
.nav{
    text-align:center;
    margin:30px 0;
}

.nav a{
    text-decoration:none;
    padding:10px 25px;
    margin:5px;
    border-radius:30px;
    font-size:14px;
    transition:0.3s;
}

.btn-primary{
    background:#0d47a1;
    color:white;
}

.btn-outline{
    border:2px solid #0d47a1;
    color:#0d47a1;
}

.btn-primary:hover{background:#1565c0;}
.btn-outline:hover{background:#0d47a1;color:white;}

/* SECTION */
.section{
    padding:70px 10%;
    text-align:center;
}

.section h2{
    font-size:34px;
    color:#0d47a1;
    margin-bottom:40px;
}

/* CARDS */
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:30px;
}

.card{
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-8px);
}

.card h3{
    margin-bottom:10px;
    color:#0d47a1;
}

.card p{
    font-size:14px;
    color:#555;
}

/* ACHIEVEMENTS */
.achievements{
    background:#ffffff;
    padding:70px 10%;
}

.stats{
    display:flex;
    justify-content:space-around;
    flex-wrap:wrap;
    gap:30px;
}

.stat{
    text-align:center;
}

.stat h3{
    font-size:40px;
    color:#1565c0;
}

.stat p{
    color:#555;
}

/* ACCREDITATION */
.accreditation{
    background:#eef3f9;
    padding:60px 10%;
    text-align:center;
}

.accreditation h2{
    color:#0d47a1;
    margin-bottom:30px;
}

/* FOOTER */
.footer{
    background:#0d47a1;
    color:linear-gradient(to right,#f8fbff,#e3f2fd);;
    text-align:center;
    padding:20px;
}

</style>
</head>

<body>

<!-- HERO -->
<div class="hero">
    <h1>Excellence in Academics</h1>
    <p>Empowering Future Leaders Through Innovation, Research & Quality Education</p>
</div>

<div class="nav">
    <a href="dashboard.php" class="btn-primary">🏠 Dashboard</a>
    <a href="departments.php" class="btn-outline">📚 Departments</a>
</div>

<!-- PROGRAMS -->
<div class="section">
    <h2>Academic Programs</h2>

    <div class="grid">
        <div class="card">
            <h3>Undergraduate Studies</h3>
            <p>Industry-aligned B.Tech, BBA, B.Sc and professional degree programs.</p>
        </div>

        <div class="card">
            <h3>Postgraduate Studies</h3>
            <p>MBA, M.Tech, M.Sc and specialized advanced degree programs.</p>
        </div>

        <div class="card">
            <h3>Research & Doctoral</h3>
            <p>Ph.D programs focused on innovation, global research and development.</p>
        </div>
    </div>
</div>

<!-- ACHIEVEMENTS -->
<div class="achievements">
    <h2 style="text-align:center;color:#0d47a1;margin-bottom:40px;">🏆 Academic Achievements</h2>

    <div class="stats">
        <div class="stat">
            <h3>5000+</h3>
            <p>Graduated Students</p>
        </div>

        <div class="stat">
            <h3>150+</h3>
            <p>Experienced Faculty</p>
        </div>

        <div class="stat">
            <h3>100+</h3>
            <p>Research Papers Published</p>
        </div>

        <div class="stat">
            <h3>95%</h3>
            <p>Placement Success Rate</p>
        </div>
    </div>
</div>

<!-- ACCREDITATION -->
<div class="accreditation">
    <h2>Accreditations & Rankings</h2>
    <p>Recognized by National Education Boards and ranked among the top private universities for academic excellence and research innovation.</p>
</div>

<!-- FOOTER -->
<div class="footer">
    © 2026 University Academic Division | All Rights Reserved
</div>

</body>
</html>