<?php

class Expense extends Controller
{
    private $db;
    function __construct()
    {
        $this->db = new Database;
    }

    public function index()
    {
        $expenses = $this->db->expenseView();
        $data = [
            'title' => 'This is Expense page',
            'expenses' => $expenses,
            'index' => 'expense'
        ];
        $this->view('expense/index',$data);
    }

    public function create()
    {
        $categories = $this->db->columnFilter('categories','type_id',2);
        $data = [
            'categories' => $categories,
            'index' => 'expense'

        ];
        $this->view('expense/create',$data);
    }

    public function store()
    {
        if($_SERVER['REQUEST_METHOD']== 'POST')
        {
            $amount = $_POST['amount'];
            $category_id = $_POST['category_id'];
            $qty = $_POST['qty'];
            session_start();
            $user_id = base64_decode($_SESSION['id']);
            $date = date("Y/m/d");
            // Instatiate model
            $this->model('ExpenseModel');
            $expense = new ExpenseModel();
            $expense->setAmount($amount);
            $expense->setCategory($category_id);
            $expense->setUser($user_id);
            $expense->setQty($qty);
            $expense->setDate($date);
            $expenseCreated = $this->db->create('expenses',$expense->toArray());
        }

        redirect('expense');
    }

    public function edit($id)
    {
        $categories = $this->db->readAll('categories');
        $expense = $this->db->getById('expenses',$id);

        $data = [
            'categories' => $categories,
            'expense' => $expense,
        ];

        $this->view('expense/edit',$data);
    }

    public function update()
    {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $amount = $_POST['amount'];
            $qty = $_POST['qty'];
            $user_id = $_POST['user_id'];
            $date = $_POST['date'];
            $category_id = $_POST['category_id'];
            // Instatiate model
            $this->model('ExpenseModel');
            $expense = new ExpenseModel();
            $expense->setId($id);
            $expense->setAmount($amount);
            $expense->setQty($qty);
            $expense->setUser($user_id);
            $expense->setDate($date);
            $expense->setCategory($category_id);

            $updated = $this->db->update('expenses',$expense->getId(),$expense->toArray());

            if($updated)
            {
                setMessage('success','Successfully Updated !');
            }

            redirect('expense');
        }
    }

    public function destory($id)
    {
        $id = base64_decode($id);
        // Instatiate model
        $this->model('ExpenseModel');
        $expense = new ExpenseModel();
        $expense->setId($id);
        $deleted = $this->db->delete('expenses',$expense->getId());

        if($deleted)
        {
            setMessage('success','Successfully Deleted !');
        }

        redirect('expense');
    }
}


?>