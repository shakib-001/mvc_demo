<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Student</title>

    <link
        rel="stylesheet"
        href="/mvc_demo/public/css/style.css"
    >

</head>

<body>

<div class="container">

    <div class="form-card">

        <h1>Add Student</h1>

        <p class="subtitle">
            Enter the student's information below.
        </p>


        <form
            method="POST"
            action="index.php?action=store"
        >

            <div class="form-group">

                <label for="name">
                    Student Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter student name"
                    required
                >

            </div>


            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter student email"
                    required
                >

            </div>


            <div class="form-actions">

                <button
                    type="submit"
                    class="save-btn"
                >
                    Save Student
                </button>


                <a
                    href="index.php"
                    class="btn cancel-btn"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>