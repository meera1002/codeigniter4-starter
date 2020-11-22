<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UserSubscriptionModel;

class HomeController extends BaseController
{
    public function __construct(  ) {
        $session = session();
        if( !$session->get('user') ){
            header('Location: /login');
        }
    }
    public function users( )
    {
        $model = new UserModel();

        $data = [
            'users' => $model->where('role_id', '2')->paginate(10),
            'pager' => $model->pager
        ];
        $user = $this->session->get('user');
        $data[ 'user' ]       = $user;
        echo view( 'includes/header' ,$data);
        echo view( 'users-list', $data );
        echo view( 'includes/footer' );
    }
    public function subscriptions( $user_id = NULL )
    {
        $model = new UserSubscriptionModel();
        $user = $this->session->get('user');
        if( $user['role_id'] == 2 ){
            $query = $model->where('user_id', $user['id'])->paginate(10);
        }else{
            $query = $model->paginate(10);
        }

        $data = [
            'subscriptions' => $query,
            'pager' => $model->pager
        ];
        $data[ 'user_id' ]       = $user_id;
        $data[ 'user' ]       = $user;
        echo view( 'includes/header',$data );
        echo view( 'subscription-list', $data );
        echo view( 'includes/footer' );
    }
    public function deleteSubscription( $id, $user_id = Null )
    {
        if ( $id && $user_id )
        {
            $builder = $this->db->table( 'user_subscriptions' );
            $builder->where( 'id', $id );
            $builder->delete();
            return redirect()->to( '/subscriptions/' . $user_id );
        }
        return redirect()->to( '/users' );
    }
    public function editSubscription( $id )
    {
        $model = new UserSubscriptionModel();


        $data = [
            'subscription' =>$model->where('id', $id)->first()
        ];
        $user = $this->session->get('user');
        $data[ 'user' ]       = $user;
        echo view( 'includes/header' ,$data);
        echo view( 'edit-subscription', $data );
        echo view( 'includes/footer' );
    }
    public function postSubscription( $id )
    {
        $model = new UserSubscriptionModel();
        $subscription = $model->where('id', $id)->first();
        $request = $this->request->getVar();
        $data      = array(
            'id' => $id,
            'title' => $request[ 'title' ],
            'author' => $request[ 'author' ],
            'comment_text' => $request[ 'comment_text' ],
            'story_text' => $request[ 'story_text' ],
            'story_title' => $request[ 'story_title' ],
            'points' => $request[ 'points' ],
            'num_comments' => $request[ 'num_comments' ],
            'updated_at' => date( "Y-m-d h:i:sa" )
        );
        $model->save($data);

        return redirect()->to( '/subscriptions/'.$subscription['user_id'] );


    }
    public function viewSubscription( $id )
    {
        $model = new UserSubscriptionModel();
        $data = [
            'subscription' =>$model->where('id', $id)->first()
        ];
        $user = $this->session->get('user');
        $data[ 'user' ]       = $user;
        echo view( 'includes/header' ,$data);
        echo view( 'view-subscription', $data );
        echo view( 'includes/footer' );
    }
}