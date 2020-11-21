<main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Users</div>

                        <div class="card-body">

                            <div class="alert alert-success" role="alert">

                            </div>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Dob</th>
                                    <th>Country</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($users)){
                                    foreach($users as $row){?>

                                <tr>
                                    <td><?=$row['first_name'].' '.$row['last_name'];?></td>
                                    <td><?=$row['email'];?></td>
                                    <td><?=$row['phone'];?></td>
                                    <td><?=$row['dob'];?></td>
                                    <td><?=$row['country'];?></td>
                                    <td>
                                        <a href="<?= base_url('subscriptions/'.$row['id']) ?>" class="btn btn-primary">View Subscription</a>
                                    </td>

                                </tr>

                                <?php }}else{?>
                                <tr>
                                    <td colspan="10">No data found</td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

