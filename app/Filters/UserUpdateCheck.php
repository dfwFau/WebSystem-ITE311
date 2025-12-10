<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UserUpdateCheck implements FilterInterface
{
    /**
     * Checks if user data has been updated and logs out if necessary
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Only check if user is authenticated
        if (!session()->get('isAuthenticated')) {
            return; // Let other filters handle authentication
        }

        $userId = session()->get('userId');
        $sessionUpdatedAt = session()->get('userUpdatedAt');
        
        // Skip check if no user ID or session timestamp
        if (!$userId) {
            return;
        }

        $userModel = new \App\Models\UserModel();
        $currentUser = $userModel->find($userId);
        
        if (!$currentUser) {
            // User no longer exists, logout
            session()->destroy();
            return redirect()->to('/login')->with('error', 'Your account is no longer available. Please contact administrator.');
        }

        $dbUpdatedAt = $currentUser['updated_at'] ?? null;
        
        // If session doesn't have timestamp, set it from database (for old sessions)
        if (!$sessionUpdatedAt && $dbUpdatedAt) {
            session()->set('userUpdatedAt', $dbUpdatedAt);
            return; // Continue normally
        }
        
        // If database doesn't have timestamp but session does, update DB (shouldn't happen normally)
        if (!$dbUpdatedAt && $sessionUpdatedAt) {
            $userModel->update($userId, ['updated_at' => date('Y-m-d H:i:s')]);
            return; // Continue normally
        }
        
        // Compare timestamps if both exist
        if ($sessionUpdatedAt && $dbUpdatedAt) {
            // Convert to timestamps for reliable comparison
            $sessionTimestamp = strtotime($sessionUpdatedAt);
            $dbTimestamp = strtotime($dbUpdatedAt);
            
            // If conversion failed, do string comparison
            if ($sessionTimestamp === false || $dbTimestamp === false) {
                // Fallback to string comparison (trim whitespace)
                if (trim($sessionUpdatedAt) !== trim($dbUpdatedAt)) {
                    session()->destroy();
                    return redirect()->to('/login')->with('error', 'Your account has been updated. Please log in again.');
                }
            } else {
                // Compare timestamps (allow 1 second difference for rounding)
                if (abs($sessionTimestamp - $dbTimestamp) > 1) {
                    session()->destroy();
                    return redirect()->to('/login')->with('error', 'Your account has been updated. Please log in again.');
                }
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

