<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Management</title>

    <link
        rel="stylesheet"
        href="/mvc_demo/public/css/style.css"
    >

</head>

<body>

<div class="container">

    <!-- Page Header -->

    <div class="page-header">

        <h1>Student Management</h1>

        <p>
            Manage student information easily.
        </p>

    </div>


    <!-- Success Message -->

    <?php if (isset($_GET["message"])): ?>

        <p class="success-message">

            <?php if ($_GET["message"] === "added"): ?>

                Student added successfully!

            <?php elseif ($_GET["message"] === "updated"): ?>

                Student updated successfully!

            <?php elseif ($_GET["message"] === "deleted"): ?>

                Student deleted successfully!

            <?php endif; ?>

        </p>

    <?php endif; ?>


    <!-- Top Bar -->

    <div class="top-bar">

        <a
            class="btn add-btn"
            href="index.php?action=create"
        >
            + Add Student
        </a>


        <form
            class="search-form"
            method="GET"
            action="index.php"
        >

            <input
                type="text"
                name="keyword"
                placeholder="Search student by name..."
                value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>"
            >

            <button
                type="submit"
                name="action"
                value="search"
                class="search-btn"
            >
                Search
            </button>

        </form>

    </div>


    <!-- Student Table -->

    <div class="table-card">

        <table>

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Action</th>

                </tr>

            </thead>


            <tbody>

            <?php if (count($students) > 0): ?>

                <?php foreach ($students as $student): ?>

                    <tr>

                        <td>
                            <span class="id-badge">
                                #<?= htmlspecialchars($student['id']) ?>
                            </span>
                        </td>


                        <td>
                            <?= htmlspecialchars($student['name']) ?>
                        </td>


                        <td>
                            <?= htmlspecialchars($student['email']) ?>
                        </td>


                        <td>

                            <a
                                class="edit-btn"
                                href="index.php?action=edit&id=<?= $student['id'] ?>"
                            >
                                Edit
                            </a>


                            <a
                                class="delete-btn"
                                href="index.php?action=delete&id=<?= $student['id'] ?>"
                                onclick="return confirm('Are you sure you want to delete this student?');"
                            >
                                Delete
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>

                    <td
                        colspan="4"
                        class="empty-message"
                    >
                        No students found.
                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>

</html>