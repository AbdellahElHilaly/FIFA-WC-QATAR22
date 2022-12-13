<?php
include_once '../include/head.php';
include_once '../classes/teame.class.php';

$connect = new Database;
$connect->connect();
if(isset($_POST['updateTeams'])){
$team= new Team($_POST['country'] , $_POST['coach'] , $_POST['logo'] , $_POST['image']);
$team->updateTeam($_POST['id']);
}
$updateteam = new Team();
$result = $updateteam->getTeam($_GET['id']);
//put the attributs inside of objects
if($result){
    $id = $result['id'];
    $country = $result['country'];
    $coach = $result['coach'];
    $image = $result['image'];
    $logo = $result['logo'];
}

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Main CSS-->
    <link href="../assets/css/dashtest.css" rel="stylesheet" media="all">
</head>

<div class="container" id="modal-teams">
    <div class="modal-content">
        <form action="" method="POST" id="form" data-parsley-validate>
            <div class="modal-header">
                <h5 class="modal-title">Edit Team</h5>
            </div>
            <div class="modal-body">
    
                <input type="hidden" name="id" value="<?php echo $id; ?>" >

                <div class="mb-3">
                    <label class="form-label">Country</label>
                    <input type="text" name="country"  class="form-control" value="<?php echo $country; ?>" required/>
                </div>

                <div class="mb-3">
                    <label class="form-label">Coach</label>
                    <input type="text"  name="coach" class="form-control"  value="<?php echo $coach; ?>" required/>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" name="image" type="file" id="formFile" value="<?php echo $image; ?>">
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Logo</label>
                    <input class="form-control" name="logo" type="file" id="formFile" value="<?php echo $logo; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-white border" data-bs-dismiss="modal" id="cancel-btn">Cancel</a>
                <button type="submit" name="updateTeams" class="color btn  text-light task-action-btn" id="save-btn">Save changes</button>
            </div>
        </form>
    </div>
</div>