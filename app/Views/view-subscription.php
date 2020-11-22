<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">View Subscription</div>

                    <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1"><b>Title: </b></label>
                                <?=isset($subscription['title'])?$subscription['title']:''?>
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <label for="exampleInputEmail1"><b>Author:  </b></label>
                                <?=isset($subscription['author'])?$subscription['author']:''?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><b>Comment Text:  </b></label>
                                <?=isset($subscription['comment_text'])?$subscription['comment_text']:''?>
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <label for="exampleInputEmail1"><b>Story Text: </b></label>
                                <?=isset($subscription['story_text'])?$subscription['story_text']:''?>
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <label for="exampleInputEmail1"><b>Story Title:  </b></label>
                               <?=isset($subscription['story_title'])?$subscription['story_title']:''?>
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <label for="exampleInputEmail1"><b>Points:  </b></label>
                                <?=isset($subscription['points'])?$subscription['points']:''?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"><b>No of comments:  </b></label>
                               <?=isset($subscription['num_comments'])?$subscription['num_comments']:''?>
                            </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
