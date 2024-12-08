<!-- The Main Interface -->
<?php
include 'db.php'; //the database
$result = $conn->query("SELECT * FROM task");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">   
        <script src="script.js"></script>
        <title>To-Do List</title>
    </head>
    <body>
        <h1>My To-Do List</h1>
        <!-- to add new task -->
        <form action="add_task.php" method="POST">
            <input type="text" name="task" placeholder="New Task..." required>
            <input type="submit" value="Add task">
        </form>

        <h2>Task:</h2>
        <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li>
                    <div  class="task-info">
                        Task: <?php echo htmlspecialchars($row['task']); ?> <br>
                        Status: <?php echo htmlspecialchars($row['status']); ?>
                    </div>

                    <div class="action-buttons">
                        <?php if ($row['status'] !== 'Done'): ?>
                            <!-- Mark as done button -->
                            <form action="mark_done.php" method="POST">
                                <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                                <input type="submit" value="Mark as Done">
                            </form>
                            <!-- Delete button -->       
                            <form action="delete_task.php" method="POST">
                                <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>         
                        <?php endif; ?>
                        <!-- If the task is marked as 'Done', show the Delete button -->
                        <?php if ($row['status'] === 'Done'): ?>
                            <!-- Form to delete individual task -->
                            <form action="delete_done_task.php" method="POST">
                                <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul> 
            <!-- Clear Completed Tasks Button -->
            <div class="clear-task-container">
                <form action="clear_task.php" method="POST" onsubmit="showModal(event)">
                    <button type="submit" class ="clear-task">Clear Tasks</button>
                </form>
            </div>
            <!-- For the clear task pop-up-->
            <div id="confirmation-modal" class="modal">
                <div class="modal-content">
                    <span class="close-btn" onclick="closeModal()">&times;</span>
                    <h2>Do want to delete all tasks?</h2>
                    <button id="confirm-btn" class="modal-btn" onclick="confirmClearAction()">Yes, Clear</button>
                    <button class="modal-btn" onclick="closeModal()">Cancel</button>
                </div>
            </div>
    </body>
</html>