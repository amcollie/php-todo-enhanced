<div class="offcanvas offcanvas-end" tabindex="-1" id="taskActions" aria-labelledby="taskActionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasLabel">Task Action</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
    <form action="/todo.php" method="post">
        <div class="mb-3">
            <label for="taskId">ID:</label>
            <input type="text" class="form-control" name="id" id="taskId" placeholder="ID" readonly>
        </div>
        <div class="mb-3">
            <label for="taskDescription" class="form-label">Description:</label>
            <input type="text" class="form-control" name="description" id="taskDescription" placeholder="Description">
        </div>
        <div class="mb-3">
            <label for="taskCompleted" class="form-label">Completed:</label>
            <input type="checkbox" name="completed" id="taskCompleted" class="form-check-input">
        </div>

        <div id="task-buttons">
            <button type="submit" class="btn btn-success" name="completed" value="completed">Completed</button>
            <button type="submit" class="btn btn-warning" name="updated" value="updated">Updated</button>
            <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </div>
    </form>
    </div>
</div>