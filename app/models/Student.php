<?php

class Student
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT id, name, email FROM students";

        $result = $this->conn->query($sql);

        $students = [];

        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }

        return $students;
    }

    public function create($name, $email)
    {
        $sql = "INSERT INTO students (name, email) VALUES (?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("ss", $name, $email);

        return $stmt->execute();
    }
    public function getById($id)
{
    $sql = "SELECT id, name, email FROM students WHERE id = ?";

    $stmt = $this->conn->prepare($sql);

    $stmt->bind_param("i", $id);

    $stmt->execute();

    $result = $stmt->get_result();

    return $result->fetch_assoc();
}
public function update($id, $name, $email)
{
    $sql = "UPDATE students SET name = ?, email = ? WHERE id = ?";

    $stmt = $this->conn->prepare($sql);

    $stmt->bind_param("ssi", $name, $email, $id);

    return $stmt->execute();
}

public function search($keyword)
{
    $sql = "SELECT id, name, email
            FROM students
            WHERE name LIKE ?";

    $stmt = $this->conn->prepare($sql);

    $search = "%" . $keyword . "%";

    $stmt->bind_param("s", $search);

    $stmt->execute();

    $result = $stmt->get_result();

    $students = [];

    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }

    return $students;
}
    public function delete($id)
    {
        $sql = "DELETE FROM students WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}