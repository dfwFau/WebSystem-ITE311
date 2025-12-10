<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class RoleAuth implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        
        // Check if user is logged in
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }
        
        // Check if admin forced logout by changing password
        $userId = $session->get('user_id');
        $loginTime = $session->get('login_time');
        
        if ($userId && $loginTime) {
            try {
                $userModel = new UserModel();
                $user = $userModel->find($userId);
                
                if ($user && $user['force_logout_at']) {
                    // Admin changed password - force logout
                    $forceLogoutTime = strtotime($user['force_logout_at']);
                    
                    // If force_logout_at is after user's session login, logout the user
                    if ($forceLogoutTime > $loginTime) {
                        $session->destroy();
                        return redirect()->to(base_url('login'))
                            ->with('info', 'Your password was changed by an administrator. Please log in again.');
                    }
                }
            } catch (\Exception $e) {
                log_message('error', 'Error checking force logout: ' . $e->getMessage());
            }
        }
        
        return;
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
