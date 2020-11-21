<?php
namespace App\Models;
use CodeIgniter\Model;
class UserSubscriptionModel extends Model
{
    protected $table      = 'user_subscriptions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'title', 'author', 'story_text', 'points', 'num_comments','comment_text','story_title', 'created_at','updated_at'];
}