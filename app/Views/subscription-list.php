<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Subscriptions</div>

                    <div class="card-body">



                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Text</th>
                                <th>Points</th>
                                <th>No of comments</th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($subscriptions)){
                                foreach($subscriptions as $row){?>

                                    <tr>
                                        <td><?=$row['author'];?></td>
                                        <td><?=($row['title'])?$row['title']:$row['story_title'];?></td>
                                        <td><?=($row['comment_text'])?substr($row['comment_text'],0,50):substr($row['story_text'],0,50);?>...</td>
                                        <td><?=$row['points'];?></td>
                                        <td><?=$row['num_comments'];?></td>
                                        <?php if($user['role_id'] ==1 ){?>
                                        <td>
                                            <a href="<?= base_url('edit-subscription/'.$row['id']) ?>" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" onclick="deleteS(<?php echo $row['id']?>,<?php echo $user_id?>);">Delete</a>

                                        </td>
                                        <?php }else{?>
                                        <td><a href="<?= base_url('view-subscription/'.$row['id']) ?>" class="btn btn-primary">View</a></td>
                                    <?php }?>
                                    </tr>

                                <?php }}else{?>
                                <tr>
                                    <td colspan="10">No data found</td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <?= $pager->links() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function deleteS(a,b){
        if(confirm('Are you sure you want to delete this?')){
            window.location.href = "/subscription-delete/"+a+"/"+b;
        }
    }
</script>