<?php
class Page extends Controller 
{
 private $db;
 private $mail;
 public function __construct()
 {
  $this->userModel = $this->model('UserModel');
  $this->db = new Database;
 }

 public function index()
 {
    echo "Index Method of Page Controller";
 }

 public function dashboard()
 {
      //
 }

 public function register()
 {
      //
 }

 
}
