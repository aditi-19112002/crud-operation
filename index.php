<?php include_once "config.php "?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  
</head>
<body>
 <div class="flex bg-black text-white py-3 px-36 gap-4 items-center justify-between w-full">
    <div class="flex items-center space-x-6">
    <a href="#" class="text-white text-2xl">Crudoperation</a>
    </div>
  </div>
 

  <div class="flex-1 bg-slate-700 p-12">
     <div class="flex space-x-6">
    <div class="w-1/2 bg-white text-black shadow-md p-4 mb-8">
        <div class="w-64 mt-4">
            <a href="" class="block px-4 py-2 bg-red-500 text-white rounded mb-2">Insert records</a>
        </div>
        <div class="card-body">
            <form action="index.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="block text-black"> Name</label>
                    <input type="text" id="name" name="name" class=" form-control w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-3">
                    <label for="roll" class="block text-black">Roll</label>
                    <input type="text" name="roll" id="roll" class="form-control w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-3">
                    <label for="age" class="block text-black">Age</label>
                    <input type="text" name="age" id="age" class="form-control w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-3">
            <input type="submit" name="create" class="bg-red-500 text-white px-4 py-2 rounded" value="Insert">
          </div>
</form>
       <?php

       if(isset($_POST['create'])){
        $data = [
        "name" => $_POST['name'],
        "roll" => $_POST['roll'],
        "age" => $_POST['age'],
        ];
        insertData("students",$data);
       }
       ?>
</div>
</div>
<div style="display: inline-block; vertical-align: top;">
    <?php
    if(isset($_GET['std_id'])){
        $id = $_GET['std_id'];


        $result = deleteRecord("students","id = '$id'");

       if($result){
        redirect('index.php');
       }
    }
    ?>
    <table class="w-full divide-y divide-gray-200">
        <thead class="bg-gray-900 text-white">
            <tr>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Roll</th>
                <th class="px-4 py-2 text-left">Age</th>
                <th class="px-4 py-2 text-left">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php
            $data = callingData("students");
            foreach ($data as $key => $value):
            ?>
            <tr>
                <td><?=$value['id'];?></td>
                <td><?=$value['name'];?></td>
                <td><?=$value['roll'];?></td>
                <td><?=$value['age'];?></td>
                <td> <a href="index.php?std_id=<?=$value['id'];?>" class="block px-4 py-2 bg-red-500 text-white rounded mb-2">Delete</a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

</div>
</body>
</html>