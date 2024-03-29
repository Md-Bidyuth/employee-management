<?php

require 'ConnectionController.php';

class EmployeeController extends ConnectionController
{    
     public function index() {
        $query = "SELECT * FROM emlpoyees1";

        if(mysqli_query($this->conn, $query)) {
            $data = mysqli_query($this->conn, $query);

            return $data;
        };
     }

     public function create($data) {
        $name = $data['name'];
        $designation = $data['designation'];
        $salary = $data['salary'];
        
        if(isset($data['status'])) {
            $status = $data['status'];
        } else {
            $status = 0;
        }
        $image = $_FILES['image']['name'];
        $imgTempName = $_FILES['image']['tmp_name'];

        $query = "INSERT INTO emlpoyees1(name, image, designation, salary, status) VALUE('$name', '$image', '$designation', '$salary', '$status')";
        if(mysqli_query($this->conn, $query)) {
            move_uploaded_file($imgTempName, 'uploads/' . $image);

            return "info added successfully";
        }

     }

     public function edit($id) {
        $query = "SELECT * FROM emlpoyees1 WHERE id='$id'";
        if(mysqli_query($this->conn, $query)) {
            $data_obj = mysqli_query($this->conn, $query);
            $data = mysqli_fetch_assoc($data_obj);

            return $data;
        }
     }
}