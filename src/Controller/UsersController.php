<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\EventInterface;
use Cake\I18n\DateTime;
use Cake\Log\Log;
use Cake\Mailer\Mailer;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);

        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
            return $this->redirect([
                'controller' => 'Patients',
                'action' => 'index',
            ]);
        }

        if ($this->request->is('post')) {
            $this->Flash->error(__('Invalid email or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
        }

        return $this->redirect(['action' => 'login']);
    }

    public function forgotPassword()
    {
        $this->request->allowMethod(['get', 'post']);

        if ($this->request->is('post')) {
            $email = trim((string)$this->request->getData('email'));
            if (!empty($email)) {
                $user = $this->Users->find()
                    ->where(['email' => $email])
                    ->first();

                if ($user) {
                    $token = bin2hex(random_bytes(32));
                    $user->reset_token = $token;
                    $user->reset_token_expires = DateTime::now()->addHours(1);

                    if ($this->Users->save($user)) {
                        $resetUrl = Router::url([
                            'controller' => 'Users',
                            'action' => 'resetPassword',
                            $token,
                        ], true);

                        // Try delivering email if mail server is available
                        try {
                            $mailer = new Mailer('default');
                            $mailer
                                ->setTo($user->email)
                                ->setSubject(__('Password Reset Request'))
                                ->deliver(
                                    __("Hello {0},\n\nYou requested a password reset for your PatientCare account.\nPlease click the link below to reset your password:\n\n{1}\n\nThis link will expire in 1 hour.\nIf you did not request this, you can safely ignore this email.\n", [
                                        $user->name,
                                        $resetUrl,
                                    ])
                                );
                        } catch (\Throwable $e) {
                            Log::error('Password reset email error: ' . $e->getMessage());
                        }

                        // Display direct reset link in Flash message
                        $this->Flash->success(
                            __('Password reset link generated! <a href="{0}" onclick="event.stopPropagation();" style="font-weight:bold;text-decoration:underline;">Click here to reset your password</a><br><small style="word-break:break-all;">Direct link: <a href="{0}" onclick="event.stopPropagation();">{0}</a></small>', [$resetUrl]),
                            ['escape' => false]
                        );

                        $this->set('resetUrl', $resetUrl);
                    } else {
                        $this->Flash->error(__('Could not generate reset token. Please try again.'));
                    }
                } else {
                    $this->Flash->error(
                        __('No account was found with the email "{0}". Please check your email and try again.', [h($email)]),
                        ['escape' => false]
                    );
                }
            } else {
                $this->Flash->error(__('Please enter your email address.'));
            }
        }
    }

    public function resetPassword($token = null)
    {
        $this->request->allowMethod(['get', 'post', 'put', 'patch']);

        if (empty($token)) {
            $this->Flash->error(__('Invalid or missing password reset token.'));

            return $this->redirect(['action' => 'login']);
        }

        $user = $this->Users->find()
            ->where([
                'reset_token' => $token,
                'reset_token_expires >=' => DateTime::now(),
            ])
            ->first();

        if (!$user) {
            $this->Flash->error(__('The password reset link is invalid or has expired. Please request a new one.'));

            return $this->redirect(['action' => 'forgotPassword']);
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), [
                'validate' => 'resetPassword',
            ]);

            if (!$user->hasErrors()) {
                $user->password = (string)$this->request->getData('password');
                $user->reset_token = null;
                $user->reset_token_expires = null;

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your password has been reset successfully. Please log in with your new password.'));

                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error(__('Could not save your new password. Please try again.'));
            } else {
                $this->Flash->error(__('Please correct the errors below and try again.'));
            }
        }

        $this->set(compact('user', 'token'));
    }

    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);

        $this->Authentication->addUnauthenticatedActions([
            'login',
            'forgotPassword',
            'resetPassword',
        ]);
    }
}
