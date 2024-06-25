// Task - 1
let tasks = [];
function addTask() {
    const taskInput = document.getElementById("task-input");
    const taskText = taskInput.value.trim();
    
    if (taskText === "") {
        alert("Please enter a task.");
        return;
    }

    tasks.push(taskText);
    taskInput.value = "";
    displayTasks();
}
function displayTasks() {
    const tasksContainer = document.getElementById("tasks-container");
    tasksContainer.innerHTML = "";

    tasks.forEach((task, index) => {
        const taskItem = document.createElement("div");
        taskItem.classList.add("task-item");
        taskItem.innerHTML = `
            <span>${task}</span>
            <button onclick="markTaskDone(${index})">Mark Done</button>
            <button onclick="deleteTask(${index})">Delete</button>
        `;
        tasksContainer.appendChild(taskItem);
    });
}
function markTaskDone(index) {
    const taskItems = document.querySelectorAll(".task-item");
    taskItems[index].classList.toggle("done");
}
function deleteTask(index) {
    tasks.splice(index, 1);
    displayTasks();
}

// Task - 2
const xhr = new XMLHttpRequest();
xhr.open('GET', 'https://jsonplaceholder.typicode.com/posts/1', true);
xhr.onload = function() {
    if (xhr.status === 200) {
        const post = JSON.parse(xhr.responseText);
        const table = document.createElement('table');
        table.border = '1';
        const headerRow = table.insertRow();
        for (const key in post) {
            const headerCell = document.createElement('th');
            const headerText = document.createTextNode(key);
            headerCell.appendChild(headerText);
            headerRow.appendChild(headerCell);
        }
        const dataRow = table.insertRow();
        for (const key in post) {
            const dataCell = dataRow.insertCell();
            const dataText = document.createTextNode(post[key]);
            dataCell.appendChild(dataText);
        }
        document.body.appendChild(table);
    } else {
        console.error('Request failed with status:', xhr.status);
    }
};
xhr.onerror = function() {
    console.error('Request failed');
};
xhr.send();
