<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Subscription</div>

                    <div class="card-body">
                        <?=form_open('post_subscription/'.$subscription['id'], ['id' => 'edit_subscription']);?>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input name="title" class="form-control" placeholder="Title" type="text" value="<?=isset($subscription['title'])?$subscription['title']:''?>">
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Author</label>
                                <input name="author" class="form-control" placeholder="Author" type="text" value="<?=isset($subscription['author'])?$subscription['author']:''?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Comment Text</label>
                                <textarea name="comment_text" rows="3" class="form-control" placeholder="Comment Text"><?=isset($subscription['comment_text'])?$subscription['comment_text']:''?></textarea>
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Story Text</label>
                                <textarea name="story_text" rows="3" class="form-control" placeholder="Comment Text"><?=isset($subscription['story_text'])?$subscription['story_text']:''?></textarea>
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Story Title</label>
                                <input name="story_title" class="form-control" placeholder="Story Title" type="text" value="<?=isset($subscription['story_title'])?$subscription['story_title']:''?>">
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Points</label>
                                <input name="points" class="form-control" placeholder="Points" type="text" value="<?=isset($subscription['points'])?$subscription['points']:''?>">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">No of comments</label>
                                <input name="num_comments" class="form-control" placeholder="No of comments" type="text" value="<?=isset($subscription['num_comments'])?$subscription['num_comments']:''?>">
                            </div>
                            <!-- form-group// -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Save  </button>
                            </div> <!-- form-group// -->

                            <?=form_close();?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
