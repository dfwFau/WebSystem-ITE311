<?php

namespace App\Helpers;

/**
 * Session Helper
 * Invalidates user sessions by deleting session files
 */
class SessionHelper
{
    /**
     * Delete all session files for a user
     * The RoleAuth filter will detect the password change through updated_at timestamp
     * 
     * @param int $userId
     * @return bool
     */
    public static function invalidateUserSessions($userId)
    {
        try {
            return self::deleteUserSessionFiles($userId);
        } catch (\Exception $e) {
            log_message('error', 'Error invalidating sessions: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Delete all session files that belong to a specific user
     * 
     * @param int $userId
     * @return bool
     */
    private static function deleteUserSessionFiles($userId)
    {
        $sessionPath = WRITEPATH . 'session';
        
        // If session directory doesn't exist, nothing to delete
        if (!is_dir($sessionPath)) {
            log_message('info', "Session directory not found: {$sessionPath}");
            return true;
        }
        
        $deletedCount = 0;
        
        try {
            $files = @scandir($sessionPath);
            
            if (!$files || !is_array($files)) {
                return true;
            }
            
            foreach ($files as $file) {
                // Skip . and ..
                if ($file === '.' || $file === '..') {
                    continue;
                }
                
                $filePath = $sessionPath . DIRECTORY_SEPARATOR . $file;
                
                // Only process files
                if (!is_file($filePath)) {
                    continue;
                }
                
                try {
                    // Read the session file with error suppression
                    $content = @file_get_contents($filePath);
                    if (!$content) {
                        continue;
                    }
                    
                    // Check if session belongs to this user
                    if (self::sessionBelongsToUser($content, $userId)) {
                        if (@unlink($filePath)) {
                            $deletedCount++;
                            log_message('debug', "Session deleted for user {$userId}: {$file}");
                        }
                    }
                } catch (\Exception $e) {
                    // Log but continue with other files
                    log_message('debug', "Could not process session file {$file}: " . $e->getMessage());
                    continue;
                }
            }
            
            if ($deletedCount > 0) {
                log_message('info', "Invalidated {$deletedCount} session file(s) for user {$userId}");
            }
            
            return true;
            
        } catch (\Exception $e) {
            log_message('error', 'Error deleting session files: ' . $e->getMessage());
            // Don't fail - just log and return true
            return true;
        }
    }
    
    /**
     * Check if session data belongs to a specific user
     * Handles different serialization formats
     * 
     * @param string $sessionContent
     * @param int $userId
     * @return bool
     */
    private static function sessionBelongsToUser($sessionContent, $userId)
    {
        $userIdStr = (string)$userId;
        
        // Check for serialized format: s:7:"user_id";i:123;
        if (strpos($sessionContent, 's:7:"user_id";i:' . $userIdStr . ';') !== false) {
            return true;
        }
        
        // Check for other serialized formats
        if (strpos($sessionContent, '"user_id"') !== false && 
            strpos($sessionContent, ':' . $userIdStr . ';') !== false) {
            return true;
        }
        
        return false;
    }
}

