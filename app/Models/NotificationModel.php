<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'notifications';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'event_id', 'type', 'message', 'status', 'created_at'];

    public function addNotification($data)
    {
        return $this->insert($data);
    }

    public function getPendingNotifications()
    {
        return $this->where('status', 'pending')->findAll();
    }

    public function updateStatus($id, $status)
    {
        return $this->update($id, ['status' => $status]);
    }
}
