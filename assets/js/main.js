document.addEventListener('DOMContentLoaded', function () {
    const taskForm = document.getElementById('task-form');
    const taskList = document.getElementById('task-list');

    taskForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const taskName = document.getElementById('task-name').value;
        const taskDescription = document.getElementById('task-description').value;

        if (taskName && taskDescription) {
            addTask(taskName, taskDescription);
            taskForm.reset();
        }
    });

    taskList.addEventListener('click', function (e) {
        if (e.target.classList.contains('delete-button')) {
            deleteTask(e.target.parentElement);
        } else if (e.target.classList.contains('edit-button')) {
            editTask(e.target.parentElement);
        }
    });

    function addTask(name, description) {
        // Create a new task item and add it to the list
        const li = document.createElement('li');
        li.innerHTML = `
            <strong class="task-text">${name}</strong><br>
            <span class="task-text">${description}</span>
            <button class="delete-button">Delete</button>
            <button class="edit-button">Edit</button>
        `;
        taskList.appendChild(li);
    }

    function deleteTask(taskItem) {
        // Remove the task item from the list
        taskItem.remove();
    }

    function editTask(taskItem) {
        // Implement your edit logic here
    }
});
