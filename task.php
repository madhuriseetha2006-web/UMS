<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>University Task Dashboard</title>

<style>
body{
    font-family: Arial;
    background: #f2f2f2;
    transition: 0.3s;
    margin: 0;
    padding: 0;
}

.dark-mode{
    background: #1e1e1e;
    color: white;
}

.task-container{
    width: 85%;
    margin: 30px auto;
    padding: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.dark-mode .task-container{
    background: #2d2d2d;
}

.top-bar{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.left-top{
    display: flex;
    align-items: center;
    gap: 10px;
}

.back-btn{
    padding: 10px 15px;
    background: #ff9800;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.back-btn:hover{
    background: #e68900;
}

.dark-btn{
    padding: 10px;
    background: black;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.dashboard-cards{
    display: flex;
    gap: 15px;
    margin: 20px 0;
    flex-wrap: wrap;
}

.card{
    flex: 1;
    min-width: 150px;
    background: #007bff;
    color: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
}

.task-form{
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.task-form input,
.task-form select{
    padding: 10px;
    flex: 1;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.task-form button{
    padding: 10px 20px;
    background: green;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#searchInput{
    width: 98%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.progress-section{
    margin-bottom: 20px;
}

progress{
    width: 100%;
    height: 20px;
}

#taskList{
    list-style: none;
    padding: 0;
}

#taskList li{
    background: #f9f9f9;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.dark-mode #taskList li{
    background: #444;
}

.task-info{
    flex: 1;
}

.priority-high{
    color: red;
    font-weight: bold;
}

.priority-medium{
    color: orange;
    font-weight: bold;
}

.priority-low{
    color: green;
    font-weight: bold;
}

.task-actions button{
    margin-left: 5px;
    padding: 7px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    color: white;
}

.complete-btn{
    background: green;
}

.edit-btn{
    background: orange;
}

.delete-btn{
    background: red;
}

.completed{
    text-decoration: line-through;
    opacity: 0.6;
}

.overdue{
    border-left: 6px solid red;
}

.status{
    font-weight: bold;
}

@media(max-width:768px){

    .top-bar{
        flex-direction: column;
        gap: 15px;
    }

    .dashboard-cards{
        flex-direction: column;
    }

    .task-form{
        flex-direction: column;
    }

}

</style>
</head>

<body>

<div class="task-container">

    <div class="top-bar">

        <div class="left-top">

            <button class="back-btn"
                onclick="goBack()">
                ⬅ Back
            </button>

            <h2>University Task Dashboard</h2>

        </div>

        <button class="dark-btn"
            onclick="toggleDarkMode()">
            🌙 Dark Mode
        </button>

    </div>

    <!-- Dashboard Cards -->

    <div class="dashboard-cards">

        <div class="card">
            <h3 id="totalTasks">0</h3>
            <p>Total Tasks</p>
        </div>

        <div class="card">
            <h3 id="completedTasks">0</h3>
            <p>Completed</p>
        </div>

        <div class="card">
            <h3 id="pendingTasks">0</h3>
            <p>Pending</p>
        </div>

    </div>

    <!-- Search -->

    <input type="text"
        id="searchInput"
        placeholder="Search Tasks..."
        onkeyup="searchTask()">

    <!-- Add Task Form -->

    <div class="task-form">

        <input type="text"
            id="taskInput"
            placeholder="Enter Task Name">

        <input type="date"
            id="dueDate">

        <select id="priority">

            <option value="High">
                High Priority
            </option>

            <option value="Medium">
                Medium Priority
            </option>

            <option value="Low">
                Low Priority
            </option>

        </select>

        <select id="category">

            <option value="Assignment">
                Assignment
            </option>

            <option value="Project">
                Project
            </option>

            <option value="Exam">
                Exam
            </option>

            <option value="Meeting">
                Meeting
            </option>

        </select>

        <button onclick="addTask()">
            Add Task
        </button>

    </div>

    <!-- Progress -->

    <div class="progress-section">

        <label>
            Task Progress
        </label>

        <progress id="progressBar"
            value="0"
            max="100">
        </progress>

    </div>

    <!-- Task List -->

    <ul id="taskList"></ul>

</div>

<script>

window.onload = function () {
    displayTasks();
};

function addTask() {

    let taskInput =
        document.getElementById("taskInput");

    let dueDate =
        document.getElementById("dueDate");

    let priority =
        document.getElementById("priority");

    let category =
        document.getElementById("category");

    if (taskInput.value === "") {

        alert("Please enter task");

        return;
    }

    let tasks =
        JSON.parse(localStorage.getItem("tasks"))
        || [];

    let task = {

        name: taskInput.value,

        due: dueDate.value,

        priority: priority.value,

        category: category.value,

        completed: false
    };

    tasks.push(task);

    localStorage.setItem(
        "tasks",
        JSON.stringify(tasks)
    );

    taskInput.value = "";

    dueDate.value = "";

    displayTasks();
}

function displayTasks() {

    let taskList =
        document.getElementById("taskList");

    taskList.innerHTML = "";

    let tasks =
        JSON.parse(localStorage.getItem("tasks"))
        || [];

    tasks.forEach((task, index) => {

        let today =
            new Date().toISOString().split('T')[0];

        let overdueClass =
            task.due < today && !task.completed
            ? "overdue"
            : "";

        let li = document.createElement("li");

        li.className =
            `${overdueClass}
            ${task.completed ? "completed" : ""}`;

        li.innerHTML = `

        <div class="task-info">

            <strong>
                ${task.name}
            </strong>

            <br><br>

            📅 Due Date:
            ${task.due}

            <br>

            📚 Category:
            ${task.category}

            <br>

            ⚡ Priority:

            <span class="
                priority-${task.priority.toLowerCase()}
            ">
                ${task.priority}
            </span>

            <br>

            <span class="status">

                Status:

                ${task.completed
                    ? "Completed"
                    : "Pending"}

            </span>

        </div>

        <div class="task-actions">

            ${
                !task.completed
                ?

                `<button class="complete-btn"
                    onclick="completeTask(${index})">

                    Complete

                </button>`

                :

                ""
            }

            <button class="edit-btn"
                onclick="editTask(${index})">

                Edit

            </button>

            <button class="delete-btn"
                onclick="deleteTask(${index})">

                Delete

            </button>

        </div>
        `;

        taskList.appendChild(li);
    });

    updateDashboard();
}

function completeTask(index) {

    let tasks =
        JSON.parse(localStorage.getItem("tasks"))
        || [];

    tasks[index].completed = true;

    localStorage.setItem(
        "tasks",
        JSON.stringify(tasks)
    );

    displayTasks();
}

function deleteTask(index) {

    let tasks =
        JSON.parse(localStorage.getItem("tasks"))
        || [];

    tasks.splice(index, 1);

    localStorage.setItem(
        "tasks",
        JSON.stringify(tasks)
    );

    displayTasks();
}

function editTask(index) {

    let tasks =
        JSON.parse(localStorage.getItem("tasks"))
        || [];

    let newTask = prompt(
        "Edit Task",
        tasks[index].name
    );

    if(newTask !== null && newTask !== ""){

        tasks[index].name = newTask;

        localStorage.setItem(
            "tasks",
            JSON.stringify(tasks)
        );

        displayTasks();
    }
}

function searchTask() {

    let input =
        document.getElementById("searchInput")
        .value
        .toLowerCase();

    let tasks =
        document.querySelectorAll("#taskList li");

    tasks.forEach(task => {

        let text =
            task.innerText.toLowerCase();

        task.style.display =
            text.includes(input)
            ? "flex"
            : "none";
    });
}

function toggleDarkMode() {

    document.body.classList.toggle("dark-mode");
}

function updateDashboard() {

    let tasks =
        JSON.parse(localStorage.getItem("tasks"))
        || [];

    let total = tasks.length;

    let completed =
        tasks.filter(task => task.completed).length;

    let pending = total - completed;

    document.getElementById("totalTasks")
        .innerText = total;

    document.getElementById("completedTasks")
        .innerText = completed;

    document.getElementById("pendingTasks")
        .innerText = pending;

    let progress =
        total === 0
        ? 0
        : (completed / total) * 100;

    document.getElementById("progressBar")
        .value = progress;
}

function goBack(){

    window.history.back();
}

</script>

</body>
</html>