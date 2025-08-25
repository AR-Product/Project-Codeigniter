<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NotificationModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $notificationModel = new NotificationModel();
        $userId = session()->get('user_id'); // Sesuaikan dengan session Anda
        
        // Ambil notifikasi
        $allNotifications = $notificationModel->getUserNotifications($userId, 10);
        
        // Kelompokkan notifikasi berdasarkan waktu
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        
        $notifications = [
            'today' => [],
            'yesterday' => [],
            'older' => []
        ];
        
        foreach ($allNotifications as $notif) {
            $notifDate = date('Y-m-d', strtotime($notif['created_at']));
            
            // Tambahkan icon dan type berdasarkan jenis notifikasi
            if (strpos($notif['title'], 'Pesanan') !== false) {
                $notif['icon'] = 'fas fa-shopping-cart';
                $notif['type'] = 'order';
            } elseif (strpos($notif['title'], 'Konsultasi') !== false) {
                $notif['icon'] = 'fas fa-comments';
                $notif['type'] = 'consult';
            } elseif (strpos($notif['title'], 'Stok') !== false) {
                $notif['icon'] = 'fas fa-box-open';
                $notif['type'] = 'stock';
            }
            
            if ($notifDate == $today) {
                $notifications['today'][] = $notif;
            } elseif ($notifDate == $yesterday) {
                $notifications['yesterday'][] = $notif;
            } else {
                $notifications['older'][] = $notif;
            }
        }
        
        $data = [
            'notifications' => $allNotifications,
            'today_notifications' => $notifications['today'],
            'yesterday_notifications' => $notifications['yesterday'],
            'older_notifications' => $notifications['older'],
            'unread_count' => $notificationModel->getUnreadCount($userId),
            // Data statistik lainnya...
        ];
        
        return view('admin/dashboard', $data);
    }
    
    public function markAsRead($id)
    {
        $notificationModel = new NotificationModel();
        $userId = session()->get('user_id');
        
        // Verifikasi notifikasi milik user
        $notification = $notificationModel->find($id);
        if ($notification && $notification['user_id'] == $userId) {
            $notificationModel->markAsRead($id);
            return $this->response->setJSON(['success' => true]);
        }
        
        return $this->response->setJSON(['success' => false]);
    }
    
    public function getNewNotifications()
    {
        $notificationModel = new NotificationModel();
        $userId = session()->get('user_id');
        
        $count = $notificationModel->where('user_id', $userId)
                                  ->where('is_read', 0)
                                  ->countAllResults();
        
        return $this->response->setJSON(['new_count' => $count]);
    }
}