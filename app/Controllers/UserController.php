<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UserSubscriptionModel;

class UserController extends BaseController
{
    public function registration( )
    {
        return view( 'register' );
    }
    public function login( )
    {
        return view( 'login' );
    }
    public function loginUser( )
    {
        helper(['form']);
        $input = $this->validate( array(
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]'
        ) );
        if ( !$input )
        {
            $data[ 'validation' ] = $this->validator;
            $data[ 'old' ]        = $this->request->getVar();
            return view( 'login', $data );
        }
        else
        {
            $model = new UserModel();
            $user  = $model->where( 'email', $this->request->getVar( 'email' ) )->first();
            if ( !$user )
            {
                $data[ 'notExtsts' ] = 1;
                return view( 'login', $data );
            }
            $password = password_verify($this->request->getVar( 'password' ), $user['password']);
            if ( !$password )
            {
                $data[ 'notExtsts' ] = 1;
                return view( 'login', $data );
            }

            $session = session();
            $session->set( 'user', $user );
            if( $user['role_id'] == 1 ){
                return redirect()->to( '/users' );
            }else{
                return redirect()->to( '/subscriptions/'.$user['id'] );
            }

        }
    }
    public function logout( )
    {
        $session = session();
        $session->destroy();
        return redirect()->to( '/login' );
    }
    public function storeUser( )
    {
        helper(['form']);
        $input = $this->validate( array(
            'first_name' => 'required|alpha_numeric_space|min_length[3]',
            'last_name' => 'required|alpha_numeric_space|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'phone' => 'required|min_length[10]',
            'dob' => 'required',
            'country' => 'required',
            'subscription' => 'required'
        ) );
        if ( !$input )
        {
            echo view( 'register', array(
                'validation' => $this->validator,
                'old' => $this->request->getVar()
            ) );
        }
        else
        {
            $user_id = $this->createUser( $this->request->getVar() );
            if ( $user_id )
            {
                $this->fetchSubscription( $this->request->getVar(), $user_id );
                $status = $this->sendEmail( $this->request->getVar() );
            }
            //$this->session->setFlashdata('viewMessge','User created successfully!');
            //$page['session'] =$this->session;
            return redirect( '/register' );
        }
    }
    function createUser( $request )
    {
        $userModel = new UserModel();
        $data      = array(
            'first_name' => $request[ 'first_name' ],
            'last_name' => $request[ 'last_name' ],
            'email' => $request[ 'email' ],
            'password' => password_hash( $request[ 'password' ], PASSWORD_BCRYPT ),
            'phone' => $request[ 'phone' ],
            'dob' => date( 'Y-m-d', strtotime( $request[ 'dob' ] ) ),
            'country' => $request[ 'country' ],
            'subscription' => $request[ 'subscription' ],
            'role_id' => 2,
            'created_at' => date( "Y-m-d h:i:sa" )
        );
        $userModel->insert( $data );
        return $userModel->getInsertID();
    }
    function fetchSubscription( $request, $user_id )
    {
        $client     = \Config\Services::curlrequest();
        $response   = $client->request( 'GET', 'https://hn.algolia.com/api/v1/search?tags=' . $request[ 'subscription' ] );
        $statusCode = $response->getStatusCode();
        $body       = $response->getBody();
        $body       = json_decode( $body, true );
        if ( $statusCode == 200 && !empty( $body ) )
        {
            $cnt = 1;
            foreach ( $body as $key => $rows )
            {
                if ( is_array( $rows ) )
                {
                    foreach ( $rows as $row )
                    {
                        if ( $cnt <= 10 )
                        {
                            $userSubModel = new UserSubscriptionModel();
                            $data         = array(
                                'user_id' => $user_id,
                                'title' => $row[ 'title' ],
                                'author' => $row[ 'author' ],
                                'comment_text' => $row[ 'comment_text' ],
                                'story_text' => $row[ 'story_text' ],
                                'story_title' => $row[ 'story_title' ],
                                'points' => $row[ 'points' ],
                                'num_comments' => $row[ 'num_comments' ],
                                'created_at' => date( 'Y-m-d', strtotime( $row[ 'created_at' ] ) )
                            );
                            $userSubModel->insert( $data );
                        }
                        $cnt++;
                    }
                }
            }
        }
    }
    function sendEmail( $request )
    {
        $email = \Config\Services::email();
        $email->setFrom( 'your@example.com', 'Your Name' );
        $email->setTo( $request[ 'email' ] );
        $email->setSubject( 'Email Verification' );
        $data = array(
            'userName' => $request[ 'first_name' ] . ' ' . $request[ 'last_name' ],
            'email' => $request[ 'email' ]
        );
        $body = view( 'emails/verification.php', $data );
        $email->setMessage( $body );
        if ( $email->send() )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    //--------------------------------------------------------------------
}