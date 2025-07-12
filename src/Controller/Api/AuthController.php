<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Http\Exception\BadRequestException;
use Cake\Http\Exception\UnauthorizedException;
use Cake\Utility\Security;
use App\Model\Table\UsersTable;
use App\Model\Table\TokensTable;
use Cake\I18n\FrozenTime;

class AuthController extends AppController
{
    protected UsersTable $Users;
    protected TokensTable $Tokens;

    public function initialize(): void 
    {
        parent::initialize();
    
        $this->Users = $this->fetchTable('Users');
        $this->Tokens = $this->fetchTable('Tokens');
        // $this->Users = (new TableLocator())->get('Users');
        // $this->Tokens = (new TableLocator())->get('Tokens');
    }

    //Register User
    public function register()
    {
        $data = $this-> request->getData();

        $username = trim(strtolower($data['username'] ?? ''));
        $password = trim($data['password'] ?? '');
        $email    = trim($data['email'] ?? '');

        if (empty($username) || empty($password)) {
        throw new BadRequestException('Username and password are required.');
        }

        $user = $this->Users->newEmptyEntity();
        $user = $this->Users->patchEntity($user, [
        'username'   => $username,
        'password'   => $password,
        'email'      => $email,
        'is_active'  => true,
        ]);

        if (!$this->Users->save($user)) {
            return $this->response
                ->withStatus(422)
                ->withType('application/json')
                ->withStringBody(json_encode([
                    'status'=>false,
                    'errors'=>$user->getErrors()
                ]));
        }

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'status'  => true,
                'message' => 'User registered successfully.',
                'user_id' => $user->id
            ]));    
    }

    //Login user
    public function login()
    {
        $username = trim(strtolower($this->request->getData('username')));
        $password = trim($this->request->getData('password'));

        if (empty($username) || empty($password)) {
            throw new BadRequestException('Username and password are required');
        }

        $user = $this->Users->find()
        ->where(['username' => $username, 'is_active' => true])
        ->first();

        if (!$user || !password_verify($password, $user->password)) {
            throw new UnauthorizedException('Invalid credentials or inactive account');
        }

        $plainToken = bin2hex(Security::randomBytes(32));
        $hashedToken = hash('sha256', $plainToken);

        $tokenEntity = $this->Tokens->newEntity([
            'user_id'    => $user->id,
            'token'      => $hashedToken,
            'expires_at' => FrozenTime::now()->addDays(2), // Optional but good
            // 'ip_address' => $this->request->clientIp(),
        ]);

        $this->Tokens->saveOrFail($tokenEntity);

        return $this->response->withType('application/json')
        ->withStringBody(json_encode([
            'status' => true,
            'token' => $plainToken
        ]));
    }

    //Logout User
    public function logout()
    {
        $user = $this->request->getAttribute('user');
        if (!$user) {
            throw new UnauthorizedException('Not authenticated');
        }

        $header = $this->request->getHeaderLine('Authorization');
        if (!preg_match('/Bearer\s+(.+)/i', $header, $matches)) {
            throw new UnauthorizedException('Missing or invalid token');
        }

        $tokenPlain = $matches[1];
        $tokenHash = hash('sha256', $tokenPlain);

        $this->Tokens->deleteAll([
            'user_id' => $user->id,
            'token'   => $tokenHash
        ]);

        return $this->response->withType('application/json')
            ->withStringBody(json_encode([
                'status'  => true,
                'message' => 'Logged out successfully'
            ]));
    }

    //User profile
    public function profile()
    {
        $user = $this->request->getAttribute('user');
        if (!$user) {
            throw new UnauthorizedException('Not authenticated');
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode([
                'status' => true,
                'data' => [
                    'id'        => $user->id,
                    'username'  => $user->username,
                    'email'     => $user->email ?? null,
                    'is_active' => $user->is_active,
                ]
            ]));
    }   
}
