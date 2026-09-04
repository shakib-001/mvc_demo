<?php

class StudentController
{
    private $studentModel;

    public function __construct()
    {
        require_once __DIR__ . "/../models/Student.php";
        require_once __DIR__ . "/../../config/database.php";

        $conn = Database::connect();

        $this->studentModel = new Student($conn);
    }

    public function index()
    {
        $students = $this->studentModel->getAll();

        require_once __DIR__ . "/../views/students/index.php";
    }

    public function create()
    {
        require_once __DIR__ . "/../views/students/create.php";
    }

    public function edit()
{
    if (isset($_GET["id"])) {

        $id = $_GET["id"];

        $student = $this->studentModel->getById($id);

        require_once __DIR__ . "/../views/students/edit.php";
    }
}

public function search()
{
    $keyword = $_GET["keyword"] ?? "";

    $students = $this->studentModel->search($keyword);

    require_once __DIR__ . "/../views/students/index.php";
}

public function update()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];

        $this->studentModel->update($id, $name, $email);

        header("Location: index.php?message=updated");
        exit;
    }
}

    public function store()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $name = $_POST["name"];
        $email = $_POST["email"];

        $this->studentModel->create($name, $email);

        header("Location: index.php?message=added");
        exit;
    }
}
    public function delete()
{
    if (isset($_GET["id"])) {

        $id = $_GET["id"];

        $this->studentModel->delete($id);

        header("Location: index.php?message=deleted");
        exit;
    }
}
}