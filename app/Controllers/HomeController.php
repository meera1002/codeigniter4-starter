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
        $query           = $this->db->query( "SELECT * FROM users where role_id=2" );
        $page[ 'users' ] = $query->getResult( 'array' );
        echo view( 'includes/header' ,$this->session->get('user'));
        echo view( 'users-list', $page );
        echo view( 'includes/footer' );
    }
    public function subscriptions( $user_id = NULL )
    {
        $query                   = $this->db->query( "SELECT * FROM user_subscriptions where user_id=" . $user_id );
        $page[ 'subscriptions' ] = $query->getResult( 'array' );
        $page[ 'user_id' ]       = $user_id;
        echo view( 'includes/header' );
        echo view( 'subscription-list', $page );
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
}